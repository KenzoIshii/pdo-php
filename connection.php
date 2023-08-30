<?php

$pathBd = __DIR__ .'/banco.sqlite';

$pdo = new PDO('sqlite:'.$pathBd);

echo "conectei";