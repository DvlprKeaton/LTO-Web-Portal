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

    <title>LTO - Cashier Dashboard</title>

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
                <a class="nav-link" href="ncaDashboard.php">
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
                <a class="nav-link" href="ncpDashboard.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Paid Transactions</span></a>
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
                    <h1 class="h3 mb-2 text-gray-800">List of to Paid Transactions</h1>
                            <hr>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Paid Renewal</h6>
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
                                    <th>Payment Amount</th>
                                    <th>Payment Date</th>
                                    <th>Document</th>
                                    <th>Options</th>
                    
                                  </tr>";

                                  

                          $sql2 = "SELECT * FROM documenttbl WHERE Status = '1' AND Type = '1' AND Approved = '1' ORDER BY DID";
                          $res = mysqli_query($cn, $sql2);
                          while($row2 = mysqli_fetch_assoc($res))
                          {

                            $CID = $row2['CID'];

                            $sql = "SELECT * FROM clienttbl WHERE ID = '$CID' ORDER BY ID";
                            $result = mysqli_query($cn, $sql);
                            $row = mysqli_fetch_assoc($result);

                            $documentID = $row2['DID'];

                          $sql3 = "SELECT * FROM crtbl WHERE DocumentID = '$documentID' is not null";
                          $res3 = mysqli_query($cn, $sql3);
                          $row3 = mysqli_fetch_assoc($res3);   
                            


                            echo"<tbody>";
                            echo "<tr>";
                            echo "<form method='POST' action='OR.php?id=" . $row2['DID'] . "&file=" . $row2['Filename'] . "'>"; 
                            echo "<input type='hidden' id='ID' name='ID' value='" . $row2['DID'] . "'>";
                            echo "<td>" . $row2['DID'] . " </td> ";
                            echo "<td hidden>" . $row['ID'] . " </td> ";
                            echo "<td>" . $row['Fullname'] . " </td> ";
                            echo "<td>" . $row['Address'] . " </td> ";
                            if ($row2['Payment'] != null) {
                                echo "<td>" . $row2['Payment'] . " </td> ";
                            }else{
                               echo "<td><a href='#' data-toggle='modal' class='open-update'>Set Payment Amount</a></td> ";
                            }
                            echo "<td>" . $row2['PaymentDate'] . " </td> ";
                            echo '<td><a href="pDownload.php?src='.$row2['Filename'].'&download=true">'.$row2['Filename'].'</a></td>';
                            if ($row2['ORC'] != null) {
                                echo "<td>OR Already uploaded</td> ";
                            }else{
                                if ($row2['Paid'] == 0) {
                                    echo "<td>Client Payment Pending</td> ";
                                }else{
                                    echo "<td>
                                  <span data-toggle='modal'><button type='submit' class='btn btn-success btn-xs' data-toggle='tooltip'>Generate OR</button></span>";
                                  echo "<hr>
                                  <span data-toggle='modal' class='open-upload'><button type='button' class='btn btn-success btn-xs' data-toggle='tooltip'>Upload OR</button></span>";
                                }
                                
                            }
                            
                    
                          echo" <div class='modal fade' id='approve'>
                        <div class='modal-dialog modal-md'>"; 
                          echo " <form action='naApproved.php?id=" . $row2['CID'] . "' method='POST'>
                          <input type='hidden' id='ID' name='ID' value='" . $row2['DID'] . "'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h4 class='modal-title'>Send notification to inform releasing of OR?</h4>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>";
                       echo "<input type = 'submit' class='btn btn-success' data-toggle='modal' data-target='#add' value = 'Yes'>
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
                    <div id="modalUpload" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class='modal-header'>
                              <h4 class='modal-title'>Upload OR</h4>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <form action='uploadORre.php' method='POST' enctype="multipart/form-data">
                                <div class="modal-body">

                        <div class="col-12">
                            <label for="">Transaction ID</label>
                                 <input style = "text-align:center" type="text" name = "AID" id = "AID" class="form-control" 
                                 readonly>
                              </div>

                        <div class="col-12">
                             <label for="">Fullname</label>
                                <input style = "text-align:center" type="text" name = "fullname" id = "fullname" class="form-control" readonly>
                              </div>

                              <div class="col-12">
                             <label for="">Payment Amount</label>
                                <input style = "text-align:center" type="text" name = "amount" id = "amount" class="form-control" readonly>
                              </div>

                        <div class="col-12">
                             <label for="">Payment Date</label>
                                <input style = "text-align:center" type="text" name = "date" id = "date" class="form-control" readonly>
                              </div>

                              <hr>

                            <label for="myfile">Official Receipt:</label>
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

                    <div id="modalUpdate" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class='modal-header'>
                              <h4 class='modal-title'>Set Amount of Payment</h4>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                          <?php   echo '<form action="amountUploadRe.php" method="POST">
                                <div class="modal-body">';

                       
           
                             echo "<div class='modal-body'>
                            <div class='row'>";

                        echo '<input type="text" name ="fid" id="fid" class="form-control" value='.$row3['FIleNumber'].' style="text-align: center" hidden>';

                        echo '<div class="col-12">
                        <label style="text-align: center">Note: Put N/A for blank inputs</label>
                          <input type="text" name ="ownername" id="ownername" class="form-control" value='.$row3['OwnerName'].' style="text-align: center" readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="condetails" id="condetails" class="form-control" value='.$row3['ConDetails'].' readonly>
                        </div>';

                         echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="address" id="address" class="form-control" value='.$row3['ComAddress'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="pnumber" id="pnumber" class="form-control" value='.$row3['PlateNumber'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="enumber" id="enumber" class="form-control" value='.$row3['EngineNumber'].' readonly>
                        </div>';


                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="cnumber" id="cnumber" class="form-control" value='.$row3['ChassisNumber'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="denomination" id="denomination" class="form-control" value='.$row3['Denomination'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="piston" id="piston" class="form-control" value='.$row3['Piston'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="cylynders" id="cylynders" class="form-control" value='.$row3['Cylynders'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="fuel" id="fuel" class="form-control" value='.$row3['Fuel'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="make" id="make" class="form-control"value='.$row3['Make'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="series" id="series" class="form-control" value='.$row3['Series'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="btype" id="btype" class="form-control" value='.$row3['BodyType'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="bnumber" id="bnumber" class="form-control" value='.$row3['BodyNo'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="gross" id="gross" class="form-control" value='.$row3['GrossWT'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="netwt" id="series" class="form-control" value='.$row3['NetWT'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="shipwt" id="shipwt" class="form-control" value='.$row3['ShipWT'].' readonly>
                        </div>';

                        echo '<div class="col-6">
                        <label></label>
                          <input type="text" name ="netcap" id="netcap" class="form-control" value='.$row3['NetCap'].' readonly>
                        </div>';

                        echo '<div class="col-12">
                        <label></label>
                          <input type="text" name ="encumb" id="encumb" class="form-control" value='.$row3['Encumb'].' readonly>
                        </div>';

                        echo '<div class="col-12">
                        <label></label>
                          <input type="text" name ="fdetails" id="fdetails" class="form-control" value='.$row3['DetailsFirst'].' readonly>
                        </div>';   

                        echo '<div class="col-12">
                        <label></label>
                          <input type="text" name ="paymentAmount" id="paymentAmount" class="form-control" placeholder="Enter Payment Amount" >
                        </div>';                 

                        echo '</div>
                        </div>';

                       echo "<input type = 'submit' class='btn btn-success' data-toggle='modal' data-target='#add' value = 'Post Payment Amount'>
                       </div>
                         </div>
                          </div>
                          </form>";?>
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
                $('#fullname').val(data[2]);
                $('#amount').val(data[4]);
                $('#date').val(data[5]);
            });
        });
    
    </script>

    <script>

        $(document).ready(function(){
            $('.open-upload').on('click', function(){
                $('#modalUpload').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#AID').val(data[0]);
                $('#fullname').val(data[2]);
                $('#amount').val(data[4]);
                $('#date').val(data[5]);
            });
        });
    
    </script>

</body>

</html>