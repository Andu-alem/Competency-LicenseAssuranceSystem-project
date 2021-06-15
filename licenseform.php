	<?php 
	require("db.php");
	if (isset($_POST['submit'])) {
		$name=$_POST['name'];
		$code=$_POST['code'];
		$teleamount=$_POST['teleamount'];
		// $photo=$_FILES['photo']['name'];
		$faxamount=$_POST['faxamount'];
		$intamount=$_POST['intamount'];
		$phone_aggrement=$_POST['phone_aggrement'];
		$fax_aggrement=$_POST['fax_aggrement'];
		$email_aggrement=$_POST['email_aggrement'];
		$region=$_POST['region'];
		$woreda=$_POST['woreda'];
		$zone=$_POST['zone'];
		$kebele=$_POST['kebele'];
		$houseno=$_POST['houseno'];
		$phone=$_POST['phone'];
		$fax=$_POST['fax'];
		$email=$_POST['email'];
		$file=$_FILES['file']['name'];
		$trn_date = date("Y-m-d H:i:s");
		$comment=$_POST['comment'];
		
		$ins_query= "INSERT INTO `request_info`(`full_name`,`zone`, `telephone`, `telephone_for_service`, `fax_for_service`, `amount_of_internet`, `photo`, `code`, `submition_date`, `comment`, `files`, `phone_aggrement`, `fax_aggrement`, `internet_aggrement`) VALUES ('$name','$zone','$phone','$teleamount','$faxamount','$intamount','','$code','$trn_date','$comment','$file','$phone_aggrement','$fax_aggrement','$email_aggrement')";
		$result = mysqli_query($con,$ins_query) or die(mysqli_error());
		if($file!="" ){   
			//copy( $_FILES['files']['name'], " files/$files" ); 
			// $_FILES['files']['size'] 
			// move_uploaded_file($_FILES['photo']['tmp_name'],"photos/$pt");
			move_uploaded_file($_FILES['file']['tmp_name'],"files/$files"); 
		}
		$inst_query= "INSERT INTO `address`(region,zone,wereda,kebele,house_no,telephone,p_o_box,fax,email) VALUES('$region','','$woreda','$kebele','$houseno','$phone','','$fax','$email')";
		$res= mysqli_query($con,$inst_query) ;
		if ( $res and $result) {	
			echo "<script>alert('You  registerd successfully')</script>";}
		else{
			die(" data is not inserted !");
		}
	}
?> 

<!DOCTYPE html>
<html>
    <head>
	    <title>License Form</title>
	    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styletable.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script type="text/javascript"></script>

    </head>
	<body>
		<div style="background-color: skyblue;">
			<img src="img/logo.jpg" style="width:100%; height: 150px">
			<h1 style="text-align: center; text-transform: capitalize;" >This is SNNPR CITA competency assurance system website</h1>
		</div>
		<nav class="nav">
			<ul align="center" style="font-size:1.4rem;">
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
		<fieldset style="background-size:cover; background-color:white; padding-left: 10%;">
			<div class="head">
				<h1>Application form for license</h1>
			</div>
			<div class="container-main">
				<form action="" method="post" enctype="multipart/form-data">
					<label>Applicant Name:</label><br>
					<input type="text" name="name" class="apliname"><br>
					<span id="label">The service catagorie the license asked for:</span><br>
					<select name="code">
						<?php 
							$count=1;
							$retrive="SELECT `name`, `code`,`catagory` FROM `service` where catagory !='fekade'  ORDER BY name asc";
							$result = mysqli_query($con,$retrive);
							while($row = mysqli_fetch_assoc($result)){?>
							<option value="<?php echo $row['code'];?> "> 
								<?php echo $row["name"]; echo "("; echo $row['catagory']; echo ")"; $count++;}?>
							</option>
					</select><br>
					<span id="label">The amount of telephone line or internet account: </span><br>
					<div class="formdiv">
						<label>Telephone_for service:</label>
						<input type="text" name="teleamount"><br>
					</div>
					<div class="formdiv">
						<label>Fax for service:</label>
						<input type="text" name="faxamount"><br>
					</div>
					<div class="formdiv">
						<label>Internet for service:</label>
						<input type="text" name="intamount"><br>
					</div>
					<div>
						<span id="label">The address where the service is given:</span><br>
						<div class="formdiv">
							<label>Region:</label><br>
							<input type="text" name="region"><br>
						</div>
						<div class="formdiv">
							<label>zone:</label><br>
							<select name="zone">
								<?php 
								$count=1;
								$retrive= "SELECT * FROM `zon` ORDER BY ID asc";
								$result = mysqli_query($con,$retrive);
								while($row = mysqli_fetch_assoc($result)){?>
									<option value="<?php echo $row['ID'];?>"> 
										<?php echo $row["name"]; $count++;}?>
									</option>

							</select><br>
						</div>
						<div class="formdiv">
							<label>Woreda:</label><br>
							<input type="text" name="woreda"><br>
						</div>
						<div class="formdiv">
							<label>Town:</label><br>
							<input type="text" name="Town"><br>
						</div> 
						<div class="formdiv">
							<label>Kebele:</label><br>
							<input type="text" name="kebele"><br>
						</div>
						<div class="formdiv">
							<label>House No.:</label><br>
							<input type="text" name="houseno"><br>
						</div>
						<div class="formdiv">
							<label>Telephone:</label><br>
							<input type="text" name="phone"><br>
						</div>
						<div class="formdiv">
							<label>Fax:</label><br>
							<input type="text" name="fax"><br>
						</div>
						<div class="formdiv">
							<label>Email:</label><br>
							<input type="email" name="email"><br>
						</div>
						<div class="formdiv">
							<label>ለሚጤየቀዉ የተሌ ሴንተር አገልግሎት ወይም የኢንተርኔት ካፌ አገልግሎት የሪሰል ዉል ከኢትዩቴሌኮም ጋራ መኖር አለመኖሩ ይገለጽ፡፡</label><br>
							phone_aggrement: <textarea type="text" name="phone_aggrement" placeholder="የሪሴል ዉል ካለቁጥርቹ ወይም የየዙሩ ስሞች ይገልጹ"></textarea>  
							fax_aggrement: <textarea  type="text" name="fax_aggrement" placeholder="የሪሴል ዉል ካለቁጥርቹ ወይም የየዙሩ ስሞች ይገልጹ" ></textarea> 
							email_aggrement:<textarea type="text" name="email_aggrement" placeholder="የሪሴል ዉል ካለቁጥርቹ ወይም የየዙሩ ስሞች ይገልጹ" ></textarea>
						</div>
						<div>
							<span>add documents below</span><br>
							<input type="file" name="file" multiple ><br>
							<div class="formdiv">
								<p><textarea type= "text" name="comment" placeholder="say somethig about your request" cols="20" rows="5"></textarea>  </p>
							</div>
							<input type="submit" name="submit" value="submit"><br>
						</div>
					</div>
				</form>
			</div>
			</fieldset>
		<?php require_once("footr.php"); ?>
	</body>
</html>