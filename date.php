<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DATE format samples</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		date_default_timezone_set("Europe/Copenhagen");
		setlocale(LC_TIME, "da_DK.utf8");
		echo date("l");
	?>
</body>
</html>