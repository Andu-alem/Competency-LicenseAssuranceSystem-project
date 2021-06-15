<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="styletable.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div style="background-color: skyblue;">
			<img src="img/logo.jpg" style="width:100%; height: 200px">
			<h1 style="text-align: center; text-transform: capitalize;" >This is SNNPR CITA competency assurance system website</h1>
		</div>
		<nav class="nav">
			<ul align="center" style="font-size: 1.4rem;">
				<li class="inline"><a href="#">Home</a></li>
				<li class="inline dropdown" style="margin-right:23px"><a href="#" class="">Online Services</a>
					<div class="dropdown-content">
						<a href="competencyform.php">Apply online for Competency</a>
						<a href="licenseform.php">Apply online for License</a>
						<a href="user_status.php" style="margin-right:10px">My Application status</a>
					</div>
				</li>
				<li class="inline dropdown" style="margin-right:23px"><a class="" href="#">About</a>
				<div class="dropdown-content">
					<a href="#">Online Application</a>
					<a href="#">System</a>
					<a href="#">Developers</a>
				</div>
				</li>
				<li class="inline" style="margin-right:23px"><a href="adminlogin.php">Log in</a></li>
			</ul>
		</nav>
		<div id="para" style="margin: 30px; background: white; padding: 10px">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et <br> dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. <br> Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor <cite>incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</cite>
				quis nostrud exercitation ullamco <br> laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. <br> Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.l</p>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et <br> dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco <del>laboris nisi ut aliquip ex ea commodo</del>
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. <br> Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris <br> nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. <br> Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. <br> Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. <br> Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. <br> Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. <br> Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<footer>Copyright, &copy 2019  All Right Reserved.</footer>
	</body>
	
	<script type="text/javascript">
		//responsiveness of the page
		if(matchMedia){
			const mp = window.matchMedia("(max-width: 500px)");
			mp.addListener(WidthChange);
			WidthChange(mp);			
		}
		function WidthChange(mp){
			if(mp.matches){
			document.getElementById("img-res").style.margin = "20px";
			document.getElementById("para").style.margin = "10px";				
			}else{
			document.getElementById("img-res").style.margin = "20px 170px 5px 230px";
			document.getElementById("para").style.margin = "100px";
			}
		}
	</script>
</html>