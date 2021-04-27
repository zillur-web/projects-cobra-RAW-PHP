<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$future_projects = $_POST['future_projects'];
	$active_projects = $_POST['active_projects'];
	$year_experience = $_POST['year_experience'];
	$clients = $_POST['clients'];
	
	//future_projects
	if (empty($future_projects)) {
		$_SESSION['future_projectsErr'] = 'Please Enter Future Projects Number';
		header('location:facts-add.php');
	}
	//active_projects
	elseif (empty($active_projects)) {
		$_SESSION['active_projectsErr'] = 'Please Enter Active Projects Number';
		header('location:facts-add.php');
	}
	//year_experience
	elseif (empty($year_experience)) {
		$_SESSION['year_experienceErr'] = 'Please Enter Year Of Working Experience';
		header('location:facts-add.php');
	}
	//clients
	elseif (empty($clients)) {
		$_SESSION['clientsErr'] = 'Please Enter Clinets Number';
		header('location:facts-add.php');
	}
	//Database
	else {
		$insart = "INSERT INTO facts SET future_projects = '$future_projects', active_projects = '$active_projects', year_experience = '$year_experience', clients = '$clients'";
		$query = mysqli_query($db, $insart);

		if ($query) {
			$_SESSION['FactsAddSucess'] = 'Facts Add Successfull!';
			header('location:facts.php');
		}
		else{
			$_SESSION['FactsAddErr'] = 'Facts Add  Unsuccessfull, Please Try Again!';
			header('location:facts-add.php');
		}
	}



}
?>