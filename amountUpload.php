<?php

include("condb.php");

session_start();

$fid = $_POST['fid'];
$payment = $_POST['paymentAmount'];

$sql = "SELECT * FROM crtbl WHERE FileNumber = '$fid'";
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
	
					$did = $row['DocumentID'];

            		$sql2 = "UPDATE documenttbl SET Payment = '$payment' WHERE DID = '$did'";
					$res = mysqli_query($cn, $sql2);

					function myAlert($msg, $url)
					{
				    echo '<script language="javascript">alert("'.$msg.'");</script>';
				    echo "<script>document.location = '$url'</script>";
					}
					myAlert("Payment Amount Posted!", "cpDashboard.php");
}

	

?>