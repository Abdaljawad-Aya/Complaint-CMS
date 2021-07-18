<?php 
 session_start();
 error_reporting(0);
//  include("includes/header.php");
 include("database/dbconfig.php");


 if(isset($_POST['submit']))
 {
   $fullname = $_POST['fullname'];
   $email    = $_POST['email'];
   $password = $_POST['password'];
   $contactno= $_POST['contactno'];
   $status = 1;

   $query = mysqli_query($con,
   "INSERT INTO 
   users(fullName,userEmail,password,
   contactNo,status) VALUES
   ('$fullname','$email','$password',
   '$contactno','$status')");

   $msg = "Registration successfull. Now You can login !";
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USER SIDE</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">


    <script>
    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
</head>

    <div class="card-body">
        <div id="login-page">
            <div class="container">
                <form method="post" class="form-login">
                    <h2 class="form-login-heading">User Registration</h2>
                    <p style="padding-left:1%; color:green font-weight:bold;">
                        <?php if($msg)
                { echo htmlentities($msg); }?>
                    </p>

                    <div class="login-wrap">
                        <input type="text" name="fullname" required="required" placeholder="Full Name"
                            class="form-control" autofocus>
                        <br>
                        <input type="email" placeholder="Email" class="form-control" id="email"
                            onBlur="userAvailability()" name="email" required="required">
                        <span id="user-availability-status1" style="font-size:12px; font-weight: bold;"></span>
                        <br>

                        <input type="password" class="form-control" placeholder="Password" required="required"
                            name="password"><br>
                        <input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact no"
                            required="required" autofocus>
                        <br>

                        <button type="submit" name="submit" id="submit" class="btn btn-theme btn-block"><i
                                class="fa fa-user"></i>Register</button>

                        <hr>

                        <div class="registration">
                            Already Registered <br />
                            <a class="" href="index.php">
                                Sign in
                            </a>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>



    <?php 

?>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<!-- <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
<script>
$.backstretch("assets/img/login-bg.jpg", {speed: 500});
</script> -->
