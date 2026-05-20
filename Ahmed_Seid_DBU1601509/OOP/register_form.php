<?php
include 'Disease.php';

$disease = new Disease();

if(isset($_POST['submit'])) {

    $result = $disease->create(
        $_POST['cow_id'],
        $_POST['d_name'],
        $_POST['symptoms'],
        $_POST['diag_date'],
        $_POST['treatment'],
        $_POST['store_date']
    );

    if($result){
        header("Location: display.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Disease</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add Disease</h2>

<form method="POST">

    <input type="number" name="cow_id" placeholder="Cow ID" required>

    <input type="text" name="d_name" placeholder="Disease Name" required>

    <input type="text" name="symptoms" placeholder="Symptoms" required>

    <input type="date" name="diag_date" required>

    <input type="text" name="treatment" placeholder="Treatment" required>

    <input type="date" name="store_date" required>

    <button type="submit" name="submit">Save</button>

</form>

<a href="display.php">View Records</a>

</div>

</body>
</html>