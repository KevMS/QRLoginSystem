<?php
include_once 'connection.php';

if (isset($_GET['id'])) {

	//echo  $_GET['id'] ;

	$sql = 'SELECT * FROM accounts WHERE Userid = ' . $_GET['id'];
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	while ($row = mysqli_fetch_assoc($result)) {
		$userID = $row['Userid'];
		$firstname = $row['Firstname'];
		$lastname = $row['Lastname'];
		$username = $row['Username'];
		$password = $row['Password'];
		$email = $row['Email'];
		$qrIDText = $row['qrID'];
	}





	$sql = "INSERT INTO delete_history (Userid,Firstname, Lastname, Username,Password,Email,qrID)
		VALUES ('$userID','$firstname','$lastname','$username','$password','$email','$qrIDText')";

	if (mysqli_query($conn, $sql)) {

		$query = 'DELETE FROM accounts
		WHERE
		Userid = ' . $_GET['id'];

		//$count_deleted = 0;

		//Check if insertion
		if (mysqli_query($conn, $query)) {
			//RETURN TO DASHBOARD
			
			header("Location: ../admin-dashboard/index.php");
		} else {
			echo "Error: " . $sql . "" . mysqli_error($conn);
		}

	} else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}





	//close connection
	mysqli_close($conn);
}
