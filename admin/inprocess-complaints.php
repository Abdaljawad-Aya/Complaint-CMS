<?php 

session_start();
include('includes/header.php');
include('includes/navbar.php'); 
include("database/dbconfig.php");
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Amman');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">






                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pending Complaints</h6>
                        </div>
                        <?php if(isset($_GET['del']))
                        {?>
                        <div class="alert alert-error">
                            <button type="button" class="close" date-dismiss="alret">x</button>
                            <strong>Oh snap!</strong>
                            <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                        </div>
                        <?php
                             }
                            ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable-1 table table-bordered table-striped display" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Complaint No</th>
											<th>Complainant Name</th>
											<th>Reg Date</th>
											<th>Status</th>
											<th>Action</th>
											
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                         $st = 'in process';
                                         $query=mysqli_query($con,"select 
                                         tblcomplaints.*,users.fullName as 
                                         name from tblcomplaints join users on 
                                         users.id=tblcomplaints.userId where
                                          tblcomplaints.status='$st'");
                                            // $result = mysqli_query($con, $query) or die(mysqli_error($con));
                                            while($row = mysqli_fetch_array($query))
                                        
                                        {
                                            ?>
                                            	<tr>
											      <td><?php echo htmlentities($row['complaintNumber']);?></td>
											      <td><?php echo htmlentities($row['name']);?></td>
											      <td><?php echo htmlentities($row['regDate']);?></td>
											      <td><button type="button" class="btn btn-warning">In Process</button></td>
											      <td><a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">View Details</a></td>
                                            </tr>

										<?php 
                                     } 
                                     ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <?php include('includes/scripts.php'); ?>
    <?php include('includes/footer.php'); ?>

<?php } ?>