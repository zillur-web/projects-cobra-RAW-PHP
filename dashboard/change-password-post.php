<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$current_password =$_POST['current_password'];
	$new_password =$_POST['new_password'];
	$confirm_password =$_POST['confirm_password'];
	$pswd_regex = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%.]{8,20}$/';
	$id = $_SESSION['id'];

	if (empty($current_password)) {
		$_SESSION['CurrentPassErr'] = 'Please Enter Your Current Password';
		header('location:change-password.php');
	}
	elseif (empty($new_password)) {
		$_SESSION['NewPassErr'] = 'Please Enter Your New Password';
		header('location:change-password.php');
	}

	else if (!preg_match($pswd_regex, $new_password)) {
		$_SESSION['NewNewPassValidErr']='Please Enter Your Valid Password';
		header('location:change-password.php');
	}
	elseif (empty($confirm_password)) {
		$_SESSION['NewConPassErr'] = 'Please Enter Your New Confirm Password';
		header('location:change-password.php');
	}
	else if ($new_password != $confirm_password) {
		$_SESSION['NewConPassMatchErr'] = 'Your Password dose not match';
		header('location:change-password.php');
	}
	else {

		$select_password = "SELECT * FROM user_info WHERE id = $id";
		$password_query = mysqli_query($db, $select_password);
		$after_assoc = mysqli_fetch_assoc($password_query);
		$hash = $after_assoc['password'];

		if (!password_verify($current_password, $hash)){
			$_SESSION['PasswordCheckErr'] = 'Current Password Dose Not Match, Please Enter Correct Password';
			header('location:change-password.php');
		}
		else{
			$new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
			$password_update = "UPDATE user_info SET password = '$new_password_hash' WHERE id = $id";
			$password_update_quary = mysqli_query($db, $password_update);

			if ($password_update_quary) {
				$_SESSION['PasswordUpdateSucess'] = 'Password Change Successfull!';
				header('location:change-password.php');
			}
			else{
				$_SESSION['PasswordUpdateErr'] = 'Password Change Unsuccessfull, Please Try Again!';
				header('location:change-password.php');
				
			}
		}


		
	}
}
?>