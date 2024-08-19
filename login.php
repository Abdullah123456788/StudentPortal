<?php
session_start();
// Check if the user is not logged in, redirect to login page
if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit(); // Ensure that no further code is executed after redirection
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("dbcon.php");

    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to retrieve user with the provided email
    $stmt = $connection->prepare("SELECT * FROM tbl_users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // User exists, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session and redirect to dashboard
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            // Password is incorrect
            echo '<script>alert("Invalid Email or password.");</script>';
            echo '<script>window.location.href = "login.html";</script>';
        }
    } else {
        // User does not exist
        echo '<script>alert("Invalid Email or Password.");</script>';
        echo '<script>window.location.href = "login.html";</script>';
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();
} else {
    // Redirect user back to login form if accessed directly
    header("Location: login.html");
    exit();
}
?>
