<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM socials WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['socialDeleteSuccess'] = 'Socials Permanetly Delete Successfully Done';
	header('location:social-trush.php');
}
?>