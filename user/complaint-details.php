<!-- <?php 
session_start();
error_reporting(0);
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');

if(strlen($_SESSION['login']) == 0)
{
header('location:index.php');
}

else {?>

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
</head>

<body class="hold-transition dark-mode layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="card-body">
<section id="container">
<section id="main-content">
<section class="wrapper site-min-height">
<h3><i class="fa fa-angle-right"></i>
 Complaint Details </h3>
<hr />

<?php

$query = mysqli_query($con,
 "SELECT tblcomplaints.*,
 category.categoryName AS catname
  FROM tblcomplaints JOIN category
  ON category.id = tblcomplaints.category
  WHERE userId = '".$_SESSION['id']."' 
  AND complaintNumber = '".$_GET['cid']."'");
while($row = mysqli_fetch_array($query)) {?>
<div class="row mt">
<label class="col-sm-2 col-sm-2 control-label">
<b>Complaint Number : </b></label>

<div class="col-sm-4">
<p> <?php echo 
htmlentities($row['complaintNumber']);?> 
</p>
</div>

<label class="col-sm-2 col-sm-2">
<b>Reg. Date :</b></label>
<div class="col-sm-2">
<p><?php echo htmlentities($row['regDate']);?></p>
</div>
</div>

<div class="row mt">
<label class="col-sm-2 col-sm-2 control-label"><b>Category :</b></label>
<div class="col-sm-4">
<p><?php echo htmlentities($row['catname']);?></p>
</div>

<label class="col-sm-2 col-sm-2 control-label"><b>Sub Category : </b></label>
<div class="col-sm-4">
<p><?php echo htmlentities($row['subcatgeory']);?></p>
</div>
</div>

<div class="row mt">
<label class="col-sm-2 col-sm-2 control-panel"><b>Complaint Type :</b></label>
<div class="col-sm-4">
<p><?php echo htmlentities($row['complaintType']);?></p>
</div>
<label class="col-sm-2 col-sm-2 control-label"><b>State : </b></label>
 <div class="col-sm-4">
   <p><?php echo htmlentities($row['state']);?> </p>
 </div>
</div>


<div class="row mt">
<label class="col-sm-2 col-sm-2 control-label"><b>Nature of Complaint :</b></label>
<div class="col-sm-4">
<p><?php echo htmlentities($row['noc']);?></p>
</div>

<label class="col-sm-2 col-sm-2-control-label"><b>File :</b></label>
<div class="col-sm-4">
<p><?php $cfile = $row['complaintFile'];
if($cfile == "" || $cfile == "NULL")
{
echo htmlentities("File NA");
}
else { ?>
<a href="docs/<?php echo htmlentities($row['complaintFile']);?>">
View File </a>
<?php } ?> 
</p>
</div>
</div>


<div class="row mt">
<label class="col-sm-2 col-sm-2 control-label"><b>Complaint Details</b></label>
<div class="col-sm-10">
<p><?php echo htmlentities($row['complaintDetails']);?></p>
</div>
</div>


<?php $ret = mysqli_query($con , "SELECT complaintremark.remark AS remark,
complaintremark.status AS status, 
complaintremark.remarkDate AS rdate FROM complaintremark JOIN tblcomplaints ON tblcomplaints.complaintNumber = complaintremark.complaintNumber WHERE complaintremark.complaintNumber = '".$_GET['cid']."'");
while($rw = mysqli_fetch_array($ret))
{
?>
<div class="row mt">
<label class="col-sm-2 col-sm-2 control-label"><b>Remark :</b></label>
<div class="col-sm-10">
<?php echo htmlentities($rw['remark']);?>
</div>
</div>

<div class="row mt">
<label class="col-sm-2 col-sm-2 control-label"><b>Status :</b></label>
<div class="col-sm-10">
<?php echo htmlentities($rw['status']);?>
</div>
</div>

<?php } ?>

<div class="row-mt">
<label class="col-sm-2 col-sm-2 control-label"><b>Final Status :</b></label>
<div class="col-sm-4">
<p style="color:red"><?php 
if($row['status'] == "NULL" || $row['status'] == "")
{
echo "Not Process Yet";
} else {
echo htmlentities($row['status']);
}
?></p>
</div>
</div>

<?php } ?>
</section>
</section>
</section>
</div>
<?php include('includes/scripts.php')?>
<?php include('includes/footer.php')?>

<?php } ?> -->