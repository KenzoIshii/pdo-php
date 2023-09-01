<?php

use Alura\Pdo\Infrastructure\Persistance\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor\autoload.php';
$connection = ConnectionCreator::createConnection();

$studentList = new PdoStudentRepository($connection);

print_r($studentList->allStudent());

