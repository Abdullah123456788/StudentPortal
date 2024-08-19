<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Light gray background */
        }
        .container {
            width: 100%;
            max-width: 1200px; /* Adjust as needed */
            margin: 0 auto;
            padding: 0 20px; /* Add some padding to keep content away from edges */
        }
        header {
            background-color: #222; /* Darker gray background */
            color: #fff; /* White text color */
            padding: 10px 0;
            display: flex;
            align-items: center; /* Center items vertically */
            justify-content: space-between; /* Space out items */
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            width: 50px; /* Adjust logo size as needed */
            height: auto;
            margin-right: 10px; /* Add some space between logo and text */
        }
        .logo h1 {
            margin: 0;
            font-size: 24px;
        }
        .nav-links {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .nav-links li {
            display: inline-block;
            margin-left: 20px;
        }
        .nav-links li:first-child {
            margin-left: 0;
        }
        .nav-links li a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<header>
<div>
        <nav>
            <ul class="nav-links" id="main_title">
                <li><a href="">Dashboard</a></li>
                <li><a href="dashboard.php">Students</a></li>
                <li><a href="Course.php">Courses</a></li>
                <li><a href="teacher.php">Teachers</a></li>
                <li><a href="users.php">Users</a></li>

            </ul>
        </nav>
    </div>
</header>

</body>
</html>
