

<?php

//type casting in php it have two forms

//1 , cast temporarly  e.g $variable=(datatype)$value;
//2, settype function permanent casting  e.g settype($variable,"type")


$val = "123.45";
// Type casting (temporary)
$intVal = (int)$val;
echo $intVal."<br>";          // Output: 123
echo gettype($intVal)."<br>"; // Output:integer
echo gettype($val)."<br>";    // Still string
// settype (permanent)
settype($val, "integer");
echo $val."<br>";             // Output: 123
echo gettype($val)."<br>";    // Now integer
?>
