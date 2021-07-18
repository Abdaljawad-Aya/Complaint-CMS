<?php
    session_start();
    error_reporting(0);
    include('database/dbconfig.php');
    include('includes/header.php');
    include('includes/navbar.php');
if(strlen($_SESSION['login'])==0)
{ 
  header('location:index.php');
}
else
{
    date_default_timezone_set('Asia/Amman');
    $currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
    $fname     =$_POST['fullname'];
    $contactno =$_POST['contactno'];
    $address   =$_POST['address'];
    $state     =$_POST['state'];
    $country   =$_POST['country'];
    $pincode   =$_POST['pincode'];
   
    $query=mysqli_query($con, "UPDATE users SET 
        fullName='$fname',contactNo='$contactno',
        address='$address',State='$state',
        country='$country',pincode='$pincode' 
        WHERE userEmail='".$_SESSION['login']."'");
if($query)
 {
  $successmsg="Profile Successfully updated !!";
 }
else
 {
  $errormsg="Profile not updated !!";
 }
}
?>

<section id="container">
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Profile info</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel" style="padding-left:25%">
                        <div class="card-body">


                        <?php if($successmsg) {?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Well done!</b> <?php echo htmlentities($successmsg);?>
                        </div>
                        <?php }?>

                        <?php if($errormsg) {?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Oh snap!</b> </b>
                            <?php echo htmlentities($errormsg);?>
                        </div>
                        <?php }?>
                        <?php $query = mysqli_query($con, "SELECT * FROM users WHERE userEmail='".$_SESSION['login']."'");
                               while($row = mysqli_fetch_array($query)){
                                    ?>

                        <h4 class="mb"><i class="fa fa-user">
                            </i>&nbsp;&nbsp;
                            <?php echo htmlentities($row['fullName']);?>'s Profile</h4>
                        <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>
                        <form class="form-horizontal style-form" method="post" name="profile">
                            <div class="form-group">
                                <label class="col-md-2 col-md-2 control-label"> Full Name </label>
                                <div class="col-lg-8">
                                    <input type="text" name="fullname" required="required"
                                        value="<?php echo htmlentities($row['fullName']);?>" class="form-control">
                                </div>
                                <label class="col-md-2 col-md-2 control-label"> User Email </label>
                                <div class="col-lg-8">
                                    <input type="email" name="useremail" required="required" 
                                    value="<?php echo htmlentities($row['userEmail']);?>" class="form-control"
                                        readonly>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 col-md-2 control-label">Contact</label>
                                <div class="col-lg-8">
                                    <input type="text" name="contactno" required="required"
                                        value="<?php echo htmlentities($row['contactNo']);?>" class="form-control">
                                </div>
                                <label class="col-md-2 col-md-2 control-label">Address </label>
                                <div class="col-lg-8">
                                    <textarea name="address" required="required"
                                        class="form-control"><?php echo htmlentities($row['address']);?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 col-md-2 control-label">State</label>
                                <div class="col-lg-8">
                                    <select name="state" required="required" class="form-control">
                                        <option value="<?php echo htmlentities($row['State']);?>">
                                            <?php echo htmlentities($st=$row['State']);?>
                                        </option>
                                        <?php $sql = mysqli_query($con, "SELECT stateName 
                                            FROM state ");
                                            while ($rw = mysqli_fetch_array($sql)) {
                                            if($rw['stateName'] == $st)
                                             {
                                              continue;
                                             }
                                            else
                                             {
                                            ?>
                                        <option value="<?php echo htmlentities($rw['stateName']);?>">
                                            <?php echo htmlentities($rw['stateName']);?></option>
                                        <?php
                                          }}
                                        ?>

                                    </select>
                                </div>
                                <label class="col-md-2 col-md-2 control-label">Country </label>
                                <div class="col-lg-8">
                                    <input type="text" name="country" required="required"
                                        value="<?php echo htmlentities($row['country']);?>" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 col-md-2 control-label">Pincode</label>
                                <div class="col-lg-8">
                                    <input type="text" name="pincode" maxlength="6" required="required"
                                        value="<?php echo htmlentities($row['pincode']);?>" class="form-control">
                                </div>
                                <label class="col-md-2 col-md-2 control-label">Reg Date</label>
                                <div class="col-lg-8">
                                    <input type="text" name="regdate" required="required"
                                        value="<?php echo htmlentities($row['regDate']);?>" class="form-control"
                                        readonly>
                                </div>
                            </div>


                            <?php } ?>

                            <div class="form-group">
                                <div class="col-sm-10" style="padding-left:25% ">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </div>
                        </form>
                </div>
            </div>
        </section>
    </section>
</section>
</div>
<?php include("includes/footer.php");?>

<?php } ?>