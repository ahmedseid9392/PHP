<?php
//array -is a special variable which can hold more than one value at a time.
// in php it have three types of array
//1,indexed array... indexed by number
//2,Associative array  --indexed by string
//3, Multidimensional array -- containes one or more array

$number=[1,45,23,78,47];
//echo $number[3];
sort($number);
print_r($number);
// foreach($number as $num){
//     print_r( $num )."<br>";
// }