<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> user statuse</title>
		<link rel="stylesheet" type="text/css" href="styletable.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>

		<div><img src="img/logo.jpg" style="width:100%; height: 100px"></div>
		<div style="background-color: skyblue;">
			<h1 style="text-align: center; text-transform: capitalize;" >This is SNNPR CITA competency assurance system website</h1>
		</div>
		<nav class="nav">
			<ul align="center" style="font-size:1.3rem;">
				<li class="inline"><a href="index.php">Home</a></li>
				<li class="inline dropdown"><a href="#" class="dropdwn">Online Services</a>
					<div class="dropdown-content">
						<a href="requestfor_competency.php">Apply online for Competency</a>
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
		<form method="post" action="sttt.php">
			<input type="text" name="phone" placeholder="enter your registration phone">
			<input type="submit" name="submit" value="search">
		</form>
	</body>
</html>