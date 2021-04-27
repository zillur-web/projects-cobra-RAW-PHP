<?php

require_once '../database-connector.php';
session_start();

$id = $_GET['id'];

$update_status = "UPDATE facts SET status = 'deactive' WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['FactsAddSucess']='Facts Delete Successfully';
	header('location:facts.php');
}
?>