<?php
include ('dbcon.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Hash the passwords for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $hashed_confirmpassword = password_hash($confirmpassword, PASSWORD_DEFAULT);
    
    
        // Prepare insert statement
        $query = "INSERT INTO tbl_users (fullname, username, email, phonenumber, password, confirmpassword ) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);

        if (!$stmt) {
            die('Prepare failed: ' . mysqli_error($connection));
        }

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $username, $email, $phonenumber, $hashed_password, $hashed_confirmpassword);

        // Execute statement
        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($connection);

        // Redirect user to a success page or perform any other action
        header("Location: login.html");
        exit();
    }
 else {
    // Redirect user back to registration form if accessed directly
    header("Location: registration.php");
    exit();
}

?>
