<?php
namespace MyApp\Entities;
class Courses 
{
    public readonly int $id;
    public $name;
    public function __construct($id,$name)
    {
        $this->id=$id;
        $this->name=$name;

}
public function getId()
{
    return $this->id;

}
public function getName() {
    return $this->name;
}
}
$course=new courses(1,"java");
$course->getId();
$course->getName();

echo "Course ID: " . $course->getId() . "<br>";
echo "Course Name: " . $course->getName() . "<br>";