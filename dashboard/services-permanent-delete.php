<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM services WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['ServicesUpdateSucess'] = 'Services Permanetly Delete Successfully Done';
	header('location:services-trush.php');
}
?>