<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward()
        };
        setTimeout("preventBack()", 0);
        window.onunload - function() {
            null;
        }
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INFORMATION-SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <!-- <img src="#" class="img-fluid mx-auto d-block" alt="logo" style="width: 90%;"> -->
            <h4>Admin Login</h4>
            <form method="post" action="config/login.php">
                <div class="form-group">
                    <input name="username" type="text" value="" class="form-control" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                <input name="password" type="password" value="" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                <input class="btn btn-block text-light" type="submit" name="submit" value="Login" style="background-color: #164097;">
                </div>
                <div class="text-center">
                    <hr>
                    <p>or</p>
                    <hr>
                </div>
                <div class="form-group">
                    <a class="text-primary"  href="index.php" role="button" >Login as User</a>
                </div>
            </form>
        </div>
    </div>
    <script src="vendors/jquery/jquery.slim.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/instascan/instascan.min.js"></script>
    <script src="vendors/js/form-validation.js"></script>

    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
</body>
</html>
