<?php
include "connection.php"; // Include the database connection file

// Check if the form's update button was clicked
if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];

    // Update query to modify user data
    $sql = "UPDATE `user` SET 
            `name` = '$name',
            `email` = '$email',
            `birth_date` = '$birth_date',
            `gender` = '$gender'
            WHERE `id` = '$user_id'";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result === TRUE) {
        echo "Record updated successfully.";
        // Redirect to the view page after successful update
        header('Location: view.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Check if the 'id' is set in the URL to fetch user data for editing
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // SQL query to get the user's data
    $sql = "SELECT * FROM `user` WHERE `id`='$user_id'";

    $result = mysqli_query($connection, $sql);

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $name = $row['name'];
        $email = $row['email'];
        $birth_date = $row['birth_date'];
        $gender = $row['gender'];
    } else {
        // If no user is found, redirect back to the view page
        header('Location: view.php');
        exit();
    }
} else {
    // If 'id' is not set in the URL, redirect to the view page
    header('Location: view.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required><br><br>

            <label for="birth_date">Date of Birth:</label>
            <input type="date" name="birth_date" value="<?php echo $birth_date; ?>" required><br><br>

            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?>> Male
            <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>> Female<br><br>

            <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>
</html>
