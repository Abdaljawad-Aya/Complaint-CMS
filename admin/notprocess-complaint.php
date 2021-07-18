<?php 
session_start();
include("database/dbconfig.php");
include('includes/header.php');
include('includes/navbar.php'); 

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
                            <h6 class="m-0 font-weight-bold text-primary">Not Process Yet Complaints</h6>
                        </div>

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
                                           $query = mysqli_query($con, 
                                           "SELECT tblcomplaints.*, users.fullName
                                            AS name FROM tblcomplaints JOIN users
                                             ON users.id = tblcomplaints.userId WHERE
                                              tblcomplaints.status is null");
                                              while($row = mysqli_fetch_array($query))
                                             {                                        
                                         ?>
                                          <tr>
                                              <td><?php echo htmlentities($row['complaintNumber']);?></td>
                                              <td><?php echo htmlentities($row['name']);?></td>
                                              <td><?php echo htmlentities($row['regDate']);?></td>
                                              <td><button type="button" class="btn btn-danger">Not process yet</button></td>
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