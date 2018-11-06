<?php
	session_start();
	$con=mysqli_connect("localhost", "root", "aspire", "cms");
	if(mysqli_connect_errno())
		header('location: /cms/db_err.html');
	else
	{
		$date=date("Y-m-d");
		$sub=$_POST["subject"];
		$com=$_POST["complain"];
		$reg=$_SESSION['reg'];
		$status="Under process";
		$query="insert into complain (reg_no, cdate, issue, subject, status) values ('$reg', '$date', '$com', '$sub', '$status')";
		$exec=mysqli_query($con, $query);
		if(mysqli_error($exec))
			header('location: /cms/db_err.html');
		else
		{
			header('location: /cms/com_succ.php');
		}
	}
	mysqli_close($con);
?>