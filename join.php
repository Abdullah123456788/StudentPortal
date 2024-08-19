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

<div class="box1"></div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD Student</button>

<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Subject</th>
            <th>Teacher Name</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(isset($_GET['id'])) {
            $course_id = $_GET['id'];

            // Fetching students enrolled in the course along with teacher's name
            $query = "SELECT student.id, student.firstname, student.lastname, student.age, course.subject, teacher.t_name
                      FROM student_course   
                      JOIN student ON student_course.student_id = student.id
                      JOIN course ON student_course.course_id = course.id
                      JOIN teacher ON course.teacher_id = teacher.id
                      WHERE student_course.course_id = $course_id";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die('Connection Failed : ' . mysqli_connect_error());
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr id="row_<?php echo $row['id']; ?>">
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['t_name']; ?></td>
            <td>
                <a href="javascript:void(0);" onclick="deleteStudent(<?php echo $course_id; ?>, <?php echo $row['id']; ?>)" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php
                }
            }
        }
        ?>
    </tbody>
</table>

<form action="ij.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD Student Courses</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <table class="table table-hover table table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Age</th>
                            <th>Add</th>
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
                            <td>
                                <a href="ij.php?student_id=<?php echo $row['id']; ?>&course_id=<?php echo $course_id; ?>" class="btn btn-success">Add</a>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>

<script>
    function deleteStudent(course_id, student_id) {
        $.ajax({
            url: 'del.php',
            type: 'GET',
            data: { course_id: course_id, student_id: student_id },
            success: function(response) {
                console.log('AJAX Response:', response);
                if (response.trim() === 'success') {
                    $('#row_' + student_id).remove();
                } else {
                    alert('Failed to delete student');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', xhr.responseText);
            }
        });
    }
</script>
