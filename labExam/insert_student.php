<?php

include "db.php";

$name = $_POST['student_name'];
$email = $_POST['student_email'];
$phone = $_POST['phone_number'];
$department = $_POST['department'];
$year = $_POST['year'];

$sql = "INSERT INTO students
(student_name, student_email, phone_number, department, year)

VALUES
('$name', '$email', '$phone', '$department', '$year')";

if ($conn->query($sql) == TRUE) {
    echo "Student Registered Successfully";
} else {
    echo "Error: " . $conn->error;
}

?>