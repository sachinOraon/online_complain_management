<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location: /cms/admin_login.html');
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	$regno=$_POST['reg'];
	$query="select * from stud_detail where reg_no='$regno'";
	$res=mysqli_query($con, $query);
	if(mysqli_num_rows($res)==1){
	while($arr=mysqli_fetch_assoc($res))
	{
		$_SESSION['reg']=$arr['reg_no'];
		$_SESSION['fname']=$arr['fname'];
		$_SESSION['lname']=$arr['lname'];
		$_SESSION['branch']=$arr['branch'];
		$_SESSION['sem']=$arr['sem'];
	}
	header('location: /cms/admin_update_done.php');}
	else header('location: /cms/not_found.php');
	mysqli_close($con);
?>