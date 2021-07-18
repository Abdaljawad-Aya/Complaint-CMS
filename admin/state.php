<?php 
session_start();
include("includes/header.php");
include("includes/navbar.php");
include("database/dbconfig.php");

if(strlen($_SESSION['alogin']) == 0)
{
  header('location: index.php');
}
 else {
  date_default_timezone_set('Asia/Amman');// change according timezone
  $currentTime = date( 'd-m-Y h:i:s A', time () );
  


if(isset($_POST['submit']))
{
  $state = $_POST['state'];
  $description = $_POST['description'];
  $sql = mysqli_query($con,
   "INSERT INTO state 
   (stateName, stateDescription) 
   VALUES ('$state','$description')");
  $_SESSION['msg'] = 
  "State added Successfully";
}

if(isset($_GET['del']))
{
    mysqli_query($con, 
    "DELETE FROM state WHERE 
    id ='".$_GET['id']."'");
    $_SESSION['delmsg'] = "State deleted !!";
}
?>

<div class="wrapper">
<div class="container">
<div class="row">
<div class="span9">
<div class="content">
<div class="module">
<div class="module-head">
<h3>State</h3>
</div>
<div class="module-body">
<?php if(isset($_POST['submit']))
{?>
<div class="alert alert-success">
<button type="button" data-dismiss="alert" class="close">x</button>
<strong>Well done!</strong>
<?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
<?php 
} 
?>


<?php if(isset($_GET['del']))
{?>
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>Oh snap!</strong>
<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
<?php } ?>

<br />

<form name="Category" class="form-horizontal row-fluid user" method="post" required>
<div class="card-body">

<div class="form-group">
<label for="basicinput"
 class="control-label">State Name</label>
<div class="controls">
<input type="text" placeholder="Enter State Name" name="state"
class="form-control" required>
</div>
</div>

<div class="form-group">
<label for="basicinput" 
class="control-label">Description</label>
<div class="controls">
<textarea name="description" rows="5" class="form-control"></textarea>
</div>
</div>

<div class="form-group">
<div class="controls">
<button class="btn btn-primary" 
type="submit" name="submit">Create</button>
</div>
</div>
</div>
</form>
</div>
</div>

<div class="module">
<div class="module-head">
<h3>Manage State</h3>
</div>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<div class="container-fluid">
<div class="card shadow mb-4">

<div class="card-body">

<div class="table-responsive">
<table class="datatable-1 table table-bordered table-striped display"
id="dataTable" width="100%" border="0" cellspacing="0"
cellpadding="0">
<thead>
<tr>
<th>#</th>
<th>State</th>
<th>Description</th>
<th>Creation date</th>
<th>Last Updated</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $query=mysqli_query($con ,
 "select * from state");
$cnt = 1;
while($row = mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($row['stateName']);?></td>
<td><?php echo htmlentities($row['stateDescription']);?></td>
<td><?php echo htmlentities($row['postingDate']);?></td>
<td><?php echo htmlentities($row['updationDate']);?></td>

<td><a href="edit-state.php?id=<?php echo $row['id']?>"><i
class="fa fa-edit"></i></a>
<a href="state.php?id=<?php echo $row['id']?>&del=delete"
onClick="return confirm('Are you sure you want to delete?')"><i
class="fa fa-trash"></i></a>
</td>

</tr>
</tbody>
<?php 
$cnt=$cnt+1;
}?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include("includes/scripts.php")?>
<?php include("includes/footer.php")?>

<?php } ?>