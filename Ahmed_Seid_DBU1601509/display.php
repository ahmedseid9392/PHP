<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Disease Records</h2>
    <a href="register_form.php" class="add-btn">Add Disease</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Cow_ID</th>
            <th>D_Name</th>
            <th>Symptoms</th>
            <th>Diagnosis_Date</th>
            <th>Treatment</th>
            <th>Store_Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $sql = "SELECT * FROM tbl_disease";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Cow_ID']}</td>
                        <td>{$row['D_Name']}</td>
                        <td>{$row['Symptoms']}</td>
                        <td>{$row['Diagnosis_Date']}</td>
                        <td>{$row['Treatment']}</td>
                        <td>{$row['Store_date']}</td>
                        
                    <td>
                    <a href='edit.php?editid={$row['Cow_ID']}' class='edit-btn'>Edit</a>
                    <a href='delete.php?deleteid={$row['Cow_ID']}'
                     class='delete-btn'
                    onclick=\"return confirm('Are you sure you want to delete this disease record?')\">
                    Delete
                      </a>
                  </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No diseases found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>