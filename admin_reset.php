<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location: /cms/admin_login.html');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="/cms/css_style/bootstrap.min.css">
		<style>
			body {
				background-image: url(/cms/img/login.jpg);
				background-size: cover;
			}

			hr { background: white; }

			.contact-form {
				background: rgba(0,0,0,.6);
				color: white;
				margin-top: 100px;
				padding: 20px;
				border-radius: 10px;
				box-shadow: 0 15px 25px rgba(0,0,0,.5);
			}
		</style>
	</head>
	<body>
		<div class="container contact-form">
			<h2 style="display: inline">Welcome, <b><?php echo $_SESSION['username']; ?></b></h2>
			<a href="/cms/logout.php" class="btn btn-danger btn-lg float-right" role="button">Logout</a><hr>
			<div class="row" style="padding-left: 15%">
				<a href="/cms/admin_viewcom.php" class="btn btn-primary btn-lg" role="button">View Complaints</a>&nbsp;
				<a href="/cms/admin_resolve.php" class="btn btn-success btn-lg" role="button">Resolve</a>&nbsp;
				<a href="/cms/admin_update.php" class="btn btn-info btn-lg" role="button">Update</a>&nbsp;
				<a href="#" class="btn btn-warning btn-lg disabled" role="button">Reset User Password</a>&nbsp;
				<button type="button" class="btn btn-danger" onclick="location.href='/cms/delete.php'">DELETE</button>&nbsp;
				<a href="/cms/admin_panel.php" class="btn btn-primary btn-lg" role="button">Go Back</a>
			</div><hr>
			<div class="container" style="padding-left: 35%">
				<form class="form-inline" role="form" method="POST" action="/cms/reset_valid.php">
					<input type="text" class="form-control mb-2 mr-sm-2 form-control-lg" name="reg" placeholder="Enter Reg. No." required="">
					<button type="submit" class="btn btn-primary btn-lg mb-2">Find</button>
				</form>
			</div><br>
		</div>

	</body>
</html>
