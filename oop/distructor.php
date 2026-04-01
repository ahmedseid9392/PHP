<?php

// This  example has a __construct() 
// function that is automatically called 
// when you create an object from
// a class, and a __destruct() function 
// that is automatically called at the 
// end of the script
class Fruit {
public $name;
public $color;
function __construct($name)
{
$this->name = $name;
}
function __destruct() {

echo "The fruit is {$this->name}.";
}
}
$apple = new Fruit("Apple");
?>