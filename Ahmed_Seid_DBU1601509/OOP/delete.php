<?php
require_once 'Disease.php';

$disease = new Disease();

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $result = $disease->delete($id);

    if($result){
        header("Location: display.php");
    }
}
?>