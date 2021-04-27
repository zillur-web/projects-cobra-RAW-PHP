<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM qualifications WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['qualificationDeleteSuccess'] = 'Qualification Permanetly Delete Successfully Done';
	header('location:qualification-trush.php');
}
?>