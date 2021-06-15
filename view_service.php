<?php

 
include("db.php");
require_once("adminheader.php");
//include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" type="text/css" href="styletable.css">
</head>
<body>
<div class="form">
 
<h2 style="font-family: romantic;"> Records of services</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>R.NO</strong></th><th><strong>Name</strong></th><th><strong>code</strong></th><th><strong>catagory</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
 
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM `service` ORDER BY code desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["code"]; ?></td><td align="center"><?php echo $row["catagory"]; ?></td><td align="center"><a href="editservice.php?code=<?php echo $row["code"]; ?>"><img src="img/edit_button.png" height="30" width="30"></a></td><td align="center"><a href="delete_service.php?code=<?php echo $row["code"]; ?>"><img src="img/delete_post.gif"></a></td></tr>
<?php $count++; }
$Ausername=$_SESSION['Ausername'];
     $id=$_SESSION['id'];
echo "$id";
 ?>
</tbody>
</table>

<br /><br /><br /><br />

</div>
</body>
</html>
