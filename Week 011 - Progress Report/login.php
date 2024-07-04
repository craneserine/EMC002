<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Bird Cage</title>
    <link rel="stylesheet" href="style\login.css">
</head>
<body>
    <div class="container">
        <div class="orangeBG">
            <div class="box signin">
                <h2>Already have an account?</h2>
                <button class="signinbtn">Sign In</button>
            </div>
            <div class="box signup">
                <h2>Don't have an account?</h2>
                <button class="signupbtn">Register</button>
            </div>
        </div>
        <div class="form-box">
            <div class="form signinform">
                <form id="loginForm" method="post" action="loginfunction.php">
                    <h3>Sign In</h3>
                    <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                    <input type="submit" name="submit" value="Sign In">
                    <a href="#">Forgot password?</a>
                </form>
            </div>
            <div class="form signupform">
                <form action="signupfunction.php" method="post">
                    <h3>Sign Up</h3>
                    <input type="text" name="usignup" placeholder="Username" autocomplete="off" required>
                    <input type="email" name="email" autocomplete="off" placeholder="Email Address" required>
                    <input type="password" name="upassword" placeholder="Password" autocomplete="off" required>
                    <input type="password" name="confirmPassword" placeholder="Confirm Password" autocomplete="off" required>
                    <input type="submit" name="signup" value="Sign Up">
                </form>
             </div>
        </div>
    </div>


    <script src="js/login.js"></script>
</body>
</html>