<?php 
  session_start();
  error_reporting(0);
//   include("includes/header.php") ;
  include("database/dbconfig.php");

 if(isset($_POST['submit']))
 {
     $ret = mysqli_query($con , "SELECT * FROM users WHERE userEmail='".$_POST['username']."' AND password ='".md5($_POST['password'])."' ");
     $num = mysqli_fetch_array($ret);
     if($num>0)
     {
        $extra="change-password.php";//
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['id']    = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uip  = $_SERVER['REMOTE_ADDR'];
        $status=1;
        $log = mysqli_query($con, 
        "INSERT INTO userlog
        (uid,username,userip,status) VALUES
        ('".$_SESSION['id']."',
        '".$_SESSION['login']."',
        '$uip','$status')");
        $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
     }
     else
     {
        $_SESSION['login']=$_POST['username'];	
        $uip=$_SERVER['REMOTE_ADDR'];
        $status=0;
        mysqli_query($con, 
        "INSERT INTO userlog(username,userip,
        status) VALUES('".$_SESSION['login']."'
        ,'$uip','$status')");
        $errormsg = "Invalid username or password";
        $extra = "index.php";
        
     }
  }

  if(isset($_POST['change']))
  {
      $email    = $_POST['email'];
      $contact  = $_POST['contact'];
      $password = md5($_POST['password']);

      $query = mysqli_query($con,
      "SELECT * FROM users WHERE 
      userEmail='$email' AND contactNo = 
      '$contact'");

      $num = mysqli_fetch_array($query);

      if($num>0)
      {
          mysqli_query($con, "UPDATE
           users SET 
          password = '$password' WHERE 
          userEmail = '$email' AND contactNo = 
          '$contact' ");

          $msg = "Password Changed Successfully";
      }
      else 
      {
          $errormsg = "Invalid email id or Contact no";
      }
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
    // login

    function valid() {
        if (document.forgot.password.value != document.forgot.confirmpassword.value) {
            alert("password and Confrim password Field do not match");
            document.forgot.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>


</head>
<div class="card-body">
    <div id="login-page">
        <div class="container">
            <form action="" name="login" class="form-login" method="post">
                <h2 class="form-login-heading"> LOGIN IN </h2>
                <p style="padding-left: 4%; padding-top:2%; color:red">
                <?php if($errormsg){
                    echo htmlentities($errormsg);
                }?>
                </p>


                <p style="padding-left:4%; padding-top:2%;  color:green">
                    <?php if($msg){
                      echo htmlentities($msg);
                 }?>
                </p>
                <div class="login-wrap">
                    <input type="text" class="form-control" name="username" placeholder="Email" required autofocus>

                    <br>

                    <input type="password" class="form-control" name="password" required placeholder="Password">

                    <label class="checkbox">
                        <span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal">
                                Forgot Password?</a>

                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" name="submit" type="submit">
                        <i class="fa fa-lock"></i>
                        SIGN IN
                    </button>
                </div>
                <hr>
                <div  class="registration">
                    Don't have an account yet? <br>
                    <a href="registration.php">
                        Create an account
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <form name="forgot" class="form-login" method="post">
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
            class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>

                    <div class="modal-body">
                        <p>Enter your details below to reset your password.</p>
                        <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control"
                            required><br>
                        <input type="text" name="contact" placeholder="contact No" autocomplete="off"
                            class="form-control" required><br>
                        <input type="password" class="form-control" placeholder="New Password" id="password"
                            name="password" required><br />
                        <input type="password" class="form-control unicase-form-control text-input"
                            placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required>


                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-theme" type="submit" name="change"
                            onclick="return valid();">Submit</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>