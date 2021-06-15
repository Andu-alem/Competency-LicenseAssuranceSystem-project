 
<?php 
include("db.php");
require_once("adminheader.php");
if (isset($_POST['submit'])) {
$name=$_POST['name'];
$code=$_POST['code'];
$catagory=$_POST['catagory'];
if ($name!="" and $code!="") {

	//INSERT INTO `service`(`name`, `code`, `catagory`) VALUES ([value-1],[value-2],[value-3])
	$query="INSERT INTO `service`(name, code, catagory) VALUES ('$name','$code','$catagory')";
	$result = mysqli_query($con,$query) or die(mysqli_error()) ;
      if ($result) {
      	
     
         die( "your service is added successfully");
          }
          die("no data is inserted yet !");
}

}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title> to add the service</title>
	 
	<meta charset="utf-8">
</head>
<body>
	<div style="position: absolute;">	<h1 align="center" style="color:black;">REGISTRARATION OF SERVICES</h1>
	<div align="center">
<form action="" method="post" name="form">

	<input type="text" name="name" placeholder="name of service"><br>
	<input type="text" name="code" placeholder="enter code of service"><br>
	<!-- <input type="text" name="catagory" placeholder="catagory"> -->
CATAGORIES:<select type="text" name="catagory">
	<?php 
$count=1;
	   $retrive="SELECT `name_of_catagory`, `ID` FROM `busness_catagory` ORDER BY name_of_catagory desc";
$result = mysqli_query($con,$retrive);
while($row = mysqli_fetch_assoc($result))

	{?>
 
 
			<option > <?php echo $row["name_of_catagory"];  $count++;

		}?>
	
</option>


	</select><br> 

	 
	<input type="submit" name="submit" value="register">
	

</form>
</div>
</div>

</body>
</html>
