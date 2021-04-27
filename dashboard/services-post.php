<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title =$_POST['title'];
	$icon =$_POST['icon'];
	$summary =$_POST['summary'];

	if (empty($title)) {
		$_SESSION['ServicesTitleErr'] = 'Please Enter Your Service Title';
		header('location:services-add.php');
	}
	elseif (empty($icon)) {
		$_SESSION['ServicesIconErr'] = 'Please Choose The Service Icon';
		header('location:services-add.php');
	}
	elseif (empty($summary)) {
		$_SESSION['ServicesSummaryErr'] = 'Please Enter Your Service Summary';
		header('location:services-add.php');
	}
	else {
		$insart = "INSERT INTO services (title, icon, summary) VALUES ('$title', '$icon', '$summary')";;
		$Services_icon_query = mysqli_query($db, $insart);

		if ($Services_icon_query) {
			$_SESSION['ServicesUpdateSucess'] = 'Services Update Successfull!';
			header('location:services.php');
		}
		else{
			$_SESSION['ServicesUpdateErr'] = 'Services Update  Unsuccessfull, Please Try Again!';
			header('location:services-add.php');
		}
	}



}
?>