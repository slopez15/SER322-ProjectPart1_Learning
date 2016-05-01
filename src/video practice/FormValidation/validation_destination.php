<html>
<head>
	<title>Validation Destination</title>
</head>
<body>
	<?php
	if( isset($_POST['submit']) )
	{
		$name = $_POST['name'];
		$age = $_POST['age'];
		$email = $_POST['email'];
		if (strlen($name)<6)
		{
			echo "Username too short!";
		}
		elseif(!is_numeric($age))
		{
			echo "Only digits are allowed!";
		}
		elseif(empty($email))
		{
			echo "Please provide valid email address!";
		}
		else{
			echo "You logged in successfully!";
		}
	}
	else
	{
		echo "Form was not submitted!";
	}
	?>
</body>
</html>