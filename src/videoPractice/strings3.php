<!DOCTYPE html>
<html>
<head>
	<title>String Functinos (Part-3)</title>
</head>
<body>
	<?php 
	$msg="Have a nice day!";
	echo $msg;
	echo "<br />";
	echo strstr($msg, "nice");
	echo "<br />";
	echo strpos($msg, "nice");
	echo "<br />";
	echo strchr($msg, 'i');
	?>
</body>
</html>