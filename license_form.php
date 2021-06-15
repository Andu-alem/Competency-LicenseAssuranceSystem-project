<?php 
	//require("db.php");
	require_once("adminheader.php");
	if (isset($_POST['submit'])) {
		$name=$_POST['name'];
		$phone=$_POST['phone']; 
		$teleamount=$_POST['teleamount'];
		$faxamount=$_POST['faxamount'];
		$intamount=$_POST['intamount'];
		$photo=$_FILES['photo']['name']; 
		$phone_aggrement=$_POST['phone_aggrement'];
		$fax_aggrement=$_POST['fax_aggrement'];
		$email_aggrement=$_POST['email_aggrement'];
		$code=$_POST['code'];
		$region=$_POST['region'];
		$woreda=$_POST['woreda'];
		$town=$_POST['Town'];
		$kebele=$_POST['kebele'];
		$houseno=$_POST['houseno'];
		$fax=$_POST['fax'];
		$zone=$_POST['zone'];
		$email=$_POST['email'];
		$file=$_FILES['files']['name'];
		// $trn_date = date("Y-m-d H:i:s");
		$comment=$_POST['comment'];
		$dateValue = date("Y-m-d H:i:s");
		//$dateValue = '2012-12-05';
		$convert_date = strtotime($dateValue);
		$month = date('F',$convert_date);
		$year = date('Y',$convert_date);
		$name_day = date('l',$convert_date);
		$day = date('j',$convert_date);
		//INSERT INTO `request_info`(`full_name`, `telephone`, `telephone_for_service`, `fax_for_service`, `amount_of_internet`, `photo`, `code`, `year`, `months`, `date`, `submition_date`, `comment`, `files`, `phone_aggrement`, `fax_aggrement`, `internet_aggrement`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16])  
		$sql1="INSERT INTO `request_info`(`full_name`,`zone`, `telephone`, `telephone_for_service`, `fax_for_service`, `amount_of_internet`, `photo`, `code`, `year`, `months`, `date`, `submition_date`, `comment`, `files`, `phone_aggrement`, `fax_aggrement`, `internet_aggrement`) VALUES ('$name','$zone','$phone','$teleamount' ,'$faxamount','$intamount','$photo','$code','$year','$month','$day','$dateValue','$comment','$file','$phone_aggrement',' $fax_aggrement','$email_aggrement')";
		$result=mysqli_query($con,$sql1) or die(mysqli_error());
		$sqli= "INSERT INTO `address`(`region`, `zone`, `wereda`, `town`, `kebele`, `house_no`, `telephone`, `p_o_box`, `fax`, `email`) VALUES ('$region','$zone','$woreda','$town','$kebele','$houseno','$phone', '','$fax', '$email')";
		$result1=mysqli_query($con,$sqli) or die(mysqli_error());

		if($photo!="" or $file!="" ){   
			//copy( $_FILES['files']['name'], " files/$files" ); 
			// $_FILES['files']['size'] 
			move_uploaded_file($_FILES['photo']['tmp_name'],"photos/$photo");
			move_uploaded_file($_FILES['files']['tmp_name'],"files/$file"); 
		}else{
			echo "<script>alert('photo and files has not been uploaded to the folder')</script>";
		}
		if ($result and $result1) {
			//die("your data inserted seccessfully !");
			echo '<script type="text/javascript">alert("your data inserted seccessfully !");window.location=\'view_licency.php\';</script>';
		}else{
			die(" data is not inserted !");
		}
	}
?> 

<!DOCTYPE html>
<html>
	<head>
		<title>License Form</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="application.css">
	</head>
	<body>
		<div style="background-color: white;">
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
						$retrive="SELECT `name`, `code`,`catagory` FROM `service` ORDER BY name desc";
						$result = mysqli_query($con,$retrive);
						while($row = mysqli_fetch_assoc($result)){
					?>
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
							$retrive= "SELECT * FROM `zon` ORDER BY id asc";
							$result = mysqli_query($con,$retrive);
							while($row = mysqli_fetch_assoc($result)){
						?>
						<option value="<?php echo $row['id'];?>"> 
							<?php echo $row["name"]; $count++;}?>
						</option>
					</select>
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
					phone_aggrement:<textarea type="text" name="phone_aggrement" placeholder="የሪሴል ዉል ካለቁጥርቹ ወይም የየዙሩ ስሞች ይገልጹ"></textarea> 
					fax_aggrement:<textarea type="text" name="fax_aggrement" placeholder="የሪሴል ዉል ካለቁጥርቹ ወይም የየዙሩ ስሞች ይገልጹ" ></textarea>
					email_aggrement:<textarea type="text" name="email_aggrement" placeholder="የሪሴል ዉል ካለቁጥርቹ ወይም የየዙሩ ስሞች ይገልጹ" ></textarea>
				</div>	
				<div>
					<span>add documents below</span><br>
					required files:<input type="file" name="files" multiple><br>
					photo:<input type="file" name="photo" multiple><br>
					<div class="formdiv">
						<p><textarea type= "text" name="comment" placeholder="say somethig about your request" cols="20" rows="5"></textarea>  </p></div>
						<input type="submit" name="submit" value="submit"><br>
					</div>
				</div>
			</form>
		</div>
		<?php require_once("footr.php"); ?>
	</body>`
</html>