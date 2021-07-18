<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:index.php');
}
else{

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Funda of Web IT | Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>


    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- for complaint details -->
    <script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin',
            'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
            600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
    </script>
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span9">
                        <div class="content">




                            <div class="module">
                                <div class="module-head">
                                    <h3>Complaint Details</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered 
table-striped display" width="100%">

                                        <tbody>
                                            <?php 
$st = 'closed';
$query = mysqli_query($con, 
"SELECT tblcomplaints.*,users.fullName AS name, 
category.categoryName AS catname FROM 
tblcomplaints JOIN users ON users.id = tblcomplaints.userId 
JOIN category ON category.id = tblcomplaints.
category
WHERE tblcomplaints.complaintNumber =
'".$_GET['cid']."'");
while($row = mysqli_fetch_array($query))
{
?>

                                            <tr>
                                                <td><b>Complaint Number</b></td>
                                                <td><?php echo htmlentities($row['complaintNumber']);?></td>
                                                <td><b>Complainant Name</b></td>
                                                <td><?php echo htmlentities($row['name']);?> </td>
                                                <td><b>Reg Date</b></td>
                                                <td><?php echo htmlentities($row['regDate']);?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>Category </b></td>
                                                <td><?php echo htmlentities($row['catname']);?> </td>
                                                <td><b>SubCategory</b></td>
                                                <td><?php echo htmlentities($row['subcategory']);?> </td>
                                                <td><b>Complaint Type</b></td>
                                                <td><?php echo htmlentities($row['complaintType']);?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>State </b></td>
                                                <td><?php echo htmlentities($row['state']);?></td>
                                                <td><b>Nature of Complaint</b></td>
                                                <td colspan="3"><?php echo
 htmlentities($row['noc']);?> </td>

                                            </tr>


                                            <tr>
                                                <td><b>Complaint Details </b></td>

                                                <td colspan="5">
                                                    <?php echo htmlentities($row
['complaintDetails']);?></td>

                                            </tr>

                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <?php $cfile = $row['complaintFile'];
if($cfile == "" || $cfile == "NULL")
{
echo "File NA";
}
else {?>

                                                    <a href="complaintdocs/
<?php echo htmlentitites($row
['complaintFile']);?>" ?>View File</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php $ret=mysqli_query($con, "SELECT
 complaintremark.remark AS 
 remark,complaintremark.status AS 
 status,complaintremark.remarkDate AS 
 rdate FROM complaintremark JOIN 
 tblcomplaints ON 
 tblcomplaints.complaintNumber = complaintremark.complaintNumber 
 WHERE complaintremark.complaintNumber='".$_GET['cid']."'");

while($rw=mysqli_fetch_array($ret))
{
?>
                                            <tr>
                                                <td><b>Remark</b></td>
                                                <td colspan="5">
                                                    <?php echo htmlentities($rw['remark']); ?> <b>Remark Date
                                                        <?php echo htmlentities($rw['rdate']); ?></b></td>
                                            </tr>

                                            <tr>
                                                <td><b>Status</b></td>
                                                <td colspan="5"><?php echo 
htmlentities($rw['status']); ?></td>
                                            </tr>
                                            <?php 
}
?>


                                            <tr>
                                                <td><b>Final Status</b></td>

                                                <td colspan="5">
                                                    <?php if($row['status'] == ""){
echo "Not Process Yet";
} else {
echo htmlentities($row['status']);
}?>
                                                </td>

                                            </tr>



                                            <tr>
                                                <td><b>Action</b></td>

                                                <td>
                                                    <?php if($row['status']=="closed"){

} else {?>

                                                    <a href="javascript:void(0);"
                                                        onClick="popUpWindow('http://localhost/compaintsCMS/admin/updatecomplaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');"
                                                        title="Update order">
                                                        <button type="button" class="btn btn-primary"> Take Action
                                                        </button>
                                                </td>
                                                </a><?php } ?></td>

                                                <td colspan="4">
                                                    <a href="javascript:void(0);"
                                                        onClick="popUpWindow('http://localhost/compaintsCMS/admin/userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');"
                                                        title="Update order">
                                                        <button type="button" class="btn btn-primary">View User
                                                            Details</button></a>
                                                </td>
                                            </tr>

                                            <?php  } ?>

                                    </table>

                                </div>
                            </div>



                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->


        <?php include('includes/scripts.php')?>


        <?php } ?>