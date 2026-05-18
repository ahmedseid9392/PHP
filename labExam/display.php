<?php
include "db.php";

$sql = "SELECT students.student_id,
students.student_name,
students.year,
projects.project_name,
students.department,
projects.hourly_rate

FROM students

INNER JOIN projects
ON students.student_id = projects.student_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
</head>
<body>

<h2>Sample Output</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Project Code</th>
    <th>Project Name</th>
    <th>Year</th>
    <th>Student</th>
    <th>Department</th>
    <th>Hourly Rate</th>
</tr>

<?php

while($row = $result->fetch_assoc()) {

?>

<tr>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['project_name']; ?></td>
    <td><?php echo $row['year']; ?></td>
    <td><?php echo $row['student_name']; ?></td>
    <td><?php echo $row['department']; ?></td>
    <td><?php echo $row['hourly_rate']; ?></td>
</tr>

<?php
}
?>

</table>

</body>
</html>