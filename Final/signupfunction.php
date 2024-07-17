<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create a new mysqli object
$mysqli = new mysqli('localhost', 'root', '', 'birdcage');

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: ". $mysqli->connect_error);
}

// Create the users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY username (username),
    UNIQUE KEY email (email)
)";
$mysqli->query($sql);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Get the post records
    $username = $_POST['usignup'];
    $email = $_POST['email'];
    $password = $_POST['upassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if the passwords match
    if ($password!= $confirmPassword) {
        echo '<script>alert("Passwords do not match."); window.location.replace("index.php");</script>';
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert the user into the database
    $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$hashedPassword')";

    // Check if the email or username already exists
    $sql = "SELECT * FROM `users` WHERE `email` = '$email' OR `username` = '$username'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        echo '<script>alert("Email or username already exists in the database."); window.location.replace("index.php");</script>';
        exit;
    }

    // Insert the user into the database
    $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$hashedPassword')";

    // Print out the SQL query to make sure it looks correct
    echo $sql;

    // Execute the query
    if ($mysqli->query($sql) === TRUE) {
        echo '<script>window.location.replace("homepage.php");</script>';
    } else {
        echo "Error: ". $sql. "<br>". $mysqli->error;
    }
}

// Close the database connection
$mysqli->close();
?>