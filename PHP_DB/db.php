<?php
// db.php
$host = "localhost";
$dbname = "student_db";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO error mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}


// CREATE DATABASE student_db;

// USE student_db;

// CREATE TABLE students (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(100),
//     email VARCHAR(100),
//     course VARCHAR(100)
// );
?>