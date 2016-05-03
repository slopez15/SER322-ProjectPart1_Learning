<script src = "jquery-1.12.2.min.js" type = "text/javascript">
function createComboBox(){
	var chk = document.createElement("INPUT");
	chk.setAttribute("type","checkbox");
	document.body.appendChild(chk);
}

<?php

$host = '127.0.0.1:3306';
$user = 'root';
$password = 'pleaseconnect123';
$dbName = 'shoppingcart12';
$port = 3306;

$conn = new mysqli($host,$user,$password,$dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo 'we in boi' . "<br>";
/*
$sql = "SELECT * FROM digitallibrary";

$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "MediaID " . $row["MediaID"] . "ISBN " . $row["ISBN"] .
		"Title " . $row["Title"] . "<br>";
	}
}
*/

handleEvent($conn);

$conn->close();

function displayLibrary($conn){
	$sql = "SELECT * FROM digitallibrary";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "MediaID " . $row["MediaID"] . "ISBN " . $row["ISBN"] .
			"Title " . $row["Title"] . 
			"createComboBox()" . "<br>";
			
		}
	}
}


function handleEvent($conn){
	if(isset($_POST['submit'])){
		displayLibrary($conn);
	}
	
}


?>
</script>
