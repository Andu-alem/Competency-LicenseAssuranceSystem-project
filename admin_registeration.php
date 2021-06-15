<?php
//require('db.php');
require_once("adminheader.php");
 // echo $_SESSION['Ausername'];   
	// 	echo $_SESSION['password'];
	// 	echo $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Registration of users</title>
	<link rel="stylesheet" type="text/css" href="styletable.css">
	

	</head>
	<body>
		<?php
			// If form submitted, insert values into the database.
			if (isset($_REQUEST['username'])){

				$username = stripslashes($_REQUEST['username']); // removes backslashes
				$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
				$id=$_REQUEST['ID'];
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($con,$password);
				$rg=$_REQUEST['region'];
				$zn=$_REQUEST['zone'];
				$wd=$_REQUEST['wereda'];
				$tn=$_REQUEST['telephone'];
				$email =  stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($con,$email);
				$ws=$_SESSION['id'];
				$pss=$_REQUEST['position'];
				$cap=$_REQUEST['can_approve'];
				//$trn_date = date("Y-m-d H:i:s");z

				//INSERT INTO `user`(`username`, `ID`, `password`, `region`, `zone`, `wereda`, `telephone`, `email`, `reg_by`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
				$query = "INSERT into `user` (username,ID,password,region,zone, wereda,telephone, email, reg_by) VALUES ('$username','$id','".md5($password)."','$rg' ,'$zn', '$wd','$tn','$email', '$ws')";
				$result = mysqli_query($con,$query) or
				die(mysqli_error());
				$query1= "INSERT INTO `roll`(id,position,can_approve) VALUES ('$id','$pss', '$cap')";
				$result1 = mysqli_query($con,$query1)or
				die(mysqli_error());
				if($result1 and $result){
					echo "<div><h3>You are registered successfully.</h3></div>";
				}
			}else{
		?>
		<fieldset> <legend>THE USER REGISTRATION FORM</legend>
		<div class="form">
			<h1>Registration </h1>
			<div align="center">
				<form name="registration" action="" method="post"><br/>
					<input type="text" name="username" placeholder="Username" required /><br/>
					<input type="text" name="ID" placeholder="ID" required /><br/>
					<input type="password" name="password" placeholder="Password" required /><br/>
					<input type="text" name="region" placeholder="Region" required /><br/>
					<!-- <input type="text" name="zone" placeholder="Zone" required /><br/> -->
					zone:
					<select name="zone">
						<?php 
							$count=1;
								$retrive= "SELECT * FROM `zon` ORDER BY id asc";
							$result = mysqli_query($con,$retrive);
							while($row = mysqli_fetch_assoc($result)){
						?>
						<option value="<?php echo $row['id'];?>"> 
						<?php echo $row["name"]; $count++;}?>
						</option>
					</select><br>

					<input type="text" name="wereda" placeholder="wereda" required /><br/>
					<input type="text" name="telephone" placeholder="telephone" required /><br/>
					<input type="email" name="email" placeholder="Email" required /><br/>
					<!-- <input type="text" name="reg_by" placeholder="reg_by" required /><br/> -->
					<input type="text" name="position" placeholder="position" required /><br/>
					CAN SERVE:<select name="can_approve">
						<?php 
							$count=1;
								$retrive="SELECT `name`, `code`,`catagory` FROM `service` ORDER BY name desc";
							$result = mysqli_query($con,$retrive);
							while($row = mysqli_fetch_assoc($result))
						{?>
						<option value="<?php echo $row['code'];?> "> <?php echo $row["name"]; echo "("; echo $row['catagory']; echo ")"; $count++;
						}?></option> <br>	
						
					<input type="submit" name="submit" value="Register" />
				</form>
			</div>
		</div>
		</fieldset>
		<br /><br />
		<?php
		} ?>
	</body>
</html>