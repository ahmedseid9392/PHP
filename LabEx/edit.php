<?php
include 'db.php';

$id=$_GET["editid"];
$sql= "SELECT * FROM users WHERE id =$id";
$result= $conn->query($sql);
$row= $result->fetch_assoc();
$name=$row["name"];
$email=$row["email"];
$password= $row["password"];

if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];

     if(empty($name) || empty($email) || empty($password)){
        echo"all field required?";
    }
    else{

    $sql ="UPDATE users SET name ='$name' ,email='$email', password ='$password' WHERE id=$id ";

    $result=$conn->query($sql);

    if($result){
        header("Location: display.php");
        exit();
    }
    else{
        echo "Error: ".$conn->error;
    }
    }
}

if(isset($_POST["cancel"])){
    header("Location :display.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post">
    <label for="">Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>" > <br> <br>
    <label for="">Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>" > <br> <br>
    <label for="">Password:</label>
    <input type="text" name="password" value="<?php echo $password; ?>" > <br> <br>
   <button type="submit" name="submit">Update User</button>   <button name="cancel">cancel</button>
    </form>
</body>
</html>
