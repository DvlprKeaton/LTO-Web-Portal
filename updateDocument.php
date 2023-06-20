<?php

include("condb.php");

session_start();

$id = $_SESSION['logid'];

$AID = $_POST['AID'];
$filename = $_POST['filename'];

$file_type = $_FILES['myfile']['type']; 

$allowed = array("application/pdf");
if(!in_array($file_type, $allowed)) {

  			function myAlert($msg, $url)
			{
		    echo '<script language="javascript">alert("'.$msg.'");</script>';
		    echo "<script>document.location = '$url'</script>";
			}
			myAlert("Please submit your application into a PDF File!", "ctDashboard.php");
}else{

$sql1 = "SELECT * FROM documenttbl WHERE DID = '$AID' AND Type = '0'";
$res1 = mysqli_query($cn, $sql1);

if ($res1) {
	
$pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];

$tname = $_FILES["myfile"]["tmp_name"];

$uploads_dir = 'newregistration';

move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                  
$sql = "SELECT * FROM documenttbl WHERE DID = '$AID' AND Filename = '$filename'";
$res = mysqli_query($cn, $sql);

if($res && mysqli_num_rows($res)>0)
		{
		  			$year = date("Y/m/d"); 
            		$sql2 = "UPDATE documenttbl SET Filename='$pname', SubmittedDate = '$year' WHERE DID='$AID'";
					$res = mysqli_query($cn, $sql2);

					function myAlert($msg, $url)
					{
				    echo '<script language="javascript">alert("'.$msg.'");</script>';
				    echo "<script>document.location = '$url'</script>";
					}
					myAlert("Application Updated!", "ctDashboard.php");
		}

}else{

$pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];

$tname = $_FILES["myfile"]["tmp_name"];

$uploads_dir = 'renewal';

move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                  
$sql3 = "SELECT * FROM documenttbl WHERE DID = '$AID' AND Filename = '$filename'";
$res3 = mysqli_query($cn, $sql3);

if($res && mysqli_num_rows($res)>0)
		{
		  			$year = date("Y/m/d"); 
            		$sql4 = "UPDATE documenttbl SET Filename='$pname', SubmittedDate = '$year' WHERE DID='$AID'";
					$res4 = mysqli_query($cn, $sql4);

					function myAlert($msg, $url)
					{
				    echo '<script language="javascript">alert("'.$msg.'");</script>';
				    echo "<script>document.location = '$url'</script>";
					}
					myAlert("Application Updated!", "ctDashboard.php");
		}

}

}

?>