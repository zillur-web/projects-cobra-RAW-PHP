<?php
require_once '../database-connector.php';
session_start();
$id = $_GET['id'];

$update_status = "UPDATE contacts SET status = 2 WHERE id = $id";
if (mysqli_query($db, $update_status)) {
	$_SESSION['ContactsRestoreSuccess']='Contacts Restore Successfully Done';
	header('location:contacts.php');
}
?>