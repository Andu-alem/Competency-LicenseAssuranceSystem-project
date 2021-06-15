<?php 
require('db.php');
require_once("adminheader.php");
//msql_select_db('user');
$telephone=$_REQUEST['telephone'];
$query = "SELECT * from user where telephone='".$telephone."'"; 
 
 $recoreds= mysqli_query($con,$query); 
 $query1="SELECT * FROM `address` WHERE telephone='".$telephone."'";
 $recored= mysqli_query($con,$query1); 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>view the recored</title>
   <link rel="stylesheet" type="text/css" href="styletable.css">
</head>
<body>
<table width="100%" border="1" cellpadding="1" cellspacing="1">
	<tr>
	<th>username</th>
<th>telephone</th>
<th>sevice</th>
<th>region</th>
<th>zone</th>
<th>wereda</th>
<th>kebele</th>
<th>house_no</th>
<th>p_o_box</th>
<th>fax</th>
<th>email</th>
<th>edit</th>
<th>delete</th>
</tr>
<?php
//SELECT `full_name`, `telephone`, `telephone_for_service`, `fax_for_service`, `amount_of_internet`, `photo`, `code`, `submition_date`, `comment`, `files`, `phone_aggrement`, `fax_aggrement`, `internet_aggrement` FROM `request_info` WHERE 1

while ($user=mysqli_fetch_assoc($recoreds)) {
   $username=$user['username'];
   echo "$username";
	echo "<tr>";
   echo "<td>".$user['full_name']." </td>";
   echo "<td>".$user['telephone']." </td>";
   echo "<td>".$user['code']." </td>";

   // echo "<td>".$user['region']." </td>";
   // echo "<td>".$user['zone']." </td>";
   // echo "<td>".$user['wereda']." </td>";
   // echo "<td>".$user['telephone']." </td>";
   // echo "<td>".$user['email']." </td>";
   // echo "<td>".$user['reg_by']." </td>";
   }?>
   <?php 

while ($user1=mysqli_fetch_assoc($recored)) {?>
  <?php 
  //SELECT `region`, `zone`, `wereda`, `town`, `kebele`, `house_no`, `telephone`, `p_o_box`, `fax`, `email` FROM `address` WHERE 1

   echo "<td>".$user1['region']." </td>";
   echo "<td>".$user1['zone']." </td>";
   echo "<td>".$user1['wereda']." </td>";
   echo "<td>".$user1['kebele']." </td>";
    echo "<td>".$user1['house_no']." </td>";
     echo "<td>".$user1['p_o_box']." </td>";
      echo "<td>".$user1['fax']." </td>";
   echo "<td>".$user1['email']." </td>";
  
 ?>
   
<?php   
    ?>
   <td align="center"><a href="edituser.php?ID=<?php echo $user["ID"]; ?>">Edit</a></td><td align="center"><a href="delete_user.php?ID=<?php echo $user["ID"]; ?>">Delete</a></td>
	<?php  echo "</tr>";}?> 
<?php   

 $Ausername=$_SESSION['Ausername'];
     $id=$_SESSION['id'];
echo "$id";
  ?>
</table>
</body>
</html>