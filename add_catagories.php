
<?php 

include("db.php");
require_once("adminheader.php");
if (isset($_POST['submit'])) {
	$catagory=$_POST['catagory'];
	$id=$_POST['ID'];
	$gen_service=$_POST['gen_service'];
if ($catagory!="" and $id!="") {
	//INSERT INTO `busness_catagory`(`name_of_catagory`, `gen_service`, `ID`) VALUES ([value-1],[value-2],[value-3])

	 $query="INSERT INTO `busness_catagory`(`name_of_catagory`, `gen_service`, `ID`) VALUES ('$catagory','$gen_service','$id')";
	 $result = mysqli_query($con,$query) or die(mysqli_error());
         if ($result) {
         	die('your catagory is added successfully');
         }
        else{
        	die('your catagory data is not added');
        }
          
}

}
 ?>



<!-- INSERT INTO `busness_catagory`(`name_of_catagory`, `ID`) VALUES ([value-1],[value-2]) -->
<!DOCTYPE html>
<html>
<head>
	 
	<meta charset="utf-8">
	<title> add the bussines catagories</title>
</head>
<body>
	 
<h1 style=" color: rgb(11,11,255); background-color:transparent;">BUSSNESS CATAGORIES</h1>
<div align="center" style="position: absolute;">
<form action="" name="form" method="post">
	<input type="text" name="catagory" placeholder="Enter the bussines catagory"><br>
	<input type="text" name="gen_service" placeholder="general service"><br>
	<input type="text" name="ID" placeholder="Enter ID of bussines"><br>
	<input type="submit" name="submit" value ="register catagory">
	

</form>
 
</div>
</body>
</html>