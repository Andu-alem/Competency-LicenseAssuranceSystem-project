<?php 
	$value = 1;
	include('server.php') 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Clients registration</title>
	</head>
	<body>
		<div>
			<h3>Register First</h3>
		</div>
		<div>
			<form method="post" action="clientsregister.php">
				<?php include('error.php') ?>
				<label>First Name</label><br>
				<input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
				<label>Last Name</label><br>
				<input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
				<label>Phone</label><br>
				<input type="tel" name="telephone" value=""><br>
				<label>Email</label><br>
				<input type="email" name="email" value="<?php echo $email; ?>"><br>
				<label>Password</label><br>
				<input type="password" name="password"><br>
				<label>Confirm Password</label><br>
				<input type="password" name="confirm"><br>
				<input type="submit" name="submit">
			</form>
		</div>

	</body>
</html>