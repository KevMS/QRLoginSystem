<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INFORMATION-SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- 
    Fontawesome 
    <link href="vendors/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    -->
    <link rel="stylesheet" href="vendors/fontawesome-free/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <link rel="stylesheet" href="style.css">

</head>

<body id="grad">
    <div class="container-fluid">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="login-container">
                    
                    <div class="login-card ">
                        <div class="container">
                        <form class="row g-3 needs-validation" method="post" action="config/verify-otp.php" novalidate>
                                <div class="col-md-12">
                                    <h4 class="card-title pb-1 fs-4 text-center">OTP Confirmation</h4>
                                </div>

                                <div class="col-12">
                                    <div class="input-group mb-3 mt-3">
                                        <input type="password" class="input form-control" name="code" id="code" placeholder="Enter OTP Code" required="true" aria-label="password" aria-describedby="basic-addon1" required />
                                        <div class="input-group-append">
                                            <span class="input-group-text" onclick="password_show_hide();">
                                                <i class="fa fa-eye" id="show_eye"></i>
                                                <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 mb-2">
                                    <button class="btn btn-primary w-100" id="start_button" name="submit" type="submit">Submit</button>
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><i>We sent you a one-time password via email.</i> </p>
                                </div>

                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="vendors/jquery/jquery.slim.min.js"></script>
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/sweetalert/sweetalert.js"></script>
    <script src="js/form-validation.js"></script>

    <?php
if (isset($_SESSION['success']) != '') {
?>
    <script>
        Swal.fire({
            title: '<strong><?php echo $_SESSION['success']; ?></strong>',
            icon: 'success'
        });
    </script>
    <?php
        unset($_SESSION['success']);
    
    }
    ?>

    <script>
        function password_show_hide() {
            var x = document.getElementById("code");
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

    <?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'unsuccessful') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid OTP code!',
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

</body>

</html>