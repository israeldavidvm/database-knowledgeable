<?php

namespace Israeldavidvm\DatabaseKnowledgeable;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument; // Para agregar un argumento

class AppCommand extends Command
{
    protected function configure()
    {
        // Define el nombre del comando
        $this->setName('app:generateMarkdownDocumentation')
            ->setDescription(
                'Este comando te permite generar una documentacion ' .
                'de tu base de datos postgresql en un archivo llamado ' .
                'db-documentation.md'
            )
            ->setHelp('Este comando te permite generar una documentacion ' .
                'de tu base de datos postgresql en un archivo llamado ' .
                'db-documentation.md'
            )
            ->addArgument('depth', InputArgument::OPTIONAL, 'Profundidad de los encabezados', 1) 
            ->addArgument('path', InputArgument::OPTIONAL, 'La ruta al archivo .env.', './.env'); 

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Obtener la ruta proporcionada por el usuario
        $path = $input->getArgument('path');
        
        if (!file_exists($path)) {
            $output->writeln("<error>El archivo .env en la ruta proporcionada no existe.</error>\n");
            return Command::FAILURE;
        }

        // Obtener la ruta del directorio que contiene el archivo
        $directoryPath = dirname($path);

        // Obtener el nombre del archivo
        $fileName = basename($path);

        // Crear la configuración para DatabaseKnowledgeable
        $metaInfoEnvFile = [
            'pathEnvFolder' => $directoryPath,
            'name' => $fileName,
            'mode' => 'exclude',
            'tables' => [],
        ];

        $depth = $input->getArgument('depth');

        // Instanciar y usar DatabaseKnowledgeable
        $databaseKnowledgeable = new DatabaseKnowledgeable($metaInfoEnvFile);

        $databaseKnowledgeable->generateMarkdownDocumentation($depth);

        // Mostrar mensaje de éxito
        $output->writeln('Su archivo ha sido generado con éxito');

        // Devolver un código de estado (éxito)
        return Command::SUCCESS;
    }
}