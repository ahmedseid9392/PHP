<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>
        Welcome <?php echo $_SESSION['username']; ?>
    </h1>

    <a href="logout.php">
        Logout
    </a>

</div>

</body>
</html>