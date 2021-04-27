<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM portfolio WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['portfolioDeleteSuccess'] = 'Portfolios Permanetly Delete Successfully Done';
	header('location:portfolio-trush.php');
}
?>