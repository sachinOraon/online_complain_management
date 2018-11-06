<?php
	session_start();
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	if(mysqli_connect_errno())
		header('location: /cms/db_err.html');
	else
	{
		$user=$_POST['uname'];
		$pass=$_POST['pass'];
		$q="select * from admin where username='$user' and password='$pass'";
		$res=mysqli_query($con, $q);
		if(mysqli_num_rows($res)==1)
		{
			$_SESSION['username']=$user;
			header('location: /cms/admin_panel.php');
		}
		else
		{
			header('location: /cms/adm_log_fail.html');
		}
	}
?>
