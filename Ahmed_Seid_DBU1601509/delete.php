<?php
include 'db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM tbl_disease WHERE Cow_ID  = $id";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: display.php");
        exit();
    } else {
        echo "Error deleting disease: " . $conn->error;
    }
}
?>