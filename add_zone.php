
<?php
include("db.php");
require_once("adminheader.php");
if (isset($_POST['submit'])) {
   
	 $zone=$_POST['zone'];
	 if ($zone!="") {

	 	 $query="INSERT INTO `zon`(id, name) VALUES ('','$zone')";
	 	 $result = mysqli_query($con,$query) or
         die(mysqli_error());
         if ($result) {
         	 
         
         die("your zone is added successfully");
         header("location:add_zone.php");
       
	 }
	}
}

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script type="text/javascript"></script>
	<title>add zone</title>
</head>
<body>
<div   style="position: absolute;">	
	<h2 style="font-family: italic;">ADD ZONE THAT ONLY EXIST UNDER SNNP</h2>
  
<form name="form" action="" method="post">
  ZONE:
	<input type="text" name="zone" placeholder="enter zone"><br>
	 
      <input type="submit" name="submit" value="register zone">
</form>
</div>	

</body>
</html>