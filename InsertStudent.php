<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor\autoload.php';

$pathBd = __DIR__ .'/banco.sqlite';
$pdo = new PDO('sqlite:'.$pathBd);

$student = new Student(null, "Sayuri",new \DateTimeImmutable('2000-11-16'));

$sqlInsert = "INSERT INTO students(name, birth_date)VALUES(:name,:birth_date)";

$sqlValues = $pdo->prepare($sqlInsert);
$sqlValues->bindValue(':name',$student->name());
$sqlValues->bindValue(':birth_date',$student->birthDate()->format('Y-m-d'));
$sqlValues->execute();

$student = new Student(null, "Alucard",new \DateTimeImmutable('1888-05-18'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
$statement->execute();

