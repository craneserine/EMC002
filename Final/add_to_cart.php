<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["login"]) || $_SESSION["login"] != 1) {
    header("Location: login.php");
    exit();
}

// Get the item ID from the URL
$item_id = $_GET["id"];

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "birdcage");

// Check connection
if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}

// Check if the user ID exists in the users table
$user_sql = "SELECT * FROM users WHERE user_id = '".$_SESSION["user_id"]."'";
$user_result = $con->query($user_sql);

if ($user_result->num_rows > 0) {
    // User ID exists, proceed with inserting into checkout table
    $product_sql = "SELECT * FROM product WHERE item_id = '$item_id'";
    $product_result = $con->query($product_sql);

    if ($product_result->num_rows > 0) {
        // Item ID exists, proceed with inserting into checkout table
        $sql = "INSERT INTO checkout (item_id, user_id) VALUES ('$item_id', '".$_SESSION["user_id"]."')";
        $result = $con->query($sql);

        if (!$result) {
            die("Query failed: ". $con->error);
        }

        // Close the database connection
        $con->close();
    } else {
        echo "Error: Item ID $item_id does not exist in the product table";
        exit();
    }
} else {
    echo "Error: User ID ".$_SESSION["user_id"]." does not exist in the users table";
    exit();
}
?>