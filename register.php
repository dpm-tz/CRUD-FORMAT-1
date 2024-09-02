<?php
include "connection.php";

// Check if the form is submitted
if(isset($_POST['submit'])){

    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query
    $sql = "INSERT INTO `user` (`name`, `email`, `password`, `birth_date`, `gender`) 
            VALUES ('$name', '$email', '$hashed_password', '$birth_date', '$gender')";

    // Execute the query
    if(mysqli_query($connection, $sql)){
        echo "Registration successful! Redirecting to login...";
        header("refresh:3;url=login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    // Close the connection
    mysqli_close($connection);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <fieldset>
            <legend><h3>Register</h3></legend>
            <form action="register.php" method="POST">
                <input type="text" name="name" placeholder="Enter your name" size="40" required><br><br>
                <input type="email" name="email" placeholder="Enter your email" size="40" required><br><br>
                <input type="password" name="password" placeholder="Enter your password" size="40" required><br><br>
                <i>Date of birth:</i><br>
                <input type="date" name="birth_date" size="40" required><br><br>
                <i>Gender:</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Male:<input type="radio" name="gender" value="Male" required>
                Female:<input type="radio" name="gender" value="Female" required><br><br>
                <input type="submit" name="submit" value="Register">
            </form>
        </fieldset>
        <br><br>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </center>
</body>
</html>
