<?php 
include("dbcon.php");
 if(isset($_POST['add_student'])){
    
    $fname =$_POST['f_name'];
    $lname =$_POST['l_name'];
    $age =$_POST['age'];
  
 

    if($fname == "" || empty($fname)){
        header('location: dashboard.php?message= You need to first fill in the first name');
    }
    else
    {
        $query = "INSERT INTO student(firstname,lastname,age) values('$fname','$lname','$age')";
        //$query = "INSERT INTO course(subject,subject_teacher) values('$sub','$subt')";
        $result = mysqli_query($connection,$query);

        if(!$result)
        {
            die("querry failed".mysqli_connect_error());
        }
        else
        {
            header('Location:dashboard.php?insert_msg=Insert succesfully');
            //header('Location:course.php?insert_msg=Insert succesfully');
        }

    }
 }
?>