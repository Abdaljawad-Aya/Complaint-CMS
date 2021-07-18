<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location: index.php');
}
else{

?>

<div style="margin-left:20px;">
 <form name="updateticket"  id="updateticket" method="post">
 <div class="card-body">
 
 <div class="table-responsive">
   <table class="datatable-1 table table-bordered table-striped display" id="dataTable" width="100%" border="0" cellspacing="0" cellpadding="0">
     <?php 
       
       $usrprof = "SELECT * FROM users WHERE id = '".$_GET['uid']."'";
       $result  = mysqli_query($con , $usrprof) or die( mysqli_error($con));
       while($row = mysqli_fetch_array($result))
       {?>
     
        <tr>
           <td colspan="2"><b><?php echo $row['fullName'];?>'s profile</b></td>
        </tr>
        
        <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
        </tr>
        <tr>
           <td><b> Reg Date:</b></td>
           <td><?php echo htmlentities($row['regDate']);?></td>
        </tr>
        <tr>
          <td><b>User Email:</b></td>
          <td><?php echo htmlentities($row['userEmail']);?></td>
        </tr>

        <tr>
          <td><b>User Contact No:</b></td>
          <td><?php echo htmlentities($row['contactNo']);?></td>
        </tr>

    <tr height="50">
      <td><b>Address:</b></td>
      <td><?php echo htmlentities($row['address']); ?></td>
    </tr>



    <tr height="50">
      <td><b>State:</b></td>
      <td><?php echo htmlentities($row['State']); ?></td>
    </tr>


    <tr height="50">
      <td><b>Country:</b></td>
      <td><?php echo htmlentities($row['country']); ?></td>
    </tr>


    <tr height="50">
      <td><b>Pincode:</b></td>
      <td><?php echo htmlentities($row['pincode']); ?></td>
    </tr>  


    <tr height="50">
      <td><b>Last Updation:</b></td>
      <td><?php echo htmlentities($row['updationDate']); ?></td>
    </tr>

    <tr height="50">
      <td><b>Status:</b></td>
      <td><?php if($row['status'] ==1)
      {
          echo "Active";
      }else {
          echo "Block";
      }
      ?></td>
    </tr>

    <tr>
      <td colspan="2">   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>

    <?php 
       }
       ?>
   </table>
   </div>
   </div>
 </form>
</div> 


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>
<?php 
 }
?>
