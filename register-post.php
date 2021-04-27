<?php
require_once 'database-connector.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pswd = $_POST['pswd'];
	$Cpswd = $_POST['Cpswd'];
	$name_regex = '/^([a-zA-Z ]{3,})*$/'; 
	$email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
	$pswd_regex = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%.]{8,20}$/';

	// Name Input Check
	if (empty($name)) {
		$_SESSION['NameInputErr'] = 'Please Enter Your Name';
		header('location:register.php');
	}
	// Name Validation Check
	else if (!preg_match($name_regex, $name)) {
		$_SESSION['NameValidErr'] = 'Please Enter alphabets and whitespase are allowed';
		header('location:register.php');
	}
	// Email Input Check
	else if (empty($email)) {
		$_SESSION['EmailInputErr'] = 'Please Enter Your Email Address';
		header('location:register.php');
	}
	// Email Validation Check
	else if (!preg_match($email_regex, $email)) {
		$_SESSION['EmailValidErr']='Please Enter Your Valid Email Address';
		header('location:register.php');
	}
	// Password Input Check
	else if (empty($pswd)) {
		$_SESSION['PswdInputErr'] = 'Please Enter Your Password';
		header('location:register.php');
	}
	// Password Validation Check
	else if (!preg_match($pswd_regex, $pswd)) {
		$_SESSION['PswdValidErr']='Please Enter Your Valid Password';
		header('location:register.php');
	}
	// Confirm Password Input Check
	else if (empty($Cpswd)) {
		$_SESSION['CpswdInputErr'] = 'Please Enter Your Confirm Password';
		header('location:register.php');
	}
	// Confirm Password Match Check
	else if ($pswd != $Cpswd) {
		$_SESSION['CpswdMatchErr'] = 'Your Password dose not match';
		header('location:register.php');
	}
	//Database code 
	else{
		$password = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
		$email_select = "SELECT COUNT(*) as total FROM user_info WHERE email = '$email'";
		$email_check = mysqli_query($db,$email_select);
		$after_assoc = mysqli_fetch_assoc($email_check);
		if ($after_assoc['total'] > 0) {
			$_SESSION['EmailFatchCheck'] ='You are already registered <br>Use another email address';
			header('location:register.php');
		}
		else{
			$insert = "INSERT INTO user_info(name,email,password) VALUES ('$name','$email','$password')";
			$query = mysqli_query($db, $insert);
			if ($query) {
				header('location: dashboard/user-list.php');
			}
			else{
				header('location:register.php');
			}
		}
	}
	
} // 1st if close
else{
	header('location:register.php');
}
?>