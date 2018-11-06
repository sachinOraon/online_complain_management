<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location: /cms/admin_login.html');
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	$id=$_POST['cid'];
	$q="select cid from complain where cid='$id'";
	$res=mysqli_query($con, $q);
	if(mysqli_num_rows($res)==0)
		header('location: /cms/admin_resolve_fail.php');
	else{
		$_SESSION['cid']=$id;
		header('location: /cms/admin_resolve_succ.php');
	}
	mysqli_close($con);
?>