<?php
	session_start();
	if(!isset($_SESSION['reg_no']))
		header('location: /cms/stud_reg.html');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Already Registered</title>
		<link rel="stylesheet" type="text/css" href="/cms/css_style/login_failed.css">
		<link rel="stylesheet" type="text/css" href="/cms/css_style/bootstrap.min.css">
	</head>
	<body>
		<div class="box">
			<h2>Failed to create new account !</h2><hr style="background:white">
			<p>The <b>Registration No. </b>: <b><?php echo $_SESSION['reg_no']; ?></b> is already in use by another account. Please try again.</p>
			<a class="btn btn-primary" href="/cms/stud_reg.html" role="button">Retry</a>
			<a class="btn btn-success float-right" href="/cms/index.html" role="button">Home</a>
		</div>
		<?php session_unset(); session_destroy(); ?>
	</body>
</html>
