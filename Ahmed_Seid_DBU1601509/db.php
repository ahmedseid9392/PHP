<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_cow";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS tbl_disease (
Cow_ID INT NOT NULL  PRIMARY KEY,
D_Name VARCHAR(50) NOT NULL,
Symptoms VARCHAR(50) NOT NULL ,
Diagnosis_Date Date NOT NULL,
Treatment  VARCHAR(250) NOT NULL,
Store_date Date NOT NULL
)";

$result = $conn->query($sql);

if (!$result) {
    echo "Error creating table: " . $conn->error;
}
?>
