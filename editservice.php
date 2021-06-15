<?php

 
require('db.php');
  
require_once("adminheader.php");
$id=$_REQUEST['code'];
$query = "SELECT * from service where code='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update zone</title>
<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>
<body>
<div class="form">
 
<h1>Update Record</h1>
<?php
 
if(isset($_POST['new']) && $_POST['new']==1)
{
$code=$_REQUEST['code'];
 
$name =$_REQUEST['name'];
$catagory =$_REQUEST['catagory'];
 
 //SELECT `name_of_catagory`, `gen_service`, `ID` FROM `busness_catagory` WHERE 1
 //UPDATE `service` SET `name`=[value-1],`code`=[value-2],`catagory`=[value-3] WHERE 1

// SELECT `name`, `code`, `catagory` FROM `service` WHERE 1
$update="update service set  name='".$name."', code='".$code."', catagory='".$catagory."'where code='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
 
if ($update) {

	 header("Location: view_service.php");
}
 
}else {
?>
<div align="center" style="position: absolute; right: 50%;">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
 <input name="catagory" type="hidden" value="<?php echo $row['catagory'];?>" />
 
<p>Name of service:<input type="text" name="name" placeholder="Enter name" required value="<?php echo $row['name'];
?>" /></p>
<p>code :<input type="text" name="code" placeholder="Enter code" required value="<?php echo $row['code'];
?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
 
</div>
</div>
</body>
</html>
