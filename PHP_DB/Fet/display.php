<?php
/*
===========================================================
MYSQLI OOP FETCH METHODS EXAMPLE
===========================================================

This file explains different ways to:
1. Connect database using MySQLi OOP
2. Create table
3. Insert sample data
4. Fetch data from database
5. Display data on frontend

FETCH METHODS COVERED:
1. fetch_assoc()
2. fetch_array()
3. fetch_row()
4. fetch_object()
5. fetch_all()

===========================================================
*/


/*
===========================================================
DATABASE CONNECTION
===========================================================
*/

$host = "localhost";
$user = "root";
$password = "";
$database = "student_db";

/*
Create connection object
*/
$conn = new mysqli($host, $user, $password);

/*
Check connection
*/
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

echo "<h3>Database Connected Successfully</h3>";



/*
===========================================================
CREATE DATABASE
===========================================================
*/

$sql = "CREATE DATABASE IF NOT EXISTS student_db";

if ($conn->query($sql) === TRUE) {
    echo "Database Created Successfully <br>";
} else {
    echo "Database Error: " . $conn->error;
}

/*
Select database
*/
$conn->select_db($database);



/*
===========================================================
CREATE TABLE
===========================================================
*/

$table = "
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    department VARCHAR(100)
)
";

if ($conn->query($table) === TRUE) {
    echo "Table Created Successfully <br><br>";
} else {
    echo "Table Error: " . $conn->error;
}



/*
===========================================================
INSERT SAMPLE DATA
===========================================================
*/

/*
Delete old data first
*/
$conn->query("DELETE FROM students");

/*
Insert new records
*/
$conn->query("
INSERT INTO students(name, email, department)
VALUES
('Ahmed', 'ahmed@gmail.com', 'Software Engineering'),
('Aster', 'aster@gmail.com', 'Computer Science'),
('John', 'john@gmail.com', 'Information System')
");

echo "Sample Data Inserted <br><br>";



/*
===========================================================
1. FETCH_ASSOC()
===========================================================

Returns data as associative array

Example:
$row['name']
$row['email']

Most commonly used method
*/

echo "<h2>1. fetch_assoc()</h2>";

$sql = "SELECT * FROM students";

$result = $conn->query($sql);

/*
Loop through records
*/
while ($row = $result->fetch_assoc()) {

    echo "ID: " . $row['id'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Department: " . $row['department'] . "<br>";

    echo "<hr>";
}



/*
===========================================================
2. FETCH_ARRAY()
===========================================================

Returns both:
1. Numeric index
2. Associative index

Example:
$row[1]
$row['name']
*/

echo "<h2>2. fetch_array()</h2>";

$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_array()) {

    /*
    Numeric index
    */
    echo "Using Number Index: " . $row[1] . "<br>";

    /*
    Associative index
    */
    echo "Using Column Name: " . $row['email'] . "<br>";

    echo "<hr>";
}



/*
===========================================================
3. FETCH_ROW()
===========================================================

Returns numeric array only

Example:
$row[0]
$row[1]
*/

echo "<h2>3. fetch_row()</h2>";

$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_row()) {

    echo "ID: " . $row[0] . "<br>";
    echo "Name: " . $row[1] . "<br>";
    echo "Email: " . $row[2] . "<br>";
    echo "Department: " . $row[3] . "<br>";

    echo "<hr>";
}



/*
===========================================================
4. FETCH_OBJECT()
===========================================================

Returns object

Example:
$row->name
$row->email
*/

echo "<h2>4. fetch_object()</h2>";

$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_object()) {

    echo "ID: " . $row->id . "<br>";
    echo "Name: " . $row->name . "<br>";
    echo "Email: " . $row->email . "<br>";
    echo "Department: " . $row->department . "<br>";

    echo "<hr>";
}



/*
===========================================================
5. FETCH_ALL()
===========================================================

Returns all rows at once

By default:
MYSQLI_NUM

You can also use:
MYSQLI_ASSOC
*/

echo "<h2>5. fetch_all()</h2>";

$result = $conn->query("SELECT * FROM students");

/*
Get all rows
*/
$rows = $result->fetch_all(MYSQLI_ASSOC);

/*
Display all rows
*/
foreach ($rows as $row) {

    echo "ID: " . $row['id'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Department: " . $row['department'] . "<br>";

    echo "<hr>";
}



/*
===========================================================
DISPLAY DATA IN HTML TABLE
===========================================================
*/

echo "<h2>Display Data in HTML Table</h2>";

$result = $conn->query("SELECT * FROM students");

?>

<!DOCTYPE html>
<html>
<head>
    <title>MySQLi Fetch Methods</title>

    <style>

        body{
            font-family: Arial;
            margin: 20px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 10px;
            text-align: left;
        }

        th{
            background: #f2f2f2;
        }

    </style>
</head>

<body>

<table>

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
    </tr>

    <?php
    /*
    Loop data inside table
    */
    while ($row = $result->fetch_assoc()) {
    ?>

        <tr>

            <td>
                <?php echo $row['id']; ?>
            </td>

            <td>
                <?php echo $row['name']; ?>
            </td>

            <td>
                <?php echo $row['email']; ?>
            </td>

            <td>
                <?php echo $row['department']; ?>
            </td>

        </tr>

    <?php
    }
    ?>

</table>

</body>
</html>

<?php

/*
===========================================================
CLOSE CONNECTION
===========================================================
*/

$conn->close();

?>