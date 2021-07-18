<?php
session_start();
include("includes/header.php");
// include("includes/navbar.php");
// include('security.php');

?>


<body class="bg-gradient-primary">
<div class="container">
<div class="card-body">
        <?php 
          if(isset($_SESSION['success']) && $_SESSION['success'] != '')
          {
              echo '<h2>'.$_SESSION['success'].'</h2>';
              unset($_SESSION['success']);
          }

          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
          {
              echo '<h2 class="bg-info">'. $_SESSION['status'].'</h2>';
              unset($_SESSION['status']);
          }


        ?>

        </div>
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <!-- Start Of Form -->
                            <form class="user" action="code.php" method="POST">
                        
                             <?php
                              
                             ?>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <input type="text" name="username" class="form-control form-control-user" 
                                            placeholder="Enter Name"
                                            required>
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" 
                                        placeholder="Email Address" required="">

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                           placeholder="Password" required>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirmpassword" class="form-control form-control-user"
                                            placeholder="Repeat Password" required>                                    
                                    </div>
                                </div>
                                <button type="submit" name="registerbtn" class="btn btn-primary btn-user btn-block"> Register Account</button>
                                
      
                                <hr>
                             
                            </form>

                            <!-- End Of Form -->
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>

<!-- <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>  -->

<!-- <div class="container-fluid">
    <div class="card shadow mb-4">
        <h5 class="m-0 font-weight-bold text-primary">Admin profile
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Add Admin Profile 
</button> -->

        <!-- </h5>
    </div> -->

    <!-- <div class="card-body"> -->
        <?php 
          // if(isset($_SESSION['success']) && $_SESSION['success'] != '')
          // {
          //     echo '<h2>' .$_SESSION['success'].'</h2>';
          //     unset($_SESSION['success']);
          // }

          // if(isset($_SESSION['status']) && $_SESSION['status'] !='')
          // {
          //     echo '<h2 class="bg-info">' . $_SESSION['status'].'</h2>';
          //     unset($_SESSION['status']);
          // }
        ?>
        <!-- <div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th> ID </th>
      <th> Username </th>
      <th>Email </th>
      <th>Password</th>
      <th>EDIT </th>
      <th>DELETE </th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td> 1 </td>
      <td> Funda of WEb IT</td>
      <td> funda@example.com</td>
      <td> *** </td>
      <td>
          <form action="" method="post">
              <input type="hidden" name="edit_id" value="">
              <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
          </form>
      </td>
      <td>
          <form action="" method="post">
            <input type="hidden" name="delete_id" value="">
            <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
          </form>
      </td>
    </tr>
  
  </tbody>
</table>

</div>
    </div>
</div> -->

<?php
// include("includes/footer.php");
  include("includes/scripts.php");
?>