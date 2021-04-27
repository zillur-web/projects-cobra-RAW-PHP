<?php
	require_once '../database-connector.php';
	session_start();
	$id = $_SESSION['id'];
	$name =$_POST['name'];
	$email =$_POST['email'];

	$update_status = "UPDATE user_info SET name = '$name', email ='$email' WHERE id = $id";
		if (mysqli_query($db, $update_status)) {
			$_SESSION['update_user']='User Update Successfully';
			header('location:user-list.php');
		}
	

	
?>