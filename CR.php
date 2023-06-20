<!DOCTYPE html>
<html>
<head>
	<title>CR</title>
</head>
<style>
	.border{
		margin: 25px;
		border:2px;
		border-style: solid;
		border-color: black;
		width: 1300px;
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
		background-image: url('watermark.png');
		background-repeat: no-repeat;
		background-size: cover;
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

$sql = "SELECT * FROM crtbl WHERE DocumentID = '1'";
$res = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($res);
?>
		
	</div>
	<div class = "main">
		<span style="padding-right: 190px">MV FILE NO:
			<?php echo $row['FIleNumber']; ?>
		</span>
		
		<span style="padding-right: 190px">PLATE NO: <?php echo $row['PlateNumber']; ?></span>
		
		 <span style="padding-right: 190px">ENGINE NO: <?php echo $row['EngineNumber']; ?></span> 
		 <span style="padding-right: 180px">CHASSIS NO: <?php echo $row['ChassisNumber']; ?></span>
		<br>
		<br>
		<br>
		<span>DENOMINATION: <?php echo $row['Denomination']; ?></span> 
		<span>PISTON DISPLACEMENT: <?php echo $row['Piston']; ?></span> 
		<span>NO OF CYLYNDERS: <?php echo $row['Cylynders']; ?></span> 
		<span style="padding-right: 196px">FUEL: <?php echo $row['Fuel']; ?></span>
		<br>
		<br>
		<br>
		<span style="padding-right: 160px">MAKE:<?php echo $row['Make']; ?></span> 
		<span style="padding-right: 160px">SERIES: <?php echo $row['Series']; ?></span> 
		<span style="padding-right: 160px">BODY TYPE: <?php echo $row['BodyType']; ?></span> 
		<span style="padding-right: 160px">BODY NO: <?php echo $row['BodyNo']; ?></span>
		<br>
		<br>
		<br>
		<span style="padding-right: 160px">GROSS WT: <?php echo $row['GrossWT']; ?></span> 
		<span style="padding-right: 160px">NET WT: <?php echo $row['NetWT']; ?></span> 
		<span style="padding-right: 160px">SHIPPING WT: <?php echo $row['ShipWT']; ?></span> 
		<span style="padding-right: 160px">NET CAPACITY: <?php echo $row['NetCap']; ?></span>
		<br>
		<br>
		<br>
		<span style="padding-right: 160px">COMPLETE OWNERS NAME: <?php echo $row['OwnerName']; ?> </span> 
		<span style="padding-right: 160px">TEL NO/CONTACT DETAILS: <?php echo $row['ConDetails']; ?></span> 
		<br>
		<br>
		<br>
		<span style="padding-right: 160px">COMPLETE ADDRESS: <?php echo $row['ComAddress']; ?></span>
		<br>
		<br>
		<br>
		<span style="padding-right: 160px">ENCUMBURED TO: <?php echo $row['Encumb']; ?></span>
		<br>
		<br>
		<br>
		<span style="padding-right: 160px">DETAILS OF FIRST REGISTRATION: <?php echo $row['DetailsFirst']; ?></span>
	</div>
	
</div>
<div class="vertical-center">
    <button class="printbtn" id="printPageButton" onClick="window.print();">Print</button>
  </div>

</body>
</html>