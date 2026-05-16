<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>

<h2>Users</h2>
    <a href="create.php">Add user</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['password']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                           <td>
   <a href='edit.php?editid={$row['id']}'>Edit</a>
<a href='delete.php?deleteid={$row['id']}'>Delete</a>
</td>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>