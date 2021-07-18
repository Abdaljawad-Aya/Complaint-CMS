<?php
session_start();
include("includes/header.php");
// include("includes/navbar.php");
// include('security.php');

?>

<body class="bg-gradient-primary">
<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <!-- Start Of Form -->
                            <form class="user" action="code.php" method="POST">
                            <div class="form-group row">
                                    <div class="col-sm">
                                        <input type="text" name="username" class="form-control form-control-user" 
                                            placeholder="Enter Name" required="">
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" 
                                        placeholder="Email Address"  required="">

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                           placeholder="Password">

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirmpassword" class="form-control form-control-user"
                                            placeholder="Repeat Password">                                    
                                    </div>
                                </div>
                                <a href="index.php" name="registerbtn" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a>
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


<?php
// include("includes/footer.php");
include("includes/scripts.php");
?>