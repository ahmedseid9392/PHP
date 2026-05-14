<?php
include 'db.php';

 if (isset($_POST['submit'])) {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password =$_POST["password"];

  if(empty($name) || empty($email) || empty($password)){
        echo"all field required?";
    }
  else{

    $sql= " INSERT INTO users (name, email ,password)
    values('$name','$email', '$password')";

    $result= $conn->query($sql);
    if($result){
        header("Location:display.php");
        exit();
    }
    else{
        echo "Error:" .$conn->error;
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

</head>
<body>
   <form method="post">
    <label for="">Name:</label>
    <input type="text" name="name" > <br> <br>
    <label for="">Email:</label>
    <input type="text" name="email" > <br> <br>
    <label for="">Password:</label>
    <input type="text" name="password" > <br> <br>
   <button type="submit" name="submit">Add User</button>
   </form> 
</body>
</html>