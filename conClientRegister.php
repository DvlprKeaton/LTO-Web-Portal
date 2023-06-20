<?php

include("condb.php");

$fname = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$conpass = $_POST['conpassword'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];

$sql = "SELECT * FROM clienttbl WHERE Email = '$email'";
$res = mysqli_query($cn, $sql);
if($res && mysqli_num_rows($res)>0)
{
  function myAlert($msg, $url)
	{
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
	}
	myAlert("Email already taken!", "register.php");
}
else 
	{
		if ($_POST['password'] === $_POST['conpassword']){

			$age = date_diff(date_create($dob), date_create('today'))->y;
			
			$sql2 = "INSERT INTO clienttbl(Fullname,Birthdate,Age,Address,Contact,Gender,Email,Password,Status) VALUE ('$fname','$dob','$age','$address','$contact','$gender','$email','$pass','1')";
			$result = mysqli_query($cn, $sql2);
			
			function myAlert1($msg, $url){
			echo '<script language="javascript">alert("'.$msg.'");</script>';
			echo "<script>document.location = '$url'</script>";
			}
			myAlert1("Registration Success!", "index.php");
			
		}
		else {
			function myAlert1($msg, $url){
			echo '<script language="javascript">alert("'.$msg.'");</script>';
			echo "<script>document.location = '$url'</script>";
			}
			myAlert1("Password Did Not Match!", "register.php");
		}
	}



?>

