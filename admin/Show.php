<?php
include '../db_conn.php';
if ($_SESSION['uid']) {
    echo "";
} else {
    header("location:../login.php");
}
?>
<?php
include 'dash.php';
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Students</li>
        </ol>
    </div>
    <!--/.row-->
    <br>
    <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th width=15%>Enrollment No</th>
                            <th>Name</th>
                            <th>Stream</th>
                            <th>Semister</th>
                            <th>Photo</th>
                            <th >Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $show = "SELECT * FROM `tbl_student` ORDER BY `id` DESC";
                            $run_show = mysqli_query($con,$show);
                            while($data = mysqli_fetch_array($run_show))
                            {
                                echo "
                                    <tr>
                                        <th>$data[1]</th>
                                        <th>$data[2]</th>
                                        <th>$data[8]</th>
                                        <th>$data[9]</th>
                                        <th><img src='../$data[10]' height=50 width=50></th>
                                        <th><a href='update_student.php?id=$data[0]'><em class='fa fa-edit fa-lg'>&nbsp;</em></a>
                                        <a href=delete.php?id=$data[0]><em class='fa fa-trash fa-lg'></em></a></th>
                                    </tr>
                                ";
                            }

                        ?>
                    </tbody>
                </table>
            </div>
<?php 
    include 'footer.php';
?>