<?php 
session_start();
error_reporting(0);
include("includes/header.php") ;
include("includes/navbar.php") ;
include('database/dbconfig.php');
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{ ?>


<div class="card-body ">
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <div class="row p-5 ml-5">
                    <div class="col-lg-9 main-chart">
                        <div class="col-md-2 col-sm-2 box0">

                        </div>
                    </div>

                    <div class="col-md-2 col-md-4 box0">
                        <div class="box1">
                            <span style='font-size : 80px;' class="fa fa-newspaper"></span>

                            <?php 

$dash = mysqli_query($con,
 "SELECT * FROM 
tblcomplaints
 WHERE userId='".$_SESSION['id']."' 
AND status is null");
$num1 = mysqli_num_rows($dash);
{?>
                            <h3><?php echo htmlentities($num1);?></h3>
                        </div>
                        <p><?php echo htmlentities($num1);?> Complaints not Process yet</p>
                    </div>
                    <?php }?>

                    <div class="col-md-2 col-md-4  box0">
                        <div class="box1">
                            <span style='font-size : 80px;' class="fa fa-newspaper"></span>
                            <?php 
$status="in Process";                   
$dash = mysqli_query($con, "SELECT * FROM 
tblcomplaints WHERE userId='".$_SESSION['id']."' 
AND  status='$status'");
$num1 = mysqli_num_rows($dash);
{?>
                            <h3><?php echo htmlentities($num1);?></h3>
                        </div>
                        <p><?php echo htmlentities($num1);?> Complaints Status in process</p>
                    </div>
                    <?php } ?>

                    <div class="col-md-2 col-md-4 box0">
                        <div class="box1">
                            <span style='font-size : 80px;' class="fa fa-newspaper"></span>

                            <?php 
$status="closed";                   
$dash = mysqli_query($con, "SELECT * FROM
tblcomplaints WHERE userId='".$_SESSION['id']."'
AND status='$status'");
$num1 = mysqli_num_rows($dash);
{?>
                            <h3><?php echo htmlentities($num1);?></h3>
                        </div>
                        <p><?php echo htmlentities($num1);?> Complaint has been closed</p>
                    </div>

                    <?php } ?>

                </div>
</div>
</div>
</section>
</section>
</section>
</div>
<?php include("includes/scripts.php")?>

<?php } ?>