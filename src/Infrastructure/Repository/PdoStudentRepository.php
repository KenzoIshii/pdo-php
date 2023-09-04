<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use PDO;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudent(): array
    {
        $statement = $this->connection->query("SELECT * FROM students");

        return $this->hydrateStudentList($statement);
    }

    public function studentBirthAt(\DateTimeImmutable $birthDate): array
    {
        $statement = $this->connection->query("SELECT * FROM students WHERE birth_data = :birth_data");
        $statement->bindValue(":birth_data", birthDate()->format('Y-m-d'));
        $statement->execute();

        return $this->hydrateStudentList($statement);
    }

    public function saveStudent(Student $student): bool
    {
        $statement = $this->connection->prepare("INSERT INTO students(name, birth_date)VALUES(:name,:birth_date)");

        $insert = $statement->execute([
            ':name' => $student->name(),
            ':birth_date' => $student->birthDate()->format('Y-m-d'),
        ]);

        return $insert;
    }

    public function removeStudent(Student $student): bool
    {
        $statement = $this->connection->prepare("DELETE FROM students WHERE id = :id");
        $statement->bindValue(":id", 2, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function hydrateStudentList(\PDOStatement $statement): array
    {
        $studentsList = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($studentsList as $students){
            $list[] = new Student(
                $students['id'],
                $students['name'],
                new \DateTimeImmutable($students['birth_date'])
            );
        }
        return $list;
    }

    /**
     * @throws \Exception
     */
    public function studentsWithPhones(): array
    {
        $statement = $this->connection->query("
            SELECT 
                students.id, 
                students.name, 
                students.birth_date, 
                phones.id as phoneId, 
                phones.areaCode, 
                phones.number
            FROM 
                students students 
            INNER JOIN phones phones ON students.id=phones.studentId"
        );
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $studentList = [];

        foreach($result as $studentsWithPhone){
            if(!array_key_exists($studentsWithPhone['id'], $studentList)){
                $studentList[$studentsWithPhone['id']] = new Student(
                    $studentsWithPhone['id'],
                    $studentsWithPhone['name'],
                    new \DateTimeImmutable($studentsWithPhone['birth_date'])
                );
            }
            $phone = new Phone($studentsWithPhone['phoneId'], $studentsWithPhone['areaCode'], $studentsWithPhone['number']);
            $studentList[$studentsWithPhone['id']]->addPhone($phone);
        }
        return $studentList;
    }
}