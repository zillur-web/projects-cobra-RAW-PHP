<?php
require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update_status = "UPDATE clint_quotes SET status = 'active' WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['ClintQuoteAddSuccess']='Client Restore Successfully Done';
	header('location:clint-quotes.php');
}
?>