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

    <title>LTO - Evaluator Dashboard</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                
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
                <a class="nav-link" href="reDashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="repDashboard.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pending Documents</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="reeDashboard.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Evaluated Documents</span></a>
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
                    <h1 class="h3 mb-2 text-gray-800">List of to Evaluate Documents</h1>
                            <hr>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Renewal Documents</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                 <?php 

                                include ("condb.php");
                                  echo"<thead>
                                  <tr>
                                    <th width='15%'>Document ID</th>
                                    <th>Client Fullname</th>
                                    <th>Client Address</th>
                                    <th>Client Age</th>
                                    <th>Client Gender</th>
                                    <th>Submitted Date</th>
                                    <th>Document</th>
                                    <th>Options</th>
                    
                                  </tr>";

                            $sql = "SELECT * FROM documenttbl WHERE Status = '0' AND Type = '1' AND Declined = '0' ORDER BY DID";
                                  $result = mysqli_query($cn, $sql);
                          while($row = mysqli_fetch_assoc($result))
                          {

                            if ($row != null) {
                            $cid = $row['CID'];
                          }else{
                            $cid = 0;
                          }

                          $sql2 = "SELECT * FROM clienttbl WHERE ID = '$cid' ORDER BY ID";
                          $res = mysqli_query($cn, $sql2);
                          $row2 = mysqli_fetch_assoc($res);

                            echo"<tbody>";
                            echo "<tr>";
                            echo "<form method='POST' action='download.php?id=" . $row['CID'] . "&file=" . $row['Filename'] . "'>"; 
                            echo "<input type='hidden' id='ID' name='ID' value='" . $row['CID'] . "'>";
                            echo "<td>" . $row['DID'] . " </td> ";
                            echo "<td hidden>" . $row2['ID'] . " </td> ";
                            echo "<td>" . $row2['Fullname'] . " </td> ";
                            echo "<td>" . $row2['Address'] . " </td> ";
                            echo "<td>" . $row2['Age'] . " </td> ";
                            echo "<td>" . $row2['Gender'] . " </td> ";
                            echo "<td>" . $row['SubmittedDate'] . " </td> ";
                            echo '<td><a href="pDownload.php?src='.$row['Filename'].'&download=true">'.$row['Filename'].'</a></td>';
                            echo "<td>
                          <span data-toggle='modal'><button type='button' class='btn btn-success btn-xs open-eval' data-toggle='tooltip' title='Approve'><i class='fa fa-thumbs-up' aria-hidden='true'></i></button></span>
                          <hr>
                        <span data-toggle='modal'><button type='button' class='btn btn-danger btn-xs open-dis' data-toggle='tooltip' title='Disapprove'><i class='fa fa-thumbs-down' aria-hidden='true'></i></button></span></td></form>";

                          echo" <div class='modal fade' id='modalEval'>
                        <div class='modal-dialog modal-md'>"; 
                          echo " <form action='reApproved.php?id=" . $row['DID'] . "' method='POST'>
                          <input type='hidden' id='ID' name='ID' value='" . $row['DID'] . "'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h4 class='modal-title'>Approve the Renewal Document?</h4>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>";

                              echo "<div class='modal-body'>
                             <div class='row'>";


                        echo '<div class="col-12">
                        <label style="text-align: center">Note: Put N/A for blank inputs</label>
                          <input type="text" name ="ownername" id="ownername" class="form-control" placeholder=""  style="text-align: center" readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="condetails" id="condetails" class="form-control" placeholder="" readonly>
                        </div>';

                         echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="address" id="address" class="form-control" placeholder="" readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="pnumber" id="pnumber" class="form-control" placeholder="Plate Number" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="enumber" id="enumber" class="form-control" placeholder="Engine Number" required>
                        </div>';


                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="cnumber" id="cnumber" class="form-control" placeholder="Chassis Number" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="denomination" id="denomination" class="form-control" placeholder="Denomination" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="piston" id="piston" class="form-control" placeholder="Piston Displacement" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="cylynders" id="cylynders" class="form-control" placeholder="Number of Cylynders" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="fuel" id="fuel" class="form-control" placeholder="Fuel" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="make" id="make" class="form-control" placeholder="Make" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="series" id="series" class="form-control" placeholder="Series" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="btype" id="btype" class="form-control" placeholder="Body Type" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="bnumber" id="bnumber" class="form-control" placeholder="Body Number" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="gross" id="gross" class="form-control" placeholder="Gross Weight" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="netwt" id="series" class="form-control" placeholder="Net Weight" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="shipwt" id="shipwt" class="form-control" placeholder="Shipping Weight" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="netcap" id="netcap" class="form-control" placeholder="Net Capacity" required>
                        </div>';

                        echo '<div class="col-12">
                        <label></label>
                          <input type="text" name ="encumb" id="encumb" class="form-control" placeholder="Encumbured to" required>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="fdetails" id="fdetails" class="form-control" placeholder="Details of First Registration" required>
                        </div>';

                        

                        

                        #Huhu dame

                        

                        echo '</div>
                        </div>'; #End of BODY
                       echo "<input type = 'submit' class='btn btn-success' data-toggle='modal' data-target='#add' value = 'Yes'>
                       </div>
                         </div>
                          </div>
                          </form>";

                         echo" <div class='modal fade' id='modalDis'>
                        <div class='modal-dialog modal-md'>"; 
                          echo " <form action='reDisapprove.php?id=" . $row['DID'] . "' method='POST'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h4 class='modal-title'>Reject the New Registration Document?</h4>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>";
                            echo "<div class='modal-body'>


                        <div class = 'col-12'>
                            <label>Remarks</label>
                          <select style = 'text-align:center' name ='remarks' id = 'remarks' class='form-control' required>
                          <option>Incomplete Documents</option>
                          <option>Wrong Information</option>
                          <option>Not Qualified for the Application</option>

                                </select>
                        </div>

                        </div>";


                        echo '
                        <input type="text" name ="did2" id="did2" class="form-control" hidden>
                        ';

                       echo "<input onSubmit = '' type = 'submit' class='btn btn-success' data-toggle='modal' data-target='#add' value = 'Yes'>
                       </div>
                         </div>
                          </div>
                          </form>";
                }
                
                   ?>
               </table>
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
            $('.open-eval').on('click', function(){
                $('#modalEval').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#ownername').val(data[2]);
                $('#condetails').val(data[3]);
                $('#address').val(data[4]);
            });
        });
    
    </script>

     <script>

        $(document).ready(function(){
            $('.open-dis').on('click', function(){
                $('#modalDis').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#did2').val(data[0]);
            
            });
        });
    
    </script>

</body>



</html>