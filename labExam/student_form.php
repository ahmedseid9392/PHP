<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form action="insert_student.php" method="POST">

    <label>Student Name</label><br>
    <input type="text" name="student_name" required><br><br>

    <label>Student Email</label><br>
    <input type="email" name="student_email" required><br><br>

    <label>Phone Number</label><br>
    <input type="text" name="phone_number" required><br><br>

    <label>Department</label><br>
    <input type="text" name="department" required><br><br>

    <label>Year</label><br>
    <input type="number" name="year" required><br><br>

    <button type="submit">Register Student</button>

</form>

</body>
</html>