<?php
if (!isset($_SESSION['email'])) {
    // header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
        image{
            margin-right: 10%;
        }
    </style>
<body>

    <h1 id="main_title"><image  src="image/logo.png" alt="Logo" width="200" height="200">Welcome to the Dashboard, <?php echo $_SESSION['email']; ?>!</h1>

    <div class="container">