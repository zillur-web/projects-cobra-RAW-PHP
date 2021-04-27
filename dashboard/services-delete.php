<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update = "UPDATE services SET status = 'deactive' WHERE id = $id";
if (mysqli_query($db, $update)) {
	$_SESSION['ServicesDelete']='Services Delete Successfully';
	header('location:services.php');
}

?>