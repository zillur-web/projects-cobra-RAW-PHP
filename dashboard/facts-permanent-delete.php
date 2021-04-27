<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM facts WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['FactsDeleteSuccess'] = 'Facts Permanetly Delete Successfully Done';
	header('location:facts-trush.php');
}
?>