<!DOCTYPE html>
<html lang="en">

<?php

include('../../config/connection.php');

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");:root{--header-height: 3rem;--nav-width: 68px;--first-color: #4723D9;--first-color-light: #AFA5D9;--white-color: #F7F6FB;--body-font: 'Nunito', sans-serif;--normal-font-size: 1rem;--z-fixed: 100}*,::before,::after{box-sizing: border-box}body{position: relative;margin: var(--header-height) 0 0 0;padding: 0 1rem;font-family: var(--body-font);font-size: var(--normal-font-size);transition: .5s}a{text-decoration: none}.header{width: 100%;height: var(--header-height);position: fixed;top: 0;left: 0;display: flex;align-items: center;justify-content: space-between;padding: 0 1rem;background-color: var(--white-color);z-index: var(--z-fixed);transition: .5s}.header_toggle{color: var(--first-color);font-size: 1.5rem;cursor: pointer}.header_img{width: 35px;height: 35px;display: flex;justify-content: center;border-radius: 50%;overflow: hidden}.header_img img{width: 40px}.l-navbar{position: fixed;top: 0;left: -30%;width: var(--nav-width);height: 100vh;background-color: var(--first-color);padding: .5rem 1rem 0 0;transition: .5s;z-index: var(--z-fixed)}.nav{height: 100%;display: flex;flex-direction: column;justify-content: space-between;overflow: hidden}.nav_logo, .nav_link{display: grid;grid-template-columns: max-content max-content;align-items: center;column-gap: 1rem;padding: .5rem 0 .5rem 1.5rem}.nav_logo{margin-bottom: 2rem}.nav_logo-icon{font-size: 1.25rem;color: var(--white-color)}.nav_logo-name{color: var(--white-color);font-weight: 700}.nav_link{position: relative;color: var(--first-color-light);margin-bottom: 1.5rem;transition: .3s}.nav_link:hover{color: var(--white-color)}.nav_icon{font-size: 1.25rem}.show{left: 0}.body-pd{padding-left: calc(var(--nav-width) + 1rem)}.active{color: var(--white-color)}.active::before{content: '';position: absolute;left: 0;width: 2px;height: 32px;background-color: var(--white-color)}.height-100{height:100vh}@media screen and (min-width: 768px){body{margin: calc(var(--header-height) + 1rem) 0 0 0;padding-left: calc(var(--nav-width) + 2rem)}.header{height: calc(var(--header-height) + 1rem);padding: 0 2rem 0 calc(var(--nav-width) + 2rem)}.header_img{width: 40px;height: 40px}.header_img img{width: 45px}.l-navbar{left: 0;padding: 1rem 1rem 0 0}.show{width: calc(var(--nav-width) + 156px)}.body-pd{padding-left: calc(var(--nav-width) + 188px)}}
        body{
            background-color: #d2d2d2;
        }

        .main{
            margin-top: 5rem;
        }
        .search-container{
            margin-left: 2rem;
            background-color:white;
            border-radius: 10px;
        }
        .search-container button{
            background-color: #164097;
            border-color: transparent;
            

        }
        #result_div
        {
        width:5rem; 
        margin-left:10px;
        }
        #result_div li
        { 
        margin-bottom:20px;
        list-style-type:none;
        }
        #result_div li a
        {
        text-decoration:none;
        display:block;
        text-align:left;
        }
        #result_div li a .title
        {
        font-weight:bold;
        font-size:18px;
        color:#5882FA;
        }
        #result_div li a .desc
        {
        color:#6E6E6E;
        }
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="d-flex flex-row bd-highlight ">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="search-container" id="search-box">
                <form method='post' action="../config/search.php" onsubmit="return do_search();">
                    <input type="text" id="search_term" name="search_term" placeholder="Enter Search" onkeyup="do_search();">
                    <button class="text-light" type="submit" name="search" value="SEARCH">Submit</button>
                </form>
                <div id="result_div"></div>
            </div>
        </div>
        <div class="d-flex flex-row bd-highlight">
            <a class="nav-link" href="#">
                    <i class="fa fa-caret-down" aria-hidden="true"></i> 
                    <!-- The current user logged in is the last ID in the table loggedin_history -->
                    <?php include('../../config/loggedin_user.php'); ?>
            </a>
            <div class="header_img"> 
                <img src="../../images/Profile-Icon.png" alt=""> 
            </div>
        </div>
    </header>
    <div class="l-navbar" style="background-color: #164097;" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">InformationSystem</span> </a>
                
                <div class="nav_list"> 
                    <a href="index.php" class="nav_link active"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                </div>
            </div> <a href="../../config/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="main">
        <!-- Earnings (Monthly) Card Example -->
        <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        //reads the total accounts registered
                                        $acc_total = "SELECT COUNT(*) as total_rows FROM accounts";
                                        $acc_result = mysqli_query($conn, $acc_total);
                                        if ($acc_result) {
                                                $row = mysqli_fetch_assoc($acc_result);
                                                $totalRows = $row['total_rows'];
                                                echo $totalRows;
                                        } ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Updated</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                        //reads the total accounts registered
                                        $update_total = "SELECT COUNT(*) as total_rows FROM update_history";
                                        $update_result = mysqli_query($conn, $update_total);
                                        if ($update_result) {
                                                $row = mysqli_fetch_assoc($update_result);
                                                $totalRows = $row['total_rows'];
                                                echo $totalRows;
                                        } ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-card-checklist"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Deleted</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                        //reads the total accounts registered
                                        $delete_total = "SELECT COUNT(*) as total_rows FROM delete_history";
                                        $delete_result = mysqli_query($conn, $delete_total);
                                        if ($delete_result) {
                                                $row = mysqli_fetch_assoc($delete_result);
                                                $totalRows = $row['total_rows'];
                                                echo $totalRows;
                                        } ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-trash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
        <div class="btn-group mb-2">
            <button type="button" style='width:8rem;' class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Users Menu
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="users-menu/add-user.php">Register a User</a></li>
                <li><a class="dropdown-item" href="../index.php">User Details</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="users-menu/qrCodes.php">QR codes</a></li>
            </ul>
        </div>

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Registration Form</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form class="needs-validation" method="post" action="../../config/insert-dashboard.php" novalidate>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Firstname</label>
                          <input type="text" class="input form-control" name="firstname" aria-label="Firstname" aria-describedby="basic-addon1" required />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Lastname</label>
                          <input type="text" class="input form-control" name="lastname" aria-label="Lastname" aria-describedby="basic-addon1" required />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Username</label>
                          <input type="text" class="input form-control" name="username" aria-label="Username" aria-describedby="basic-addon1" required />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="input form-control" name="email" aria-label="Email" aria-describedby="basic-addon1" required />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Password</label>
                          <div class="input-group mb-2">
                            <input type="password" oninput="confirmValidation()" class="input form-control" name="password" id="password" required="true" aria-label="password" aria-describedby="basic-addon1" required />
                            <div class="input-group-append">
                              <span class="input-group-text" onclick="password_show_hide();">
                                <i class="fa fa-eye" id="show_eye"></i>
                                <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Confirm Password</label>
                          <div class="input-group mb-2">
                            <input type="password" oninput="confirmValidation()" class="input form-control" name="confirm-password" id="confirm-password" required="true" aria-label="confirm-password" aria-describedby="basic-addon1" required />
                            <div class="input-group-append">
                              <span class="input-group-text" onclick="confirm_password_show_hide();">
                                <i class="fa fa-eye" id="show_eye_confirm"></i>
                                <i class="fa fa-eye-slash d-none" id="hide_eye_confirm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button class="btn btn-primary w-20" id="start_button" name="submit" type="submit" disabled>Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
          <!-- /.row -->

</div>
<!--Container Main end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="vendors/jquery/jquery.slim.min.js"></script>
<script src="../../vendors/popper/popper.min.js"></script>
<script src="../../vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="../../vendors/sweetalert/sweetalert.js"></script>
<script src="../../vendors/js/form-validation.js"></script>

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