<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$future_projects = $_POST['future_projects'];
	$active_projects = $_POST['active_projects'];
	$year_experience = $_POST['year_experience'];
	$clients = $_POST['clients'];
	$id = $_SESSION['id'];
	
	//future_projects
	if (empty($future_projects)) {
		$_SESSION['future_projectsEditErr'] = 'Please Enter Future Projects Number';
		header('location:facts-edit.php');
	}
	//active_projects
	elseif (empty($active_projects)) {
		$_SESSION['active_projectsEditErr'] = 'Please Enter Active Projects Number';
		header('location:facts-edit.php');
	}
	//year_experience
	elseif (empty($year_experience)) {
		$_SESSION['year_experienceEditErr'] = 'Please Enter Year Of Working Experience';
		header('location:facts-edit.php');
	}
	//clients
	elseif (empty($clients)) {
		$_SESSION['clientsEditErr'] = 'Please Enter Clinets Number';
		header('location:facts-edit.php');
	}
	//Database
	else {
		$update = "UPDATE facts SET future_projects = '$future_projects', active_projects = '$active_projects', year_experience = '$year_experience', clients = '$clients' WHERE id = $id";
		$query = mysqli_query($db, $update);

		if ($query) {
			$_SESSION['FactsAddSucess'] = 'Facts Update Successfull!';
			header('location:facts.php');
		}
		else{
			$_SESSION['FactsUpdateErr'] = 'Facts Update  Unsuccessfull, Please Try Again!';
			header('location:facts-edit.php');
		}
	}



}
?>