<?php


require('db.php');
$id=$_REQUEST['telephone'];

$qry =" SELECT   `telephone`FROM `request_info` WHERE telephone= '$id'";
if ($qry) {
	 echo "<script>alert('you registered latter')</script>";

$query = "DELETE FROM request_info WHERE telephone='$id' "; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: view_request.php"); }
?>