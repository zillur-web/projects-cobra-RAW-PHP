<?php
require_once '../database-connector.php';
$id = $_GET['id'];

$delete = "UPDATE contacts SET status = 3 WHERE id = $id";
if (mysqli_query($db, $delete)) {
	header('location:contacts.php');
}

?>