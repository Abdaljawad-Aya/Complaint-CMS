
<?php
   session_start();
   include('includes/header.php');
   include('includes/navbar.php');
   include('database/dbconfig.php');

   if(strlen($_SESSION['alogin'])==0)
  { 
    header('location:index.php');
  }
  else {
   
   if(isset($_POST['update']))
   {
       $complaintnumber=$_GET['cid'];
       $status         =$_POST['status'];
       $remark         =$_POST['remark'];
       $query = mysqli_query($con,"INSERT INTO complaintremark(complaintNumber,status,remark) VALUES ('$complaintnumber','$status','$remark')");
       $sql   = mysqli_query($con,"UPDATE tblcomplaints SET status='$status' WHERE complaintNumber='$complaintnumber'");

       echo "<script>alert('Complaint details updated successfully')</script>";
   }
?>

<div>
    <form name="updateticket" id="updatecomplaint" method="post">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="table-responsive">
                            <table class="datatable-1 table table-bordered table-striped display" id="dataTable"
                                width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><b>Complaint Number</b></td>
                                    <td><?php echo htmlentities($_GET['cid']);?></td>
                                </tr>
                                <tr height="50">
                                    <td><b>Status</b></td>
                                    <td><select name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="in process">In Process</option>
                                        <option value="closed">Closed</option>
                                    </select></td>
                                </tr>

                                <tr height="50">
                                    <td><b>Remark</b></td>
                                    <td><textarea name="remark"  cols="50" rows="10" required></textarea></td>
                                </tr>

                                <tr height="50">
                                    <td>&nbsp;</td>
                                    <td><input class="btn btn-primary" type="submit" name="update" value="Submit" /></td>
                                </tr>

                                <tr><td colspan="2">&nbsp;</td></tr>
                                
                                <tr>
                                    <td></td>
                                       <td>
                                           <input type="submit" name="Submit2" class="txtbox4" value="Close this window" onClick="return f2();" style="cursor: pointer;" />
                                       </td>
                                </tr>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>

<?php include('includes/scripts.php') ?>


<?php } ?>