<?php
namespace MyApp\Entities;
class Student {

    public readonly int $id;
   public  $name,$email,$courses;

    public function __construct($id, $name, $email, $courses = []) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->courses = $courses;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
         $this->name=$name;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email=$email;
    }

    public function getCourses() {
        return $this->courses;
    }

    public function addCourse($course) {
        $this->courses[] = $course;
    }
}

// //Usage example
// $student = new Student(1, "Nivin", "nivin@gamil.com");
// $student->addCourse("java");
// echo "Student ID: " . $student->getId() . "<br>";
// echo "Student Name: " . $student->getName(). "<br>";
// echo "Student Email: " . $student->getEmail() . "<br>";

// echo "Student courses " ;
// foreach($student->getCourses() as $course)
// {
//     echo $course;

// }


    



