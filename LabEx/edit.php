<?php
include 'db.php';

$id = $_GET['editid'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name = $row['name'];
$email = $row['email'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users 
            SET name='$name', email='$email', password='$password' 
            WHERE id=$id";

    $result = $conn->query($sql);

    if ($result) {
        header("Location: display.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $email; ?>" required><br><br>

    <label>Password:</label><br>
    <input type="text" name="password" value="<?php echo $password; ?>" required><br><br>

    <button type="submit" name="submit">Update User</button>
</form>

</body>
</html>