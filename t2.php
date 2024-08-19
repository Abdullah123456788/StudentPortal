<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit(); // Ensure that no further code is executed after redirection
}
?>
<?php include('header.php'); ?>
<?php include("dbcon.php");?>
 
<?php 
 if (isset($_GET['id']))
 {
 $id = $_GET['id'];

 $query = "Select * from `teacher` where `id`='$id'";
 $result = mysqli_query($connection,$query);

 if (!$result) {
   die('Connection FAIled : ' . mysqli_connect_error());
} 
else{
   
   $row= mysqli_fetch_assoc($result);
  
}
 } 

?>

<?php 
 if(isset($_POST['update_teacher'])){

 if(isset($_GET['id_new'])){
    $idnew=$_GET['id_new'];
 }
 
        $t_name =$_POST['t_name'];
        $experience =$_POST['experience'];
        $phonenumber =$_POST['phonenumber'];


        $query = "UPDATE teacher set t_name = '$t_name', experience='$experience',phonenumber ='$phonenumber' where id = '$idnew'";
        $result = mysqli_query($connection,$query);

        if (!$result) {
          die('Connection FAiled : ' . mysqli_connect_error());
       } 
       else{
          
        header('location: teacher.php?update_msg=UPDATE succesfully');         
       }
 }
 ?>
<form action="t2.php?id_new=<?php echo $id;?>" method="post">
<div class="form_group">
        <label for="t_name">Teacher Name</label>
        <input type="text" name="t_name" class="form-control" value="<?php echo $row['t_name']?>">

        <label for="experience">Experience</label>
        <input type="text" name="experience" class="form-control" value="<?php echo $row['experience']?>">
        <label for="phonenumber">Phonenumber</label>
        <input type="text" name="phonenumber" class="form-control" value="<?php echo $row['phonenumber']?>">
        
        </div>
        
        
        <input type="submit" name="update_teacher" value="UPDATE" class="btn btn-success">

        </form>

<?php include('footer.php'); ?>
