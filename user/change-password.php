<?php
session_start();
error_reporting(0);
include("includes/header.php") ;
include("includes/navbar.php") ;
include('database/dbconfig.php');

if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Amman');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql = mysqli_query($con, 
"SELECT password FROM users WHERE 
password='".md5($_POST['password'])."' 
&& userEmail='".$_SESSION['login']."'");

$num = mysqli_fetch_array($sql);
if($num>0)
{
$con = mysqli_query($con,
"UPDATE users SET 
password='".md5($_POST['newpassword'])."', 
updationDate='$currentTime' WHERE 
userEmail ='".$_SESSION['login']."'");
$successmsg = "Password Changed Successfully !!";
}
else 
{
$errormsg = "Old Password not match !!";
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

    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.password.value == "") {
            alert("Current Password Field is Empty !!");
            document.chngpwd.password.focus();
            return false;
        } else if (document.chngpwd.newpassword.value == "") {
            alert("New Password Field is Empty !!");
            document.chngpwd.newpassword.focus();
            return false;
        } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>
<section id="containe">
    <section id="main-content">
        <section id="wrapper">

            <div class="row-mt">
                <div class="col-lg-12">
                    <div class="form-panel" style="padding-left:20%">
                        <div class="card-body">
                            <h3 class="mb"><i class="fa fa-angle-right">
                                </i>User Change Password</h4>
                     
                        <?php if($successmsg) {?>
                        <div  class="alert alert-success col-md-7 mr-2 alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Well done!</b>
                            <?php echo htmlentities($successmsg);?>
                        </div>
                        <?php }?>
                         

                        
                        <?php if($errormsg) {?>
                        <div class="alert alert-danger col-md-7 alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Oh snap!</b>
                            <?php echo htmlentities($errormsg);?>
                        </div>
                        <?php } ?>
                        </div>

                        <div class="card-body">
                            <form method="post" name="chngpwd" class="form-horizontal style-form"
                                onSubmit="return valid();">
                                <div class='card-body' style='color:blue'>
                                    <b><?php $currentTime ?></b>
                                </div>

                                <br>

                                <div class="form-group">
                                    <label class="col-sm-4 col-sm-2 form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 
form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="newpassword" required="required"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 form-label">
                                        New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="confirmpassword" required="required"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10" style="padding-left:1% ">

                                        <button type="submit" name="submit" class="btn btn-primary">
                                            Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>

<script>
//custom select box

$(function() {
    $('select.styled').customSelect();
});
</script>
</body>

</html>
<?php include("includes/scripts.php") ?>
<?php include("includes/footer.php") ?>

<?php 
}
?>