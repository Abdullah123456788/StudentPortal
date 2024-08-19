<?php 
include("dbcon.php");
 if(isset($_POST['add_course'])){
    $sub =$_POST['sub'];
    $subt =$_POST['sub_t'];
 

    if($sub == "" || empty($sub)){
        header('location: Course.php?message= You need to first fill in the Subject');
    }
    else
    {
        $query = "INSERT INTO course(subject,subject_teacher) values('$sub','$subt')";
        $result = mysqli_query($connection,$query);

        if(!$result)
        {
            die("querry failed".mysqli_connect_error());
        }
        else
        {
            header('Location: Course.php?insert_msg=Insert succesfully');
        }

    }
 }
?>