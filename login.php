<?php
	include 'db_conn.php';
	if (isset($_SESSION['uid']))
	{
		header('location:admin/index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Admin Login</div>
				<div class="panel-body">
					<form method="POST" action="">
						<div class="form-group">
							<input class="form-control" placeholder="Username" name="username" type="text" required>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" required>
						</div>
						<button type="submit" class="btn btn-primary" style="outline: none;" name="login" value="Login">Login</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
	if (isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM `tbl_admin` WHERE `username` = '$username' AND `password` = '$password'";
		$run = mysqli_query($con, $sql);
		$row = mysqli_num_rows($run);

		if ($row < 1)
		{
			echo "<script>alert('Username Or Password not Match !!')</script>";
		} else 
		{
			$data = mysqli_fetch_array($run);
			$id = $data[0];
			$user_name = $data[2];
			$image = $data[4];

			$_SESSION['uid'] = $id;
			$_SESSION['user_name'] = $user_name;
			header('location:admin/index.php');
		}
	}
?>