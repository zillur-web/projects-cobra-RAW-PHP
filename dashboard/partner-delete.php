<?php
require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update = "UPDATE partner SET status = 2 WHERE id = $id";
if (mysqli_query($db, $update)) {
	$_SESSION['partner_delete']='Partner Delete Successfully';
	header('location:partner-company.php');
}
?>