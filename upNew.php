<?php

include("condb.php");

session_start();

$id = $_SESSION['logid'];

$file_type = $_FILES['myfile']['type']; 

$allowed = array("application/pdf");
if(!in_array($file_type, $allowed)) {

  			function myAlert($msg, $url)
			{
		    echo '<script language="javascript">alert("'.$msg.'");</script>';
		    echo "<script>document.location = '$url'</script>";
			}
			myAlert("Please submit your application into a PDF File!", "cudDashboard.php");
}else{


$pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];

$tname = $_FILES["myfile"]["tmp_name"];

$uploads_dir = 'renewal';

move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                  
$sql = "SELECT * FROM documenttbl WHERE CID = '$id' AND Type = '0' AND Declined = '0'";
$res = mysqli_query($cn, $sql);

if($res && mysqli_num_rows($res)>0)
		{
		  function myAlert($msg, $url)
			{
		    echo '<script language="javascript">alert("'.$msg.'");</script>';
		    echo "<script>document.location = '$url'</script>";
			}
			myAlert("Application Already Submitted!", "cudDashboard.php");
		}
else 
    {
    		$year = date("Y/m/d"); 
            $sql2 = "INSERT INTO documenttbl (CID,Filename,Type,SubmittedDate) VALUE ('$id','$pname','0','$year')";
					$result = mysqli_query($cn, $sql2);

					function myAlert($msg, $url)
					{
				    echo '<script language="javascript">alert("'.$msg.'");</script>';
				    echo "<script>document.location = '$url'</script>";
					}
					myAlert("Application Submitted!", "ctDashboard.php");
						
    }
}

?>