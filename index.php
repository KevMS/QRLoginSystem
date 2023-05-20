<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
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

<body id="grad">
<div class="container-fluid">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="login-container">
                        <div class="login-card">
                            <!-- <img src="#" class="img-fluid mx-auto d-block" alt="logo" style="width: 90%;"> -->
                            <h4>User Login</h4>
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
                                <p>Don't have an account? <a href="register.php">Create an account</a></p>
                                </div>
                                <div class="text-center">
                                    <hr>
                                    <p>or</p>
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <a class="text-primary"  href="qrLogin.php" role="button" >Qr code Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <script src="vendors/jquery/jquery.slim.min.js"></script>
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/sweetalert/sweetalert.js"></script>
    <script src="vendors/instascan/instascan.min.js"></script>
    <script src="vendors/js/form-validation.js"></script>

    <?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'unsuccessful') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid Username or Password!',
            });
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>



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
