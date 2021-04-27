<?php

require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM contacts WHERE id = $id";
$delete_query = mysqli_query($db,$delete);
if ($delete_query) {
	$_SESSION['ContactsRestoreSuccess'] = 'Message Permanetly Delete Successfully Done';
	header('location:message-trush.php');
}
?>