<?php

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Infrastructure\Persistance\ConnectionCreator;

require_once 'vendor\autoload.php';

$connection = ConnectionCreator::createConnection();

$connection->exec("INSERT INTO phones(areaCode, number, studentId) VALUES ('999','999999999','1')");
$connection->exec("INSERT INTO phones(areaCode, number, studentId) VALUES ('888','888888888','2')");
$connection->exec("INSERT INTO phones(areaCode, number, studentId) VALUES ('777','777777777','3')");
