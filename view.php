<?php 
include "connection.php";

$sql = "SELECT * FROM user";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>birth_date</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['birth_date']; ?></td>
                    <td>
                        <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
	<p>Register New Member <a href="register.php">Register here</a></p>
</body>
</html>
