<?php

include("condb.php");

$fname = $_POST['fname'];
$email = $_POST['email'];
$address = $_POST['address'];
$password = $_POST['password'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$position = $_POST['position'];


$sql = "SELECT * FROM registrationofficialstbl WHERE Email = '$email'";
$res = mysqli_query($cn, $sql);
if($res && mysqli_num_rows($res)>0)
{
  function myAlert($msg, $url)
	{
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
	}
	myAlert("Email is already taken!", "aoDashboard.php");
}else{

			$age = date_diff(date_create($dob), date_create('today'))->y;

			if ($age < 17) {
			function myAlert1($msg, $url){
			echo '<script language="javascript">alert("'.$msg.'");</script>';
			echo "<script>document.location = '$url'</script>";
			}
			myAlert1("Official is 18 years old below!","aoDashboard.php");
			}else{

			$sql2 = "INSERT INTO registrationofficialstbl (Fullname,Birthdate,Age,Address,Gender,Position,Email,Password,Status) VALUE ('$fname','$dob','$age','$address','$gender','$position','$email','$password','1')";
			$result = mysqli_query($cn, $sql2);
			
			function myAlert1($msg, $url){
			echo '<script language="javascript">alert("'.$msg.'");</script>';
			echo "<script>document.location = '$url'</script>";
			}
			myAlert1("Official Added!","aoDashboard.php");

			}

			
		
		
		}

?>


