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
			<h1 style="display: inline">Welcome, <b><?php echo $_SESSION['username']; ?></b></h1>
			<a href="/cms/logout.php" class="btn btn-danger btn-lg float-right" role="button">Logout</a><hr>
			<div class="row" style="padding-left: 15%">
				<a href="/cms/admin_viewcom.php" class="btn btn-primary btn-lg" role="button">View Complaints</a>&nbsp;
				<a href="/cms/admin_resolve.php" class="btn btn-success btn-lg" role="button">Resolve</a>&nbsp;
				<a href="/cms/admin_update.php" class="btn btn-info btn-lg" role="button">Update</a>&nbsp;
				<a href="/cms/admin_reset.php" class="btn btn-warning btn-lg" role="button">Reset User Password</a>&nbsp;
				<a href="/cms/admin_panel.php" class="btn btn-primary btn-lg" role="button">Go Back</a>
			</div><hr>
			<div class="container" style="padding-left: 35%">
				<form class="form-inline" role="form" method="POST" action="/cms/find-del.php">
					<input type="number" class="form-control mb-2 mr-sm-2 form-control-lg" name="cid" placeholder="Enter Complaint ID" required="">
					<button type="submit" class="btn btn-primary btn-lg mb-2">Find</button>
				</form>
			</div><br>
			<?php
			$con=mysqli_connect("localhost", "root", "aspire", "cms");
			$id=$_SESSION['cid'];
			$q="select subject, issue, cdate, reg_no, status from complain where cid='$id'";
			$res=mysqli_query($con, $q);
			print "<table class=\"table table-dark table-hover\">
    		<thead>
      			<tr>
        			<th>Title</th>
        			<th>Issue</th>
        			<th>Date</th>
        			<th>Reg. No.</th>
        			<th>Name</th>
        			<th>Branch</th>
        			<th>Status</th>
      			</tr>
    		</thead>
    		<tbody>";
    		while($arr=mysqli_fetch_assoc($res))
    		{
    			echo "<tr>";
    			echo "<td>".$arr['subject']."</td>";
    			echo "<td>".$arr['issue']."</td>";
    			echo "<td>".$arr['cdate']."</td>";
    			echo "<td>".$arr['reg_no']."</td>";
    			$reg=$arr['reg_no'];
    			$conn=mysqli_connect("localhost", "root", "aspire", "cms");
    			$tmpq="select fname, lname, branch from stud_detail where reg_no='$reg'";
    			$tmp=mysqli_query($conn, $tmpq);
    			while($ar=mysqli_fetch_assoc($tmp))
    			{
    				$fname=$ar['fname'];
    				$lname=$ar['lname'];
    				$name=$fname." ".$lname;
    				echo "<td>".$name."</td>";
    				echo "<td>".$ar['branch']."</td>";
    			}
    			mysqli_free_result($tmp);
    			echo "<td>".$arr['status']."</td></tr>";
    		}
    		print "</tbody></table>";
    		mysqli_close($con);
    		mysqli_close($conn);
			?>
			
			<div class="col-lg-3" style="margin-left: 35%">
			<form action="/cms/del-status.php" method="POST">
				<button type="submit" class="btn btn-danger btn-lg">DELETE</button>
			</form></div>
	</body>
</html>