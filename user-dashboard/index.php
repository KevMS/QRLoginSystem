<?php

include('../config/connection.php');

if (!empty($_SESSION['login_userID'])) {
    $id = $_SESSION['login_userID'];
    $result = mysqli_query($conn, "SELECT * FROM accounts WHERE Userid = '$id';");
    $row = mysqli_fetch_assoc($result);
    $role_read = mysqli_query($conn, "SELECT * FROM accounts WHERE Userid = '$id'  ;");
    while ($row = mysqli_fetch_assoc($role_read)) {
        $checkrole =  $row['role'];
        if($checkrole == 'admin'){
        header('Location: ../admin-dashboard/index.php');
    }
    }
} else {
    header('Location: ../index.php');
}
$account_read = mysqli_query($conn, "SELECT * FROM accounts WHERE Userid = '$id'  ;");
$user_read = mysqli_query($conn, "SELECT * FROM accounts WHERE Userid = '$id'  ;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");:root{--header-height: 3rem;--nav-width: 68px;--first-color: #4723D9;--first-color-light: #AFA5D9;--white-color: #F7F6FB;--body-font: 'Nunito', sans-serif;--normal-font-size: 1rem;--z-fixed: 100}*,::before,::after{box-sizing: border-box}body{position: relative;margin: var(--header-height) 0 0 0;padding: 0 1rem;font-family: var(--body-font);font-size: var(--normal-font-size);transition: .5s}a{text-decoration: none}.header{width: 100%;height: var(--header-height);position: fixed;top: 0;left: 0;display: flex;align-items: center;justify-content: space-between;padding: 0 1rem;background-color: var(--white-color);z-index: var(--z-fixed);transition: .5s}.header_toggle{color: var(--first-color);font-size: 1.5rem;cursor: pointer}.header_img{width: 35px;height: 35px;display: flex;justify-content: center;border-radius: 50%;overflow: hidden}.header_img img{width: 40px}.l-navbar{position: fixed;top: 0;left: -30%;width: var(--nav-width);height: 100vh;background-color: var(--first-color);padding: .5rem 1rem 0 0;transition: .5s;z-index: var(--z-fixed)}.nav{height: 100%;display: flex;flex-direction: column;justify-content: space-between;overflow: hidden}.nav_logo, .nav_link{display: grid;grid-template-columns: max-content max-content;align-items: center;column-gap: 1rem;padding: .5rem 0 .5rem 1.5rem}.nav_logo{margin-bottom: 2rem}.nav_logo-icon{font-size: 1.25rem;color: var(--white-color)}.nav_logo-name{color: var(--white-color);font-weight: 700}.nav_link{position: relative;color: var(--first-color-light);margin-bottom: 1.5rem;transition: .3s}.nav_link:hover{color: var(--white-color)}.nav_icon{font-size: 1.25rem}.show{left: 0}.body-pd{padding-left: calc(var(--nav-width) + 1rem)}.active{color: var(--white-color)}.active::before{content: '';position: absolute;left: 0;width: 2px;height: 32px;background-color: var(--white-color)}.height-100{height:100vh}@media screen and (min-width: 768px){body{margin: calc(var(--header-height) + 1rem) 0 0 0;padding-left: calc(var(--nav-width) + 2rem)}.header{height: calc(var(--header-height) + 1rem);padding: 0 2rem 0 calc(var(--nav-width) + 2rem)}.header_img{width: 40px;height: 40px}.header_img img{width: 45px}.l-navbar{left: 0;padding: 1rem 1rem 0 0}.show{width: calc(var(--nav-width) + 156px)}.body-pd{padding-left: calc(var(--nav-width) + 188px)}}
        body{
            background-color: #d2d2d2;
        }
        .header{
            
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
    </style>
</head>

<body id="body-pd">
    <!--Header start-->
    <header class="header" id="header">
        <div class="d-flex flex-row bd-highlight ">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="search-container">
                <form action="/action_page.php" >
                <input type="text" placeholder="Search.." name="search">
                <button class="text-light" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="d-flex flex-row bd-highlight">
            <a class="nav-link" href="#">
                    <i class="fa fa-caret-down" aria-hidden="true"></i> 
                    <?php
                        while ($row = mysqli_fetch_assoc($user_read)) {
                            echo $row['Firstname'];
                        }
                    ?>
            </a>
            <div class="header_img"> 
                <img src="../images/Profile-Icon.png" alt=""> 
            </div>
        </div>
    </header>
    <!--Header end-->
    <!--Navbar start-->
    <div class="l-navbar" style="background-color: #164097;" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">InformationSystem</span> </a>
                
                <div class="nav_list"> 
                    <a href="users.php" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span></a> 
                </div>
            </div> <a href="../config/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Navbar start-->
    <!--Container Main start-->
    <div class="main">
        <div class="btn-group mb-2">
            <button type="button" style='width:8rem;' class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Users Menu
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="users-menu/user-details.php">User Details</a></li>
                <li><a class="dropdown-item" href="users-menu/add-user.php">Update yout Info</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="users-menu/qrCodes.php">Your QR code</a></li>
            </ul>
        </div>
        <div class="row">
                        <section class="col-lg-12 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Users Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">
                                                    #
                                                </th>
                                                <th>
                                                    First Name
                                                </th>
                                                <th>
                                                    Last Name
                                                </th>
                                                <th>
                                                    Username
                                                </th>
                                                <th style="width: 30%">
                                                    Email
                                                </th>
                                                <th colspan='2'>
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $query = 'SELECT * FROM accounts where Userid = 1';
                                            // $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                            $count = 1;

                                            while ($row = mysqli_fetch_assoc($account_read)) {

                                                echo '<tr>';
                                                echo '<td><input type="hidden" value="' . $row['Userid'] . '" name="userID" id="userID" > <center>' . $count . '</center> </td>';
                                                echo '<td id="firstname">' . $row['Firstname'] . '</td>';
                                                echo '<td id="lastname">' . $row['Lastname'] . '</td>';
                                                echo '<td id="username">' . $row['Username'] . '</td>';
                                                echo '<td id="email">' . $row['Email'] . '</td>';
                                                echo '<td> ';
                                                echo '<a type="button" class="btn btn-xs btn-success" style="margin-right: 4px;" href="update-useraccount.php?id=' . $row['Userid'] . '"> EDIT </a>';
                                                echo '</tr> ';
                                                $count = $count + 1;
                                            }
                                            ?>
                                        
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </section>
                    </div>
        </div>
    <!--Container Main end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
   // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
        // show navbar
            nav.classList.toggle('show')
        // change icon
            toggle.classList.toggle('bx-x')
        // add padding to body
            bodypd.classList.toggle('body-pd')
        // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
    }
    showNavbar('header-toggle','nav-bar','body-pd','header')
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    // Your code to run since DOM is loaded and ready
    });
</script>
</body>

</html>