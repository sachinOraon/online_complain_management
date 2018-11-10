<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location: /cms/admin_login.html');
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	$status=$_POST['stat'];
	$id=$_SESSION['cid'];
	$query="delete from complain where cid='$id'";
	if(mysqli_query($con, $query))
		header('location: /cms/del_succ.html');
	else header('location: /cms/del_fail.html');
	mysqli_close($con);
?>
