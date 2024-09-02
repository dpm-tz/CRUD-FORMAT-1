<?php
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ipt";

// Establish the connection
$connection = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
