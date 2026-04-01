<?php 
/* Defining a PHP Function */ 
function writeMessage() { 
echo "You are really a nice person, Have a nice time!"; 
} 
writeMessage();      
/* Calling a PHP Function */ 

//function with parameter

function addFunction($num1, $num2) { 
$sum = $num1 + $num2; 
echo "Sum of the two numbers is : $sum"; 
} 
addFunction(10,20); 

//passing argument by refference
function goodbye( &$greeting ) { 
$greeting = "See you later"; 
} 
$myVar = "Hi there"; 
goodbye( $myVar ); 
echo $myVar; // Displays “See you later” 

//mixed
function addFive($num){ 
$num += 5; 
} 
function addSix(&$num) { // pass by reference 
$num += 6; 
} 
$orignum = 10; 
addFive($orignum); 
echo "Original Value is $orignum<br />";  
addSix( $orignum); 
echo "Original Value is $orignum<br />"; 

//function with return
function addFunction($num1, $num2) { 
$sum = $num1 + $num2; 
return $sum; 
} 
$return_value = addFunction(10, 20);      
echo "Returned value from the function : $return_value";
?>  