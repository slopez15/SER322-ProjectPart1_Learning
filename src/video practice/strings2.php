<!DOCTYPE html>
<html>
<head>
	<title>String Functinos (Part-2)</title>
</head>
<body>
	<?php 
	$msg="Have a nice day!";
	echo $msg;
	echo "<br />";
	echo strlen($msg);
	echo "<br />";
	echo str_replace("nice", "great", $msg);
	echo "<br />";
	echo str_repeat($msg, 3);
	echo "<br />";
	echo substr($msg, 5, 16);
	?>
</body>
</html>