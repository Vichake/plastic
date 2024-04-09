<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email= $_POST['email'];
    $password = $_POST['password'];


    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "SELECT * FROM signup WHERE email='$email' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password']==$password) { 
                    header("location: phpindex.php");
                    die;
                }
            }
        }
        echo "<script type='text/javascript'>alert('Wrong email and password')</script>";
    } else {
        echo "<script type='text/javascript'>alert('Wrong email and password')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
    <script>alert</script>
    <style>
        body {
            background-image: url('images/image4.avif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <header id="fixed-header">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="works.html">How It Works</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

   

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
