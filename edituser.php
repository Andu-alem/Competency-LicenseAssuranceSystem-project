<?php

 
require('db.php');
  
require_once("adminheader.php");
$id=$_REQUEST['ID'];
$query = "SELECT * from user where ID='".$id."'"; 
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
$region =$_REQUEST['region'];
 $wereda =$_REQUEST['wereda'];
  $telephone =$_REQUEST['telephone'];
   $email =$_REQUEST['email'];

//SELECT `username`, `ID`, `password`, `region`, `zone`, `wereda`, `telephone`, `email`, `reg_by` FROM `user` WHERE 1
 
 //SELECT `name_of_catagory`, `gen_service`, `ID` FROM `busness_catagory` WHERE 1
 
$update="update user set  username='".$name."' ,ID='".$id."',region='".$region."',wereda='".$wereda."',telephone='".$telephone."',email='".$email."'where ID='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
 
if ($update) {

	 header("Location: view_user.php");
}
 
}else {
?>
<div align="center" style="position: absolute; right: 50%;">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['ID'];?>" />
<!-- "update user set  username='".$name."' ,ID='".$id."',password='".$password."',region='".$region."',wereda='".$wereda."',telephone='".$telephone."',email='".$email."'where id='".$id."'"; -->
 
<p>Name:<input type="text" name="name" placeholder="Enter name" required value="<?php echo $row['username'];
?>" /></p>
<p>ID:<input type="text" name="id" placeholder="Enter id" required value="<?php echo $row['ID'];
?>" /></p>

<p>region:<input type="text" name="region" placeholder="Enter region" required value="<?php echo $row['region'];
?>" /></p>

<p>wereda:<input type="text" name="wereda" placeholder="Enter wereda" required value="<?php echo $row['wereda'];
?>" /></p>

<p>telephone:<input type="text" name="telephone" placeholder="Enter telephone" required value="<?php echo $row['telephone'];
?>" /></p>

<p>email:<input type="email" name="email" placeholder="Enter email" required value="<?php echo $row['email'];
?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
 
</div>
</div>
</body>
</html>
