<?php


include_once 'connection.php';

unset($_SESSION['login_user']);
unset($_SESSION['userID']);
    


if (isset($_POST['text'])) {



    
    $qrID = $_POST['text'];
    
    $validate = "SELECT *FROM accounts WHERE qrID ='$qrID'";
    $result = mysqli_query($conn, $validate);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        
        $UserID = $row['Userid'];
        $login_username = $row['Username'];
        $role = $row['role'];

        $sql = "INSERT INTO loggedin_history (UserID, Username, login_type)VALUES ('$UserID','$login_username','1')";

        //Check if insertion
        if (mysqli_query($conn, $sql)) {

            if($role == 'user'){
                $_SESSION['login_userID'] = $UserID;
                $_SESSION['login_user'] = $login_username;
                $_SESSION['success'] = "Logined Successfuly!";
                if(isset($_SESSION['login_userID'])) {
                    header("Location: ../user-dashboard/index.php");
                }
                
            } elseif($role = 'admin'){
                $_SESSION['login_adminID'] = $UserID;
                $_SESSION['login_user'] = $login_username;
                $_SESSION['success'] = "Logined Successfuly!";
                if(isset($_SESSION['login_adminID'])){
                    header("Location: ../admin-dashboard/index.php");
                }
                
            }
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    } else {
        //echo "<h1> Login failed. Invalid username or password.</h1>";
        $_SESSION['validate'] = "unsuccessful";
        header("location: ../qrLogin.php");
    }
}



