<?php

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor\autoload.php';

function listarAlunos(PdoStudentRepository $students){
    $studentList = $students->allStudent();
    var_dump($studentList);
}
