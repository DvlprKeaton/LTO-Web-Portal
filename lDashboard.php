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

    <title>LTO - Admin Dashborad</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                
                <div class="sidebar-brand-text mx-3"><?php
                            $id = $_SESSION['logid'];

                            $sql2 = "SELECT * FROM renewalofficialstbl WHERE ID = '$id'";
                            $result2 = mysqli_query($cn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);

                            echo $row2['Position'];

                            ?> Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="aDashboard.php">
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
                <a class="nav-link" href="oprDashboard.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Pending Renewal</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="opnDashboard.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pending Registration</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="lDashboard.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>List of Registered</span></a>
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


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                            $id = $_SESSION['logid'];

                            $sql2 = "SELECT * FROM renewalofficialstbl WHERE ID = '$id'";
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
                    <h1 class="h3 mb-2 text-gray-800">List of Registered Clients</h1>
                            <hr>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Renewed</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php 

                                include ("condb.php");
                                  echo"<thead>
                                  <tr>
                                    <th  width='10%'>Client ID</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th></th>
                                  </tr>";

                                $sql = "SELECT * FROM clienttbl WHERE Status = '1' ORDER BY ID";
                                $result = mysqli_query($cn, $sql);
                                  while($row = mysqli_fetch_assoc($result))
                                  {

                                echo"<tbody>";
                                echo "<tr>";
                                echo "<form method='POST' action='subDownload.php?id=" . $row['ID'] . "'>"; 
                                echo "<input type='hidden' id='ID' name='ID' value='" . $row['ID'] . "'>";
                                echo "<td>" . $row['ID'] . " </td> ";
                                echo "<td>" . $row['Fullname'] . " </td> ";
                                echo "<td>" . $row['Email'] . " </td> ";
                                echo "<td>" . $row['Age'] . " </td> ";
                                echo "<td>" . $row['Address'] . " </td> ";
                                echo "<td>" . $row['Gender'] . " </td> ";
                                echo "<td><button type='submit' class='btn btn-primary btn-xs' data-toggle='tooltip'>View Submitted Application</button>
                                </td></form>";
                                echo "</tr>";
                }
                
                   ?>
               </table>
                            </div>
                        </div>
                    </div>



                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Registration</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php 

                               include ("condb.php");

                                  echo"<thead>
                                  <tr>
                                    <th width='10%'>Client ID</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th></th>
                                  </tr>";

                                $sql = "SELECT * FROM clienttbl WHERE Status = '1'ORDER BY ID";
                                $result = mysqli_query($cn, $sql);
                                  while($row = mysqli_fetch_assoc($result))
                                  {

                                echo"<tbody>";
                                echo "<tr>";
                                echo "<form method='POST' action='subDownload.php?id=" . $row['ID'] . "'>"; 
                                echo "<input type='hidden' id='ID' name='ID' value='" . $row['ID'] . "'>";
                                echo "<td>" . $row['ID'] . " </td> ";
                                echo "<td>" . $row['Fullname'] . " </td> ";
                                echo "<td>" . $row['Email'] . " </td> ";
                                echo "<td>" . $row['Age'] . " </td> ";
                                echo "<td>" . $row['Address'] . " </td> ";
                                echo "<td>" . $row['Gender'] . " </td> ";
                                echo "<td><button type='submit' class='btn btn-primary btn-xs' data-toggle='tooltip'>View Submitted Application</button>
                                </td></form>";
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

                       <?php

                    echo" <div class='modal fade' id='addNewRenewal'>
                        <div class='modal-dialog modal-md'>"; 
                          echo " <form method='POST' action='conRenewal.php?' enctype='multipart/form-data'>
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
                                  <option>Input Clerk</option>
                                  <option>Approving Clerk</option>
                                  <option>Cashier</option>
                                  <option>Printing of CR</option>
                                </select>
                        </div>


                            <br>';

                              echo '<div class="modal-footer justify-content-between col-12">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>';
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

</body>

</html>