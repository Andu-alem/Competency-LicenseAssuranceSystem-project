<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> the admin pages</title>
		<link rel="stylesheet" type="text/css" href="styletable.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>

		<?php
			require('db.php');
		?>
		<div style="background-color: skyblue;">
			<img src="img/logo.jpg" style="width:100%; height: 100px">
			<h1 style="text-align: center; text-transform: capitalize;" >This is SNNPR CITA competency assurance system website</h1>
		</div>
		<header>
			<h1 style="font-family: romantic; background-repeat: repeat;">The system Admin page 
				<?php
					/*session_start();
					// echo $_SESSION['Ausername'];   
					// echo $_SESSION['id'];
					$id=$_SESSION['id'];
					$Ausername=$_SESSION['Ausername'];*/
				?>
			</h1>
		</header>
		<nav>
			<ul align="center" style="background-color: #002733; font-size:1.2rem;">
				<li class="inline"><a href="index.php">Home</a></li>
				<li class="inline" style="margin-right:23px"><a href="admin_registeration.php">Admin Registration</a></li>
				<li class="inline dropdown" style="margin-right:23px"><a href="#" class="dropdwn">Applicant Registration</a>
					<div class="dropdown-content">
						<a href="competency_form.php">Competency Application</a>
						<a href="license_form.php">License Application</a>     
					</div>
				</li> 
				<li class="inline dropdown" style="margin-right:23px"><a href="#" class="dropdwn">Show Requests</a>
					<div class="dropdown-content">
						<a href="view_licence_request.php">request for licence</a>
						<a href="view_competnecy_request.php">request for computency</a>
					</div> 
				</li>
				<li class="inline dropdown" style="margin-right:23px"><a href="#" class="dropdown">Reports</a>
					<div class="dropdown-content">
						<a href="monthly_report.php">monthly</a>
						<a href="#">quarter</a>
						<a href="annual_report.php">annualy</a>
					</div> 
				</li>
				<li class="inline dropdown" style="margin-right:23px"><a href="#" class="dropdwn">system manage</a>
					<div class="dropdown-content">
						<a  href="add_zone.php">add zone</a>
						<a href="view_zone.php">view zone</a>
						<a href="add_service.php">add service</a>
						<a href="view_service.php">view service</a>
						<a href="add_catagories.php">add bussiness catagories</a>
						<a href="view_catagories.php">view bussiness catagories</a>						
					</div> 
				</li>
				<li class="inline" style="margin-right:23px"><a href="logout.php">logout</a></li>
			</ul>		
		</nav>