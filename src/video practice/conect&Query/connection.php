<?php 
/* all the info printed looks like garbage and is not formated.
ex; 
array (size=1)
  0 => string 'An' (length=2)
  1 => string 'Ta' (length=2)
 */
 ?>
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
<br/>

<html>	
<head>
	<title>Querying the Database</title>
</head>
<body>
<?php 
//	$sql="USE simple";
//	$res=mysqli_query($conn,$sql);
#USE simple;
#SELECT * FROM person;
	$sql="SELECT * FROM person";
	$res=mysqli_query($conn,$sql);
//	echo "<br/>";
//	echo "{$res}"; //tried to verify the type 'what is it?...'
	if(!$res){
		die("Query Failed!");
	}
	while ($row=mysqli_fetch_row($res)) {
		var_dump($row);
		echo "<br/><hr/><br/>";
	}
	mysqli_free_result($res);
?>	


</body>
</html>
<?php 
mysqli_close($conn);
?>


