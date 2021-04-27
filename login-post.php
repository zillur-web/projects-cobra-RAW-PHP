<?php
session_start();
require_once 'database-connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];


	$select = "SELECT COUNT(*) as total, id, name, email, password, role FROM user_info WHERE email ='$email'";
	$query = mysqli_query($db, $select);
	$assoc = mysqli_fetch_assoc($query);

	$hash = $assoc['password'];

	if (!$assoc['total'] > 0) {
		$_SESSION['LoginEmail'] = 'Please Enter Your username or email';
		header('location:login.php');
	}
	else if (!password_verify($password, $hash)){
		$_SESSION['LoginPassword'] = 'Please Enter Your Password';
		header('location:login.php');
	}
	else{
		if ($assoc['role'] == 3) {
			$_SESSION['email'] = $assoc['email'];
			$_SESSION['id'] = $assoc['id'];
			$_SESSION['name'] = $assoc['name'];
			header('location:dashboard/dashboard.php');
		}
		elseif ($assoc['role'] == 2) {
			$_SESSION['email'] = $assoc['email'];
			$_SESSION['id'] = $assoc['id'];
			$_SESSION['name'] = $assoc['name'];
			header('location:dashboard/dashboard.php');
		}
		else {
			header('location:index.php');
		}
	}

		/*if ($assoc['total'] > 0) {
			$hash = $assoc['password'];
			if (password_verify($password, $hash)) {
				echo "Password Match";
			}
			else{
				echo "Password Not Match";
			}
		}
		else{
			echo "Not found";
		}*/
	}
	else{
		header('location:login.php');
	}
?>