<?php
require_once 'Disease.php';

$disease = new Disease();

$id = $_GET['id'];

$row = $disease->getById($id);

if(isset($_POST['submit'])) {

    $result = $disease->update(
        $id,
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
    <title>Edit Disease</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Edit Disease</h2>

<form method="POST">

<input type="text" name="d_name"
value="<?= $row['D_Name'] ?>" required>

<input type="text" name="symptoms"
value="<?= $row['Symptoms'] ?>" required>

<input type="date" name="diag_date"
value="<?= $row['Diagnosis_Date'] ?>" required>

<input type="text" name="treatment"
value="<?= $row['Treatment'] ?>" required>

<input type="date" name="store_date"
value="<?= $row['Store_date'] ?>" required>

<button type="submit" name="submit">Update</button>

</form>

</div>

</body>
</html>