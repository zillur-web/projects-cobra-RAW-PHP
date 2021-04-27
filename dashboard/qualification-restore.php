<?php
require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update_status = "UPDATE qualifications SET status = 1 WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['qualificationsRestoreSucess']='Qualification Restore Successfully Done';
	header('location:qualification.php');
}
?>