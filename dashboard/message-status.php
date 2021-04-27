<?php 
	require_once '../database-connector.php';
	require_once 'session.php';
	$id = $_GET['id'];
	$select = "SELECT * FROM contacts WHERE id = $id";
	$query = mysqli_query($db,$select);
	$assoc = mysqli_fetch_assoc($query);

	if ($assoc['status'] == 1) {
		$read = "UPDATE contacts SET status = 2 WHERE id = $id";
		$read_query = mysqli_query($db, $read);
		if ($read_query) {
			header('location:contacts.php');
		}
	}
	else{
		$unread = "UPDATE contacts SET status = 1 WHERE id = $id";
		$unread_query = mysqli_query($db, $unread);
		if ($unread_query) {
			header('location:contacts.php');
		}
	}
?>