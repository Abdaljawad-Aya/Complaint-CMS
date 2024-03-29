  <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="change-password.php">
           <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-laugh-wink"></i>
           </div>
           <div class="sidebar-brand-text mx-3">Complaints <sup>WEB IT</sup></div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
           <a class="nav-link" href="index.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           Interface
       </div>

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
               aria-controls="collapseTwo">
               <i class="fas fa-fw fa-cog"></i>
               <span>Components</span>
           </a>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Manage Complaints:</h6>
                     <?php include("database/dbconfig.php")?>
                   <a class="collapse-item" href="notprocess-complaint.php">
                       <i class="icon-tasks"></i>
                       Not Process Yet
                       <?php
                            $rt = "SELECT * FROM tblcomplaints WHERE
                             status is null";
                             $result = mysqli_query($con , $rt) or (mysqli_error($rt));
                            $num1 = mysqli_num_rows($result);
                            {?>
		
                            <b class="label orange pull-right">
                            <?php echo htmlentities($num1); ?></b>
                            <?php } ?>
                   </a>

                   <a class="collapse-item" href="inprocess-complaints.php">
                       <i class="icon-tasks"></i>
                       Pending Complaint
                       <?php 
                            $status = "in Process";
                            $rt = mysqli_query($con, 
                            "SELECT * FROM tblcomplaints 
                            WHERE status='$status'");
                            $num1 = mysqli_num_rows($rt);
                             {?>
                            <b class="label orange pull-right">
                           <?php echo htmlentities($num1); ?></b>


                            <?php } ?>
                   </a>

                   <a class="collapse-item" href="closed-complaint.php">
                       <i class="icon-tasks"></i>
                       Closed Complaints
                       <?php 
                        
                        $status="closed";                   
                        $rt = mysqli_query($con, "SELECT * FROM tblcomplaints WHERE status='$status'");
                        $num1 = mysqli_num_rows($rt); {?>
                        <b class="label green pull-right">
                        <?php echo htmlentities($num1); ?></b>
                          <?php } ?>
                   </a>

                   <a class="collapse-item" href="manage-users.php">
                       <i class="icon-tasks"></i>
                       Manage Users
                   </a>
                   <a class="collapse-item" href="user-logs.php">
                       <i class="icon-tasks"></i>
                       User Login Log
                   </a>
                   <!-- <a href="logout.php">
					<i class="menu-icon icon-signout"></i>
					Logout
				</a> -->

               </div>
           </div>
       </li>

       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
               <i class="fas fa-fw fa-wrench"></i>
               <span>Manage Categories</span>
           </a>
           <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
               data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Categories:</h6>
                   <a class="collapse-item" href="category.php">Add Category</a>
                   <a class="collapse-item" href="sub-category.php">Add Sub Category</a>
                   <a class="collapse-item" href="state.php">Add State</a>
               </div>
           </div>
       </li>



       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           Addons
       </div>

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
               <i class="fas fa-fw fa-folder"></i>
               <span>Pages</span>
           </a>
           <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Login Screens:</h6>
             
                   <a class="collapse-item" href="change-password.php">Change Password</a>
                   <a class="collapse-item" href="logout.php">Logout</a>
                   <!-- <div class="collapse-divider"></div> -->
                 
               </div>
           </div>
       </li>

       <!-- Nav Item - Tables -->
       <li class="nav-item">
           <a class="nav-link" href="tables.html">
               <i class="fas fa-fw fa-table"></i>
               <span>Tables</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

   </ul>
   <!-- End of Sidebar -->

   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

           <!-- Topbar -->
           <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

               <!-- Sidebar Toggle (Topbar) -->
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                   <i class="fa fa-bars"></i>
               </button>

               <!-- Topbar Search -->
               <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                   <div class="input-group">
                       <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                           aria-label="Search" aria-describedby="basic-addon2">
                       <div class="input-group-append">
                           <button class="btn btn-primary" type="button">
                               <i class="fas fa-search fa-sm"></i>
                           </button>
                       </div>
                   </div>
               </form>


               <!-- Topbar Navbar -->
               <ul class="navbar-nav ml-auto">

                   <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                   <li class="nav-item dropdown no-arrow d-sm-none">
                       <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-search fa-fw"></i>
                       </a>
                       <!-- Dropdown - Messages -->
                       <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                           aria-labelledby="searchDropdown">
                           <form class="form-inline mr-auto w-100 navbar-search">
                               <div class="input-group">
                                   <input type="text" class="form-control bg-light border-0 small"
                                       placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                   <div class="input-group-append">
                                       <button class="btn btn-primary" type="button">
                                           <i class="fas fa-search fa-sm"></i>
                                       </button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </li>

                   <!-- Nav Item - Alerts -->
                   

                   <!-- Nav Item - Messages -->
                  

                   <div class="topbar-divider d-none d-sm-block"></div>

                   <!-- Nav Item - User Information -->
                   <li class="nav-item dropdown no-arrow">
                       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                               ADMIN

                           </span>
                           <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                       </a>
                       <!-- Dropdown - User Information -->
                       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                           aria-labelledby="userDropdown">
                           <!-- <a class="dropdown-item" href="#">
                               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                               Profile
                           </a>
                           <a class="dropdown-item" href="#">
                               <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                               Settings
                           </a>
                           <a class="dropdown-item" href="#">
                               <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                               Activity Log
                           </a> -->
                           <!-- <div class="dropdown-divider"></div> -->
                           <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                               Logout
                           </a>
                       </div>
                   </li>

               </ul>

           </nav>
           <!-- End of Topbar -->


           <!-- Scroll to Top Button-->
           <a class="scroll-to-top rounded" href="#page-top">
               <i class="fas fa-angle-up"></i>
           </a>


           <!-- Logout Modal-->
           <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                           </button>
                       </div>
                       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                       <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                           <form action="logout.php" method="POST">

                               <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                           </form>


                       </div>
                   </div>
               </div>
           </div>