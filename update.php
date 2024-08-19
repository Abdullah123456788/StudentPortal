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

 $query = "Select * from `student` where `id`='$id'";
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
 if(isset($_POST['update_student'])){

 if(isset($_GET['id_new'])){
    $idnew=$_GET['id_new'];
 }
 
        $fname =$_POST['f_name'];
        $lname =$_POST['l_name'];
        $age =$_POST['age'];


        $query = "UPDATE student set firstname = '$fname', lastname = '$lname' , age = '$age' where id = '$idnew'";
        $result = mysqli_query($connection,$query);

        if (!$result) {
          die('Connection FAiled : ' . mysqli_connect_error());
       } 
       else{
          
        header('location: dashboard.php?update_msg=UPDATE succesfully');         
       }
 }
 ?>
<form action="update.php?id_new=<?php echo $id;?>" method="post">
<div class="form_group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['firstname']?>">
        </div>
        <div class="form_group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['lastname']?>">
        </div>
        <div class="form_group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age']?>">
        </div>
        
        <input type="submit" name="update_student" value="UPDATE" class="btn btn-success">

        </form>

<?php include('footer.php'); ?>
