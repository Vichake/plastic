<?php
      include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/phpindex.css">
    <title>Plastic Waste Pickup</title>
    <style>
        body {
            background-image: url('images/istockphoto-585288480-612x612.jpg');
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
                <li><a href="works.html">How It Works</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="index.html" class="cta-button">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="hero">
        <h1>Schedule Plastic Waste Pickup</h1>
        <p>Partnering with local recycling centers for a greener planet</p>
        <a href="pickup.php" class="Schedule-button">Schedule Pickup</a>
    </div>
    <div class="social-media-handles">
        <a href="https://www.instagram.com/your_instagram_handle" target="_blank"><img src="images/photo-1634942536790-dad8f3c0d71b.jpeg" alt="Instagram"></a>
        <a href="https://www.facebook.com/your_facebook_handle" target="_blank"><img src="images/download.png" alt="Facebook"></a>
        <a href="https://twitter.com/your_twitter_handle" target="_blank"><img src="images/download (1).png" alt="Twitter"></a>
    </div>

    <script>
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>
</body>
</html>
