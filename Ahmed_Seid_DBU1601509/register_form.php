<?php
include('db.php');

if(isset($_POST["submit"])){
    $cow_id= $_POST["cow_id"];
    $D_Name= $_POST["d_name"];
    $sypmtoms= $_POST["sypt"];
    $diag_date= $_POST["diag_date"];
    $treatment= $_POST["treat"];
    $store_date= $_POST["store_date"];


    $sql="INSERT INTO tbl_disease(Cow_ID,D_Name,Symptoms,Diagnosis_Date,Treatment,Store_Date) 
    values('$cow_id','$D_Name','$sypmtoms','$diag_date','$treatment','$store_date') ";

    $result = $conn->query($sql);

    if ($result) {
        echo "New record created successfully";
        header("Location: display.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register disease</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <div class="container">
     <h2>Ahmed Seid</h2>
    <form method="post">
      <label >Cow_ID:</label>
      <input type="number" name="cow_id" placeholder="Enter cow id...">

      <label >D_name:</label>
      <input type="text" name="d_name" placeholder="Enter desease name...">
      <label >Symptoms:</label>
      <input type="text" name="sypt" placeholder="Enter symptoms...">
      <label >Diagnosis_Date:</label>
      <input type="date" name="diag_date" placeholder="Enter date...">
      <label >Treatment:</label>
      <input type="text" name="treat" placeholder="Enter treatment..">
      <label >Store_Date:</label>
      <input type="date" name="store_date" placeholder="Enter store date...">

      <button type="submit" name="submit">Submit</button>

    </form>
</div>
</body>
</html>