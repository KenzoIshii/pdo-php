<?php

use Alura\Pdo\Infrastructure\Persistance\ConnectionCreator;

require_once 'vendor\autoload.php';

$pdo = ConnectionCreator::createConnection();

$pdo->exec("DROP TABLE IF EXISTS students");
$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');