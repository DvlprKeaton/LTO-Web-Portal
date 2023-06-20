<?php

include("condb.php");

$AID = $_POST['AID'];
$Rdate = $_POST['releasing'];

$sql = "SELECT * FROM documenttbl WHERE DID = '$AID'";
$res = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($res);
if ($row) {
	$sql = "UPDATE documenttbl SET CR = '1' WHERE DID = '$AID'";
	$res = mysqli_query($cn, $sql);
}

$id = $row['DID'];

$sql1 = "SELECT * FROM clienttbl WHERE ID = '$id'";
$res1 = mysqli_query($cn, $sql1);
$row1 = mysqli_fetch_assoc($res1);

$contact = $row1['Contact'];


					//##########################################################################
					// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
					// Visit www.itexmo.com/developers.php for more info about this API
					//##########################################################################

					function itexmo($number,$message,$apicode,$passwd){
							$url = 'https://www.itexmo.com/php_api/api.php';
							$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
							$param = array(
								'http' => array(
									'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
									'method'  => 'POST',
									'content' => http_build_query($itexmo),
								),
							);
							$context  = stream_context_create($param);
							return file_get_contents($url, false, $context);
					}
					//##########################################################################

					$result = itexmo($contact, "Your CR was Printed, Please go to the nearest office at ".$Rdate, 'TR-ANGEL806853_K1D52', '6k399@[jg7');
					if ($result == ""){
					echo "iTexMo: No response from server!!!
					Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
					Please CONTACT US for help. ";	
					}else if ($result == 0){

						function myAlert($msg, $url){
					    echo '<script language="javascript">alert("'.$msg.'");</script>';
					    echo "<script>document.location = '$url'</script>";
						}
						myAlert("Releasing date of CR was sent", "pcrDashboard.php");
					}
					else{	
					echo "Error Num ". $result . " was encountered!";
					}

        
    
?>

