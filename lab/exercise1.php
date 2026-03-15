

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="exercise1.php" method="post">
        <label for="grade">Grade:
            <input type="number" name="grade"> <br> <br>
            <input type="submit" value="Submite">
        </label>
    </form>
</body>
</html>

<?php
$grade=8;

if($grade>=9 && $grade ){
    echo"A   <br>";
}
elseif($grade=8){
    echo "B <br>";

}

elseif($grade)

?>