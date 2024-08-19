<?php 
include("dbcon.php");

if(isset($_GET['student_id']) && isset($_GET['course_id'])) {
    $student_id = $_GET['student_id'];
    $course_id = $_GET['course_id'];

    $query = "INSERT INTO student_course (student_id, course_id) VALUES ('$student_id', '$course_id')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Connection Failed : ' . mysqli_connect_error());
    } else {
        header('Location: join.php?id='.$course_id);
        // exit();
    }
}
?>
