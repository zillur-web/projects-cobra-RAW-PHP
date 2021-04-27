<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM user_info WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['delete_user'] = 'User Permanetly Delete Successfully Done';
	header('location:user-trush.php');
}
?>