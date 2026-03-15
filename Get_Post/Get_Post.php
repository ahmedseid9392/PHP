<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get method</title>
</head>
<body>

<form action="Get_Post.php" method="GET">
    <label for="username">UserName:
        <input type="text" name="username">
    </label>
    <br> <br>
    <label for="password">password:
        <input type="password" name="password" id="">
    </label> <br> <br>
    <input type="submit" value="Submit">
</form>
    
</body>
</html>
<?php
$username=$_GET["username"] ;
echo $username, "<br>";
$password=$_GET["password"];
echo $password;

?>