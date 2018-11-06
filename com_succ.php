<?php
	session_start();
	if(!isset($_SESSION['name']))
		header('location: /cms/stud_login.html');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dashboard</title>
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
			<h1 style="display: inline;">Welcome, <?php echo $_SESSION['name']; ?></h1><hr>
			<div class="row">

				<div class="col-md-6">
					<ul style="list-style-type: none">
						<li><h4>Registration No. : <?php echo $_SESSION['reg']; ?></h4></li>
						<li><h4>Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['branch']; ?></h4></li>
						<li><h4>Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['sem']; ?></h4></li>
					</ul>
				</div>

				<div class="col-md-6">
					<h4>Your complain has been submitted <b>successfully</b>. Concerning department may resolve it as soon as possible.</h4>
					<div class="form-group" style="text-align: right">
						<a class="btn btn-success" href="/cms/dashboard.php" role="button">Go Back</a>
						<a class="btn btn-info" href="/cms/list_com.php" role="button">View Your Complaints</a>
						<a class="btn btn-danger" href="/cms/logout.php" role="button">Logout</a>
					</div>
				</div>
				
			</div>

		</div>

	</body>
</html>