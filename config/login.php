<?php


include_once 'connection.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    //$password = $_POST['password'];
    $password = md5($_POST['password']);

    $validate = "SELECT *FROM accounts WHERE Username ='$username' && Password='$password'";
    $result = mysqli_query($conn, $validate);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row['Userid'];
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;

        $OTP_code = rand(111111, 999999);

        $data = $conn->query("SELECT * FROM accounts Where Userid='$id'");
        while($current = $data->fetch_assoc()){
            $user = $current['Firstname'];
            $email = $current['Email'];
            $role = $current['role'];
        }

        //Insert the data to table loggedin_history
        $UserID = $row['Userid'];
        $sql = "INSERT INTO loggedin_history (UserID, Username, role, OTP, login_type)VALUES ('$UserID','$username','$role','$OTP_code', '0')";

        //Include PHPmailer
        include './send_otp.php';
        include '../send_otp.php';
        //include './sendemail.php';

        //Check if insertion
        if (mysqli_query($conn, $sql)) {
            //header("Location: ../dashboard/index.php");
            $_SESSION['success'] = "We've successfuly sent an OTP to your email!";
            header("location: ../OTP_Login.php");

        } else {
            //header("location: ../OTP_Login.php");
            $_SESSION['validate'] = "unsuccessful";
            //echo "Error: " . $sql . "" . mysqli_error($conn);
        }

        //header("location: ../dashboard/index.php");
    } else {
        //echo "<h1> Login failed. Invalid username or password.</h1>";

        $_SESSION['validate'] = "unsuccessful";
        header("location: ../index.php");
    }
}
