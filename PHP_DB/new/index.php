<?php

// ================= DATABASE CONNECTION =================

// Database server name
$host = "localhost";

// Database username
$username = "root";

// Database password
$password = "";

// Database name
$database = "student_db";


// Create MySQLi object connection
$conn = new mysqli($host, $username, $password);


// Check connection error
if($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}


// ================= CREATE DATABASE =================

// SQL query to create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $database";

// Execute database creation query
$conn->query($sql);


// Select database
$conn->select_db($database);



// ================= CREATE TABLE =================

// SQL query to create students table
$table = "CREATE TABLE IF NOT EXISTS students (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(100) NOT NULL,

    course VARCHAR(100) NOT NULL

)";


// Execute table creation query
$conn->query($table);




// ================= DELETE STUDENT =================

// Check if delete link clicked
if(isset($_GET['delete'])) {

    // Get student id
    $id = $_GET['delete'];

    // Prepare delete query
    $stmt = $conn->prepare("DELETE FROM students WHERE id=?");

    // Bind id parameter
    $stmt->bind_param("i", $id);

    // Execute query
    $stmt->execute();

    // Redirect page
    header("Location: index.php");
}




// ================= INSERT STUDENT =================

// Check if register button clicked
if(isset($_POST['save'])) {

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Prepare insert query
    $stmt = $conn->prepare(
        "INSERT INTO students(name,email,course) VALUES(?,?,?)"
    );

    // Bind parameters
    $stmt->bind_param("sss", $name, $email, $course);

    // Execute query
    $stmt->execute();

    // Redirect page
    header("Location: index.php");
}




// ================= UPDATE STUDENT =================

// Check if update button clicked
if(isset($_POST['update'])) {

    // Get form values
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Prepare update query
    $stmt = $conn->prepare(
        "UPDATE students 
         SET name=?, email=?, course=? 
         WHERE id=?"
    );

    // Bind parameters
    $stmt->bind_param("sssi", $name, $email, $course, $id);

    // Execute query
    $stmt->execute();

    // Redirect page
    header("Location: index.php");
}




// ================= FETCH DATA FOR EDIT =================

// Empty variable for edit data
$editData = null;


// Check if edit link clicked
if(isset($_GET['edit'])) {

    // Get student id
    $id = $_GET['edit'];

    // Prepare select query
    $stmt = $conn->prepare(
        "SELECT * FROM students WHERE id=?"
    );

    // Bind id
    $stmt->bind_param("i", $id);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch associative array
    $editData = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Management System</title>

    <style>

        body{
            font-family: Arial;
            background:#f4f4f4;
            padding:20px;
        }

        .container{
            width:700px;
            margin:auto;
            background:white;
            padding:20px;
            border-radius:10px;
        }

        h2{
            text-align:center;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:10px;
        }

        button{
            padding:10px 20px;
            background:blue;
            color:white;
            border:none;
            margin-top:10px;
            cursor:pointer;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table, th, td{
            border:1px solid #ccc;
        }

        th, td{
            padding:10px;
            text-align:center;
        }

        .edit{
            background:green;
            color:white;
            padding:5px 10px;
            text-decoration:none;
        }

        .delete{
            background:red;
            color:white;
            padding:5px 10px;
            text-decoration:none;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Student Registration System</h2>

    <form method="POST">

        <!-- Hidden input for student id -->
        <input 
            type="hidden" 
            name="id"
            value="<?= $editData['id'] ?? '' ?>"
        >

        <!-- Student name input -->
        <input 
            type="text"
            name="name"
            placeholder="Enter Name"
            value="<?= $editData['name'] ?? '' ?>"
            required
        >

        <!-- Student email input -->
        <input 
            type="email"
            name="email"
            placeholder="Enter Email"
            value="<?= $editData['email'] ?? '' ?>"
            required
        >

        <!-- Student course input -->
        <input 
            type="text"
            name="course"
            placeholder="Enter Course"
            value="<?= $editData['course'] ?? '' ?>"
            required
        >

        <?php if($editData): ?>

            <!-- Update button -->
            <button type="submit" name="update">
                Update Student
            </button>

        <?php else: ?>

            <!-- Register button -->
            <button type="submit" name="save">
                Register Student
            </button>

        <?php endif; ?>

    </form>



    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Action</th>
        </tr>

        <?php

        // Select all students
        $result = $conn->query("SELECT * FROM students");

        // Loop all rows
        while($row = $result->fetch_assoc()) {

        ?>

        <tr>

            <!-- Display id -->
            <td><?= $row['id']; ?></td>

            <!-- Display name -->
            <td><?= $row['name']; ?></td>

            <!-- Display email -->
            <td><?= $row['email']; ?></td>

            <!-- Display course -->
            <td><?= $row['course']; ?></td>

            <td>

                <!-- Edit link -->
                <a 
                    class="edit"
                    href="index.php?edit=<?= $row['id']; ?>"
                >
                    Edit
                </a>

                <!-- Delete link -->
                <a 
                    class="delete"
                    href="index.php?delete=<?= $row['id']; ?>"
                    onclick="return confirm('Delete this student?')"
                >
                    Delete
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>