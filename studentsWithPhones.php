<?php

require_once 'vendor\autoload.php';
$connection = ConnectionCreator::createConnection();

$studentList = new PdoStudentRepository($connection);

print_r($studentList->allStudent());
