
<?php 
	$host="localhost";
	$dbuser="ser322";
	$pass="pass";
	$dbname="simple";
	$conn=mysqli_connect($host, $dbuser, $pass, $dbname);
	if(mysqli_connect_errno()){
			die("Connection Failed! " . mysqli_connect_error());
	}
	else{
		echo "Connected to database {$dbname}";
	}
?>

<html>	
<head>
	<title>Database Connection</title>
</head>
<body>

</body>
</html>
<?php 
mysqli_close($conn);
?>


