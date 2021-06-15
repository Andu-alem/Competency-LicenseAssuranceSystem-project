<?php 
  require('db.php');
  session_start();
  //$telephone=$_REQUEST['telephone'];
  $trn_date = date("Y-m-d H:i:s");
  $telephone=$_SESSION['telephone'];
  $Competency=$_SESSION['Competency'];
  $Reference=$_SESSION['Reference'];
  $TIN=$_SESSION['TIN'];
  //echo "$telephone";
?>
<!DOCTYPE html>
<html>
  <head>
    <title> approval of competenctee</title>
    <link rel="stylesheet" type="text/css" href="css1.css" media="all">
  </head>
  <body> 
    <div id="wrapper" >
      <!--the cover of all division-->
      <div id="header">
        <div style="position:absolute; left: 10%; top: 5%;">
          በኢትዩጵያ ፌዴራላዊ ዲሞክራሲያዊ ሪፐብሊክ <br> የመገናኛና ኢንፎርሜሽን ቴክኖሎጂ ሚኒስቴር  
        </div>
        <div align="center"> 
          <img src="images/alaba.jpg" width="80px;"> 
        </div>
        <div style="position:absolute; left: 65%; top: 5%;">
          The Federal Democratic Republic of Ethiopia <br> Ministry of Communication & Information Technology <br>
        </div> <br>
      
      </div>
      <div id="nav">
        <?php   
            $sql1=" SELECT  `code` FROM `request_info` WHERE telephone= '$telephone'";  
            $result = mysqli_query($con,$sql1);
            while($row = mysqli_fetch_assoc($result)) {
        ?> 
        <?php $code=$row["code"]; }?>       
        <div style="position: relative; left: 2%;"><u style="font-size:140%; text-decoration:underline;">
          <?php   
            $sql1=" SELECT  `name` FROM `service` WHERE code= '$code'";  
            $result = mysqli_query($con,$sql1);
            while($row = mysqli_fetch_assoc($result)) {
              echo $row["name"]; }
          ?>(ኮድ 
          <?php   
            $sql1=" SELECT  `code` FROM `request_info` WHERE telephone= '$telephone'";  
            $result = mysqli_query($con,$sql1);
            while($row = mysqli_fetch_assoc($result)) {
              echo $row["code"]; }
          ?>)</u> 
        </div>
      </div>
      
      <div id="content">
        <div align="center"> 
          <?php   
            $sql2=" SELECT  * FROM `request_info` WHERE telephone= '$telephone'";  
            $result1 = mysqli_query($con,$sql2);
            $ro = mysqli_fetch_assoc($result1);
          ?>
          <img height="100px" width="100px" src="photos/<?php echo $ro["photo"];  ?>" > 
        </div>
      </div>
      
      <div id="sidebar">
        <b>
          የግብር ከፋይ መለያ ቁጥር: <br>
          TIN :<?php echo $_SESSION['TIN']; ?> <br>
          የብቃት ማረጋገጫ ቁጥር :<br>
          licency No.<?php echo $_SESSION['Competency']; ?> <br>
          ብቃት ማረጋገጫ የተሰጠበት ቀን  <br>
            Date of Issuance : <?php echo "$trn_date"; ?><br>
          ቁጥር፡- ደኢ/መ/ኤ/ቴ/ኤ/ <br>
            Reference፡  <?php echo $_SESSION['TIN']; ?><br>
        </b>
      </div>
              
      <div id="footer">
        <b> 
        <?php   
          $sql1=" SELECT `full_name`, `telephone`, `photo`, `code`FROM `request_info` WHERE telephone= '$telephone'";  
          $result = mysqli_query($con,$sql1);
          while($row = mysqli_fetch_assoc($result)) {
        ?>
        1. የባለብቃት ማረጋገጫው ስም  <br>
          Name of the Competentee  : <?php echo $row["full_name"]; }?> <br>
        2. የባለብቃት ማረጋገጫው አድራሻ :<br></b>
        <u style="font-size:100%; text-decoration:underline; " > Address of the Competentee </u><br>
        <?php 
          $sql2="SELECT `region`, `zone`, `wereda`, `kebele`, `house_no`, `telephone`, `p_o_box`, `fax`, `email` FROM `address` WHERE telephone= '$telephone'";
          $result2 = mysqli_query($con,$sql2) or die(mysqli_error());
          while($row1 = mysqli_fetch_assoc($result2)) {
        ?>
        <b> • ክልል       <br>
          Region:<?php echo $row1["region"]; ?> <br>                         
          • ወረዳ    <br>
          Woreda : <?php echo $row1["wereda"]; ?>    <br> 
          • ቀበሌ  <br>
          Kebele : <?php echo $row1["kebele"]; ?> <br>
          • የቤት ቁጥር  <br>
          House No. : <?php echo $row1["house_no"]; ?> <br>
          • ሰልክ  ቁጥር <br>
          Telephone : <?php echo $row1["telephone"]; ?> <br>
          • ፖ.ሣ.ቁ  <br>
          P.O.Box  : <?php echo $row1["p_o_box"]; ?><br>
          • ፋክስ   <br>
          Fax  :<?php echo $row1["fax"]; ?> <br>                         
          • ኢ-ሜይል <br>
          E-mail : <?php echo $row1["email"]; }?> 
        </b>         
      </div>
      <div id="footer1">
        ለ------------ዓ.ም ታድሷል <br>
        Renewed for<br>
        ፊርማ--------------------------<br>
        Signature<br>
        ቀን/date-----------------------<br>
        ማህተም<br>
        Seal<br>
        -----------------------<br>
        የኃላፊው ስምና ፊርማ         <br>
        Name Official and Signature     
      </div>
      <div id="footer2">
        ለ------------ዓ.ም ታድሷል <br>
        Renewed for<br>
        ፊርማ--------------------------<br>
        Signature<br>
        ቀን/date-----------------------<br>
        ማህተም<br>
        Seal<br>
        -----------------------<br>
        የኃላፊው ስምና ፊርማ         <br>
        Name Official and Signature 
      </div>
      <div id="footer3">           
        ለ------------ዓ.ም ታድሷል <br>
        Renewed for<br>
        ፊርማ--------------------------<br>
        Signature<br>
        ቀን/date-----------------------<br>
        ማህተም<br>
        Seal<br>
        -----------------------<br>
        የኃላፊው ስምና ፊርማ         <br>
        Name Official and Signature 
      </div>
      <div id="footer4">          
        ለ------------ዓ.ም ታድሷል <br>
        Renewed for<br>
        ፊርማ--------------------------<br>
        Signature<br>
        ቀን/date-----------------------<br>
        ማህተም<br>
        Seal<br>
        -----------------------<br>
        የኃላፊው ስምና ፊርማ         <br>
        Name Official and Signature 
      </div>
      <div id="footer5">
        <b> ይህ ፈቃድ በቴሌኮሙኒኬሽን አዋጅ ቁጥር 49/1889(እንደተሸሻለው) አንቀጽ 10 ንዑስ አንቀጽ 4 መሠረት በወጣው የቴሌኮሙኒኬሽን ሪሴል አገልግሎት እና የቴሌሴንተር ፈቃድ መመሪያ ቁጥር 1/1995 መሠረት የተሰጠ፡፡ <br> <br>
          This license is issued as per the Directive on resale and Telecenter in Telecommunication No1/2002 that is issued on the basis of Article 10 sub-Article 4 of Telecommunication Proclamation No 49/1996 (as amended) 
        </b>
        <br><br><br> <br><br><br> <br><br><br> <br><br><br> 
        <h1 style=" text-decoration:underline; " align="center"  >ማስታወቂያ</h1>
        <b> <u>ሀ/ የመገልገያ መሣሪያዎች</u> <br>
          • እንደሚፈለገው የአገልግሎት ዓይነት ብዛት ለስልክ ሪሴል ፣ለፋክስ ሪሴል እና ለኢንተርኔት ራሴል አገልግሎቶች የማያስፈለጉ መሣሪያወችን በሙሉ፣ <br>
        <b><u> ሐ/  የሥራ ቦታ ሁኔታ</u> </b> <br>
          • ለአገልግሎት በቂ እና ምቹ የሆነ የስራ ቦታ፣ <br>
        <b><u> መ/ የማመልከቻና ተያያዥ ሰነዶች</u></b><br>
          • የስልክ መስመሮችን በተመለከተ ከኢትዮ-ቴሌኮም ጋር የተፈራረመ ውል፣ <br>  
          • የግብር ከፋይ መለያ ሰርተፊኬት (TIN)<br> 
          • የንግድ ምዝገባ የምስክር ወረቀት<br> 
          • ድርጅቱ የንግድ ማህበር ከሆነ የመመስረቻ ጽሁፍና የመተዳደሪያ ደንብ፣<br> 
          • አመልካቹ ለትርፍ ያልተቋቋማ ከሆነ ህጋዊ ሰውነት ያገኘበት ሰረተፊኬት፣<br> 
          • ሁለት ጉርድ ፎቶግራፎች ወይም የንግድ ማህበር ከሆነ የስራ አስኪያጁን 2 ጉርድ ፎቶግራፎች ፣
      </div>
    </div>
  </body>
</html>