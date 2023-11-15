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
            <li class="active">Add Student</li>
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
                        <label>Enrollment No.</label>
                        <input class="form-control" placeholder="Enrollment No." name="ermno" type="text">
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" placeholder="Full Name" name="fname" type="text">
                    </div>
                    <div class="form-group">
                        <label>Birth Date</label>
                        <input class="form-control" placeholder="Full Name" name="date" type="date">
                    </div>
                    <div class="form-group">
                        <label>Select Gender</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="gender" value="Male">Male
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="gender" value="Female">Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" style="resize: none;" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input class="form-control" placeholder="City" name="city"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Contact No</label>
                        <input class="form-control" placeholder="Contact No" name="cno"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Select Stream</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="stream" id="stream" value="BCA">B.C.A
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="stream" id="stream" value="BSCIT">B.Sc.I.T
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="stream" id="stream" value="MSCIT">M.Sc.I.T
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="stream" id="stream" value="MCA">M.C.A
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Select Semester</label>
                        <select name="sem" id="sem" class="form-control">
                            <option value="">Select Semester</option>
                            <?php
                            for ($i = 1; $i <= 6; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
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

        $img = "student_images/". $_FILES['image']['name'];
        $logo = $_FILES['image']['tmp_name'];
        move_uploaded_file($logo,$img);
        
       $que = "INSERT INTO `tbl_student`(`id`, `enrollmentno`, `name`, `birthdate`, `gender`, `address`, `city`, `contact_no`, `stream`, `semester`, `image`) VALUES (NULL,'$ermno','$fname','$date','$gender','$address','$city','$cno','$stream',$sem,'admin/$img')";

        $run_que = mysqli_query($con,$que);
        if ($run_que>0)
        {
  
            header("location:Show.php");
        }
        else
        {
            echo "<script>alert('Erro')</script>";
        }
    }
?>