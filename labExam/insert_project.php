<?php

include "db.php";

$student_id = $_POST['student_id'];
$project_name = $_POST['project_name'];
$hourly_rate = $_POST['hourly_rate'];

$sql = "INSERT INTO projects
(student_id, hourly_rate, project_name)

VALUES
('$student_id', '$hourly_rate', '$project_name')";

if ($conn->query($sql) == TRUE) {
    echo "Project Registered Successfully";
} else {
    echo "Error: " . $conn->error;
}

?>