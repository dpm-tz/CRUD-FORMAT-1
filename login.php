<?php
include "connection.php";

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL query to check credentials
    $sql = "SELECT * FROM `user` WHERE `email`='$email'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        echo "Login successful! Redirecting to view page...";
        header("refresh:3;url=view.php");
    } else {
        echo "Invalid email or password!";
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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<fieldset>
<legend><h3>LOGIN TO CONTINUE</h3></legend><br><br>
<form method="POST" action="login.php">
    <input type="email" name="email" placeholder="Enter your email" size="50" required><br><br>
    <input type="password" name="password" placeholder="Enter your password" size="50" required><br><br>
    <input type="submit" name="submit" value="Login" id="submit"><br><br>
</form>
</fieldset><br><br>
<a href="password.html" id="link1">Forget password?</a>&nbsp;&nbsp;
<p>Don't have an account? <a href="register.php" id="link1">Create account</a></p>
</center>
</body>
</html>
