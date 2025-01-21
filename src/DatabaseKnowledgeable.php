<?php

namespace Israeldavidvm\DatabaseKnowledgeable;

use Exception;
use Dotenv\Dotenv;

use PDO;

use PDOException;

class DatabaseKnowledgeable {

    public $dataBaseConfig;
    public $pdo;
    public $metaInfoEnvFile;

    public function __construct($metaInfoEnvFile=null) {

        if($metaInfoEnvFile){
            $this->metaInfoEnvFile=$metaInfoEnvFile;
            $this->initDatabaseConnection($metaInfoEnvFile);
        }

    }

    public function initDatabaseConnection($metaInfoEnvFile){

        $this->metaInfoEnvFile=$metaInfoEnvFile;

        $dotenv = Dotenv::createImmutable(
            $this->metaInfoEnvFile['pathEnvFolder'],
            $this->metaInfoEnvFile['name'],
        );
        $dotenv->load();
        $dotenv->required(['DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD']);
        
        // Configuración de la conexión a la base de datos
        $this->dataBaseConfig=[
            'host' => $_ENV['DB_HOST'], // Cambia esto si tu servidor es diferente
            'dbname' => $_ENV['DB_DATABASE'], // Nombre de tu base de datos
            'user' => $_ENV['DB_USERNAME'], // Tu usuario de la base de datos
            'password' => $_ENV['DB_PASSWORD'], // Tu contraseña de la base de datos
        ];

        try {
            // Crear una conexión PDO
            $this->pdo = new PDO("pgsql:host={$this->dataBaseConfig['host']};dbname={$this->dataBaseConfig['dbname']}", $this->dataBaseConfig['user'], $this->dataBaseConfig['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }


    }


    public function generateMarkdownDocumentation(){
        try {
            // Obtener las tablas de la base de datos
            $tableNames = $this->getTableNames($this->metaInfoEnvFile);

            // Inicializar el contenido en formato Markdown
            $markdown = "#Explicacion de las tablas en la Base de Datos\n\n";

            foreach ($tableNames as $tableName) {


                $tableDescription=$this->getTableComment($tableName);     
                $columns=$this->getTableColumns($tableName);       
                
                $markdown.="## $tableName\n";
                $markdown.="$tableDescription\n";

                $markdown.="``` mermaid \n erDiagram\n";

                $markdown.="$tableName {\n";

                foreach ($columns as $column) {

                    $column['data_type']=$this->slugify($column['data_type']);
                    $markdown.="{$column['data_type']}  {$column['column_name']} \n";
                }


                $markdown.="}\n\n";

                $markdown .= "```\n";
            }

            // Guardar el resumen en un archivo Markdown
            file_put_contents('resumen_tablas.md', $markdown);
            echo "Resumen generado en 'resumen_tablas.md'.";

        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    public function getTableNames($metaInfoClusterTables){

        if(
            isset($metaInfoClusterTables['mode']) 
            && 
            isset($metaInfoClusterTables['tables'])
        ){
            if($metaInfoClusterTables['mode']=="include"){

                $tables=$metaInfoClusterTables['tables'];

            }elseif($metaInfoClusterTables['mode']=="exclude"){
                
                $tablesQuery = $this->pdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
                $tables = $tablesQuery->fetchAll(\PDO::FETCH_COLUMN);
            
                $tables = array_filter($tables, function($value) use($metaInfoClusterTables) {
                    return !in_array($value, $metaInfoClusterTables['tables']);
                });
            
            }

        }

        return $tables;
    }

    public function getTableComment($tableName){
        $stmt = $this->pdo->prepare("SELECT oid FROM pg_class WHERE relname = :table_name");
        $stmt->bindParam(':table_name', $tableName);
        $stmt->execute();
        $tableOid = $stmt->fetchColumn();

        $stmt = $this->pdo->prepare("select obj_description(:table_oid, 'pg_class')");
        $stmt->bindParam(':table_oid', $tableOid);
        $stmt->execute();
        $tableDescription = $stmt->fetchColumn();

        return $tableDescription;
    }

    public function getTableColumns($tableName,$fullyQualifiedForm=false){
        $columnsQuery = $this->pdo->prepare("SELECT column_name, data_type FROM information_schema.columns WHERE table_name = :table");
        $columnsQuery->execute(['table' => $tableName]);
        $columns = $columnsQuery->fetchAll(\PDO::FETCH_ASSOC);


        if($fullyQualifiedForm){

            $fks=$this->getTableFKs($tableName);

            $columns=array_map(
                function($column) use($tableName,$fks){
                    if(! in_array($column['column_name'], $fks)){
                        $column['column_name']="{$this->pluralToSingular($tableName)}_{$column['column_name']}";
                    }

                    return $column;
                }
            , $columns);
        }

        return $columns;
    }

       
    public function getTableFKs($tableName){
        $query = $this->pdo->prepare("
        SELECT *
            FROM 
                information_schema.columns cl
            WHERE 
                cl.column_name ~ '^[a-zA-Z0-9ñ]+_?[a-zA-Z0-9ñ]*_id$'
                AND
                cl.table_name = :table
                ");
        $query->execute(['table' => $tableName]);

        $foreignKeys = $query->fetchAll(\PDO::FETCH_ASSOC);
        $foreignKeys=array_map(function($foreignKey){
            return $foreignKey['column_name'];
        }, $foreignKeys);

        return $foreignKeys;
    }

    public function getTablePK($tableName,$fullyQualifiedForm=false){
        $query = $this->pdo->prepare("
            SELECT *
            FROM 
                information_schema.columns cl
            WHERE 
                cl.column_name ~ '^id$'
                AND
                cl.table_name = :table
        ");
        $query->execute(['table' => $tableName]);

        $primaryKey = $query->fetchAll(\PDO::FETCH_ASSOC);
        $primaryKey=array_map(function($pk){
            return $pk['column_name'];
        }, $primaryKey);

        if($fullyQualifiedForm){
            $primaryKey=array_map(
            fn($pk)=>"{$this->pluralToSingular($tableName)}_$pk"
            , $primaryKey);
        }

        return $primaryKey;

    }

    public function pluralToSingular($word) {
        // Reglas básicas para convertir plural a singular
        if (substr($word, -3) === 'ies') {
            
            // Palabras que terminan en 'ies' se convierten a 'y'
            return substr($word, 0, -3) . 'y';

        } elseif (substr($word, -1) === 's') {

            // Palabras que terminan en 's' se convierten a 's'
            return substr($word, 0, -1);

        } else {

            // Si no se aplica ninguna regla, devolver el plural original
            return $word;
        
        }
    }

    public function singularToPlural($word) {
       
        if (preg_match('/(y)$/', $word) && !preg_match('/(a|e|i|o|u)y$/', $word)) {
            return preg_replace('/y$/', 'ies', $word); // Cambiar 'y' por 'ies'
        } else {
            return $word . 's'; // Agregar 's' por defecto
        }
    }

    public function printScheme($tableName,$attributes){


        print("{$tableName}(");

        foreach ($attributes as $attributeKey => $attribute) {
            if($attributeKey!==array_key_last($attributes)){
                print("$attribute, ");
            }else {
                print("$attribute)");
            }

        }

        print("\n");

    }

    // Operaciones con conjuntos


    public function printSet($set,$setLabel=null,$sufix="\n"){
        if($setLabel){
            print("$setLabel={");
        }else{
            print("{");
        }

        foreach ($set as $key => $value) {
            if($key!==array_key_last($set)){
                print("$value,");
            }else {
                print("$value");
            }
        }
        print("}$sufix");
    }

    public function areEqual($set1,$set2){
        return $this->isASubset($set1,$set2)&&$this->isASubset($set2,$set1);
    }

    public function isASubset($subSet,$set){
        foreach($subSet as $x){
            if(!in_array($x,$set)){
                return false;
            }
        }
        return true;
    }

    public function union($set,$addSet): Array{
        foreach($addSet as $x){
            if(!in_array($x,$set)){
                $set[]=$x;
            }
        }
        return $set;
    }

    public function difference($set,$subtractSet){
        $result=[];
        foreach($set as $x){
            if(!in_array($x, $subtractSet)){
                $result[]=$x;
            }
        }
        return $result;
    }

    // cadenas

    public function slugify($string) {
        return str_replace(' ', '_', $string);
    }


}
