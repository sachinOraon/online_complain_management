<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location: /cms/admin_login.html');
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	$oreg=$_SESSION['reg'];
	$nreg=$_POST['reg_no'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$branch=$_POST['branch'];
	$sem=$_POST['sem'];
	$query="update stud_detail set reg_no='$nreg', fname='$fname', lname='$lname', branch='$branch', sem='$sem' where reg_no='$oreg'";
	if(mysqli_query($con, $query))
	{ $_SESSION['flag']=0; header('location: /cms/update_succ.php'); }
	else header('location: /cms/update_fail.html');
	mysqli_close($con);
?>