<!DOCTYPE html\>
<!-- xml version="1.0" encoding="utf-8"?
DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns = "http://www.w3.org/1999/xhtml" -->

<head>
	<title>SER322 Project</title>
</head>

<body>
	<h2> Querying a MySQL database.</h2>
	<form method = "post" action = "database.php"> <!-- Posts data to database.php -->
		<div>
			<p>Select a field to display:
				<!-- add a select box containing options
					for SELECT query -->
				<select name = "select">
					<option selected = "selected">*</option>
					<option>Customer</option>
					<option>Transaction</option>
					<option>Items</option>
					<option>Categories</option>
				</select>
			</p>
			<input type = "submit" value = "Send Query" />
		</div>
	</form>

	<?php
	$con = mysql_connect("localhost", "Saul", "password");
	if (!$con){
		die("Can not connect: " . mysql_error())
	}

	<!-- CREATE DATABASE -->
	if(mysql_query("CREATE DATABASE t", $con)){
		echo("Your DATABASE was created sussessfully")
	}
	?>
</body>
</html>

