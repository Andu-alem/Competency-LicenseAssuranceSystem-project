<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styletable.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
      img {
          width:100%;
      }
    </style>
  </head>
  <body>
    <div style="background-color: skyblue;">
      <img src="img/logo.jpg" style="width:100%; height: 150px">
      <h1 style="text-align: center; text-transform: capitalize;" >This is SNNPR CITA competency assurance system website</h1>
    </div>
    <nav class="nav">
      <ul align="center" style="font-size:1.4rem">
        <li class="inline"><a href="index.php">Home</a></li>
        <li class="inline dropdown"><a href="#" class="dropdwn">Online Services</a>
          <div class="dropdown-content">
            <a href="requestfor_competency.php">Apply online for Competency</a>
            <a href="licenseform.php">Apply online for License</a>
            
              <div class="nav1"> 
                <a href="user_statuse.php">My Application status</a>
              </div>
          </div>
        </li>
        <li class="inline dropdown"><a href="#">About</a>
          <div class="dropdown-content">
            <a href="#">Online Application</a>
            <a href="#">System</a>
            <a href="#">Developers</a>
          </div>
        </li>
        <li class="inline"><a href="adminlogin.php">Log in</a></li>
      </ul>
    </nav>
    <div>
      <marquee> <h2 style="background-color: blue; font-family: romantic; width: 100%;" align="center">well come !</h2> </marquee>
    </div>
    <?php
      require('db.php');
      session_start();
      // If form submitted, insert values into the database.
      if (isset($_POST['Ausername'])){     
        $Ausername = stripslashes($_REQUEST['Ausername']); // removes backslashes
        $Ausername = mysqli_real_escape_string($con,$Ausername); //escapes special characters in a string
        //$id =  $_REQUEST['id'];
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        // $ps = $_REQUEST['position'];
        //$_SESSION['id']=$id;
        $query1 = "SELECT * FROM `user` WHERE username='$Ausername' and password='".md5($password)."'"; 
        //$query1 = "SELECT * FROM `user` WHERE username='$Ausername' and password='$password'"; 
        $result1 = mysqli_query($con,$query1) or die(mysqli_error());
        $row = mysqli_fetch_assoc($result1);
        $_SESSION['id']=$row['ID'];
        $_SESSION['Ausername']=$Ausername;
        $_SESSION['password']=$password;
        $id=$row['ID'];
        $rows1 = mysqli_num_rows($result1);
        $sql1=" SELECT  `position` FROM `roll` WHERE id= '$id'";  
        $result2 = mysqli_query($con,$sql1);
        $row = mysqli_fetch_assoc($result2);
        $rows2 = mysqli_num_rows($result2);
        $position=$row['position'];
        if( !($rows1 and $rows2)){
          //$_SESSION['Ausername'] = $Ausername;
          header("Location: admin.php");
          //    header("Location: user_page.php");
          /*if ($position=='admin') {          
            header("Location: admin.php"); // Redirect user to admin.php
          }else if ($position=='user'){
            header("Location: user_page.php");
          }*/
        }
        echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'adminlogin.php\';</script>'; 
      }else{   
    ?>
    <div style="background-color: white; padding:30px;">     
      <div class="forms" align="center">
        <h3 style="font-family:Romantic; font-size:1.8rem;">Admin login page</h3>
        <div style="background-color: white ; left: 30%;" >
          <!-- <img src="img/admin.png" height="300" width="30" > -->
          <form method="post" name="form" action="admin_main_page.php" onsubmit="myfunc()" id="frm">
            <label>Username:</label><br>
            <input class="in" type="text" name="Ausername" autocomplete="off"><br>
            <label>password:</label><br>
            <input type="password" name="password" autocomplete="off" title="your password must be 8 characters long">
            <br>
            <!-- <label>posission:</label>
            <input class="in" type="text" name="position" maxlength="8" autocomplete="off" ><br> -->
            <input type="submit" name="submit" value="Log in"  autofocus="on">
          </form>
        </div>
        <p id="demo" style="margin-left: 320px; font-size: 25px;"></p>
      </div>
    </div>
    <p style="font-size:1.3rem">Not registered yet? <a style="font-size:1.3rem" href='register.php'>Register Here</a></p>
    <br/><br/>
    <?php } ?>
  </body>
</html>