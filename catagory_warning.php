<?php 
    session_start();
    $id1=$_REQUEST['ID'];
    $_SESSION['ID']=$id1;
    echo '<script type="text/javascript">alert("are you sure to delete this catagory recored !");window.location=\'delete_catagory.php\';</script>'; 
?>