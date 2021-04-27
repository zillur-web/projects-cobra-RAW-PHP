<?php
require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update_status = "UPDATE facts SET status = 'active' WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['FactsAddSucess']='Facts Restore Successfully Done';
	header('location:facts.php');
}
?>