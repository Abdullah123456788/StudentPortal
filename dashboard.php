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
<?php include("dbcon.php"); ?>
<?php include('sidebar.php'); ?>

<div class="">

</div>
<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENT</button>
</div>

<table class="table table-hover table table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM `student`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Connection Failed : ' . mysqli_connect_error());
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Update</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<?php 
if (isset($_GET['message'])) {
    echo "<h6>".$_GET['message']."</h6>";
}
?>
<?php 
if (isset($_GET['insert_msg'])) {
    echo "<h6>".$_GET['insert_msg']."</h6>";
}
?>
<?php 
if (isset($_GET['update_msg'])) {
    echo "<h6>".$_GET['update_msg']."</h6>";
}
?>
<?php 
if (isset($_GET['del_msg'])) {
    echo "<h6>".$_GET['del_msg']."</h6>";
}
?>
<?php 
if (isset($_GET['login_msg'])) {
    echo "<h6>".$_GET['login_msg']."</h6>";
}
?>

<!-- Modal -->
<form action="insertdata.php"  method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form_group"></div>
                    <label for="f_name">First Name</label>
                    <input type="text" name="f_name" class="form-control">
                    <label for="l_name">Last Name</label>
                    <input type="text" name="l_name" class="form-control">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="add_student" value="ADD" class="btn btn-success"></input>
                </div>
            </div>
        </div>
    </div>
</form>
<a href="logout.php" class="dropdown-item notify-item">
    <i class="fe-log-out"></i>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Log Out</button>
</a>

<?php include('footer.php'); ?>
