<?php

$num1=20;
$num2=100;

$sum=$num1+$num2;

if($num1<100 && $num2 <200){
echo "  output using echo <br> sum ={$sum} <br>";
print "  output using print <br> sum ={$sum} <br>";
}

else{
    echo "sum is greater than 500";
}

$result = print "Hello!";   // Prints "Hello!" and sets $result = 1
echo "<br>Result: $result <br>"; // Shows: Result: 1


$num3="Ahmed";
$num4="Seid";
//== equal by value
//=== identical its type and value
// ! not equal value
//<>not equal by value
//!== not identical by type and value
//<=> spaceship operater if num1<num2 return -1  == return 0 grater than  return 1

//string concatination
// . operater concatinate the string but not change the original variable value
// .=  this append the seconde value to the ferst value change the value of first

//array operator
//+ union
//== equal key-value pair
// === identical key-value pair type,order

//ternary opretor
//if condition is true excute first else second

//example ($value>110)? "elder":"yonger"

echo $num3 .=$num4;
echo $num3;


echo $num3<=>$num4


?>