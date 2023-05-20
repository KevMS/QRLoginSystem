<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "my_password";
$dbname = "evsu_qrcode";

$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if (!$conn) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

/*
	*REMOVE THIS COMMENT TO CHECK CONNECTION
	
	else{
		echo "Connect Successfully. Host info: " . mysqli_get_host_info($conn);
	}
*/


?>