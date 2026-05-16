<?php
include 'db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: display.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
?>