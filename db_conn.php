<?php
    session_start();
    $con = mysqli_connect("localhost","root","","db_student_ms");
    if ($con == false)
    {
        echo "Connection is Not Establish";
    }
?>