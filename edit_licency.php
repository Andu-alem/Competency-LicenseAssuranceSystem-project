<?php
      require('db.php');      
      require_once("adminheader.php");     
      $telephone=$_REQUEST['telephone'];
      $query = "SELECT * from request_info where telephone='".$telephone."'";     
      $recoreds= mysqli_query($con,$query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($recoreds);
      $query1="SELECT * FROM address WHERE telephone='".$telephone."'";
      $recored= mysqli_query($con,$query1) or die ( mysqli_error()); 
      $row1 = mysqli_fetch_assoc($recored) ;
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>Update request</title>
            <!-- <link rel="stylesheet" href="css/style.css" /> -->
      </head>
      <body>
            <div class="form">
                  <h1>Update Record of licency </h1>
                  <?php
                        if(isset($_POST['new']) && $_POST['new']==1){
                              $full_name=$_REQUEST['full_name'];
                              $telephone =$_REQUEST['telephone'];
                              $code =$_REQUEST['code'];
                              $region =$_REQUEST['region'];
                              //$zone =$_REQUEST['zone'];
                              $wereda =$_REQUEST['wereda'];
                              $kebele =$_REQUEST['kebele'];
                              $house_no =$_REQUEST['house_no'];
                              $p_o_box =$_REQUEST['p_o_box'];
                              $fax =$_REQUEST['fax'];
                              $email =$_REQUEST['email'];   
                              // UPDATE `request_info` SET `full_name`=[value-1],`zone`=[value-2],`telephone`=[value-3],`telephone_for_service`=[value-4],`fax_for_service`=[value-5],`amount_of_internet`=[value-6],`photo`=[value-7],`code`=[value-8],`year`=[value-9],`months`=[value-10],`date`=[value-11],`submition_date`=[value-12],`comment`=[value-13],`files`=[value-14],`phone_aggrement`=[value-15],`fax_aggrement`=[value-16],`internet_aggrement`=[value-17] WHERE 1
                              // UPDATE `address` SET `region`=[value-1],`zone`=[value-2],`wereda`=[value-3],`town`=[value-4],`kebele`=[value-5],`house_no`=[value-6],`telephone`=[value-7],`p_o_box`=[value-8],`fax`=[value-9],`email`=[value-10] WHERE 1
                              $update1="update request_info set  full_name='".$full_name."' ,telephone='".$telephone."',code='".$code."' ";
                              mysqli_query($con, $update1) or die(mysqli_error());
                              $update2="update address set  region='".$region."' ,wereda='".$wereda."',kebele='".$kebele."',house_no='".$house_no."',p_o_box='".$p_o_box."',fax='".$fax."',email='".$email."' ";
                              mysqli_query($con, $update2) or die(mysqli_error()); 
                              if ($update1 and $update2 ) { 
                                    header("Location: view_user.php");
                              }
                        }else {
                  ?>
                  <div align="center" style="position: absolute; right: 50%;">
                        <form name="form" method="post" action=""> 
                              <input type="hidden" name="new" value="1" />
                              <input name="telephone" type="hidden" value="<?php echo $row['telephone'];?>" />
                              <!-- "update user set  username='".$name."' ,ID='".$id."',password='".$password."',region='".$region."',wereda='".$wereda."',telephone='".$telephone."',email='".$email."'where id='".$id."'"; -->                             
                              <p>Name:<input type="text" name="full_name" placeholder="Enter name" required value="<?php echo $row['full_name'];
                              ?>" /></p>
                              <p>telephone:<input type="text" name="telephone" placeholder="Enter id" required value="<?php echo $row['telephone'];
                              ?>" /></p>
                              <p>service:<input type="text" name="code" placeholder="Enter service " required value="<?php echo $row['code'];
                              ?>" /></p>
                              <p>region:<input type="text" name="region" placeholder="Enter region" required value="<?php echo $row1['region'];
                              ?>" /></p>
                              <p>wereda:<input type="text" name="wereda" placeholder="Enter wereda" required value="<?php echo $row1['wereda'];
                              ?>" /></p>
                              <p>kebele:<input type="text" name="kebele" placeholder="Enter kebele" required value="<?php echo $row1['kebele'];
                              ?>" /></p>
                              <p>HOUSE NO:<input type="text"  name="house_no" placeholder="Enter H NO" required value="<?php echo $row1['house_no'];
                              ?>" /></p>
                              <p>p_o_box:<input type="text" name="p_o_box" placeholder="Enter p_o_box" required value="<?php echo $row1['p_o_box'];
                              ?>" /></p>
                              <p>fax:<input type="text" name="fax" placeholder="Enter fax" required value="<?php echo $row1['fax'];
                              ?>" /></p>
                              <p>email:<input type="email" name="email" placeholder="Enter email" required value="<?php echo $row1['email'];
                              ?>" /></p>
                              <p><input name="submit" type="submit" value="Update" /></p>
                        </form>
                        <?php } ?>
                        <br /><br /><br /><br />           
                  </div>
            </div>
      </body>
</html>
