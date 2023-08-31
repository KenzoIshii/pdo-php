<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor\autoload.php';

$pathBd = __DIR__ .'/banco.sqlite';
$pdo = new PDO('sqlite:'.$pathBd);

$statement = $pdo->query("SELECT * FROM students");
$studentsList = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($studentsList as $students){
    $list[] = new Student(
        $students['id'],
        $students['name'],
        new \DateTimeImmutable($students['birth_date'])
    );
}

var_dump($list);