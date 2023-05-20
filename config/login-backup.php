<?php


include_once 'connection.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    //$password = $_POST['password'];
    $password = md5($_POST['password']);


    $validate = "SELECT *FROM accounts WHERE Username ='$username' && Password='$password'";
    $result = mysqli_query($conn, $validate);


    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;

        //Insert the data to table loggedin_history
        $UserID = $row['Userid'];
        $sql = "INSERT INTO loggedin_history (UserID, Username)VALUES ('$UserID','$username')";

        //Check if insertion
        if (mysqli_query($conn, $sql)) {

            header("Location: ../admin-dashboard/index.php");
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }




        header("location: ../admin-dashboard/index.php");
    } else {
        //echo "<h1> Login failed. Invalid username or password.</h1>";
        $_SESSION['validate'] = "unsuccessful";
        header("location: ../index.php");
    }
}

