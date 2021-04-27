<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$edit_name = $_POST['name'];
	// Company Logo
	$company_logo = $_FILES['logo'];
	$company_logo_name = $company_logo['name'];
	$company_logo_explode = explode('.', $company_logo_name);
	$company_logo_ext = end($company_logo_explode);
	$company_logo_file_size = $company_logo['size'];
	$allow_format = ['jpg','png','JPEG'];
	$id = $_SESSION['id'];

	if (empty($edit_name)) {
		$_SESSION['nameErr'] = 'Please Enter Your Partner Company Name';
		header('location:partner-company-edit.php');
	}
	elseif (!in_array($company_logo_ext, $allow_format)) {
		$_SESSION['companylogoErr'] = 'Please Select Use jpg, png, JPEG file format Image';
		header('location:partner-company-edit.php');
	}
	// Partner Company Image File Size Check
	else if($company_logo_file_size > 5000000) { 
		$_SESSION['FileSizeErr'] = 'You typing to big size attachment file, Maximum 5MB';
		header('location:partner-company-edit.php');
	}
	else{
		$new_ext = 'partner-company-logo'.'-'.rand(10,100).'.'.$company_logo_ext;

		$selectOldImage = "SELECT * FROM partner WHERE id = $id";
        $oldQ = mysqli_query($db,$selectOldImage);
        $oldImage = mysqli_fetch_assoc($oldQ);
        $imageOldLocation = '../upload/partner-company/'.$oldImage['company_logo'];

        if(file_exists($imageOldLocation)){
            unlink($imageOldLocation);
        }
		$updateImage = "UPDATE partner SET company_name = '$edit_name', company_logo ='$new_ext' WHERE id = $id";
        $qImage = mysqli_query($db,$updateImage);
        if ($qImage) {
        	$new_location = 'upload/partner-company/' . $new_ext;
			move_uploaded_file($company_logo['tmp_name'], $new_location);
			$_SESSION['PartnerEditSuccess'] = 'Partner Edit Successfully Done';
			header('location:partner-company.php');
        }
		else{
			$_SESSION['PartnerEditErr'] = 'Partner Edit Unsuccessfull';
			header('location:partner-company-edit.php');
		}
	}
}
else{
	header('location:partner-company.php');
}
?>