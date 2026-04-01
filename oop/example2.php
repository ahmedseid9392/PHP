<?php
class Student {
public $name;
public $id;
public function learn() {
echo "I learn IT";
}
}
// Create an object from the class
$student1 = new Student();
// Call the method
$student1->learn();
?>