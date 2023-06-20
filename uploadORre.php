<?php

include("condb.php");

session_start();

$id = $_SESSION['logid'];

$AID = $_POST['AID'];

$file_type = $_FILES['myfile']['type']; 

$allowed = array("application/pdf");
if(!in_array($file_type, $allowed)) {

  			function myAlert($msg, $url)
			{
		    echo '<script language="javascript">alert("'.$msg.'");</script>';
		    echo "<script>document.location = '$url'</script>";
			}
			myAlert("Please upload the OR into a PDF File!", "cpDashboard.php");
}else{
	
$pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];

$tname = $_FILES["myfile"]["tmp_name"];

$uploads_dir = 'ORCR';

move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                  

            		$sql2 = "UPDATE documenttbl SET ORC = '$pname' WHERE DID='$AID'";
					$res = mysqli_query($cn, $sql2);

					function myAlert($msg, $url)
					{
				    echo '<script language="javascript">alert("'.$msg.'");</script>';
				    echo "<script>document.location = '$url'</script>";
					}
					myAlert("Application Updated!", "ncpDashboard.php");
		

}

?>