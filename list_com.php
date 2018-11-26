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
			<h1 style="display: inline;">Welcome, <?php echo $_SESSION['name']; ?></h1>
			<a class="btn btn-danger float-right" href="/cms/logout.php" role="button">Logout</a>
			<hr>
			<div class="row">

				<div class="col-md-6">
					<ul style="list-style-type: none">
						<li><h4>Registration No. : <?php echo $_SESSION['reg']; ?></h4></li>
						<li><h4>Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['branch']; ?></h4></li>
						<li><h4>Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['sem']; ?></h4></li>
					</ul>
				</div>

				<div class="col-md-6">
					<h3>Your complaints</h3>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Complain</th>
								<th>Creation Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
								<?php
								$con=mysqli_connect("localhost", "root", "aspire", "cms");
								$reg=$_SESSION['reg'];
								$query="select cid, issue, cdate, status from complain where reg_no='$reg'";
								$res=mysqli_query($con, $query);
								while($arr=mysqli_fetch_assoc($res))
								{
									echo "<tr>";
									echo "<td>".$arr['cid']."</td>";
									echo "<td>".$arr['issue']."</td>";
									echo "<td>".$arr['cdate']."</td>";
									$status=$arr['status'];
									if($status === 'Under Process')
										echo "<td style=\"color:yellow\">".$arr['status']."</td>";
									elseif($status === 'Issue Resolved')
										echo "<td style=\"color:lime\">".$arr['status']."</td>";
									else echo "<td style=\"color:red\">".$arr['status']."</td>";									
									echo "</tr>";
								}
								mysqli_close($con);
								?>
						</tbody>
					</table>
					<div class="form-group">
					<a class="btn btn-success float-right" href="/cms/dashboard.php" role="button">Go Back</a>
					</div>
				</div>

			</div>

		</div>

	</body>
</html>
