<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$id =$_POST['id'];
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
	$file_name = 'logo';
	$allow_format = ['jpg','png','JPEG'];
	$file_size = $_FILES['logo']['size'];

	//Tagline
	if (empty($tagline)) {
		$_SESSION['taglineErr'] = 'Please Enter Tag Line';
		header('location:edit-settings.php');
	}
	//email
	elseif (empty($email)) {
		$_SESSION['emailErr'] = 'Please Enter Email Address';
		header('location:edit-settings.php');
	}
	//Phone
	elseif (empty($phone)) {
		$_SESSION['phoneErr'] = 'Please Enter Phone Number';
		header('location:edit-settings.php');
	}
	//Office Address
	elseif (empty($office_address)) {
		$_SESSION['office_addressErr'] = 'Please Enter office address';
		header('location:edit-settings.php');
	}
	//Copyright
	elseif (empty($copyright)) {
		$_SESSION['copyrightErr'] = 'Please Enter Copyright';
		header('location:edit-settings.php');
	}
	//About
	elseif (empty($about)) {
		$_SESSION['aboutErr'] = 'Please Enter Aabout';
		header('location:edit-settings.php');
	}
	//Logo
	elseif (empty($logo)) {
		$_SESSION['logoErr'] = 'Please Select logo';
		header('location:edit-settings.php');
	}
	else if (!in_array($ext, $allow_format)) {
		$_SESSION['logo_ext_Err'] = 'Please Use PNG Logo';
		header('location:edit-settings.php');
	}
	else if($file_size > 5000000) { 
		$_SESSION['logo_size_Err'] = 'You typing to big size attachment file, Maximum 5MB';
		header('location:edit-settings.php');
	}
	//Database
	else {
		$newUp_ext = $file_name.'.'.$ext;

		$new_location = 'upload/logo/' . $newUp_ext;
		

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

		$settings_update = "UPDATE settings SET copyright = '$copyright', about = '$about', tagline = '$tagline', office_address = '$office_address', email = '$email', phone = '$phone', logo = '$newUp_ext' WHERE id = $id";
		$settings_query = mysqli_query($db, $settings_update);


		if ($settings_query) {
			$_SESSION['SettingsUpdateSucess'] = 'Settings Update Successfull!';
			header('location:settings.php');
		}
		else{
			$_SESSION['SettingsUpdateErr'] = 'Settings Update  Unsuccessfull, Please Try Again!';
			header('location:edit-settings.php');
		}
	}
}
?>