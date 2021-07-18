<?php 
session_start();
include("database/dbconfig.php");
include('includes/header.php');
include('includes/navbar.php'); 
  if(strlen($_SESSION['alogin']) == 0)
  {
      header("location: login.php");
  }
  else 
  {
      date_default_timezone_set('Asia/Amman');
      $currentTime = date('d-m-Y h:m:s A', time());
  
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
                            <h3 class="m-0 font-weight-bold text-primary">Manage Users</h3>
                        </div>
                        <?php if(isset($_GET['del']))
{?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Oh snap!</strong>
                            <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                        </div>
<?php
}
?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> Name</th>
                                            <th>Email </th>
                                            <th>Contact no</th>
                                            <th>Reg. Date </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       <?php $query = mysqli_query($con, "SELECT * FROM users");
                                        $cnt = 1;
                                        while($row = mysqli_fetch_array($query))
                                       {
                                           ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['fullName']);?></td>
                                            <td><?php echo htmlentities($row['userEmail']);?></td>
                                            <td><?php echo htmlentities($row['contactNo']);?></td>
											<td><?php echo htmlentities($row['regDate']);?></td>
                                            
                                            <td>
											<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/compaintsCMS/admin/userprofile.php?uid=<?php echo htmlentities($row['id']);?>');" title="Update order">
                                             
                                              <button type="button" class="btn btn-primary">View <Details></Details></button>
                                              </a></td>
                                            

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

    <script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>


    <?php include('includes/footer.php')?>
    <?php include('includes/scripts.php')?>

    <?php } ?>