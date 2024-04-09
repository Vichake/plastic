<?php
    session_start();
    include("db.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $checkuser = "SELECT * FROM signup WHERE email='$email'";
        $result = mysqli_query($con, $checkuser);
        
        if (!empty($email) && !empty($username) && !is_numeric($username)) {
            
            if (mysqli_num_rows($result) > 0) {
                echo "<script type='text/javascript'>alert('This email is already used, please use another.')</script>"; 
            } else {
                $query = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password')";
                mysqli_query($con, $query);
                echo "<script type='text/javascript'>alert('Successfully registered.')</script>";
            }

        } else {
            echo "<script type='text/javascript'>alert('Please enter valid information.')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <script src="index.js"></script>
    <title>Sign Up</title>
    <style>
        body {
            background-image: url('images/image5.avif');
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

    

    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <script>
        const loginForm = document.getElementById('login-form');

        loginForm.addEventListener('submit', function (event) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === '' || password === '') {
                event.preventDefault(); // Prevent form submission
                alert('Please fill out both fields.');
            }
        });
    </script>
</body>
</html>
