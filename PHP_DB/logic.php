```php
<?php

// Include database connection file
include "db.php";


// ================= DELETE STUDENT =================

// Check if delete button/link is clicked
if(isset($_GET['delete'])) {

    // Get student id from URL
    $id = $_GET['delete'];

    // SQL query to delete student
    $sql = "DELETE FROM students WHERE id=?";

    // Prepare SQL statement
    $stmt = $conn->prepare($sql);

    // Execute query with id value
    $stmt->execute([$id]);

    // Redirect back to index page
    header("Location: logic.php");
}



// ================= INSERT STUDENT =================

// Check if register button is clicked
if(isset($_POST['save'])) {

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // SQL query to insert data
    $sql = "INSERT INTO students(name,email,course) VALUES(?,?,?)";

    // Prepare SQL query
    $stmt = $conn->prepare($sql);

    // Execute query with form values
    $stmt->execute([$name,$email,$course]);

    // Redirect to refresh page
    header("Location: logic.php");
}



// ================= UPDATE STUDENT =================

// Check if update button is clicked
if(isset($_POST['update'])) {

    // Get form values
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // SQL query to update student
    $sql = "UPDATE students 
            SET name=?, email=?, course=? 
            WHERE id=?";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Execute query with values
    $stmt->execute([$name,$email,$course,$id]);

    // Redirect to index page
    header("Location: logic.php");
}



// ================= FETCH DATA FOR EDIT =================

// Variable to store selected student data
$editData = null;

// Check if edit link is clicked
if(isset($_GET['edit'])) {

    // Get student id from URL
    $id = $_GET['edit'];

    // SQL query to fetch one student
    $sql = "SELECT * FROM students WHERE id=?";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Execute query with id
    $stmt->execute([$id]);

    // Fetch student data as associative array
    $editData = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Management</title>

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

    <!-- Form starts here -->
    <form method="POST">

        <!-- Hidden input to store student id during update -->
        <input 
            type="hidden" 
            name="id"
            value="<?= $editData['id'] ?? '' ?>"
        >

        <!-- Input field for student name -->
        <input 
            type="text" 
            name="name"
            placeholder="Enter Name"
            value="<?= $editData['name'] ?? '' ?>"
            required
        >
        <!-- If $editData['name'] exists → show its value
Otherwise → show empty string ""
//value="
//php< echo $editData['name']
// if it exists,
//otherwise show empty text ?>" -->

        <!-- Input field for student email -->
        <input 
            type="email" 
            name="email"
            placeholder="Enter Email"
            value="<?= $editData['email'] ?? '' ?>"
            required
        >

        <!-- Input field for student course -->
        <input 
            type="text" 
            name="course"
            placeholder="Enter Course"
            value="<?= $editData['course'] ?? '' ?>"
            required
        >

        <?php if($editData): ?>

            <!-- Show update button if edit mode -->
            <button type="submit" name="update">
                Update Student
            </button>

        <?php else: ?>

            <!-- Show register button normally -->
            <button type="submit" name="save">
                Register Student
            </button>

        <?php endif; ?>

    </form>


    <!-- Student table -->
    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Action</th>
        </tr>

        <?php

        // SQL query to fetch all students
        $sql = "SELECT * FROM students";

        // Execute query directly
        $stmt = $conn->query($sql);

        // Loop through all student records
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        ?>

        <tr>

            <!-- Display student id -->
            <td><?= $row['id']; ?></td>

            <!-- Display student name -->
            <td><?= $row['name']; ?></td>

            <!-- Display student email -->
            <td><?= $row['email']; ?></td>

            <!-- Display student course -->
            <td><?= $row['course']; ?></td>

            <td>

                <!-- Edit link -->
                <a 
                    class="edit"
                    href="logic.php?edit=<?= $row['id']; ?>"
                >
                    Edit
                </a>

                <!-- Delete link -->
                <a 
                    class="delete"
                    href="logic.php?delete=<?= $row['id']; ?>"
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
```
