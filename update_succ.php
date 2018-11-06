<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Updated</title>
		<link rel="stylesheet" href="/cms/css_style/login_failed.css">
		<link rel="stylesheet" type="text/css" href="/cms/css_style/bootstrap.min.css">
	</head>
	<body>
		<div class="box">
			<h2>Record Successfully Updated !</h2>
			<p>Student details for given reg. no. has been updated.</p>
			<?php
			session_start();
			$flag=$_SESSION['flag'];
			if($flag==1)
				print "<a href=\"/cms/admin_reset.php\" class=\"btn btn-primary\" role=\"button\">Go Back</a>";
			else
				print "<a href=\"/cms/admin_update.php\" class=\"btn btn-primary\" role=\"button\">Go Back</a>";
			?>
		</div>
	</body>
</html>
