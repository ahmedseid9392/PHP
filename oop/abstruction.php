<?php
abstract class Animal {
// Abstract method (must be defined in subclass)
abstract public function makeSound();
// Normal method (can be used directly)
public function sleep() {
echo "Sleeping...<br>";
}
}
class Dog extends Animal {
public function makeSound() {
echo "Woof! Woof!<br>";
} 
// Create object from subclass, not abstract class
$dog = new Dog();
// Access both methods
$dog->makeSound(); // from subclass
$dog->sleep(); 
    // inherited from abstract class
?>


