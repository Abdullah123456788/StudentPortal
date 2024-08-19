<?php 
include('dbcon.php');
?>

<?php

   
if(isset($_GET['course_id']) && isset($_GET['student_id'])) {
   
    $course_id = $_GET['course_id'];
    $student_id = $_GET['student_id'];


$query = "DELETE from student_course where course_id ='$course_id' and student_id ='$student_id'";
$result = mysqli_query($connection,$query);

if (!$result) {
    die('Connection FAiled : ' . mysqli_connect_error());
 } 
 else{
    
    echo ('success');
}

    }
    


?>
