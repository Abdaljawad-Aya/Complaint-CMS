<?php 
session_start();
error_reporting(0);
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');
if(strlen($_SESSION['login']) == 0)
{
header('location:index.php');
}
else 
{
if(isset($_POST['submit']))
{
$uid      = $_SESSION['id'];
$category = $_POST['category'];
$subcat   = $_POST['subcategory'];
$complaintype = $_POST['complaintype'];
$state    = $_POST['state'];
$noc      = $_POST['noc'];
$complaintdetails = $_POST['complaintdetails'];
$compfile = $_FILES['compfile']['name'];

move_uploaded_file($_FILES['compfile']['tmp_name'], 
"docs/".$_FILES['compfile']['name']);
$query = mysqli_query($con , "INSERT
INTO tblcomplaints(userId,category,
subcategory,complaintType,state,noc
,complaintDetails,complaintFile) 
VALUES('$uid','$category','$subcat'
,'$complaintype','$state','$noc',
'$complaintdetials','$compfile')");

$sql = mysqli_query($con , 
"SELECT complaintNumber FROM tblcomplaints 
ORDER BY complaintNumber DESC LIMIT 1");
while($row = mysqli_fetch_array($sql))
{
$cmpn = $row['complaintNumber'];
}
$complainno = $cmpn;
echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';
}

?>

<body class="hold-transition dark-mode  layout-fixed layout-navbar-fixed layout-footer-fixed">
<section id="containr">
<section id="main-content">
<section id="wrapper">

<div class="row-mt">
<div class="col-lg-12">
<div class="form-panel" style="padding-left:20%">
<div class="card-body">
<section id="container">
<section id="main-content">
<section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Register Complaint</h3>

<div class="row mt">
<div class="col-lg-12">
<div class="form-panel">

<?php if($successmsg)
{?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert"
aria-hidden="true">&times;</button>
<b>Well done!</b> <?php echo htmlentities($successmsg);?>
</div>
<?php }?>

<?php if($errormsg)
{?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert"
aria-hidden="true">&times;</button>
<b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?>
</div>
<?php }?>

<form method="post" name="complaint"
enctype="multipart/form-data"
class="form-horizontal style-form">
<div class="form-group">
<label
class="col-md-2 col-md-2 control-label">Category</label>
<div class="col-lg-8">
<select name="category" id="category"
class="form-control "
onChange="getCat(this.value);" required="">
<option value="">Select Category</option>
<?php $sql = mysqli_query($con, "SELECT id, categoryName FROM category");
while($rw = mysqli_fetch_array($sql)){?>
<option
value="<?php echo htmlentities($rw['id'])?>">
<?php echo htmlentities($rw['categoryName']);?>
</option>
<?php } ?>
</select>
</div>

<label class="col-md-2 col-md-2 control-label">Sub
Category </label>
<div class="col-lg-8">
<select name="subcategory" id="subcategory"
class="form-control">
<option value="">Select Subcategory</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-md-2 col-md-2 control-label">Complaint
Type</label>
<div class="col-lg-8">
<select name="complaintype" class="form-control"
required="">
<option value="Complaint">Complaint</option>
<option value="General Query">General Query
</option>
</select>
</div>

<label
class="col-md-2 col-md-2 control-label">State</label>
<div class="col-lg-8">
<select name="state" required="required"
class="form-control">
<option value="">Select State</option>
<?php $sql = mysqli_query($con, "SELECT stateName FROM state");
while($rw = mysqli_fetch_array($sql)) { ?>
<option value="<?php echo htmlentities($rw
['stateName']);?>">
<?php echo htmlentities($rw['stateName']);?>
</option>

<?php } ?>
</select>
</div>
</div>

<div class="from-group">
<label class="col-md-3 col-md-3 control-label">Nature of
Complaint</label>
<div class="col-lg-8">
<input type="text" name="noc" class="form-control"
required="required">
</div>
</div>

<div class="form-group">
<label class="col-md-3 col-md-3 control-label">Complaint Details (max 2000 words) </label>
<div class="col-lg-8">
<textarea  name="complaindetails" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
</div>
</div>


<div class="form-group">
<label class="col-md-3 col-md-3 control-label">Complaint Related Doc(if any) </label>
<div class="col-lg-8">
<input type="file" name="compfile" class="form-control" value="">
</div>
</div>


<br>


<div class="form-group">
<div class="col-sm-10" style="padding-left:1% ">
<button type="submit" name="submit"
class="btn btn-primary">Submit</button>
</div>
</div>



</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</section>
</section>
</section>
</section>
</section>

</div>
<script>
//custom select box

$(function(){
$('select.styled').customSelect();
});

</script>
<?php include("includes/scripts.php")?>
<?php include("includes/footer.php")?>
<?php } ?>