
<?php
 session_start();
 include("includes/header.php");
 include("includes/navbar.php");
 include("database/dbconfig.php");
 if(strlen($_SESSION['alogin']) == 0)
   {
       header('location : index.php');
   }
   else
   {
?>
 <div class="wrapper">
     <div class="container">
         <div class="row">
             <div class="content">
                 <div class="module">
                     <div class="module-head">
                         <h3>Manage Users</h3>
                     </div>

                     <div class="module-body table">
                     <div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<div class="container-fluid">
<div class="card shadow mb-4">

<div class="card-body">
<div class="table-responsive">
                         <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>User Email</th>
                                     <th>User IP</th>
                                     <th>Login Time</th>
                                     <th>Logout Time</th>
                                     <th>Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $query = mysqli_query($con , "SELECT * FROM userlog");
                                 $cnt = 1;  
                                  while($row = mysqli_fetch_array($query))
                                 { ?>

                                  <tr>
                                    <td><?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($row['username']);?></td>
                                    <td><?php echo htmlentities($row['userip']);?></td>
                                    <td><?php echo htmlentities($row['loginTime']);?></td>
                                    <td><?php echo htmlentities($row['logout']);?></td>
                                    <td><?php $st = $row['status'];
                                      if($st = 1)
                                      {
                                          echo "Successfull";
                                      }
                                      else 
                                      {
                                          echo "Failed";
                                      }
                                    ?></td>

                                    

                                  </tr>
                                 <?php $cnt = $cnt+1; } ?>
                             </tbody>
                         </table>

                     </div>
                     </div>
                     </div>
                     </div>
                     </div>
                     </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

<?php include("includes/scripts.php")?>
<?php include("includes/footer.php")?>
<?php
   }
   ?>
