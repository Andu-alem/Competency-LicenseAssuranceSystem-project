<?php

 include("db.php");
//require('db.php');
require_once("adminheader.php");
//include("auth.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<!-- <link rel="stylesheet" href="css/style.css" /> -->
<link rel="stylesheet" type="text/css" href="styletable.css">
</head>
<body>
<div class="form">
 
<h2> Records of request information for competency</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<!-- 
	INSERT INTO `request_info`(`full_name`, `telephone`, `photo`, `code`, `submition_date`, `comment`, `files`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7]) -->

<tr><th><strong>R.NO</strong></th><th><strong>Name</strong></th><th><strong>telephone</strong></th><th><strong>service</strong></th><th><strong>submition_date</strong></th><th><strong>comment</strong></th><th><strong>files</strong></th><th><strong>apointment</strong></th><th><strong>edit</strong></th><th><strong>approve</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query=" SELECT `full_name`, `telephone`, `code`, `submition_date`, `comment`, `files` FROM `request_info` WHERE code='65521' or 12 or code='65522'or code='65523' or code='65524' or code='62801' or code='62802' or code='62803' or code='62804' or code='61521'or code='61522' or code='61523' or code='61524'or code='63154'or code='86100' or code='86200' or code='86300' or code='86400' or code='86500' or code='86900' or code='88740' ORDER BY full_name desc;";
$result = mysqli_query($con,$sel_query);
$row = mysqli_fetch_assoc($result);
while($row = mysqli_fetch_assoc($result)) {
 ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["full_name"]; ?></td><td align="center"><?php echo $row["telephone"]; ?></td><td align="center"><?php echo $row["code"]; ?></td><td align="center"><?php echo $row["submition_date"]; ?></td><td align="center"><?php echo $row["comment"]; ?></td><td align="center"><?php echo $row["files"]; ?></td><td align="center"><a href="stut.php?telephone=<?php echo $row["telephone"]; ?>"><img src="img/apoint.ico"height="30" width="30"></a></td><td align="center"><a href="edit_competency.php?telephone=<?php echo $row["telephone"]; ?>"><img src="img/edit-icon.png" height="30" width="30"></a></td><td align="center"><a href="req_approv.php?telephone=<?php echo $row["telephone"]; ?>"><img src="img/images.jpg"height="30" width="30"></a></td><td align="center"><a href="delete_request.php?telephone=<?php echo $row["telephone"]; ?>"><img src="img/delete_post.gif"></a></td></tr>
<?php $count++; 
}
 
$_SESSION['telephone']=$row["telephone"] ;
$Ausername=$_SESSION['Ausername'];
 //$id=$_SESSION['id'];
// echo "$id";
 ?>
</tbody>
</table>
 
<br /><br /><br /><br />
 
	
</div>
</form>
</div>
</body>
</html>