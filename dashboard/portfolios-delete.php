<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update = "UPDATE portfolio SET status = 'deactive' WHERE id = $id";
if (mysqli_query($db, $update)) {
	$_SESSION['portfolio_delete']='Portfolios Delete Successfully';
	header('location:portfolio.php');
}

?>