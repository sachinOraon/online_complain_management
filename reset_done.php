<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location: /cms/admin_login.html');
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	$regno=$_SESSION['reg_no'];
	$pass=$_POST['pass'];
	$query="update stud_detail set password='$pass' where reg_no='$regno'";
	if(mysqli_query($con, $query))
	{ $_SESSION['flag']=1; header('location: /cms/update_succ.php'); }
	else header('location: /cms/update_fail.php');
	mysqli_close($con);
?>