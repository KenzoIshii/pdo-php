<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistance\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor\autoload.php';

try{
    $connection = ConnectionCreator::createConnection();
    $studentRepository = new PdoStudentRepository($connection);

    $connection->beginTransaction();
    $studentA = new Student(null, "Kat", new DateTimeImmutable("1998-11-15"));
    $studentRepository->saveStudent($studentA);

    $studentB = new Student(null, "Keith", new DateTimeImmutable("1978-08-01"));
    $studentRepository->saveStudent($studentB);

    $studentC = new Student(null, "Sayuri", new DateTimeImmutable("2002-07-16"));
    $studentRepository->saveStudent($studentC);
    $connection->commit();
} catch (\PDOException $e){
    echo $e->getMessage();
    $connection->rollback();
}
