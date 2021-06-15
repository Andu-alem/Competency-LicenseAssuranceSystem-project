
<?php 
require('db.php');
require_once("adminheader.php");
$id=$_REQUEST['id'];
// require("db.php");
// $id=$_GET['telephone'];
// session_start();
 

if (isset($_REQUEST['submit'])) {
	$statuse=$_REQUEST['statuse'];
	$apointment=$_REQUEST['apointment'];
    // $id=$_SESSION['id'];
	$sql="INSERT INTO `req_statuse`(`id`, `statuse`, `apointment`) VALUES ('$id','$statuse','$apointment')";
	$result=mysqli_query($con,$sql) or die(mysqli_error()) ;
	if ($result) {
		 die( "data inserted successfuly");
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>statuse</title>
</head>
<body>
<form action=""  method=”post” >
	
statuse: <br> accepted <input name="statuse" type=radio value="accepted">rejected<input name="statuse" type=radio value="rejected"> </br>
apointment:<br><textarea name="apointment" cols="20" rows="10">
	
</textarea>
<input type="submit" name="submit">
</form>
</body>
</html>