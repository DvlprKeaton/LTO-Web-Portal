<?php
include("condb.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LTO - Client Dashborad</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="cDashboard.php">
                
                <div class="sidebar-brand-text mx-3">LTO Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="cDashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
    
        
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="ctDashboard.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transaction Record</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="cudDashboard.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Upload Document</span></a>
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
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Application Forms</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/LTO/forms/Requirements.docx" download="Requirements">
                                    New Registration
                                </a>
                                <a class="dropdown-item" href="/LTO/forms/Requirements.docx" download="Requirements">
                                    Renewal
                                </a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                            $id = $_SESSION['logid'];

                            $sql2 = "SELECT * FROM clienttbl WHERE ID = '$id'";
                            $result2 = mysqli_query($cn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);

                            echo $row2['Fullname'];

                            ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
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
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <div class="container-fluid" style = "text-align:center">

                    <!-- Page Heading -->
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaction Record</h1>
                            <hr>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Submitted Applications</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php 

                                include ("condb.php");

                                $id = $_SESSION['logid'];

                                $sql2 = "SELECT * FROM clienttbl WHERE ID = '$id'";
                                $result2 = mysqli_query($cn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);

                                $CID = $row2['ID'];
                                  echo"<thead>
                                  <tr>
                                    <th  width='10%'>Transaction ID</th>
                                    <th>Filename</th>
                                    <th>Submitted Date</th>
                                    <th>Evaluated Date</th>
                                    <th>Approved Date</th>
                                    <th>Type of Applicationss</th>
                                    <th>Transaction Status</th>
                                  </tr>";

                                $sql = "SELECT * FROM documenttbl WHERE CID = '$CID' AND Paid = '0' ORDER BY CID";
                                $result = mysqli_query($cn, $sql);
                                  while($row = mysqli_fetch_assoc($result))
                                  {

                                echo"<tbody>";
                                echo "<form method='POST' action='Payment.php?id=" . $row['DID'] . "'>";
                                echo "<tr>";
                                echo "<input type='hidden' id='ID' name='ID' value='" . $row['DID'] . "'>";
                                echo "<td>" . $row['DID'] . " </td> ";
                                if ($row['Status'] == '0' && $row['Declined'] == '0') {
                                    echo "<td><a href='#' data-toggle='modal' class='open-update'>" . $row['Filename'] . "</a></td> ";

                                }else{
                                    echo "<td>" . $row['Filename'] . "</td> ";

                                }
                                echo "<td>" . $row['SubmittedDate'] . " </td> ";
                                echo "<td>" . $row['EvaluatedDate'] . " </td> ";
                                echo "<td>" . $row['ApprovedDate'] . " </td> ";
                                if ($row['Type'] == 0){
                                     echo "<td>New Registration</td> ";
                                }else{
                                    echo "<td>Renewal</td> ";
                                }
                                if ($row['Status'] == '0' && $row['Declined'] == '0' && $row['Declined'] == '0') {
                                    echo "<td>For Evaluate</td> ";
                                }else if ($row['Status'] == '1' && $row['Approved'] == '0' && $row['Declined'] == '0') {
                                    echo "<td>For Approved</td> ";
                                }else if ($row['Status'] == '1' && $row['Approved'] == '1' && $row['Declined'] == '0') {
                                    if ($row['Payment'] != null) {
                                        echo "<td><button type='submit' class='btn btn-success btn-sm'>For Pay</button>
                                </td>";
                                    }else{
                                         echo "<td>Computing Total Amount of Payment
                                </td>";
                                    }
                                   
                                }else if ($row['Declined'] == '1') {
                                    echo "<td>Declined Due to ". $row['Remarks']."</td>";
                                }
                                echo "</form>";
                                echo "</tr>";
                }
                
                   ?>
               </table>
                            </div>
                        </div>
                    </div>



                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Payment</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php 

                               include ("condb.php");

                                  echo"<thead>
                                  <tr>
                                    <th width='10%'>Transaction ID</th>
                                    <th>Fullname</th>
                                    <th>Payment Amount</th>
                                    <th>Payment Date</th>
                                    <th>OR</th>
                                    <th>CR</th>
                                  </tr>";

                                $id = $_SESSION['logid'];

                                $sql9 = "SELECT * FROM clienttbl WHERE ID = '$id'";
                                $result9 = mysqli_query($cn, $sql9);
                                $row9 = mysqli_fetch_assoc($result9);

                                $CID = $row9['ID'];

                                $sql0 = "SELECT * FROM documenttbl WHERE CID = '$CID' AND Paid = '1' ORDER BY CID";
                                $result0 = mysqli_query($cn, $sql0);
                                  while($row0 = mysqli_fetch_assoc($result0))
                                  {

                                echo"<tbody>";
                                echo "<tr>";
                                echo "<form method='POST' action='subDownload.php?id=" . $row0['DID'] . "'>"; 
                                echo "<input type='hidden' id='ID' name='ID' value='" . $row0['CID'] . "'>";
                                echo "<td>" . $row0['DID'] . " </td> ";
                                echo "<td>" . $row9['Fullname'] . " </td> ";
                                echo "<td>" . $row0['Payment'] . " </td> ";
                                echo "<td>" . $row0['PaymentDate'] . " </td> ";
                                if ($row0['ORC'] != null) {
                                echo '<td><a href="orDownload.php?src='.$row0['ORC'].'&download=true">'.$row0['ORC'].'</a> </td>';

                                }else{
                                    echo "<td>OR is not available </td> ";
                                }

                                if ($row0['CR'] != 0) {
                                echo "<td>CR is Avaiable to Picked up</td> ";
                                }else{
                                    echo "<td>CR is not available </td> ";
                                }
                                echo "</form>";
                                echo "</tr>";
                }
                
                   ?>
               </table>
                            </div>
                        </div>
                    </div>

                     

                    <?php

                    echo" <div class='modal fade' id='addNewRegistration'>
                        <div class='modal-dialog modal-md'>"; 
                          echo " <form method='POST' action='conNew.php?' enctype='multipart/form-data'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h4 class='modal-title'>Register Official Information</h4>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>";

                            echo "<div class='card card-primary'>
                              <div class='card-body'>
                            <div class='row'>";

                             echo '<div class="col-6">
                                  <label for="">Fullname</label>
                                <input type="text" name = "fname" class="form-control" placeholder="Enter Fullname" required>
                              </div>
                              <div class="col-6">
                                  <label for="">Email</label>
                                <input type="email" name = "email" class="form-control" placeholder="Enter Email" required>
                              </div>
                        <div class="col-12">
                                  <label for="">Address</label>
                          <input type="text" name = "address" class="form-control" placeholder="Enter Address" required>
                        </div>

                              <div class="col-6">
                                  <label for="">Birthdate</label>
                                <input type="date" name = "dob" class="form-control">
                              </div>
                        <div class="col-6">
                                  <label for="">Gender</label>
                          <select name ="gender" id = "gender" class="form-control">
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
                        </div>
                        <div class="col-6">
                                  <label for="">Password</label>
                          <input type="password" name ="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <div class="col-6">
                                  <label for="">Confirm Password</label>
                          <input type="password" name ="conpassword" class="form-control" placeholder="Confirm Password" required>
                        </div>
                             
                        <div class="col-6">
                                  <label for="">Position</label>
                          <select name ="position" id = "position" class="form-control">
                                  <option>Evaluator</option>
                                  <option>Approving</option>
                                  <option>Cashier</option>
                                </select>
                        </div>


                            <br>';
                              echo '<div class="modal-footer justify-content-between col-12">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>';
                        echo ' <input type= "submit" class="btn btn-success" name = "" value = "Submit">
                       </div>';

                            echo"
                            </div>
                            </div>
                            </div>";

                       echo "
                       </div>
                         </div>
                          </div>
                          </form>";
                      
                       ?>

                    <div id="modalUpdate" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class='modal-header'>
                              <h4 class='modal-title'>Update Submitted Application</h4>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <form action='updateDocument.php' method='POST' enctype="multipart/form-data">
                                <div class="modal-body">

                        <div class="col-12">
                            <label for="">Application ID</label>
                                 <input style = "text-align:center" type="text" name = "AID" id = "AID" class="form-control" 
                                 readonly>
                              </div>

                        <div class="col-12">
                             <label for="">Filename</label>
                                <input style = "text-align:center" type="text" name = "filename" id = "filename" class="form-control" readonly>
                              </div>

                        <div class="col-12">
                             <label for="">Date Submitted</label>
                                <input style = "text-align:center" type="text" name = "date" id = "date" class="form-control" readonly>
                              </div>

                              <hr>

                            <label for="myfile">Application Form:</label>
                                <br>
                            <input type="file" id="myfile" name="myfile" required>
                            </label>

                                </div>
                                <div class="modal-footer">
                                    <input type= "submit" class="btn btn-success" name = "" value = "Submit">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                      
                            </div>
                        </div>
                    </div>
        <!-- End of Content Wrapper -->

    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; LTO Online Registration & Portal 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
                <div class="modal-body">Do you wish to end your session?</div>
                   <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>

        $(document).ready(function(){
            $('.open-update').on('click', function(){
                $('#modalUpdate').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#AID').val(data[0]);
                $('#filename').val(data[1]);
                $('#date').val(data[2]);
            });
        });
    
    </script>

</body>

</html>