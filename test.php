<?php

include __DIR__."/vendor/autoload.php";

use Israeldavidvm\DatabaseKnowledgeable\DatabaseKnowledgeable;

$metaInfoEnvFile=[
    'pathEnvFolder'=>'.',
    'name'=>'.env',
    'mode'=>'exclude',
    'tables'=>[],
];

$databaseKnowledgeable = new DatabaseKnowledgeable($metaInfoEnvFile);

$databaseKnowledgeable->generateDocumentation();