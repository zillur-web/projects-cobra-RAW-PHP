<?php
require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update_status = "UPDATE portfolio SET status = 'active' WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['PortfolioUpdateSuccess']='Portfolio Restore Successfully Done';
	header('location:portfolio.php');
}
?>