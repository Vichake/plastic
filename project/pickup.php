<?php
    session_start();
    include("db.php");
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $mobile=$_POST['mobile'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        if(!empty($name)&&!empty($email)&&!empty($address)&&!empty($mobile)&&!empty($date)&&!empty($time)){
            $query="insert into pickup (name,email,address,mobile,date,time) values('$name','$email','$address','$mobile','$date','$time')";

            mysqli_query($con,$query);
            echo "<script type='text/javascript'>alert('Pickup Shedule time registered sucessfully')</script>";

        }
        else{
            echo "<script type='text/javascript'>alert('Please enter valid information')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pickup.css">
    <title>Schedule Pickup</title>
    <style>
        body {
            background-image: url('images/image7.jpg');
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
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <section class="schedule-pickup">
        <h1>Schedule Pickup</h1>
        <p>Please fill out the form below to schedule a pickup for your plastic waste.</p>

        <form action="pickup.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="mobile">Mobile Number:</label>
            <div class="mobile-input">
                <select id="country-code" name="country-code">
                    <option value="+1">+1 (USA)</option>
                    <option value="+91">+91 (India)</option>
                    <option value="+44">+44 (UK)</option>
                    
                </select>
                <input type="tel" id="mobile" name="mobile" required>
            </div>

            <label for="date">Pickup Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Pickup Time:</label>
            <input type="time" id="time" name="time" required>

            <button type="submit">Schedule Pickup</button>
        </form>
    </section>
</body>
</html>
