<?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "birdcage");

// Check connection
if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}

// Delete all records from the checkout table for the current user
$sql = "DELETE FROM checkout WHERE user_id = '".$_SESSION["user_id"]."'";
$result = $con->query($sql);

// Close the database connection
$con->close();

// Destroy the session
session_destroy();

// Redirect to the login page with a success message
header("Location: index.php?logout=success");
exit();
?>