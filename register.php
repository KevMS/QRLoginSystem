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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <link rel="stylesheet" href="style.css">

</head>

<body id="grad">
    <div class="container-fluid">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="login-container">
                    
                    <div class="login-card ">
                        
                            <form class="row g-3 needs-validation" method="post" action="config/insert.php" novalidate>
                                <div class="col-md-12">
                                    <h4 class="card-title pb-1 fs-4 text-center">Register</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <input type="text" class="input form-control" name="firstname" placeholder="Firstname" aria-label="Firstname" aria-describedby="basic-addon1" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <input type="text" class="input form-control" name="lastname" placeholder="Lastname" aria-label="Lastname" aria-describedby="basic-addon1" required />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group mb-2">
                                        <input type="text" class="input form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-2">
                                        <input type="email" class="input form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group mb-2">
                                        <input type="password" oninput="confirmValidation()" class="input form-control" name="password" id="password" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" required />
                                        <div class="input-group-append">
                                            <span class="input-group-text" onclick="password_show_hide();">
                                                <i class="fa fa-eye" id="show_eye"></i>
                                                <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group mb-2">
                                        <input type="password" oninput="confirmValidation()" class="input form-control" name="confirm-password" id="confirm-password" placeholder="Confirm Password" required="true" aria-label="confirm-password" aria-describedby="basic-addon1" required />
                                        <div class="input-group-append">
                                            <span class="input-group-text" onclick="confirm_password_show_hide();">
                                                <i class="fa fa-eye" id="show_eye_confirm"></i>
                                                <i class="fa fa-eye-slash d-none" id="hide_eye_confirm"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="agree" id="rememberMe" required>
                                        <label class="form-check-label" for="rememberMe">I agree to all Terms & Conditions</label>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary w-100" id="start_button" name="submit" type="submit" disabled>Submit</button>
                                </div>
                                <div class="col-12 mt-3">
                                    <p>Already have an account? <a href="index.php">Login</a></p>
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

        function confirm_password_show_hide() {
            var x = document.getElementById("confirm-password");
            var show_eye = document.getElementById("show_eye_confirm");
            var hide_eye = document.getElementById("hide_eye_confirm");
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

        function confirmValidation() {
            var pass = document.getElementById("password").value;
            var con_pass = document.getElementById("confirm-password").value;
            if (con_pass != "") {
                if (pass == con_pass && con_pass != "") {
                    const element = document.getElementById("confirm-password");
                    element.className = "input form-control is-valid";
                    document.getElementById("start_button").disabled = false;
                    //PASSWORD MATCHED

                } else {
                    const element = document.getElementById("confirm-password");
                    element.className = "input form-control is-invalid";
                    document.getElementById("start_button").disabled = true;
                    //PASSWORD IS WRONG   
                }
            }
        }
    </script>

</body>

</html>