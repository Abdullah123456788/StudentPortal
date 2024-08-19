<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="registeration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
        <form action="connect.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text"  autocomplete="off" placeholder="Enter your name" required name="fullname">
                    <!-- <?php 
                    // $fullnameErr="";
                    // $fullname="";
                    // if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname))
                    // {
                    //     $fullnameErr = "Only letters and white space allowed";
                    // }
                    ?>
                    <span class="error">* <?php echo $fullnameErr;?></span> -->
                   
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text"  autocomplete="off" placeholder="Enter your username" required name="username">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" required name="email">
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="number" min="0"  maxlength="11"  placeholder="Enter your number" required name="phonenumber">
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="text" autocomplete="off" placeholder="Enter your password" required name="password">
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="text" autocomplete="off" placeholder="Confirm your password" required name="confirmpassword">
                </div>
            </div>
            <div class="button">
              <input type="submit" href="login.html" value="Register">
            </div>
        </form>
    </div>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the registration form data
    // This code would typically handle inserting the user data into the database
    // After successful registration, redirect to logindesign.php
    header("Location: login.html");
    exit(); // Make sure to exit after the redirect
}
?>
</body>
</html>
