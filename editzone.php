<?php

 
require('db.php');
  
require_once("adminheader.php");
$id=$_REQUEST['id'];
$query = "SELECT * from zon where id='".$id."'"; 
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
$id=$_REQUEST['id'];
 
$name =$_REQUEST['name'];
 
 //SELECT `name_of_catagory`, `gen_service`, `ID` FROM `busness_catagory` WHERE 1
 
$update="update zon set  name='".$name."'where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
 
if ($update) {

	 header("Location: view_zone.php");
}
 
}else {
?>
<div align="center" style="position: absolute; right: 50%;">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
 
<p>Name:<input type="text" name="name" placeholder="Enter name" required value="<?php echo $row['name'];
?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
 
</div>
</div>
</body>
</html>
