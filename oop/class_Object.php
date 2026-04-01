<?php
// Define a class
class Student {
// Properties
public $name;
public $age;
// Method (function)
function showInfo() 
{
echo "Student name is $this->name and age is $this->age.";
}
}
$student1 = new Student(); // Create an object
$student1->name = "Eyob"; // Assign values to object properties
$student1->age = 21;
$student1->showInfo(); // Call the method
?>