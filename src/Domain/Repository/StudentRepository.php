<?php

namespace Alura\Pdo\Domain\Repository;

use Alura\Pdo\Domain\Model\Student;

interface StudentRepository
{
    public function allStudent() : array;
    public function studentBirthAt(\DateTimeImmutable $birthDate) : array;

    public function studentsWithPhones() : array;
    public function saveStudent(Student $student) : bool;
    public function removeStudent(Student $student) : bool;
}