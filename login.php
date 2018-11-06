<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost", "root", "aspire", "cms");
if(mysqli_connect_errno())
	header('location: /cms/db_err.html');
else {
	$user=$_POST['reg_no'];
	$pass=$_POST['pass'];
	$query="select * from stud_detail where reg_no='$user' and password='$pass'";
	$res=mysqli_query($con, $query);
	$result=mysqli_fetch_assoc($res);
	$fname=$result['fname'];
	$lname=$result['lname'];
	$name=$fname." ".$lname;
	$reg=$result['reg_no'];
	$branch=$result['branch'];
	$sem=$result['sem'];
	if(mysqli_num_rows($res)==1)
	{
		
		$_SESSION['name']=$name;
		$_SESSION['reg']=$reg;
		$_SESSION['branch']=$branch;
		$_SESSION['sem']=$sem;
		header('location: /cms/dashboard.php');
	}
	else header('location: /cms/login_failed.html');
}
mysqli_close($con);
?>
