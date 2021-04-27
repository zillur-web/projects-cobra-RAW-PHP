<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title =$_POST['title'];
	$year =$_POST['year'];
	$result =$_POST['result'];
	$id = $_SESSION['id'];

	if (empty($title)) {
		$_SESSION['EditQualificationTitleErr'] = 'Please Enter Your Qualification Title';
		header('location:edit-qualification.php');
	}
	elseif (empty($year)) {
		$_SESSION['EditQualificationYearErr'] = 'Please Enter Your Passing Year';
		header('location:edit-qualification.php');
	}
	elseif (empty($result)) {
		$_SESSION['EditQualificationResultErr'] = 'Please Select Your  Result';
		header('location:edit-qualification.php');
	}
	else {
		$qualification_update = "UPDATE qualifications SET title = '$title', year = '$year', result = '$result' WHERE id = $id";
		$qualification_query = mysqli_query($db, $qualification_update);

		if ($qualification_query) {
			$_SESSION['EditQualificationSucess'] = 'Qualification Edit Successfull!';
			header('location:qualification.php');
		}
		else{
			$_SESSION['EditQualificationErr'] = 'Qualification Edit Unsuccessfull, Please Try Again!';
			header('location:qualification.php');
		}
	}
}
?>