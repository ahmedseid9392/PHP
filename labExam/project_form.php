<!DOCTYPE html>
<html>
<head>
    <title>Project Registration</title>
</head>
<body>

<h2>Project Registration Form</h2>

<form action="insert_project.php" method="POST">

    <label>Student ID</label><br>
    <input type="number" name="student_id" required><br><br>

    <label>Project Name</label><br>
    <input type="text" name="project_name" required><br><br>

    <label>Hourly Rate (Date & Time)</label><br>
    <input type="datetime-local" name="hourly_rate" required><br><br>

    <button type="submit">Register Project</button>

</form>

</body>
</html>