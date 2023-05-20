<?php


include_once 'connection.php';

if (isset($_POST['submit'])) {  

    $username = $_POST['username'];
    //$password = $_POST['password'];
    $password = md5($_POST['password']);


    $validate = "SELECT *FROM users WHERE Username ='$username' && Password='$password'";
    $result = mysqli_query($conn, $validate);


    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;

        $OTP_code = rand(111111, 999999);

        //Insert the data to table loggedin_history
        $UserID = $row['Userid'];
        $User_email = $row['Email'];
        
        $sql = "INSERT INTO loggedin_history (UserID, Username, Login_type,OTP)VALUES ('$UserID','$username','1','$OTP_code')";
        

        include '../send_otp.php';

        // //Check if insertion
        
         if (mysqli_query($conn, $sql)) {

            $id = $conn->query("SELECT * FROM loggedin_history");
            while($true = $id->fetch_assoc()) {
                $history_id = $true['LoggedinID'];
                $_SESSION['id'] = $history_id;
            }
            
             header("Location: ../login-code.php");
         } else {
            header("Location: ../index.php");
         }
    }






} else {
    //echo "<h1> Login failed. Invalid username or password.</h1>";
    $_SESSION['validate'] = "unsuccessful";
    header("location: ../index.php");
}

