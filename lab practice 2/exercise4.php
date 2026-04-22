<!-- Form.html -->
<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
</head>
<body>

<form action="exercise4.php" method="post">
    First Name: <input type="text" name="fname" required><br><br>
    Last Name: <input type="text" name="lname" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
<?php

// Step 1: Get and validate input
$fname = $_POST["fname"] ?? '';
$lname = $_POST["lname"] ?? '';
$mail  = $_POST["email"] ?? '';

if (empty($fname) || empty($lname) || empty($mail)) {
    die("Error: All fields are required.");
}

// Step 2: Sanitize input
$fname = htmlspecialchars($fname);
$lname = htmlspecialchars($lname);
$mail  = htmlspecialchars($mail);

// Step 3: Open file in append mode
$fh = fopen("guest.txt", "a");

if (!$fh) {
    die("Error: Unable to open file.");
}

// Step 4: Write data with newline
$data = $fname . "\t" . $lname . "\t" . $mail . "\n";
fwrite($fh, $data);

// Step 5: Close file
fclose($fh);

// Step 6: Success message
echo "Your data is saved successfully!";

?>
 
