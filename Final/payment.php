<?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "birdcage");

// Check connection
if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}

// Purge the cart
$sql = "DELETE FROM checkout WHERE user_id = '".$_SESSION["user_id"]."'";
$result = $con->query($sql);

if (!$result) {
    die("Error purging cart: ". $con->error);
}

// Display success message as a popup alert box and redirect to homepage.php
echo "<script>alert('Order confirmed! Your cart has been emptied.'); window.location.href='homepage.php';</script>";

// Close the database connection
$con->close();
?>