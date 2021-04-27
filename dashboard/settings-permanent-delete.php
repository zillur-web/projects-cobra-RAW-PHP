<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM settings WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['settings_delete_success'] = 'Settings Permanetly Delete Successfully Done';
	header('location:settings-trush.php');
}
?>