<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit();
}

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "birdcage");

// Check connection
if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}

// Get the user's current information
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $con->query($sql);
$user_data = $result->fetch_assoc();

// Display the user's current information
$username = $user_data["username"];
$email = $user_data["email"];

// Process the form submission
if (isset($_POST["submit"])) {
    $new_username = $_POST["username"];
    $new_password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if the passwords match
    if ($new_password!= $confirm_password) {
        echo "<script>alert('Error: Passwords do not match.'); window.location.href='profile.php';</script>";
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's information
    $sql = "UPDATE users SET username = '$new_username', password = '$hashed_password' WHERE user_id = '$user_id'";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Profile updated successfully.'); window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Error: ". $sql. "<br>". $con->error."'); window.location.href='profile.php';</script>";
    }
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style\style.css">
    <style>
      @import 'https://fonts.googleapis.com/css?family=Montserrat:300, 400, 700&display=swap';
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #877f6b;
        }
      .profile-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: rgb(207, 207, 194);
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
      .profile-header {
            background-color: #265564;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
      .profile-header h2 {
            margin: 0;
        }
      .profile-form {
            padding: 20px;
        }
      .profile-form label {
            display: block;
            margin-bottom: 10px;
        }
      .profile-form input[type="text"],.profile-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }
      .profile-form input[type="submit"] {
            background-color: #dd5817;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
      .profile-form input[type="submit"]:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <!-- Header -->
<section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>T</span>he <span>B</span>ird <span>C</span>age</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="homepage.php" data-after="Home">Home</a></li>
            <li><a href="homepage.php #services" data-after="Service">Services</a></li>
            <li><a href="homepage.php #about" data-after="About">About</a></li>
            <li><a href="profile.php" data-after="Profile">Profile</a></li>
            <li><a href="logout.php" data-after="Logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

  <!-- Add a blank div to add space between the header and the profile container -->
  <div style="height: 40px;"></div>

  <div class="profile-container">
      <div class="profile-header">
          <h2>Welcome, <?php echo $username;?>!</h2>
      </div>
      <div class="profile-form">
          <form action="" method="post">
              <label for="username">New Username:</label>
              <input type="text" name="username" value="<?php echo $username;?>" required><br><br>
              <label for="password">New Password:</label>
              <input type="password" name="password" required><br><br>
              <label for="confirm_password">Confirm Password:</label>
              <input type="password" name="confirm_password" required><br><br>
              <input type="submit" name="submit" value="Update Profile">
          </form>
      </div>
  </div>
</body>
</html>