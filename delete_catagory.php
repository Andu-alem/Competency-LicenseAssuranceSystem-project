<?php

echo '<script type="text/javascript">alert("are you sure to delete this catagory recored !");window.location=\'delete_catagory.php\';</script>'; 
require('db.php');
$id=$_REQUEST['ID'];
$query = "DELETE FROM busness_catagory WHERE ID='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view_catagories.php"); 
?>