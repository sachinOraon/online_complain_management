<?php
	session_start();
	$con=mysqli_connect('localhost', 'root', 'aspire');
	mysqli_select_db($con, 'cms');
	$reg=$_POST['reg_no'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$branch=$_POST['branch'];
	$sem=$_POST['sem'];
	$pass=$_POST['pass'];
	$s="select reg_no from stud_detail where reg_no='$reg'";
	$result=mysqli_query($con, $s);
	$num=mysqli_num_rows($result);
	if($num==1){
		$_SESSION['reg_no']=$reg;
		header('location: /cms/already_reg.php');
	}
	else {
		$sql="insert into stud_detail (reg_no, fname, lname, branch, sem, password) values ('$reg', '$fname', '$lname' , '$branch', '$sem', '$pass')";
		mysqli_query($con, $sql);
		header('location: /cms/reg_succ.html');
	}
	mysqli_close($con);
?>

