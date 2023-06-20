<?php  

include ("condb.php");


$did = $_POST['did'];
$year = date("Y/m/d"); 


$sql = "UPDATE documenttbl SET Approved = '1', ApprovedDate = '$year' WHERE DID = '$did'";
	$res = mysqli_query($cn, $sql);
	
	function myAlert($msg, $url){
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
	}
	myAlert("Transaction Approved!", "aaDashboard.php");

?>