<?php
require_once 'Disease.php';

$disease = new Disease();
$result = $disease->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Diseases</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="table-container">

<h2>Disease Records</h2>

<a class="add-btn" href="register_form.php">Add Disease</a>

<table>

<tr>
    <th>Cow ID</th>
    <th>Name</th>
    <th>Symptoms</th>
    <th>Diagnosis</th>
    <th>Treatment</th>
    <th>Store Date</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?= $row['Cow_ID'] ?></td>
    <td><?= $row['D_Name'] ?></td>
    <td><?= $row['Symptoms'] ?></td>
    <td><?= $row['Diagnosis_Date'] ?></td>
    <td><?= $row['Treatment'] ?></td>
    <td><?= $row['Store_date'] ?></td>

    <td>
        <a class="edit-btn" href="edit.php?id=<?= $row['Cow_ID'] ?>">Edit</a>

        <a class="delete-btn"
           href="delete.php?id=<?= $row['Cow_ID'] ?>"
           onclick="return confirm('Are you sure you want to delete this record?')">
           Delete
        </a>
    </td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>