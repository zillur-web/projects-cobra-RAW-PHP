<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update_status = "UPDATE clint_quotes SET status = 'deactive' WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['QuotesDelete']='Client Quotes Successfully';
	header('location:clint-quotes.php');
}

?>