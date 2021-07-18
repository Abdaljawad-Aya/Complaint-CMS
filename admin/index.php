<?php
session_start();
error_reporting(0);
include('database/dbconfig.php'); 
include('includes/header.php'); 


if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT *
    FROM admin 
	WHERE username ='$username' AND password ='$password'");

    $num=mysqli_fetch_array($ret);

if($num > 0)
{
	$extra="change-password.php";//
	$_SESSION['alogin']= $_POST['username'];
	$_SESSION['id']    = $num['id'];
	$host = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
exit();
}
else
{
	$_SESSION['errmsg']= "Invalid username or password";
	$extra ="index.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
exit();
 }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Funda of Web IT | Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>


    <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   


    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
 
<div class="container">
    <nav class="justify-content-between navbar navbar-expand-lg bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html">ADMIN | CMS </a>
		 <ul class="navbar-nav  mt-2 mt-lg-0"> 
			<li class="nav-item">
             <a class="nav-link" href="http://localhost/compaintsCMS/">
			  Back to Portal
             </a>
            </li>
		</ul>
    </nav>




    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <form class="login100-form validate-form flex-sb flex-w" method="post">
                    <span class="login100-form-title p-b-51">
                        Login
                    </span>
                    <span style="color:red;">
                        <?php echo htmlentities($_SESSION['errmsg']);?>
                        <?php echo htmlentities($_SESSION['errmsg']="");?>

                    </span>


                    <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input class="input100" type="text" id="inputEmail" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" id="inputPassword" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <!-- <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot?
                            </a>
                        </div>
                    </div> -->

                    <div class="container-login100-form-btn m-t-17 controls clearfix">
                        <button type="submit" class="login100-form-btn" name="submit">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div id="dropDownSelect1"></div> -->
<?php
include('includes/scripts.php');
?>