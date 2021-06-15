
<?php 
	include("db.php");
	require_once("adminheader.php");
	//require_once("adminheader.php");
	if(isset($_REQUEST['submit'])){
		$year=$_REQUEST['year'];
		$month=$_REQUEST['month'];
		$query= "SELECT service, COUNT(*) FROM app_request_info WHERE year='$year' and Month='$month'  GROUP BY service ";
		$recoreds= mysqli_query($con,$query) or die(mysqli_error());
		// "SELECT `code`, COUNT(code) FROM request_info WHERE year=2019 GROUP BY `code`"
?>
<table width="100%" border="1" cellpadding="1" cellspacing="1">
	<tr> 
		<th>name of service</th>
		<th>catagory</th>
		<th>sum</th>
	</tr>
</table>
<?php
	while ($user=mysqli_fetch_assoc($recoreds)){
		$code=$user['service'];
		$quer="SELECT `name`, `code`, `catagory` FROM `service` WHERE code='$code'";
  		$recored= mysqli_query($con,$quer) or die(mysqli_error());
  		$row=mysqli_fetch_assoc($recored);
		echo "<tr>";
   		echo "<td>".$row['name']." </td>";
   		echo "<td>".$row['catagory']." </td>";
   		echo "<td>".$user['COUNT(*)']." </td>";
    	echo "<tr>";
	}}
?>
 
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="application.css">
		<link rel="stylesheet" type="text/css" href="styletable.css">

		<title>report</title>
	</head>
	<body>
		<form name="form"  action="#" method="post" enctype="multipart/form-data">
			YEAR:<select name="year">
				<option ></option>
				<option>2019</option>
				<option>2018</option>
				<option>2017</option>
				<option>2016</option>
				<option>2015</option>
			</select>
			MONTH: <select name="month">
				<option ></option>
				<option>January</option>
				<option>February </option>
				<option>March </option>
				<option>April </option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September </option>
				<option>October </option>
				<option>November </option>
				<option>December</option>
			</select>
			<input type="submit" name="submit" value="view report">
		</form>
	</body>
</html>