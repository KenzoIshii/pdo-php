<?php


use Alura\Pdo\Infrastructure\Persistance\ConnectionCreator;

require_once 'vendor\autoload.php';

$pdo = ConnectionCreator::createConnection();

