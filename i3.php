<?php 
include("dbcon.php");
 if(isset($_POST['add_teacher'])){
    $fullname =$_POST['fullname'];
    $username =$_POST['username'];
    $email =$_POST['email'];
    $phonenumber =$_POST['phonenumber'];

    if($fullname == "" || empty($fullname)){
        header('location: teacher.php?message= You need to first fill in the Subject');
    }
    else
    {
        $query = "INSERT INTO tbl_users(fullname,username,email,phonenumber) values('$fullname','$username','$email','$phonenumber')";
        $result = mysqli_query($connection,$query);

        if(!$result)
        {
            die("querry failed".mysqli_connect_error());
        }
        else
        {
            header('Location: teacher.php?insert_msg=Insert succesfully');
        }

    }
 }
?>