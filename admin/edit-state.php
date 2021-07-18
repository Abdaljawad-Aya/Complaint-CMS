<?php
 session_start();
 include('includes/header.php');
 include('includes/navbar.php');
 include('database/dbconfig.php');

 if(strlen($_SESSION['alogin']) == 0)
 {
     header ('location:index.php');
 }
 else {
     date_default_timezone_set('Asia/Amman');
     $currentTime = date('d-m-Y h:i:s A', time());

     if(isset($_POST['submit']))
     {
         $state = $_POST['state'];
         $description = $_POST['description'];
         $id    = intval($_GET['id']);
         $sql   = mysqli_query($con , "UPDATE state SET stateName = '$state', stateDescription = '$description', updationDate = '$currentTime' WHERE id = '$id'");
         $_SESSION['msg'] = "State info Updated !!";
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
                            <?php if(isset($_POST['submit'])) {?>
                            <div class="alert alert-success">
                                <button class="close" type="button" data-dismiss="alert">x</button>
                                <strong>Well done!</strong>
                                <?php echo htmlentities($_SESSION['msg']);?>
                                <?php echo htmlentities($_SESSION['msg'] = "");?>
                            </div>
                            <?php } ?>

                            <br />

                            <form name="Category" method="post" class="form-horizontal row-fluid">
                                <?php 
                                    $id = intval($_GET['id']);
                                    $query = mysqli_query($con, "SELECT * FROM state WHERE id = '$id'");
                                    while($row = mysqli_fetch_array($query))
                                    {
                                ?>

                                <div class="form-group">
                                    <label for="basicinput" class="control-label">State Name</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Enter Category Name" name="state"
                                            class="form-control" value="<?php echo htmlentities($row['stateName']);?>"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="basicinput">Description</label>
                                    <div class="controls">
                                        <textarea class="form-control" name="description" rows="5">
                                        <?php echo 
                                        htmlentities($row['stateDescription']);?>
                                        </textarea>
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="form-group">
                                    <div class="controls">
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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

<?php include('includes/scripts.php'); ?>
<?php } ?>