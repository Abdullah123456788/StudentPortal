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

 $query = "Select * from `course` where `id`='$id'";
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
 if(isset($_POST['update_course'])){

 if(isset($_GET['id_new'])){
    $idnew=$_GET['id_new'];
 }
 
        $sub =$_POST['sub'];
        $subt =$_POST['sub_t'];


        $query = "UPDATE course set subject = '$sub', subject_teacher = '$subt'  where id = '$idnew'";
        $result = mysqli_query($connection,$query);

        if (!$result) {
          die('Connection FAiled : ' . mysqli_connect_error());
       } 
       else{
          
        header('location: Course.php?update_msg=UPDATE succesfully');         
       }
 }
 ?>
<form action="u2.php?id_new=<?php echo $id;?>" method="post">
<div class="form_group">
        <label for="sub">Subject</label>
        <input type="text" name="sub" class="form-control" value="<?php echo $row['subject']?>">
        </div>
        <div class="form_group">
        <label for="sub_t">Subject Teacher</label>
        <input type="text" name="sub_t" class="form-control" value="<?php echo $row['subject_teacher']?>">
        </div>
        
        <input type="submit" name="update_course" value="UPDATE" class="btn btn-success">

        </form>

<?php include('footer.php'); ?>
