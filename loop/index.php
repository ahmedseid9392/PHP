<?php

echo "for loop <br>";

for($i=1;$i<=10;$i++){
    echo"number:".$i ."<br>";
    if($i>5)
    continue;
    
}

echo "while loop <br>";

$number=1;

while($number<=10){
    echo"number:".$number ."<br>";
  $number++;
}

echo " do while loop <br>";

do{
    
 echo"number:".$number ."<br>";
  $number++;
} while($number<=20);

