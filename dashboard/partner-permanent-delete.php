<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM partner WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['PartnerDeleteSuccess'] = 'Partner Permanetly Delete Successfully Done';
	header('location:partner-trush.php');
}
?>