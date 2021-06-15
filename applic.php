<?php 
	session_start();
	$name = "";
	$region = "";
	$zone = "";
	$woreda = "";
	//$kebele = "";
	//$house_no = "";
	//$p_o_box = "";
	//$fax = "";
	//$phone = "";
	$email = "";
	$catgorie = "";
	//$myfile = "";
	$sub_date = "";
	$errors = array();
	$connect = mysqli_connect('localhost' , 'root' , '' , 'cita_db');
	//taking registered applicant
	$firstname =$_SESSION['firstname']; 
	$lastname = $_SESSION['lastname'];
	$semail = $_SESSION['email'];
	$filename = $_FILES['myfile']['name'];
	$filecontent =addslashes(file_get_contents($_FILES['myfile']['temp_name']));
	$query1 = "SELECT Applicant_id FROM applicant_account WHERE First_name = '$firstname' AND Last_name = '$lastname' AND Email = '$semail'";
	$result = mysqli_query($connect , $query1); 
    while($row = mysqli_fetch_assoc($result)){
     	$App_id = $row['Applicant_id'];
     	//$Id = "APPLICANT ID IS: {$row['Applicant_id']}";
     	//echo "retrival info:-".var_dump($Id)."<br>";
     	$int = (int)$App_id;
     	//$int = intval($App_id);
     	//echo var_dump($int);
    }

	if(isset($_POST['submit'])){
		$name = mysql_real_escape_string($_POST['name']);
		//$region = mysql_real_escape_string($_POST['region']);
		$zone = $_POST['zone'];
		$region = $_POST['region']; 	
		$woreda = $_POST['woreda'];
		$kebele = $_POST['kebele'];
		$house_no = $_POST['house_number'];
		$p_o_box = $_POST['postbox'];
		$fax = $_POST['fax'];
		$phone = $_POST['tele'];
		$email = $_POST['email'];
		$catagorie =$_POST['catagorielist'];
		$myfiles =$_FILES['myfile']['name'];
		$filesize =$_FILES['myfile']['size'];
		$filetype =$_FILES['myfile']['type'];
		$path = pathinfo($myfiles);
		$path_name_ext = "upload/".$path['filename'].$path['extension'];
		echo $path_name_ext;

		if($_FILES['myfile']['name'] != ""){
			echo $myfiles."<br>".$filesize."<br>".$filetype;
			// copy( $_FILES['myfile']['name'], "/var/www/html" ) or 
			//    die( "Could not copy file!");
		}

		if(empty($name) && empty($region) && empty($zone) && empty($woreda) && empty($kebele) && empty($house_no) && empty($p_o_box) && empty($fax) && empty($phone) && empty($email) && empty($catagorie) ){
			array_push($errors , "the input field must be filled");
		}else{
			if(empty($name)){
				array_push($errors, "name nedded"); 	}
			if(empty($region)){
				array_push($errors, "region nedded"); 	}
			if(empty($email)){
				array_push($errors, "Email nedded"); 	}
			if(empty($woreda)){
				array_push($errors, "woreda nedded"); 	}
			if(empty($zone)){
				array_push($errors, "zone nedded"); 	}
			if(empty($kebele)){
				array_push($errors, "kebele nedded"); 	} 	
			if(empty($house_no)){
				array_push($errors, "house number nedded"); 	}
			if(empty($p_o_box)){
				array_push($errors, "Postbox nedded"); 	}
			if(empty($fax)){
				array_push($errors, "fax nedded"); 	}
			if(empty($phone)){
				array_push($errors, "Phone nedded"); 	}
			if(empty($catagorie)){
				array_push($errors, "catagorie nedded"); 	}
		}
		if(count($errors) == 0){
			$date_array = getdate();
	     	$sub_date = $date_array[year]."-".$date_array[mon]."-".$date_array[mday];
	   		//  echo $sub_date;
	 		$sql = "INSERT INTO applicants_address (Region,Zone,Woreda,Kebele,House_number,P_O_Box,Fax,Telephone,Email) VALUES ('$region' , '$zone' , '$woreda' , '$kebele', '$house_no' , '$p_o_box' , '$fax' , '$phone' , '$email')";
      		$address_sql = "SELECT Address_id FROM applicants_address WHERE Kebele = '$kebele' AND House_number = '$house_no' AND P_O_Box = '$p_o_box'";
      		$address_query = mysqli_query($connect , $address_sql);
			while($row = mysqli_fetch_assoc($address_query)){
			    //getting the row data
			    $adrs_id = $row['Address_id'];
			    //coverting string into int
			    $adrs = (int)$adrs_id;
			}
  			$file_cntnt =addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
			//inserting attached files into the database
      		$sql3 = "INSERT INTO attached_file(File_name,File_content) VALUES('$filename','$file_cntnt')";
      		mysqli_query($connect , $sql3) or die('Could not enter data into attached_file: ' . mysql_error());
			//getting the file id
      		$sql4 = "SELECT File_id FROM Attached_file WHERE File_name = '$filename' AND File_content = '$file_cntnt'";
      		mysqli_query($connect , $sql4);
      		$fileid_query = mysqli_query($connect , $sql4);
			while($row = mysqli_fetch_assoc($fileid_query)){
				//getting the row data
			    $file_id = $row['File_id'];
			    //coverting string into int
			    $fle_id = (int)$file_id;
			}
        	//converting to integer
      		$cata_code = (int)$catagorie;
       		$sql2 = "INSERT INTO applicant(Applicant_id, Name, Address_id, Sex, Service_code, Submition_date, Directed_to, Application_status, Attached_file,Applied_for) VALUES ('$int','$name','$adrs','MALE','$cata_code','$sub_date',9999,'ON PROG','$fle_id','Competency')";
       		//echo var_dump($int)."<br>";
	 		mysqli_query($connect , $sql);
	 		mysqli_query($connect , $sql2) or die('Could not enter data: ' . mysql_error());
		}
	}
?>