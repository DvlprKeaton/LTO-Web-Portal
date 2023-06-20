<!DOCTYPE html>
<html>
<head>
	<title>OR</title>
</head>
<style>
	.border{
		margin: 25px;
		border:2px;
		border-style: solid;
		border-color: black;
		width: 600px;
		height: 700px;
		background-color: #ADD8E680;
	}

	.heading{
		border-bottom: 1px;
		border-top: 0px;
		border-left: 0px;
		border-right: 0px;
		border-style: solid;
		border-color: black;
		height: 150px;
		
		
	}

	.main{
		border-bottom: 1px;
		border-top: 0px;
		border-left: 0px;
		border-right: 0px;
		border-style: solid;
		border-color: black;
		height: 450px;
		padding: 2px;
		background-color: #FFFDD080;

	}

	span{
		padding-bottom:25px;
		border-bottom: 1px;
		border-top: 1px;
		border-left: 1px;
		border-right: 1px;
		border-style: solid;
		border-color: black;
		height: 200px;
		width: 100px;
		vertical-align: middle;

	}

	.recfr{
		position: relative; 
		padding-bottom:1px;
		border-bottom: 1px;
		border-top: 1px;
		border-left: 1px;
		border-right: 1px;
		border-style: solid;
		border-color: black;
	}
	.contleft{
		position: relative;
		height: 305px;
		width: 300px;
		border-bottom: 1px;
		border-top: 1px;
		border-left: 1px;
		border-right: 1px;
		border-style: solid;
		border-color: black;
	}
	.contright{
		position: relative;
		left:300px;
		bottom: 307px;
		height: 305px;
		width: 298px;
		border-bottom: 1px;
		border-top: 1px;
		border-left: 1px;
		border-right: 1px;
		border-style: solid;
		border-color: black;

	}

	@media print {
  #printPageButton {
    display: none;
  }

  .container {
  height: 200px;
  position: relative;
  border: 3px solid green;
}

.vertical-center {
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
}
</style>
<body>
<div class = "border">
	<div class = "heading">

		<div style="text-align: center;">
			<p>Republic of the Philippines</p>
			<h3>DEPARTMENT OF TRANSPORTATION & COMMUNICATIONS</h3>
			<h2>LAND OF TRANSPORTAION OFFICE</h2>
		</div>

<?php

include("condb.php");

$docuid = $_POST['ID'];

$sql = "SELECT * FROM crtbl WHERE DocumentID = '$docuid'";
$res = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($res);

$DID = $row['DocumentID'];

$sql1 = "SELECT * FROM documenttbl WHERE DID = '$DID'";
$res1 = mysqli_query($cn, $sql1);
$row1 = mysqli_fetch_assoc($res1);
?>
		
	</div>
	<div class = "main">
		<div class="recfr">
			<label>RECEIVED FROM (Last name, First name, MI) </label>

			<?php 
				echo "<p>".$row['OwnerName']."</p>";
			?> 
		</div>
		<div class="recfr">
			<label>ADDRESS</label>
			<?php 
				echo "<p>".$row['ComAddress']."</p>";
			?> 
		</div>
		<div class="contleft">
			<label>Payment Details</label>
			<?php 
				echo "<p> File Number: ".$row['FIleNumber']."</p>";
				echo "<p> Payment Date: ".$row1['PaymentDate']."</p>";
				echo "<p> Plate number: ".$row['PlateNumber']."</p>";
			?> 
		</div>
		<div class="contright">
			<label>Breakdown Payment</label>
			<?php 
				echo "<p> Gross Weight: ".$row['GrossWT']."</p>";
				echo "<p> Net Weight: ".$row['NetWT']."</p>";
				echo "<p> Ship Weight: ".$row['ShipWT']."</p>";
				echo "<p> Net Capital: ".$row['NetCap']."</p>";
			?> 

		</div>
	</div>
	<div>
			<label>Total Amount Paid</label>
			<?php 
				echo "<p>".$row1['Payment']."</p>";
			?> 
		</div>
	
</div>

<div class="vertical-center">
    <button class="printbtn" id="printPageButton" onClick="window.print();">Print</button>
  </div>

</body>


</html>