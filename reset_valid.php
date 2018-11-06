<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location: /cms/admin_login.html');
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	$regno=$_POST['reg'];
	$query="select * from stud_detail where reg_no='$regno'";
	$res=mysqli_query($con, $query);
	if(mysqli_num_rows($res)==1)
	{
		$_SESSION['reg_no']=$regno;
		$arr=mysqli_fetch_assoc($res);
		$fname=$arr['fname'];
		$lname=$arr['lname'];
		$nam=$fname." ".$lname;
		$_SESSION['name']=$nam;
		header('location: /cms/admin_reset_opt.php');
	}
	else header('location: /cms/not_found.php');
	mysqli_close($con);
?>