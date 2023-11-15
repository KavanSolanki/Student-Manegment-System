<?php 
    include "../db_conn.php";
    $id = $_GET['id'];

    $delete = mysqli_query($con,"DELETE FROM `tbl_student` WHERE `id` = '$id'");
    if ($delete>0)
    {
        header('Location:Show.php');
    }
    else
    {
        echo "ERROR";
    }
?>