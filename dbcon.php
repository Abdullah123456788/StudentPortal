<?php
define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "student_db");

    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    // Check connection
    if (!$connection) {
        die('Connection Failed : ' . mysqli_connect_error());
    } 
    
        ?>