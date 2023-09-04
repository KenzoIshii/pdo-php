<?php

use Alura\Pdo\Infrastructure\Persistance\ConnectionCreator;

require_once 'vendor\autoload.php';

$pdo = ConnectionCreator::createConnection();

$pdo->exec('CREATE TABLE IF NOT EXISTS students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');
$pdo->exec('CREATE TABLE IF NOT EXISTS phones (id INTEGER PRIMARY KEY, areaCode TEXT, number TEXT, studentId INTEGER, FOREIGN KEY (studentId) REFERENCES students(id));');
