<?php
session_start();
include "db.php";

$message = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE username='$username' 
            AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $_SESSION['username'] = $username;

        header("Location: dashboard.php");

    } else {

        $message = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Login Form</h2>

    <form method="POST">

        <input type="text" 
               name="username" 
               placeholder="Enter Username"
               required>

        <input type="password" 
               name="password" 
               placeholder="Enter Password"
               required>

        <button type="submit" name="login">
            Login
        </button>
        <h2>If you don't account ? <a href="create.php">
        create account
    </a>
</h2>

    </form>

    <p class="error">
        <?php echo $message; ?>
    </p>

</div>

</body>
</html>