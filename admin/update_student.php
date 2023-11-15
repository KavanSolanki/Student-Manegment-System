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
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tbl_student` WHERE `id` = '$id'";
    $run_sql = mysqli_query($con,$sql);
    while ($data = mysqli_fetch_array($run_sql)) {
        
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Update Student</li>
        </ol>
    </div>
    <!--/.row-->
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">Update Student</div>
        <div class="panel-body">
            <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Enrollment No.</label>
                        <input class="form-control" placeholder="Enrollment No." name="ermno" required type="text" value="<?php echo $data[1];?>">
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" placeholder="Full Name" name="fname" required type="text" value="<?php echo $data[2];?>">
                    </div>
                    <div class="form-group">
                        <label>Birth Date</label>
                        <input class="form-control" placeholder="Date" name="date" required type="date" value="<?php echo $data[3];?>">
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
                        <textarea class="form-control" rows="3" style="resize: none;" name="address"><?php echo $data[5]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input class="form-control" placeholder="City" name="city" required type="text" value="<?php echo $data[6] ?>">
                    </div>
                    <div class="form-group">
                        <label>Contact No</label>
                        <input class="form-control" placeholder="Contact No" name="cno" required type="text" value="<?php echo $data[7]; ?>">
                    </div>
                    <div class="form-group">
                        <label>Select Stream</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="stream" id="stream" value="B.C.A">B.C.A
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="stream" id="stream" value="B.Sc.I.T">B.Sc.I.T
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="stream" id="stream" value="M.Sc.I.T">M.Sc.I.T
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="stream" id="stream" value="M.C.A">M.C.A
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Select Semester</label>
                        <select name="sem" id="sem" class="form-control">
                            <option value=""><?php echo $data[9];?></option>
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
                        <input type="file" class="form-control-file" id="image" name="image" required accept="image/*">
                        <?php 
                            echo "<br><img src='$data[10]' alt='Not Display' width='150' height='150'>";
                        ?>
                        
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
</div>
<!-- /.panel-->
<?php
}
    include 'footer.php';
    if (isset($_POST['submit']))
    {
        extract($_REQUEST);
        $img = "student_images/". $_FILES['image']['name'];
        $logo = $_FILES['image']['tmp_name'];
        move_uploaded_file($logo,$img);
        $update = mysqli_query($con,"UPDATE `tbl_student` SET `enrollmentno`='$ermno',`name`='$fname',`birthdate`='$date',`gender`='$gender',`address`='$address',`city`='$city',`contact_no`='$cno',`stream`='$stream',`semester`=$sem,`image`='$img' WHERE `id` = '$id'");
        if ($update>0)
        {
            header('Location:Show.php');
        }
        else
        {
            echo "ERROR";
        }
    }
?>