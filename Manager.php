<?php
namespace MyApp\Managers;
require_once 'Student.php';
trait loggable
{
    private $logFile='log.txt';
    public function log($message) {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] $message\n";
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }
}

class Manager  
{
    use loggable;
    public $students;

    public function __construct($student=[])
    {
        $this->students=$student;

    }

    public function addStudent($student) {
        $this->students[$student->getId()] = $student;
        $this->log("Added student with ID: {$student->getId()}");
    }

    public function getStudentById($id) {
        return $this->students[$id] ?? null;
        // get the id from student array . if exist it will return the student obj
        //if not will return null
    }
    public function UpdateStudent($id,$name,$email)
    {
        if(isset($this->students[$id]))
        {
            $student=$this->students[$id];
            $student->setName($name);
            $student->setEmail($email);
            $this->log("Updated student with ID: $id");
        }
        }
    

        public function deleteStudent($id) {
            if (isset($this->students[$id])) {
                $student = $this->students[$id];
                unset($this->students[$id]);
                $this->log("Deleted student with ID: $id");
            }
}
}
use MyApp\Entities\Student;
use MyApp\Entities\Course;
use MyApp\Managers\Manager;

// Create instances and perform operations...

$manager=new Manager();

$student1 = new Student(1, "Nivin", "Nivin@gmail.com");
$student2 = new Student(2, "aya", "aya@gmail.com");

$student1->addCourse("java");
$student2->addCourse("flutter");

$manager->addStudent($student1);
$manager->addStudent($student2);


$studentIds = [1, 2]; 

foreach ($studentIds as $studentId) {
    $retrievedStudent = $manager->getStudentById($studentId);

    if ($retrievedStudent) {
        echo "Student ID: " . $retrievedStudent->getId() . "<br>";
        echo "Name: " . $retrievedStudent->getName() . "<br>";
        echo "Email: " . $retrievedStudent->getEmail() . "<br>";
        echo "Student courses " ;
            foreach($student1->getCourses() as $course)
            {
                echo $course . "<br>";
                echo "<br>";
            
            }
    } else {
        echo "Student not found.";
    }
}




// Update student details
$manager->updateStudent(1, "aya", "aya@example.com");

// Retrieve the updated student by ID
$returnedStudent=$manager->getStudentById(1);


if($returnedStudent)
{

   echo "Student ID: " . $returnedStudent->getId() . "<br>";
   echo "Student Name: " .$returnedStudent->getName(). "<br>";
   echo "Student Email: " . $returnedStudent->getEmail() . "<br>";
   echo "<br>";
}else{
    echo 'student not found';
}

// Check if the student exists before deletion
$studentBeforeDeletion = $manager->getStudentById(1);

if ($studentBeforeDeletion) {
    // Delete the student
    $manager->deleteStudent(1);

    // Check if the student still exists after deletion
    $studentAfterDeletion = $manager->getStudentById(1);

    if ($studentAfterDeletion) {
        echo "Student deletion failed.";
    } else {
        echo "Student deleted successfully.";
     
    }
} else {
    echo "Student not found.";
 
}









 



