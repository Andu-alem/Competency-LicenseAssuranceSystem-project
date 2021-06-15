<?php


require('db.php');
$id=$_REQUEST['ID'];
$query = "DELETE FROM zon WHERE ID='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view_zone.php"); 
?>