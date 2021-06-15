<?php 
require('db.php');
require_once("adminheader.php");
$date=date("Y-m-d H:i:s");
  $sel_query="SELECT count(*)
from app_request_info
where app_by ='$date';"
// $result = mysqli_query($con,$sel_query);
// $row = mysqli_fetch_assoc($result);
// $res=$row['']
echo " SELECT name, (SELECT count(*) from app_request_info where  name = 'mersibon melese' ) as num_instructors from app_request_info";
 
 ?>