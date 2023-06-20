<?php

include("condb.php");

session_start();

$id = $_SESSION['logid'];

$DID = $_POST['ID'];

$sql = "SELECT * FROM documenttbl WHERE DID = '$DID' AND Paid = '1'";
$res = mysqli_query($cn, $sql);

if($res && mysqli_num_rows($res)>0)
{
  function myAlert($msg, $url)
    {
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
    }
    myAlert("Payment was already proccesed", "ctDashboard.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paypal Payment</title>

    <link rel="stylesheet" href="stylePayment.css">
</head>
<body>
    <main id="cart-main">
        <div class="site-title text-center">
            <h1 class="font-title">Summary of Payment</h1>
        </div>

        <div class="container">
            <div class="grid">
                <div class="col-1">
                    <div class="flex item justify-content-between">
                        <div class="flex">
                            <div class="img text-center">
                                <img src="./assets/pro1.png" alt="">
                            </div>
                            <div class="title">
                                <h3><?php

                                $sql = "SELECT * FROM documenttbl WHERE CID = '$id' AND DID = '$DID' ORDER BY CID";
                                $result = mysqli_query($cn, $sql);
                                $row = mysqli_fetch_assoc($result);


                                $sql2 = "SELECT * FROM clienttbl WHERE ID = '$id' ORDER BY ID";
                                $result2 = mysqli_query($cn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);

                                $sql3 = "SELECT * FROM crtbl WHERE DocumentID = '$DID'";
                                $result3 = mysqli_query($cn, $sql3);
                                $row3 = mysqli_fetch_assoc($result3);


                                echo 'Fullname: ' . $row2['Fullname'];


                            ?></h3>
                                <span><?php

                                echo 'Address: ' . $row2['Address'];

                            ?></span>
                            <br>
                            <span><?php

                                 echo 'Age: ' . $row2['Age'];

                            ?></span>
                            <br>
                            <span><?php

                                echo 'Gender: ' . $row2['Gender'];


                            ?></span>
                            <br>
                            <hr>
                            <span><?php

                               echo 'Transaction ID: '. $row['DID'];
                               $_SESSION['DID'] = $row['DID'];
                            ?></span>
                            <br>
                            <span><?php

                               echo 'Evaluated Date: '. $row['EvaluatedDate'];
                            ?></span>
                            <br>
                            <span><?php
                               echo 'Approved Date: '. $row['ApprovedDate'];
                            ?></span>
                            <br>
                            <br>
                                <a href="Oncancel.php">Cancel Payment</a>
                            </div>
                        </div>
                        <div class="price">
                            
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="subtotal text-center">
                        <h3>Price Details</h3>

                        <ul>
                            <li class="flex justify-content-between">
                                <label for="price"><?php if ($row['Type'] == '0') {
                                    echo 'New Registration <hr>';

                                

                                }else{
                                    echo 'Renewal <hr>';
                                };?></label>

                               

                                <span><?php echo "File Number: ". $row3['FIleNumber'] ."<br>"?></span>
                                <span><?php echo "Document ID: ". $row3['DocumentID'] . "<br>"?></span>
                                <span><?php echo "Plate #: ". $row3['PlateNumber'] . "<br>"?></span>
                                <span><?php echo "Gross Weight: ". $row3['GrossWT'] . "<br>"?></span>
                                <span><?php echo "Body Number: ". $row3['BodyNo'] . "<br>"?></span>
                                <span><?php echo "Maker: ". $row3['Make'] . "<br>"?></span>
                                <span><?php echo "Engine Number: ". $row3['EngineNumber'] . "<br>"?></span>
                            </li>
                            <hr>
                            <li class="flex justify-content-between">
                                <label for="price">Amount Payble : </label>
                                <span class="text-red font-title">
                                <?php 

                                echo $row['Payment'];;

                                ?>
                                    
                                </span>
                            </li>
                        </ul>
                        <div id="paypal-payment-button">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://www.paypal.com/sdk/js?client-id=AZh9HkXzAznk26-FuPqgYH9aJukPXWVROdmQwFW2hjUAtSFnLEYmN2pKwVmG661qQQjdJkcl850zSAzQ&disable-funding=credit,card"></script>
    <script src="payment.js"></script>
</body>
</html>