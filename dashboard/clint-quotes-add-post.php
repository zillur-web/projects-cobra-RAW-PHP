<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name =$_POST['name'];
	$designation =$_POST['designation'];
	$quotes =mysqli_real_escape_string($db, $_POST['quotes']);
	$image = $_FILES['image'];
	$image_name = $image['name'];
	$explode = explode('.', $image_name);
	$ext = end($explode);
	$file_name = prev($explode);
	$allow_format = ['jpg','png','JPEG'];
	$file_size = $image['size'];

	//name
	if (empty($name)) {
		$_SESSION['ClintNameErr'] = 'Please Enter Clint Name';
		header('location:clint-quotes-add.php');
	}
	//designation
	elseif (empty($designation)) {
		$_SESSION['ClintDesignationErr'] = 'Please Enter Clint Designation';
		header('location:clint-quotes-add.php');
	}
	//quotes
	elseif (empty($quotes)) {
		$_SESSION['ClintquotesErr'] = 'Please Enter Clint Quotes';
		header('location:clint-quotes-add.php');
	}
	//image
	elseif (empty($image)) {
		$_SESSION['ClintImageErr'] = 'Please upload Clint Image';
		header('location:clint-quotes-add.php');
	}
	else if (!in_array($ext, $allow_format)) {
		$_SESSION['ClintExtErr'] = 'Please Use jpg, png, JPEG file format';
		header('location:clint-quotes-add.php');
	}
	else if($file_size > 5000000) { 
		$_SESSION['ClintImageFileSizeErr'] = 'You typing to big size attachment file, Maximum 5MB';
		header('location:clint-quotes-add.php');
	}
	//Database
	else {
		$new_ext = $file_name.'.'.$ext;

		$new_location = 'upload/quotes/' . $new_ext;
		move_uploaded_file($image['tmp_name'], $new_location);


		$insart = "INSERT INTO clint_quotes SET name = '$name', designation = '$designation', quotes = '$quotes', image = '$new_ext'";
		$query = mysqli_query($db, $insart);
		if ($query) {
			$_SESSION['ClintQuoteAddSuccess'] = 'Clints Add Successfull!';
			header('location:clint-quotes.php');
		}
		else{
			$_SESSION['ClintAddErr'] = 'Clints Add Unsuccessfull, Please Try Again!';
			header('location:clint-quotes-add.php');
		}
	}



}
?>