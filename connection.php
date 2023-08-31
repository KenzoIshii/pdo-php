<?php

$pathBd = __DIR__ .'/banco.sqlite';
$pdo = new PDO('sqlite:'.$pathBd);

$pdo->exec("DROP TABLE IF EXISTS students");
$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');