<?php
require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update_status = "UPDATE user_info SET status = 1 WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['user_restore']='User Restore Successfully Done';
	header('location:user-list.php');
}
?>