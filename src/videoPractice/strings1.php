<!DOCTYPE html>
<html>
<head>
	<title>String Functinos (Part-1)</title>
</head>
<body>
	<?php 
	$first="Good Morning!";
	$second=" Have a nice day!";
	$third=$first;
	echo "third: <br /> &nbsp;&nbsp; $third<br />";
	$third .= $second; //think of it as t += s
	echo "3rd=2nd: <br/> &nbsp;&nbsp; $third<br />";
	echo "strtoupper: <br /> &nbsp;&nbsp;";
	echo strtoupper ($third);
	echo "strtolower:<br /> <br />";
	echo strtolower ($third);
	echo "ucwords<br />";
	echo ucwords ($third);
	echo "third<br />";
	echo $third;
	?>
</body>
</html>