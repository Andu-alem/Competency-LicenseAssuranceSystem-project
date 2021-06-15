
<?php 
require('db.php');
require_once("adminheader.php");
//msql_select_db('user');
$query="SELECT * FROM `request_info` WHERE 1";
 $recoreds= mysqli_query($con,$query);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>to see the records of the competentee</title>
   <link rel="stylesheet" type="text/css" href="styletable.css">
</head>
<body> 
<table width="100%" border="1" cellpadding="1" cellspacing="1">
	<tr>
<th>username</th>
<th>telephone</th>
<th>service</th>
<th>submition_date</th>
<th>comment</th>
</tr>
<?php
while ($user=mysqli_fetch_assoc($recoreds)) {
	echo "<tr>";
   echo "<td>".$user['full_name']." </td>";
   echo "<td>".$user['telephone']." </td>";
   echo "<td>".$user['code']." </td>";
   echo "<td>".$user['submition_date']." </td>";
   echo "<td>".$user['comment']." </td>";
    
   echo "<td>".'<a href="edit.php?ID=<?php echo $user["ID"]; ?><img src="img/edit-icon.png" height="30" width="30"></a>'." </td>";
   echo "<td>".'<a href="delete_user.php?ID=<?php echo $user["ID"]; ?><img src="img/delete_post.gif"></a>'." </td>";
	echo "</tr>";
   $Ausername=$_SESSION['Ausername'];
     $id=$_SESSION['id'];
echo "$id";
}?>
</body>
</html>