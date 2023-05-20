<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EVSU-OCC</title>
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

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/alert.css" rel="stylesheet">

    <!-- endinject -->
    <link rel="shortcut icon" href="images/evsu.png" />


</head>

<body>

    <div class="container-fluid">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center shadow" style="background-color: #900303;">
                        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80%;width: 80%;">
                            <img src="images/evsu-logo.png" class="img-fluid" alt="evsu" style="width: 90%;">
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center shadow bg-white " style="min-height: 450px;">
                        <div class="container">


                            <form class="row g-3 needs-validation" method="post" action="action/verify.php" novalidate>
                                <div class="col-md-12">
                                    <h4 class="card-title pb-1 fs-4 text-center">Login Code</h4>
                                </div>



                                <div class="col-12">
                                    <div class="input-group mb-3 mt-3">
                                        <input type="hidden" class="input form-control" name="count_id" id="code" value="<?php echo $_SESSION['id']; ?>" />
                                        <input type="text" class="input form-control" name="code" id="code" placeholder="Enter OTP Code" required="true" aria-label="password" aria-describedby="basic-addon1" required />
                                       
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary w-100" id="start_button" name="submit" type="submit">Submit</button>
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







<!-- 
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
    </script> -->

</body>

</html>