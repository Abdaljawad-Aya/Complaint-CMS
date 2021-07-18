<?php
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Amman');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

echo "<div class='card-body' style='color:blue'>";
echo $currentTime;
echo "</div>";
if(isset($_POST['submit']))
{
        $category   = $_POST['category'];
        $description= $_POST['description'];
        $id         = intval($_GET['id']);
        $sql        = mysqli_query($con, "UPDATE category SET categoryName='$category',categoryDescription='$description',updationDate='$currentTime' WHERE id='$id'");
        $_SESSION['msg']="Category Updated !!";

}
?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span9">
                <div class="content">
                    <div class="module">
                        <div class="module-head">
                            <h3>Edit Category</h3>
                        </div>
                        <div class="module-body">
                            <?php if(isset($_POST['submit'])) 
                            
                            {?>
                            <div class="alert alert-success">
                                <button class="close" data-dismiss="alert"> x </button>
                                <strong>Well done!</strong>
                                <?php echo htmlentities($_SESSION['msg']);?>
                                <?php echo htmlentities($_SESSION['msg'] = "");?>
                            </div>
                            <?php } ?>

                                <br />
                                
                                <form name="Category" class="form-horizontal row-fluid user" method="post" required>
                                <?php 
                                $id    = intval($_GET['id']);
                                $query = mysqli_query($con,"SELECT * FROM 
                                category WHERE id='$id'");
                                while($row=mysqli_fetch_array($query))
                               {
                                   ?> 
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="basicinput" class="control-label">Category Name</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Category Name" name="category" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicinput" class="control-label">Description</label>
                                        <div class="controls">
                                            <textarea name="description" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <?php
                               }
                               ?>
                                    <div class="form-group">
                                        <div class="controls">
                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
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
    </div>
</div>

<?php } ?>