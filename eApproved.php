<?php  

include ("condb.php");


$ID = $_GET['id'];
$ownername = $_POST['ownername'];
$condetails = $_POST['condetails'];
$address = $_POST['address'];
$pnumber = $_POST['pnumber'];
$enumber = $_POST['enumber'];
$cnumber = $_POST['cnumber'];
$denomination = $_POST['denomination'];
$piston = $_POST['piston'];
$cylynders = $_POST['cylynders'];
$fuel = $_POST['fuel'];
$make = $_POST['make'];
$series = $_POST['series'];
$btype = $_POST['btype'];
$bnumber = $_POST['bnumber'];
$gross = $_POST['gross'];
$netwt = $_POST['netwt'];
$shipwt = $_POST['shipwt'];
$netcap = $_POST['netcap'];
$encumb = $_POST['encumb'];
$fdetails = $_POST['fdetails'];
$year = date("Y/m/d"); 

	$sql2 = "INSERT INTO crtbl (DocumentID,PlateNumber,EngineNumber,ChassisNumber,Denomination,Piston,Cylynders,Make,Series,BodyType,BodyNo,GrossWT,NetWT,ShipWT,NetCap,OwnerName,ConDetails,ComAddress,Encumb,DetailsFirst,Fuel) VALUE ('$ID','$pnumber','$enumber','$cnumber','$denomination','$piston','$cylynders','$make','$series','$btype','$bnumber','$gross','$netwt','$shipwt','$netcap','$ownername','$condetails','$address','$encumb','$fdetails','$fuel')";
	$result = mysqli_query($cn, $sql2);

if ($result) {
	$sql = "UPDATE documenttbl SET Status = '1', EvaluatedDate = '$year' WHERE DID = '$ID'";
	$res = mysqli_query($cn, $sql);
	
	function myAlert($msg, $url){
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
	}
	myAlert("Transaction Approved!", "eeDashboard.php");
}
	

?>