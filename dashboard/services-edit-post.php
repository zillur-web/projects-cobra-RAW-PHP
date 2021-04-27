<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_SESSION['id'];
	$title =$_POST['title'];
	$icon =$_POST['icon'];
	$summary =$_POST['summary'];

	if (empty($title)) {
		$_SESSION['ServicesEditTitleErr'] = 'Please Enter Your Service Title';
		header('location:services-edit.php');
	}
	elseif (empty($icon)) {
		$_SESSION['ServicesEditIconErr'] = 'Please Choose The Service Icon';
		header('location:services-edit.php');
	}
	elseif (empty($summary)) {
		$_SESSION['ServicesEditSummaryErr'] = 'Please Enter Your Service Summary';
		header('location:services-edit.php');
	}
	else {
		$services_Update = "UPDATE services SET title = '$title', icon = '$icon', summary = '$summary' WHERE id = $id";
		$services_query = mysqli_query($db, $services_Update);
		if ($services_query) {
			$_SESSION['ServicesEditSucess'] = 'Services Update Successfull!';
			header('location:services.php');
		}
		else{
			$_SESSION['ServicesEditErr'] = 'Services Update  Unsuccessfull, Please Try Again!';
			header('location:services-edit.php');
		}
	}



}
?>