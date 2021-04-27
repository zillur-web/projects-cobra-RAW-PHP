<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$tagline =$_POST['tagline'];
	$email =$_POST['email'];
	$phone =$_POST['phone'];
	$office_address =$_POST['office_address'];
	$copyright =$_POST['copyright'];
	$about =mysqli_real_escape_string($db, $_POST['about']);
	$id = $_SESSION['id'];
	$logo = $_FILES['logo'];
	$image = $_FILES['logo']['name'];
	$explode = explode('.', $image);
	$ext = end($explode);
	$file_name = prev($explode);
	$allow_format = ['jpg','png','JPEG'];
	$file_size = $_FILES['logo']['size'];


	//TagLine
	if (empty($tagline)) {
		$_SESSION['taglineErr'] = 'Please Enter Tag Line';
		header('location:add-settings.php');
	}
	//Email
	elseif (empty($email)) {
		$_SESSION['emailErr'] = 'Please Enter Email Address';
		header('location:add-settings.php');
	}
	//Phone
	elseif (empty($phone)) {
		$_SESSION['phoneErr'] = 'Please Enter Phone Number';
		header('location:add-settings.php');
	}
	//Office Address
	elseif (empty($office_address)) {
		$_SESSION['office_addressErr'] = 'Please Enter office address';
		header('location:add-settings.php');
	}
	//Copyright
	elseif (empty($copyright)) {
		$_SESSION['copyright'] = 'Please Enter Copyright';
		header('location:add-settings.php');
	}
	//Logo
	elseif (empty($logo)) {
		$_SESSION['logoErr'] = 'Please upload logo';
		header('location:add-settings.php');
	}
	else if (!in_array($ext, $allow_format)) {
		$_SESSION['logo_ext_Err'] = 'Please Use jpg, png, JPEG file format';
		header('location:add-settings.php');
	}
	else if($file_size > 5000000) { 
		$_SESSION['logo_size_Err'] = 'You typing to big size attachment file, Maximum 5MB';
		header('location:add-settings.php');
	}
	//About
	elseif (empty($about)) {
		$_SESSION['aboutErr'] = 'Please Enter Aabout';
		header('location:add-settings.php');
	}
	//Database
	else {
		$new_ext = $file_name.'.'.$ext;
			
		$new_location = 'upload/logo/' . $new_ext;
		

		$img_check = "SELECT * FROM settings WHERE id = $id";
		$img_query = mysqli_query($db, $img_check);
		$img_assoc = mysqli_fetch_assoc($img_query);
		$old_img_location = 'upload/logo/'.$img_assoc['logo'];


		if ($img_assoc['logo'] != 'default.png') {
			if (file_exists($old_img_location)) {
				unlink($old_img_location);
			}
		}
		move_uploaded_file($_FILES['logo']['tmp_name'], $new_location);


		$settings_insart = "INSERT INTO settings SET copyright = '$copyright', about = '$about', tagline = '$tagline', office_address = '$office_address', email = '$email', phone = '$phone', logo = '$new_ext'";
		$settings_query = mysqli_query($db, $settings_insart);

		if ($settings_query) {
			$_SESSION['SettingsAddSucess'] = 'Settings Add Successfull!';
			header('location:settings.php');
		}
		else{
			$_SESSION['SettingsAddErr'] = 'Settings Add  Unsuccessfull, Please Try Again!';
			header('location:add-settings.php');
		}
	}



}
?>