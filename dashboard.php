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
			<h1>Welcome, <?php echo $_SESSION['name']; ?></h1><hr>
			<div class="row">

				<div class="col-md-6">
					<ul style="list-style-type: none">
						<li><h4>Registration No. : <?php echo $_SESSION['reg']; ?></h4></li>
						<li><h4>Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['branch']; ?></h4></li>
						<li><h4>Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['sem']; ?></h4></li>
					</ul>
				</div>

				<div class="col-md-6">
					<h3>Write your complain</h3>
					<form method="POST" action="/cms/complain.php">
					<div class="form-group">
						<label>Subject</label>
						<input type="text" name="subject" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Complaint</label>
						<textarea name="complain" class="form-control" rows="8" required=""></textarea>
					</div>
					<div class="form-group" style="text-align: center">
						<button type="submit" class="btn btn-primary">Submit</button>
						<?php
						$con=mysqli_connect("localhost", "root", "aspire", "cms");
						$reg=$_SESSION['reg'];
						$sql="select reg_no from complain where reg_no='$reg'";
						$res=mysqli_query($con, $sql);
						if(mysqli_num_rows($res)>0)
							print "<a class=\"btn btn-info\" href=\"/cms/list_com.php\" role=\"button\">View Your Complaints</a>";
						mysqli_close($con);
						?>
						<a class="btn btn-danger" href="/cms/logout.php" role="button">Logout</a>
					</div>
					</form>
				</div>

			</div>

		</div>

	</body>
</html>