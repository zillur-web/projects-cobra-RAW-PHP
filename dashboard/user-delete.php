<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['user_id'];

$update_status = "UPDATE user_info SET status = 2 WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['delete_user']='User Delete Successfully';
	header('location:user-list.php');
}

	/*$delete = "DELETE FROM user_info WHERE id = $id";
	$delete_query = mysqli_query($db,$delete);
	if ($delete_query) {
		$_SESSION['delete_user'] = 'User Delete Successfully';
		header('location:user-list.php');
	}*/
?>