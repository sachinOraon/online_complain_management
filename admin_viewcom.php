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
			<div class="row" style="padding-left: 20%">
				<a href="#" class="btn btn-primary btn-lg disabled" role="button">View Complaints</a>&nbsp;
				<a href="/cms/admin_resolve.php" class="btn btn-success btn-lg" role="button">Resolve</a>&nbsp;
				<a href="/cms/admin_update.php" class="btn btn-info btn-lg" role="button">Update</a>&nbsp;
				<a href="/cms/admin_reset.php" class="btn btn-warning btn-lg" role="button">Reset User Password</a>&nbsp;
				<button type="button" class="btn btn-danger" onclick="location.href='/cms/delete.php'">DELETE</button>&nbsp;
				<a href="/cms/admin_panel.php" class="btn btn-primary btn-lg" role="button">Go Back</a>
			</div><hr>
		</div>
		<div class="container contact-form" style="margin-top:20px">
			<?php
			$con=mysqli_connect("localhost", "root", "aspire", "cms");
			$q="select cid from complain";
			$res=mysqli_query($con, $q);
			if(mysqli_num_rows($res)==0){
				print "<h3 style=\"text-align:center\">No complaints available !</h3>";
				mysqli_close($con);
			}
			else {
				print "<table class=\"table table-dark table-hover\">
						<thead>
							<tr>
								<th>ID</th>
								<th>Issue</th>
								<th>Date</th>
								<th>Reg. No.</th>
								<th>Name</th>
								<th>Branch</th>
								<th>Sem</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>";
								
								$con=mysqli_connect("localhost", "root", "aspire", "cms");
								$query="select cid, issue, cdate, reg_no, status from complain";
								$res=mysqli_query($con, $query);
								while($arr=mysqli_fetch_assoc($res))
								{
									echo "<tr>";
									echo "<td>".$arr['cid']."</td>";
									echo "<td>".$arr['issue']."</td>";
									echo "<td>".$arr['cdate']."</td>";
									echo "<td>".$arr['reg_no']."</td>";
									$reg=$arr['reg_no'];
									$tmpq="select fname, lname, branch, sem from stud_detail where reg_no='$reg'";
									$tmp=mysqli_query($con, $tmpq);
									while($ar=mysqli_fetch_assoc($tmp))
									{
										$fname=$ar['fname'];
										$lname=$ar['lname'];
										$name=$fname." ".$lname;
										echo "<td>".$name."</td>";
										echo "<td>".$ar['branch']."</td>";
										echo "<td>".$ar['sem']."</td>";
									}
									$status=$arr['status'];
									if($status === 'Under Process')
										echo "<td style=\"color:yellow\">".$arr['status']."</td>";
									elseif($status === 'Issue Resolved')
										echo "<td style=\"color:lime\">".$arr['status']."</td>";
									else echo "<td style=\"color:red\">".$arr['status']."</td>";
									echo "<td><a href=\"admin_resolve_succ.php?id=".$arr['cid']."\" class=\"btn btn-primary\" role=\"button\">Update</a></td>";
									echo "</tr>";
								}
								
						print "</tbody>
					</table>";
			}
			mysqli_close($con);
			?>
		</div>
	</body>
</html>
