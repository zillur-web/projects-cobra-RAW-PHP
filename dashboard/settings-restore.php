<?php
require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update_status = "UPDATE settings SET status = 'active' WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['SettingsRestoreSucess']='Settings Restore Successfully Done';
	header('location:settings.php');
}
?>