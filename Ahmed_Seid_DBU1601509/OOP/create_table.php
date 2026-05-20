<?php
include'Database.php';

$db = new Database();
$conn = $db->connect();

$sql = "CREATE TABLE IF NOT EXISTS tbl_disease (
    Cow_ID INT PRIMARY KEY,
    D_Name VARCHAR(50) NOT NULL,
    Symptoms VARCHAR(100) NOT NULL,
    Diagnosis_Date DATE NOT NULL,
    Treatment VARCHAR(250) NOT NULL,
    Store_date DATE NOT NULL
)";

if ($conn->query($sql)) {
    echo "Table created successfully";
} else {
    echo "Error: " . $conn->error;
}
?>