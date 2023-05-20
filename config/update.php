<?php
include_once 'connection.php';



if (isset($_POST['submit'])) {





	$UserID = $_POST['userID'];
	$Fname = $_POST['firstname'];
	$Lname = $_POST['lastname'];
	$Uname = $_POST['username'];
	$Email = $_POST['email'];
	$qrID = $_POST['qrID'];


	$query_update = "UPDATE accounts set 
			Firstname = '$Fname',
			Lastname ='$Lname', 
			Username='$Uname',
			Email='$Email'
			WHERE Userid =" . $UserID;


	//Check if insertion
	if (mysqli_query($conn, $query_update)) {


		//Insert the data to table
		//$sql = "INSERT INTO loggedin_history (userID, qrID)VALUES ('$UserID','$qrID')";
		$query_loggedin = "UPDATE loggedin_history set Username='$Uname' WHERE UserID ='$UserID' ";


		//Check if insertion
		if (mysqli_query($conn, $query_loggedin)) {


			//Insert the update history table
			$sql = "INSERT INTO update_history (userID, qrID)VALUES ('$UserID','$qrID')";


			//Check if insertion
			if (mysqli_query($conn, $sql)) {

				$_SESSION['status'] = $filename;
				$_SESSION['userID'] = $totalID;
				$_SESSION['login_user'] = $Uname;
	
				header("Location: ../admin-dashboard/");
			} else {

				echo "Error: " . $sql . "" . mysqli_error($conn);
			}



		} else {

			echo "Error: " . $sql . "" . mysqli_error($conn);
		}
	} else {
		echo "Error: " . $query_update . "" . mysqli_error($conn);
	}

	//close connection
	mysqli_close($conn);
}
