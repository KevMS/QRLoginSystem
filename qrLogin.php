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
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">

</head>

<body id="grad">
    <div class="container-fluid">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="login-container">
                        <div class="login-card" >
                                <h3 class="card-title pb-3 fs-4 text-center">QR Login</h4>
                                <form class="row g-3 needs-validation" method="post" action="config/login-qr.php" novalidate>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="input-group mb-2">
                                                <a class="btn btn-block text-light bg-primary" href="index.php" role="button">Back</a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group mb-2">
                                                <div id="scanner-container" style="position: relative;">
                                                    <video id="preview" width="100%"></video>
                                                    <div id="scan-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center;">
                                                        <div class="spinner-border text-primary" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group mb-2">
                                                <input type="text" class="input form-control text-dark" name="text" id="text" readonly placeholder="Place your QR code in the camera" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <p>Don't have an account? <a href="register.php">Create an account</a></p>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    </div>
    <script src="vendors/jquery/jquery.slim.min.js"></script>
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/sweetalert/sweetalert.js"></script>
    <script src="vendors/instascan/instascan.min.js"></script>
    <script src="vendors/js/form-validation.js"></script>
    <?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        Swal.fire({
            title: '<strong>Registration Success!</strong>',
            icon: 'success',
            html: 'Click the link to download your <b>QR Code</b>, ' +
                '<a href="qrcodes-images/<?php echo $_SESSION['status']; ?>.png" download>Download</a>' +
                'or you can also download it on your dashboard',
            imageUrl: 'qrcodes-images/<?php echo $_SESSION['status']; ?>.png',
            imageHeight: 200,
            imageAlt: '<?php echo $_SESSION['status']; ?>'
        });
    </script>
    <?php
        unset($_SESSION['status']);
        unset($_SESSION['userID']);
    }
    ?>

    <?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'unsuccessful') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid input',
            });
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('text').value = c;
            document.forms[0].submit();
        });
    </script>

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
