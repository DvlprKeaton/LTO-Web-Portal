<?php  

include ("condb.php");


$ID = $_GET['id'];
$year = date("Y"); 

$sql = "UPDATE documenttbl SET Declined = '1' WHERE CID = '$ID'";
	$res = mysqli_query($cn, $sql);
	
	function myAlert($msg, $url){
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
	}
	myAlert("Transaction Rejected!", "apDashboard.php");

?>