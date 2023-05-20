<?php

include('../config/connection.php');

if (!empty($_SESSION['login_adminID'])) {
    $id = $_SESSION['login_adminID'];
    $result = mysqli_query($conn, "SELECT * FROM accounts WHERE Userid = '$id';");
    $row = mysqli_fetch_assoc($result);
    $role_read = mysqli_query($conn, "SELECT * FROM accounts WHERE Userid = '$id'  ;");
    while ($row = mysqli_fetch_assoc($role_read)) {
        $checkrole =  $row['role'];
        if($checkrole != 'admin'){
        header('Location: ../user-dashboard/index.php');
    }
    }
} else {
    header('Location: ../index.php');
}
$account_read = mysqli_query($conn, "SELECT * FROM accounts WHERE Userid = '$id'  ;");
$user_read = mysqli_query($conn, "SELECT * FROM accounts WHERE Userid = '$id'  ;");

// Get user details            
$id = $_GET['id'];
        
$sql = "SELECT * FROM accounts WHERE Userid='$id';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['Firstname'];
    $lastname = $row['Lastname'];
    $username = $row['Username'];
    $email = $row['Email'];
    $role = $row['role'];
    $qrID = $row['qrID'];
} else {
    echo "User not found.";
}
?>
<!DOCTYPE html>
<html lang="en">
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
                    <?php include('../config/loggedin_user.php'); ?>
            </a>
            <div class="header_img"> 
                <img src="../images/Profile-Icon.png" alt=""> 
            </div>
        </div>
    </header>
    <div class="l-navbar" style="background-color: #164097;" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">InformationSystem</span> </a>
                
                <div class="nav_list"> 
                    <a href="index.php" class="nav_link active"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                </div>
            </div> <a href="../config/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="main">
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
                <li><a class="dropdown-item" href="index.php">User Details</a></li>
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
                  <h3 class="card-title"><strong><?php echo $firstname; ?>'s</strong> Details.</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form class="needs-validation" method="post" action="../config/update-user.php" novalidate>
                  <div class="card-body">
                    <div class="row">
                        <!-- hidden id -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="qrID" value="<?php echo $qrID; ?>">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Firstname</label>
                          <input type="text" class="input form-control" name="firstname" aria-label="Firstname" aria-describedby="basic-addon1" value="<?php echo $firstname; ?>" />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Lastname</label>
                          <input type="text" class="input form-control" name="lastname" aria-label="Lastname" aria-describedby="basic-addon1" value="<?php echo $lastname; ?>" />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Username</label>
                          <input type="text" class="input form-control" name="username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $username; ?>" />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="input form-control" name="email" aria-label="Email" aria-describedby="basic-addon1" value="<?php echo $email; ?>" />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Role</label>
                          <input type="text" class="input form-control" name="role" aria-label="Role" aria-describedby="basic-addon1" value="<?php echo $role; ?>" />
                        </div>
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->

                    

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button class="btn btn-primary w-20" id="start_button" name="submit" type="submit" >Update</button>
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
<?php
if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
?>
    <script>
        Swal.fire({
            title: '<strong><?php echo $_SESSION['success']; ?></strong>',
            icon: 'success',
        });
    </script>
    <?php
        unset($_SESSION['success']);
        unset($_SESSION['userID']);
    }
    ?>
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

});
</script>
<!-- Search function -->
<script type="text/javascript">
function do_search()
{
 var search_term=$("#search_term").val();
 $.ajax
 ({
  type:'post',
  url:'../config/search.php',
  data:{
   search:"search",
   search_term:search_term
  },
  success:function(response) 
  {
   document.getElementById("result_div").innerHTML=response;
  }
 });
 
 return false;
}
</script>
</body>

</html>