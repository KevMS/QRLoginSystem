<?php
include_once 'connection.php';



if (isset($_POST['submit'])) {

	$UserID = $_POST['id'];
	$Fname = $_POST['firstname'];
	$Lname = $_POST['lastname'];
	$Uname = $_POST['username'];
	$Email = $_POST['email'];
	$role = $_POST['role'];
	$qrID = $_POST['qrID'];


	$query_update = "UPDATE accounts set Firstname = '$Fname',
			Lastname ='$Lname', 
			Username='$Uname',
			Email='$Email',
			role='$role'
			WHERE Userid =". $UserID;


	//Check if insertion
	if (mysqli_query($conn, $query_update)) {


		//Insert the data to table
		$sql = "INSERT INTO update_history (userID, qrID)VALUES ('$UserID','$qrID')";


		//Check if insertion
		if (mysqli_query($conn, $sql)) {
			header("Location: ../admin-dashboard/index.php");
		} else {
			
			echo "Error: " . $sql . "" . mysqli_error($conn);
		}


	} else {
		echo "Error: " . $query_update . "" . mysqli_error($conn);
	}

	//close connection
	mysqli_close($conn);
}
