<?php

//Add the config database connection code 
include_once 'connection.php';
require_once '../vendors/phpqrcode/qrlib.php';

$query_lastID = 'SELECT * FROM accounts ORDER BY Userid DESC LIMIT 1';
$result_lastID = mysqli_query($conn, $query_lastID) or die(mysqli_error($conn));
$totalID = 0;

//Getting the Last ID before inserting new ID
while ($row = mysqli_fetch_assoc($result_lastID)) {
	$totalID = $row['Userid'];
}
//Last ID plus 1 for the inserted ID
$totalID = $totalID + 1;

if (isset($_POST['submit'])) {
	//Create Variable to catch the data from the from
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$role = 'user';


	$path = '../QR_IMG/';
	//$filename = $totalID."-". uniqid();
	//$filename = $totalID."-". md5(uniqid());
	$username_encrypt = md5($_POST['username']).md5($_POST['email']);
	$qrIDText = "$firstname" . "-" . "$username_encrypt";

	$file = $path . $qrIDText . ".png";

	
	$text  = "$qrIDText";

	QRcode::png($text, $file, 'L', 7, 2);



	//Insert the data to table
	$sql = "INSERT INTO accounts (Firstname, Lastname, Username,Password,Email,role,qrID)
	VALUES ('$firstname','$lastname','$username','$password','$email','$role','$qrIDText')";



	//Check if insertion
	if (mysqli_query($conn, $sql)) {

		$_SESSION['qrName'] = $firstname;
		$_SESSION['status'] = $qrIDText;
		$_SESSION['userID'] = $totalID;
		
		header("Location: ../displayqr.php");
	} else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}

	//close connection
	mysqli_close($conn);
}
