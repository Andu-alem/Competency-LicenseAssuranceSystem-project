<?php 
/*

//

session_start();
	$firstname = "";
	$lastname = "";
	$email = "";
	$errors = array();
 $connect = mysqli_connect('localhost' , 'root' , '' , 'cita_db');

 if(isset($_POST['submit'])){
 	$firstname = mysql_real_escape_string($_POST['firstname']);
 	$lastname = mysql_real_escape_string($_POST['lastname']);
 	$password = mysql_real_escape_string($_POST['password']);
 	$confirm = mysql_real_escape_string($_POST['confirm']);
 	$email = mysql_real_escape_string($_POST['email']);
 	$phone = mysql_real_escape_string($_POST['telephone']);
if(empty($firstname) && empty($firstname) && empty($firstname) && empty($firstname)){
	array_push($errors , "the input field must be filled");
}
else{
 	if(empty($firstname)){
 		array_push($errors, "Firstname nedded"); 	}
	 if(empty($lastname)){
 		array_push($errors, "Lastname nedded"); 	}
	 if(empty($email)){
 		array_push($errors, "Email nedded"); 	}
	 if(empty($password)){
 		array_push($errors, "Password nedded"); 	}
 	 if($password != $confirm){
 	 	array_push($errors , "the two password is not match");
 	 }
 	}
	 if(count($errors) == 0){
	 	$password = md5($password);
	 	$sql = "INSERT INTO applicant_account (First_name,Last_name,Phone,Email,Password) VALUES ('$firstname' , '$lastname' , '$phone' , '$email' , '$password'  )";
	 	mysqli_query($connect , $sql);
//	 	 $last_id = $connect->insert_id;
	 	$_SESSION['firstname'] = $firstname;
	 	$_SESSION['lastname'] = $lastname;
	 	$_SESSION['email'] = $email;
	 	$_SESSION['password'] = $password;
	 	$_SESSION['success'] = "welcome man";

if($value == 1){
	 	header('location:competencyform.php');}

if($value == 2){
	 	header('location:licenseform.php');}

	}
}*/


if($value == 1){
	 	header('location:competencyform.php');}

if($value == 2){
	 	header('location:licenseform.php');}


 ?>