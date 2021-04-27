<?php

	require_once '../database-connector.php';
	session_start();

	$id = $_GET['id'];

	$delete = "UPDATE qualifications SET status = 2 WHERE id = $id";
	$delete_query = mysqli_query($db,$delete);
	if ($delete_query) {
		$_SESSION['QualificationDelete'] = 'Qualification Delete Successfull!';
		header('location:qualification.php');
	}
	else {
		$_SESSION['QualificationDeleteErr'] = 'Qualification Delete Unsuccessfull, Please Try Again!';
		header('location:qualification.php');
	}
?>