<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM clint_quotes WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['ClientDeleteSuccess'] = 'Client Permanetly Delete Successfully Done';
	header('location:client-trush.php');
}
?>