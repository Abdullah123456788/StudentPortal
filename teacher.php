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
    <h2>ALL Teacher</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD Teacher</button>
</div>

<table class="table table-hover table table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Teacher Name</th>
            <th>Experience</th>
            <th>Phone Number</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM `teacher`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Connection Failed : ' . mysqli_connect_error());
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></a></td>
            <td><a href="j2.php?id=<?php echo $row['id'];?>"><?php echo $row['t_name'];  ?></a></td>
            <td><?php echo $row['experience']; ?></a></td>
            <td><?php echo $row['phonenumber']; ?></a></td>
            <td><a href="t2.php?id=<?php echo $row['id']?>" class="btn btn-success">Update</a></td>
            <td><a href="d3.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>
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
<form action="i3.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD Teacher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form_group"></div>
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" class="form-control">
                    <div class="form_group"></div>
                    <label for="username">User Name</label>
                    <input type="text" name="username" class="form-control">
                    <div class="form_group"></div>
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                    <div class="form_group"></div>

                    <label for="phonenumber">Phone Number</label>
                    <input type="text" name="phonenumber" class="form-control">
                    <!-- <label for="sub_t">Teacher Subject</label>
                    <input type="text" name="sub_t" class="form-control"> -->
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="add_teacher" value="ADD" class="btn btn-success"></input>
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
