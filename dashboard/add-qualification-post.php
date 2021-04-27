<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title =$_POST['title'];
	$year =$_POST['year'];
	$result =$_POST['result'];

	if (empty($title)) {
		$_SESSION['AddQualificationTitleErr'] = 'Please Enter Your Qualification Title';
		header('location:add-qualification.php');
	}
	elseif (empty($year)) {
		$_SESSION['AddQualificationYearErr'] = 'Please Enter Your Passing Year';
		header('location:add-qualification.php');
	}
	elseif (empty($result)) {
		$_SESSION['AddQualificationResultErr'] = 'Please Select Your  Result';
		header('location:add-qualification.php');
	}
	else {
		$qualification_insart = "INSERT INTO qualifications SET id = '$id', title = '$title', year = '$year', result = '$result'";
		$qualification_query = mysqli_query($db, $qualification_insart);

		if ($qualification_query) {
			$_SESSION['AddQualificationSucess'] = 'Qualification Add Successfull!';
			header('location:qualification.php');
		}
		else{
			$_SESSION['AddQualificationErr'] = 'Qualification Add Unsuccessfull, Please Try Again!';
			header('location:add-qualification.php');
		}
	}
}
?>