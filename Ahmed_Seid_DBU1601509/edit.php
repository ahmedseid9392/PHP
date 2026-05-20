<?php
include 'db.php';

$id = $_GET['editid'];

$sql = "SELECT * FROM tbl_disease WHERE Cow_ID= $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$Cow_ID = $row['Cow_ID'];
$D_Name = $row['D_Name'];
$Symptoms = $row['Symptoms'];
$Diagnosis_Date = $row['Diagnosis_Date'];
$Treatment = $row['Treatment'];
$Store_Date = $row['Store_date'];

if (isset($_POST['submit'])) {
    $Cow_ID = $_POST['Cow_ID'];
    $D_Name = $_POST['D_Name'];
    $Symptoms = $_POST['Symptoms'];
    $Diagnosis_Date = $_POST['Diagnosis_Date'];
    $Treatment = $_POST['Treatment'];
    $Store_Date = $_POST['Store_date'];

    $sql = "UPDATE tbl_disease 
            SET Cow_ID='$Cow_ID', D_Name='$D_Name', Symptoms='$Symptoms', Diagnosis_Date='$Diagnosis_Date', Treatment='$Treatment', Store_date='$Store_Date ' 
            WHERE Cow_ID=$id";

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
    <title>Edit Disease</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container"> 
    <h2>Edit Disease</h2>
 
<form method="POST">
    <label>Cow ID:</label><br>
    <input type="text" name="Cow_ID" value="<?php echo $Cow_ID; ?>" required><br><br>

    <label>Disease Name:</label><br>
    <input type="text" name="D_Name" value="<?php echo $D_Name; ?>" required><br><br>

    <label>Symptoms:</label><br>
    <input type="text" name="Symptoms" value="<?php echo $Symptoms; ?>" required><br><br>

    <label>Diagnosis Date:</label><br>
    <input type="date" name="Diagnosis_Date" value="<?php echo $Diagnosis_Date; ?>" required><br><br>

    <label>Treatment:</label><br>
    <input type="text" name="Treatment" value="<?php echo $Treatment; ?>" required><br><br>

    <label>Store Date:</label><br>
    <input type="date" name="Store_Date" value="<?php echo $Store_Date; ?>" required><br><br>

    <button type="submit" name="submit">Update Disease</button>
</form>
</div>


</body>
</html>