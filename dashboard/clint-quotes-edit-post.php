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
	$id = $_SESSION['id'];

	//name
	if (empty($name)) {
		$_SESSION['ClintNameErr'] = 'Please Enter Clint Name';
		header('location:clint-quotes-edit.php');
	}
	//designation
	elseif (empty($designation)) {
		$_SESSION['ClintDesignationErr'] = 'Please Enter Clint Designation';
		header('location:clint-quotes-edit.php');
	}
	//quotes
	elseif (empty($quotes)) {
		$_SESSION['ClintquotesErr'] = 'Please Enter Clint Quotes';
		header('location:clint-quotes-edit.php');
	}
	//image
	elseif (empty($image)) {
		$_SESSION['ClintImageErr'] = 'Please upload Clint Image';
		header('location:clint-quotes-edit.php');
	}
	else if (!in_array($ext, $allow_format)) {
		$_SESSION['ClintExtErr'] = 'Please Use jpg, png, JPEG file format';
		header('location:clint-quotes-edit.php');
	}
	else if($file_size > 5000000) { 
		$_SESSION['ClintImageFileSizeErr'] = 'You typing to big size attachment file, Maximum 5MB';
		header('location:clint-quotes-edit.php');
	}
	//Database
	else {
		$new_ext = $file_name.'.'.$ext;

		$selectOldImage = "SELECT * FROM clint_quotes WHERE id = $id";
        $oldQ = mysqli_query($db,$selectOldImage);
        $oldImage = mysqli_fetch_assoc($oldQ);
        $imageOldLocation = '../upload/quotes/'.$oldImage['image'];
        if(file_exists($imageOldLocation)){
            unlink($imageOldLocation);
        }

		$update = "UPDATE clint_quotes SET name = '$name', designation = '$designation', quotes = '$quotes', image = '$new_ext' WHERE id = $id";
		$query = mysqli_query($db, $update);
		if ($query) {
			$new_location = 'upload/quotes/' . $new_ext;
			move_uploaded_file($image['tmp_name'], $new_location);
			$_SESSION['ClintQuoteAddSuccess'] = 'Clints Update Successfull!';
			header('location:clint-quotes.php');
		}
		else{
			$_SESSION['ClintAddErr'] = 'Clints Update Unsuccessfull, Please Try Again!';
			header('location:clint-quotes-edit.php');
		}
	}



}
?>