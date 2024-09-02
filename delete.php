<?php 
include "connection.php";

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "DELETE FROM `user` WHERE `id` = '$user_id'";

    $result = mysqli_query($connection, $sql);

    if ($result === TRUE) {
        echo "Record deleted successfully.";
		header('Location: view.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>
