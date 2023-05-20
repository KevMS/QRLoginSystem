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

<body>
    <div class="container-fluid">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="login-container">
                    <div class="login-card">
                            <?php
                                if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                                    $qrname = $_SESSION['qrName'];
                                    $image_name = $_SESSION['status'];
                                    $image_path = 'QR_IMG/' . $image_name . '.png'; // change this to the path of your image folder
                                    // Check if the image file exists
                                    if (file_exists($image_path)) {
                                        // Get the MIME type of the image
                                        $mime = mime_content_type($image_path);
                                        // Output the HTML
                                        echo '<div class="image-card">';
                                        echo '<img src="' . $image_path . '" alt="QR Code">';
                                        echo '<h6 class=" font-weight-bold text-center text-primary">'. $qrname . '</h6>';
                                        echo '<div class="card-footer">';
                                        echo '<a class="btn btn-block text-light" style="background-color: #164097;" href="QR_IMG/' . $image_name . '.png" download>Download QR code</a>';
                                        echo '</div>';
                                        echo '</div>';
                                    }else {
                                            // Display an error message if the image file does not exist
                                            echo 'Image not found.';
                                    }
                                    
                                }
                                ?>
                    <div class="text-center">
                                <hr>
                            </div>
                            <div class="form-group text-center">
                                <a class="btn btn-block text-primary"  href="index.php" role="button">Back to Login</a>
                                <i class='text-center'>or</i>
                                <a class="btn btn-block text-primary"  href="qrLogin.php" role="button">Login with QR</a>
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
    <script src="vendors/instascan/instascan.min.js"></script>
    <script src="js/form-validation.js"></script>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        Swal.fire({
            title: '<strong>Registration Success!</strong>',
            icon: 'success',
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
