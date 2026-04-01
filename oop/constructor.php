<?php

//with constructor
class Student {
public $name;
public $age;
// Constructor
function __construct($name, $age) {
$this->name = $name;
$this->age = $age;     
}
function showInfo() {
echo "Name: $this->name, Age: $this->age<br>";
} }
// Creating objects
$s1 = new Student("Sara", 20);
$s2 = new Student("John", 22);
$s1->showInfo();
$s2->showInfo();

//without constructor
class Student {
public $name;
public $age;
function setInfo($name, $age) {
$this->name = $name;
$this->age = $age;    }
function showInfo() {
echo "Name: $this->name, Age: $this->age<br>";
}}
// Creating objects (you must call setInfo each time)
$s1 = new Student();
$s1->setInfo("Sara", 20); //Here, you need extra method calls (setInfo) every 
//time you create an object.
$s1->showInfo();
//Compiled By Mohammed N.

$s2 = new Student(); $s2->setInfo("John", 22); $s2->showInfo(); 

?>