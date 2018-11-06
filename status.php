<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location: /cms/admin_login.html');
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	$status=$_POST['stat'];
	$id=$_SESSION['cid'];
	$query="update complain set status='$status' where cid='$id'";
	if(mysqli_query($con, $query))
		header('location: /cms/admin_resolve_succ.php');
	else header('location: /cms/stat_fail.html');
	mysqli_close($con);
?>