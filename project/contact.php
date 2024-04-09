<?php
session_start();
include("db.php");

$message = ""; 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $messageText = $_POST['message'];
    if (!empty($name) && !empty($email) && !empty($messageText)) {
        $query = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $messageText);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script type='text/javascript'>alert('Thank You !!')</script>";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    } else {
        $message = "Please enter valid information";
    }
}
session_write_close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact Us</title>
    <style>
        body {
            background-image: url('images/image3.avif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="phpindex.php">Home</a></li>
                <li><a href="works.html">How It Works</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
        </nav>
    </header>

    <section class="contact">
        <h1>Contact Us</h1>
        <p>We're here to help you! If you have any questions, suggestions, or feedback, please don't hesitate to get in touch with us.</p>

        <div class="contact-info">
            <h2>Contact Information</h2>
            <p>You can reach us via email at <a href="mailto:contact@yourwebsite.com">contact@website.com</a>.</p>
        </div>

        <div class="contact-form">
            <h2>Contact Form</h2>
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>

        
        <div id="message"><?php echo $message; ?></div>
    </section>
</body>
</html>
