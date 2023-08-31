<?php

require_once 'vendor\autoload.php';

$pathBd = __DIR__ .'/banco.sqlite';
$pdo = new PDO('sqlite:'.$pathBd);

$statement = $pdo->prepare("DELETE FROM students WHERE id = :id");
$statement->bindValue(":id", 2, PDO::PARAM_INT);
$statement->execute();