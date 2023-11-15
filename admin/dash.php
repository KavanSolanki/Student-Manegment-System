<?php 
    include "header.php";
?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>Student Manegment</span> System</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
		<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php 
						echo "<b>Welcome ".$_SESSION['user_name']."</b>";
					?></div>
				<div class="profile-usertitle-status text-center"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="add_student.php"><em class="fa fa-user-plus">&nbsp;</em> Add Student</a></li>
			<li><a href="Show.php"><em class="fa fa-users">&nbsp;</em> All Student</a></li>
			<li><a href="users.php"><em class="fa fa-user">&nbsp;</em>All User</a></li>
			<li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>/.sidebar
		
	
		