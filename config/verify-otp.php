<?php


include_once 'connection.php';

if (isset($_POST['submit'])) {

    $code = $_POST['code'];
   

    //Get Last LoggedinID 
    $query = 'SELECT * FROM loggedin_history ORDER BY LoggedinID DESC LIMIT 1';
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result)) {
        $loggedinID = $row['LoggedinID'];
        $role = $row['role'];
    }



    //validate if loggedId and OTP match
    $validate = "SELECT *FROM loggedin_history WHERE LoggedinID ='$loggedinID' && OTP ='$code'";
    $result = mysqli_query($conn, $validate);


    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    $UserID = $row['UserID'];
    //Check role
    if($count == 1 && $role == 'user'){
        $_SESSION['login_userID'] = $UserID;
        $_SESSION['success'] = "Logined Successfuly!";
        if(isset($_SESSION['login_userID'])) {
            header("Location: ../user-dashboard/index.php");
        }
    } elseif($count == 1 && $role = 'admin'){
        $_SESSION['login_adminID'] = $UserID;
        $_SESSION['success'] = "Logined Successfuly!";
        if(isset($_SESSION['login_adminID'])){
            header("Location: ../admin-dashboard/index.php");
        }
    } else {
        //echo "<h1> Login failed. Invalid username or password.</h1>";

        $_SESSION['validate'] = "unsuccessful";
        header("location: ../OTP_Login.php");
    }
}
