<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor\autoload.php';

$pathBd = __DIR__ .'/banco.sqlite';
$pdo = new PDO('sqlite:'.$pathBd);

$pdo->exec('CREATE TABLE students(id INTERGER PPIMARY KEY, name TEXT, birth_date TEXT)');
$student = new Student(null, "Sayuri",new DateTimeImmutable('2000-11-16'));

$sqlInsert = "Insert into students(name, birth_date)VALUES('{$student->name()}','{$student->birthDate()->format('Y-m-d')}')";

$pdo->exec($sqlInsert);

