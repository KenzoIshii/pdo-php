<?php

namespace Alura\Pdo\Infrastructure\Persistance;

use PDO;

class ConnectionCreator
{
    public static function createConnection() : PDO
    {
        $pathBd = __DIR__ .'../../../banco.sqlite';
        return new PDO('sqlite:'.$pathBd);
    }
}