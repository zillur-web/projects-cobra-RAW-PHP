<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update = "UPDATE socials SET status = 'deactive' WHERE id = $id";
if (mysqli_query($db, $update)) {
	$_SESSION['social_delete']='Socials Delete Successfully';
	header('location:social.php');
}

?>