<?php
include("condb.php");
$email = $_POST['email'];
$pword = $_POST['password'];
$sql = "SELECT * FROM registrationofficialstbl WHERE Email = '$email' AND Password = '$pword' AND Status = '1'";
$result= mysqli_query($cn,$sql);
$row= mysqli_num_rows($result);
$row2 = mysqli_fetch_assoc($result);	

session_start();


if($row<>0)
{
	if ($row2['Position'] == 'Evaluator') {

		$_SESSION['logid'] = $row2['ID'];

		header("location:eDashboard.php");
	}else if ($row2['Position'] == 'Approving') {

		$_SESSION['logid'] = $row2['ID'];

		header("location:naDashboard.php");
	}else if ($row2['Position'] == 'Cashier') {

		$_SESSION['logid'] = $row2['ID'];

		header("location:caDashboard.php");
	}else if ($row2['Position'] == 'Printing of CR') {

		$_SESSION['logid'] = $row2['ID'];

		header("location:pcrDashboard.php");
	}
	
}
else
{
	
	$sql2 = "SELECT * FROM renewalofficialstbl WHERE Email = '$email' AND Password = '$pword' AND Status = '1'";
	$result2= mysqli_query($cn,$sql2);
	$row2= mysqli_num_rows($result2);	
	$row3 = mysqli_fetch_assoc($result2);	

	if($row2<>0)
	{
		if ($row3['Position'] == 'Evaluator') {

		$_SESSION['logid'] = $row3['ID'];

		header("location:reDashboard.php");
	}else if ($row3['Position'] == 'Approving') {
		$_SESSION['logid'] = $row3['ID'];

		header("location:raDashboard.php");
	}else if ($row3['Position'] == 'Cashier') {
		$_SESSION['logid'] = $row3['ID'];

		header("location:ncaDashboard.php");
	}
	}else
	{
		$sql3 = "SELECT * FROM clienttbl WHERE Email = '$email' AND Password = '$pword' AND Status = '1'";
		$result3= mysqli_query($cn,$sql3);
		$row3= mysqli_num_rows($result3);	
		$row4 = mysqli_fetch_assoc($result3);

		if($row3<>0)
		{
			$_SESSION['logid'] = $row4['ID'];
			$_SESSION['email'] = $row4['email'];
			header("location:cDashboard.php");
		}
		else{

			if($email == 'Admin@gmail.com' & $pword == 'root')
			{
				header("location:aDashboard.php");
			}
			else{

				header("location:index.php");
			}

		

		}

		
	}

}

?>