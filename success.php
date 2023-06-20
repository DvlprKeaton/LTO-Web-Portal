<?php
include ("condb.php");
            
session_start();

$id = $_SESSION['logid'];
$did = $_SESSION['DID'];
$year = date("Y/m/d"); 

$sql = "UPDATE documenttbl SET Paid = '1', PaymentDate = '$year' WHERE CID = '$id' AND DID = '$did'";
$res = mysqli_query($cn, $sql);                         

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>

    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link rel="stylesheet" href="stylePayment.css">

</head>
<body>
<main id="cart-main">

    <div class="site-title text-center">
        <div><img src="./assets/checked.png" alt=""></div>
        <h1 class="font-title">Payment Done Successfully...!</h1>
        <a href="ctDashboard.php">Finish Transaction</a>
    </div>

</main>

</body>
</html>