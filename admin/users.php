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
            <li class="active">Users</li>
        </ol>
    </div>
    <!--/.row-->
    <br>
    <div class="text-right">
        <a href="add_user.php"><button class="btn btn-md btn-primary" style="margin-right: 16px; margin-bottom: 13px;"><em class="fa fa-user-plus">&nbsp;</em> Add User</button></a>
    </div>
    
    <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            $show_user = "SELECT * FROM `tbl_admin` ORDER BY `id` DESC";
                            $run_show_user = mysqli_query($con,$show_user);
                            while($data = mysqli_fetch_array($run_show_user))
                            {
                                echo "
                                    <tr>
                                        <th>$i</th>
                                        <th>$data[1]</th>
                                        <th><img src='$data[4]' height=50 width=50></th>
                                        <th><a href='update_user.php?id=$data[0]&full_name=$data[1]&username=$data[2]&password=$data[3]&Image=$data[4]'><em class='fa fa-edit fa-lg'>&nbsp;</em></a>
                                        <a href=delete_user.php?id=$data[0]><em class='fa fa-trash fa-lg'></em></a></th>
                                    </tr>
                                ";
                                $i++;
                            }

                        ?>
                    </tbody>
                </table>
            </div>
<?php 
    include 'footer.php';
?>