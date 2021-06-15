<?php
require('db.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<link rel="stylesheet" type="text/css" href="styletable.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script type="text/javascript"></script>

	</head>
	<body>
		<div style="background-color: skyblue;">
			<img src="img/logo.jpg" style="width:100%; height: 100px">
			<h1 style="text-align: center; text-transform: capitalize;" >This is SNNPR CITA competency assurance system website</h1>
		</div>
		<nav class="nav">
			<ul align="center" style="font-size: 1.4rem;">
				<li class="inline"><a href="index.php">Home</a></li>
				<li class="inline dropdown"><a href="#" class="dropdwn">Online Services</a>
					<div class="dropdown-content">
						<a href="competencyform.php">Apply online for Competency</a>
						<a href="licenseform.php">Apply online for License</a>
						<a href="user_statuse.php">My Application status</a>
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
		<?php		
			// If form submitted, insert values into the database.
			if (isset($_REQUEST['full_name'])){
				$name =$_POST['full_name'];
				$pt=$_FILES['photo']['name'];
				//$pt = $_POST['photo'];
				$b_code=$_POST['code'];
				$trn_date = date("Y-m-d H:i:s");
				$comm=$_POST['comment'];
				$files=$_FILES['files']['name'];
				//$files=$_POST['files'];
				$rg = $_POST['region'];
				$zn = $_POST['zone'];
				$wd= $_POST['wereda'];
				$kl = $_POST['kebele'];
				$hn = $_POST['house_no'];
				$tp = $_POST['telephone'];
				$pobx = $_POST['p_o_box'];
				$fx = $_POST['fax'];
				$eml = $_POST['email'];
				$trn_date = date("Y-m-d H:i:s");
				$cond="SELECT 'email'FROM `address` WHERE email= '$eml'";
				if (!$cond) {				
					//die("you registered latter");
					echo "<script>alert('you registered latter')</script>";				
				}
				else{
					$dateValue = date("Y-m-d H:i:s");
					//$dateValue = '2012-12-05';					
					$convert_date = strtotime($dateValue);
					$month = date('F',$convert_date);
					$year = date('Y',$convert_date);
					$name_day = date('l',$convert_date);
					$day = date('j',$convert_date);
					//INSERT INTO `request_info`(`full_name`, `zone`, `telephone`, `telephone_for_service`, `fax_for_service`, `amount_of_internet`, `photo`, `code`, `year`, `months`, `date`, `submition_date`, `comment`, `files`, `phone_aggrement`, `fax_aggrement`, `internet_aggrement`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17])
					$ins_query= "INSERT INTO `request_info`(`full_name`,`zone`, `telephone`, `telephone_for_service`, `fax_for_service`, `amount_of_internet`, `photo`, `code`, `year`, `months`, `date`, `submition_date`, `comment`, `files`, `phone_aggrement`, `fax_aggrement`, `internet_aggrement`) VALUES ('$name','$zn','$tp','','','','$pt','$b_code','$year',' $month','$day','$trn_date','$comm','$files','','','')";
					$result = mysqli_query($con,$ins_query) or die(mysqli_error());
					if($tp!="" or $files!="" ) {   
						//copy( $_FILES['files']['name'], " files/$files" ); 
						// $_FILES['files']['size'] 
						move_uploaded_file($_FILES['photo']['tmp_name'],"photos/$pt");
						move_uploaded_file($_FILES['files']['tmp_name'],"files/$files"); 
					}
					else{
						echo "<script>alert('photo and files has not been uploaded to the folder')</script>";
					}
					$inst_query= "INSERT INTO `address`(region,zone,wereda,kebele,house_no,telephone,p_o_box,fax,email) VALUES('$rg','$zn','$wd','$kl','$hn','$tp','$pobx','$fx','$eml')";
					$res= mysqli_query($con,$inst_query) ;
					if ( $res and $result) {	
						echo "<script>alert('You  registerd successfully')</script>";
						// header("Location:home.php"); 
					}
				}
			}else{
		?>
		<div style="text-align: center; border-radius: 200px; border-color: white;background-color: white;">
			<h1 style="color:blue; font-family: initial;cursor:pointer;">WELL COME OUR CUSTOMER</h1>
		
		</div>
			<fieldset style="background-size:cover; background-color:white; padding-left: 30px;">
				<div class="form"> 
								
					<form name="form" method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="MAX_FILE_SIZE" value="25000"/><br />
						<input type="hidden" name="new" value="1" />
						<span><h3>General Information</h3></span>
						<p>Full name :<input type="text" name="full_name" placeholder="Enter full_Name" required /></p>
						choose your photo:
						<input type="file" name="photo" placeholder="Enter photo"/><br/>
						(25,000 byte limit) <br/>
						SERVICE:<select name="code">
						<?php 
							$count=1;
								$retrive="SELECT `name`, `code`,`catagory` FROM `service` ORDER BY name desc";
							$result = mysqli_query($con,$retrive);
							while($row = mysqli_fetch_assoc($result))

								{
						?>
							<option value="<?php echo $row['code'];?> "> 
							<?php echo $row["name"]; echo "("; echo $row['catagory']; echo ")"; $count++;}?></option>
						</select><br>
						comment: <p><textarea type= "text" name="comment" placeholder="say somethig about your request" cols="20" rows="5"></textarea>  </p>
						Files: <input type="file" name="files" value="files"><br />
						(25,000 byte limit) <br />
						<!-- <p><input type="date" name="date" placeholder="Enter date" required /></p>  -->
						<div>
							<p style="color: blue; font-size: 30;">THE ADDRESS:</p>
							<p>Region:<input type="text" name="region" placeholder="Enter region" required /></p>
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

							<p>Wereda:<input type="text" name="wereda" placeholder="Enter wereda" required /></p>
							<p>Kebele:<input type="text" name="kebele" placeholder="Enter kebele" required /></p>
							<p>House number:<input type="text" name="house_no" placeholder="Enter house_no" /></p>
							<p>telephone:<input type="text" name="telephone" placeholder="Enter telephone" required /></p> 
							<p>P-O-BOX:<input type="text" name="p_o_box" placeholder="Enter p_o_box"  /></p>
							<p>fax:<input type="text" name="fax" placeholder="Enter fax"  /></p>
							<p>Email<input type="email" name="email" placeholder="Enter email" required /></p>
							
							<div align="center">
								<input type="submit" name="submit" value="Register" />
							</div>
						</div>
					</form>
				</div>

				<br/><br/><br/><br/><br/><br/>
			</fieldset>
		<?php } ?>
		<?php require_once("footr.php"); ?>
	</body>
</html>
