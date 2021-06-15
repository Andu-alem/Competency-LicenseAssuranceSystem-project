<?php

 
require('db.php');
require_once("adminheader.php");
session_start();
 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" type="text/css" href="styletable.css">
</head>
<body>
<h2> Records of zones</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>ID</strong></th><th><strong>name</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
//SELECT `ID`, `name` FROM `zone` WHERE 1
$sel_query="SELECT * FROM `zon` ORDER BY id asc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["id"]; ?></td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><a href="editzone.php?id=<?php echo $row["id"]; ?>"><img src="img/edit_button.png" height="30" width="30"></a></td><td align="center"><a href="delete_zone.php?ID=<?php echo $row["id"]; ?>"><img src="img/delete_post.gif"></a></td></tr>
<?php $count++; } 
$Ausername=$_SESSION['Ausername'];
     $id=$_SESSION['id'];
//echo "$id";
?>
</tbody>
</table>

<br /><br /><br /><br />

</div>
</body>
</html>
