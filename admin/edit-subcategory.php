<?php
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');

if(strlen($_SESSION['alogin']) ==0 )
{	
header('location:index.php');
}

else{
date_default_timezone_set('Asia/Amman');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
$category=$_POST['category'];
$subcat  =$_POST['subcategory'];
$id      =intval($_GET['id']);

$sql = mysqli_query($con, "UPDATE 
subcategory SET categoryid='$category'
,subcategory='$subcat',
updationDate='$currentTime' WHERE id='$id'");

$_SESSION['msg']="Sub Category Updated !!";
}
?>
<div class="wrapper">
<div class="container">
<div class="row">
<div class="content">
<div class="module">
<div class="module-head">
<h3>Edit SubCategory</h3>
</div>
<div class="module-body">
<!-- notification -->
<?php if(isset($_POST['submit']))
{?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert"> x </button>
<strong>Well done!</strong>
<?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
<?php
}?>  
<form name="Category" class="form-horizontal row-fluid user" method="post" required>
<?php 
$id    = intval($_GET['id']);
$query = mysqli_query($con,"SELECT 
category.id,
category.categoryName, subcategory.subcategory 
FROM subcategory JOIN 
category ON category.id = subcategory.categoryid 
WHERE subcategory.id='$id'");

while($row=mysqli_fetch_array($query))
{
?>

<div class="card-body">
<div class="form-group">
<label for="basicinput" class="control-label">
    Category</label>
<div class="controls">
<select name="category" 
class="form-control" required>
<option value="
<?php echo htmlentities($row['id']);?>">
<?php echo htmlentities($catname=$row['categoryName']);?>
</option>
<?php $ret = mysqli_query($con, "SELECT * FROM
 category");
while($result = mysqli_fetch_array($ret))
{
$cat=$result['categoryName'];
if($catname=$cat)
{
continue;
}
else{

?>
<option value="<?php echo $result['id'];?>">
<?php echo $result['categoryName'];?></option>
<?php } } ?>
</select>
</div>
</div>

<div class="form-group">
<label for="basicinput" class="control-label">Sub Category Name</label>
<div class="controls">
<input type="text" 
class="form-control" 
placeholder="Enter Category Name" 
name="subcategory" value=
"<?php echo  htmlentities($row['subcategory']);?>">
</div> 
</div>
<?php } ?>
<div class="control-group">
<div class="controls">
<button type="submit" name="submit" class="btn btn-primary">
Update
</button>
</div>  
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include('includes/scripts.php');?>
<?php include('includes/footer.php');?>

<?php } ?>