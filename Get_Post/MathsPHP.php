<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="MathsPHP.php" method="post">
        <label for="">X:</label>
        <input type="text" name="X" placeholder="Enter Number"> <br> <br>
        <label for="">Y:</label>
        <input type="text" name="Y" placeholder="Enter Number"> <br> <br>
        <label for="">Z:</label>
        <input type="text" name="Z" placeholder="Enter Number"> <br> <br>
        <button type="submit">Submit</button> <br> <br>
    </form>
</body>
</html>

<?php
$x=$_POST["X"];
$y=$_POST["Y"];
$z=$_POST["Z"];

  // echo abs($num);  //absolute value
//echo round($num,1);// rounded

//echo floor($num);// floor to lower integer
//echo pow($num,3); //power
echo round(PI(),2) . "<br>";
echo max($x,$y,$z) ."<br>";
echo min($x,$y,$z). "<br>";
echo sqrt($x)."<br>";
echo rand(1,10);

?>