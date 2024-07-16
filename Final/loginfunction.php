<?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "birdcage");

// Check connection
if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $hashed_password = $user_data["password"]; // Assuming the password is hashed in the database

        // Hash the input password using the same algorithm used for storing passwords
        $input_password_hashed = password_hash($password, PASSWORD_DEFAULT);

        // Compare the hashed input password with the hashed password in the database
        if (password_verify($password, $hashed_password)) {
            // Login successful, store the user ID in the session
            $_SESSION["login"] = 1;
            $_SESSION["user_id"] = $user_data["user_id"];
            header("Location: homepage.php");
            exit();
        } else {
            echo "Error: Invalid username or password";
            exit();
        }
    } else {
        echo "Error: Invalid username or password";
        exit();
    }
}

// Close the database connection
$con->close();
?>  