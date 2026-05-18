<?php
include "db.php";
if(isset($_POST["submit"])){
    $username= $_POST["username"];
    $password=$_POST["password"];
  

    $sql= " INSERT INTO users(username,password) values('$username','$password')";
   if( $result=$conn->query($sql)){
    echo "account created";
   }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create user</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <h2>Create Account</h2>
   <form method="post">
     <input type="text" 
               name="username" 
               placeholder="Enter Username"
               required>

        <input type="password" 
               name="password" 
               placeholder="Enter Password"
               required>
        

        <button type="submit" name="submit">
            Submit
        </button>

   </form> 
</body>
</html>