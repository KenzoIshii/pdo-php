<?php

$pathBd = __DIR__ .'/banco.sqlite';
$pdo = new PDO('sqlite:'.$pathBd);

$sqlQuery = "SELECT * FROM students";

$listStudents = $pdo->query($sqlQuery);

$students = $listStudents->fetchObject();

print_r($students);