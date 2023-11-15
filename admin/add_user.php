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
            <li class="active">Add User</li>
        </ol>
    </div>
    <!--/.row-->

    <br>

    <div class="panel panel-default">
        <div class="panel-heading">Add Student</div>
        <div class="panel-body">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" placeholder="Full Name" name="fname" required type="text">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" placeholder="Username" name="username" required type="text">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" placeholder="Password" name="password" required type="password">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" required accept="image/*">
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div><!-- /.panel-->
<?php
    include 'footer.php';
?>
<?php
    
    if (isset($_POST['submit']))
    {
        extract($_POST);
        $img = "user_images/". $_FILES['image']['name'];
        $logo = $_FILES['image']['tmp_name'];
        move_uploaded_file($logo,$img);
        
        $que = "INSERT INTO `tbl_admin`(`id`, `full_name`, `username`, `password`, `Image`) VALUES (NULL,'$fname','$username','$password','$img')";

        $run_que = mysqli_query($con,$que);
        if ($run_que>0)
        {
            header("location:users.php");
        }
        else
        {
            echo "<script>alert('Erro')</script>";
        }
    }
?>