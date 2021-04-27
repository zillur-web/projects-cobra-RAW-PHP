<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update = "UPDATE settings SET status = 'deactive' WHERE id = $id";
if (mysqli_query($db, $update)) {
	$_SESSION['settings_delete']='Settings Delete Successfully';
	header('location:settings.php');
}

?>