
<!DOCTYPE html>
<html>
	<head>
		<title>requirements for approval </title>
	</head>
	<body>
		<?php 
			require('db.php');
			$telephone=$_REQUEST['telephone'];
			$trn_date = date("Y-m-d H:i:s");
			
			if (isset($_REQUEST['submit'])) {
				$username = stripslashes($_REQUEST['username']); // removes backslashes
				$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($con,$password);
				$comment=$_REQUEST['comment'];
				$sql= "SELECT * FROM `user` WHERE username ='$username' and $password=".md5($password)." ";
				$result=mysqli_query($con,$sql) or die(mysqli_error());
				if ($result) {
					$sql=	"SELECT `full_name`, `telephone`, `code` FROM `request_info` WHERE telephone='$telephone'";  
					$result = mysqli_query($con,$sql) or die(mysqli_error());
					while($row = mysqli_fetch_assoc($result)) {
						$full_name=$row["full_name"];
						$code=$row["code"];
						$sql=  "INSERT INTO `app_request_info`(No, name, service, app_by, app_date, comment, telephone) VALUES ('','$full_name','$code','$username','$trn_date','$comment','$telephone')";  
						$result =mysqli_query($con,$sql) or die(mysqli_error());
						if ($result) { 
							<a href="approval.php?telephone=<?php echo $row["telephone"]; ?>">approve</a>
						}
					}
				}
			}
		?>
		<form action="" method="post" enctype=" multipart/form-data">
			name:<input type="text" name="name"> <br>	
			password:<input type="password" name="password"><br>
			comment:<textarea type="text" name="comment"></textarea> <br>
			<input type="submit" name="submit" value="approve">
		</form>
	</body>
 </html>