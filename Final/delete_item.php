<?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "birdcage");

// Check connection
if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}

// Get the item ID and user ID from the URL
$item_id = $_GET["item_id"];
$user_id = $_GET["user_id"];

// Delete the item from the checkout table
$sql = "DELETE FROM checkout WHERE item_id = '$item_id' AND user_id = '$user_id'";
$con->query($sql);

// Close the database connection
$con->close();

// Redirect back to the checkout page
header("Location: checkout.php");
exit;
?>