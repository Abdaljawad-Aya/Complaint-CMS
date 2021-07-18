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
    
    else{ ?>
<div class="card-body" >
<section id="container">
    <section id="main-content">
        <section class="wrapper site min height">
            <h3><i class="fa fa-angle-right"></i> Your Complaint History </h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-label">
                        <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>Complaint Number</th>
                                        <th>Reg Date</th>
                                        <th>Last Updation Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $query = mysqli_query($con , "SELECT * FROM tblcomplaints WHERE userId = '".$_SESSION['id']."'");
                                        while($row = mysqli_fetch_array($query)){?>

                                    <tr>
                                        <td align="center"><?php echo htmlentities($row['complaintNumber']);?></td>
                                        <td align="center"><?php echo htmlentities($row['regDate']);?></td>
                                        <td align="center"><?php echo htmlentities($row['lastUpdationDate']);?></td>
                                    
                                
                                <td align="center"><?php 
                                        $status=$row['status'];
                                        if($status=="" or $status=="NULL")
                                        { ?>
                                    <button type="button" class="btn btn-light">
                                        Not Process Yet</button>
                                    <?php }
                                        if($status=="in process"){ ?>
                                    <button type="button" class="btn btn-warning">
                                        In Process</button>
                                    <?php }
                                        if($status=="closed") {
                                        ?>
                                    <button type="button" class="btn btn-success">
                                        Closed</button>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                  <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">
                                  <button type="button" class="btn btn-primary">View Details</button>
                                  </a>
                                </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>

</div>
<?php include('includes/scripts.php');?>

<?php } ?>