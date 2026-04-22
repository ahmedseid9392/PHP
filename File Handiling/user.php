
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="user.php" method="post">
First Name:<input type="text" name="fname"><br>
Second Name:<input type="text" name="lname"><br>
Email:<input type="text" name="email"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
<?php

// Step 1: Validate input
$fname = $_POST["fname"] ?? '';
$lname = $_POST["lname"] ?? '';
$mail  = $_POST["email"] ?? '';

// Optional: check empty fields
if (empty($fname) || empty($lname) || empty($mail)) {
    die("Error: All fields are required.");
}

// Step 2: Open file in append mode
$fh = fopen("guest.txt", "a");

if (!$fh) {
    die("Error: Unable to open file.");
}

// Step 3: Write data with newline
$data = $fname . "\t" . $lname . "\t" . $mail . "\n";
fwrite($fh, $data);

// Step 4: Close file
fclose($fh);

// Step 5: Success message
echo "Your data is saved successfully!";

?>