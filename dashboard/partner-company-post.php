<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['companyName'];
	$company_logo = $_FILES['companylogo'];
	$company_logo_name = $company_logo['name'];
	$company_logo_explode = explode('.', $company_logo_name);
	$company_logo_ext = end($company_logo_explode);
	$company_logo_file_size = $company_logo['size'];
	$allow_format = ['jpg','png','JPEG'];

	if (empty($name)) {
		$_SESSION['nameErr'] = 'Please Enter Your Partner Company Name';
		header('location:partner-company-add.php');
	}
	// Partner Company Image File Format Check
	elseif (!in_array($company_logo_ext, $allow_format)) {
		$_SESSION['companylogoErr'] = 'Please Select Use jpg, png, JPEG file format Image';
		header('location:partner-company-add.php');
	}
	// Partner Company Image File Size Check
	else if($company_logo_file_size > 5000000) { 
		$_SESSION['FileSizeErr'] = 'You typing to big size attachment file, Maximum 5MB';
		header('location:partner-company-add.php');
	}
	else{

		$new_ext = 'partner-company-logo'.'-'.rand(10,100).'.'.$company_logo_ext;
		
		$new_location = 'upload/partner-company/' . $new_ext;
		move_uploaded_file($company_logo['tmp_name'], $new_location);

		$insert = "INSERT INTO partner SET company_name = '$name' , company_logo = '$new_ext'";
		$query = mysqli_query($db, $insert);
		if ($query) {
			$_SESSION['PartnerUpdateSuccess'] = 'Partner Add Successfully Done';
			header('location:partner-company.php');
		}
		else{
			$_SESSION['PartnerUpdateErr'] = 'Partner Add Unsuccessfull';
			header('location:partner-company-add.php');
		}
	}
}
?>