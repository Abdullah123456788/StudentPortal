<?php 
include('dbcon.php');
?>

<?php

    if(isset($_GET['id'])){
       $id=$_GET['id'];
    }


$query = "DELETE from student where id ='$id'";
$result = mysqli_query($connection,$query);

if (!$result) {
    die('Connection FAiled : ' . mysqli_connect_error());
 } 
 else{
    
  header('location: dashboard.php?del_msg=DELETE succesfully');         
 }





?>