<?php  

include ("condb.php");


$ID = $_POST['did2'];
$remarks = $_POST['remarks'];

	$sql = "UPDATE documenttbl SET Declined = '1', Remarks = '$remarks' WHERE DID = '$ID'";
	$res = mysqli_query($cn, $sql);
	if($res)
	{
	function myAlert($msg, $url){
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
	}
	myAlert("Transaction Rejected!", "repDashboard.php");

	}

	

?>