<?php
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
if(strlen($_SESSION['alogin']) == 0)
{
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Amman');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
    $sql = mysqli_query($con, "SELECT
    password FROM admin WHERE 
    password='".md5($_POST['password'])."' 
    && username='".$_SESSION['alogin']."'");
    $num = mysqli_fetch_array($sql);

if($num>0)
{
$conn = mysqli_query($con, "UPDATE
admin SET password=
'".md5($_POST['newpassword'])."',
updationDate ='$currentTime'
WHERE username='".$_SESSION['alogin']."'");

$_SESSION['msg']="Password Changed 
Successfully !!";
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<!-- <h1 class="h3 mb-0 text-gray-800">Admin</h1> -->


<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">


</div>

<!-- Content Row -->


<div class="wrapper">
<div class="container">
<div class="justify-content-center">
<div class="col-xl-10 col-lg-12 col-md-9">
<div class="">

<div class="card-body p-0">
<div class="module-head">
<h3>Admin Change Password</h3>
</div>
<div class="module-body">

<?php if(isset($_POST['submit']))
{?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>

</div>
<?php } ?>
<br />

<form class="form-horizontal row-fluid" name="chngpwd" method="post"
onSubmit="return valid();">

<div class="form-group">
<label class="control-label" for="basicinput">Current Password</label>
<div class="controls">
<input type="password" class=" 
form-control" name="password" placeholder="Enter your current Password" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">New Password</label>
<div class="controls">
<input type="password" class=" form-control" name="newpassword"
placeholder="Enter your new current Password" required>

</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Current Password</label>
<div class="controls">
<input type="password" class=" form-control" name="confirmpassword"
placeholder="Enter your new Password again" required>

</div>
</div>
<br>
<div class="control-group">
<div class="controls">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
</div>
</div>



</div>
<!--/.content-->
</div>
<!--/.span9-->
</div>
</div>
<!--/.container-->
</div>
<!--/.wrapper-->







<?php 
include('includes/scripts.php'); 
include('includes/footer.php');
?>

<?php } ?>