<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <h2 class="text-center">Student Management System</h2>
    <br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading text-center">Student Information</div>
				<div class="panel-body">
					<form method="post" action="student_information.php">
							<div class="form-group">
                                <label class="form-label">Choose Semester</label>
                                <select name="sem" id="sem" class="form-control" required>
                                    <option value="" class="text-center">--------------- Select Semester ---------------</option>
                                    <?php 
                                        for ($i=1; $i <=6; $i++)
                                        { 
                                           echo "<option value='$i' class='text-center'>$i</option>";
                                        }
                                    ?>
                                </select>
							</div>
							<div class="form-group">
                                <label class="form-label">Enter Enrollment No.</label>
								<input required class="form-control text-center" placeholder="Enter Enrollment No." name="ermno" type="text">
							</div>
							<button type="submit" class="btn btn-primary" style="outline: none;" name="show_info">Show Info</button>
							<a href="login.php" class="btn btn-primary">Admin Login</a>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
