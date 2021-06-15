<?php


require('db.php');
$id=$_REQUEST['ID'];
$query = "DELETE FROM user WHERE ID='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>