<?php


require('db.php');
$id=$_REQUEST['code'];
$query = "DELETE FROM service WHERE code='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view_service.php"); 
?>