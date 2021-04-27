<?php  
require_once 'database-connector.php';
require_once 'dashboard/session.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	if (empty($name)) {
		$_SESSION['MessageNameErr'] = 'Please Enter Your Name';
		header('location:index.php#contact');
	}
	elseif(empty($email)) {
		$_SESSION['MessageEmalErr'] = 'Please Enter Your Email';
		header('location:index.php#contact');
	}
	elseif(empty($message)) {
		$_SESSION['MessageErr'] = 'Please Enter Your Message';
		header('location:index.php#contact');
	}
	else{
		$insert = "INSERT INTO contacts (name,email,message) VALUES('$name','$email','$message')";

		$query = mysqli_query($db, $insert);

		if ($query) {
			$_SESSION['MessageSend'] = 'Your Message Send';
			header('location:index.php#contact');
		}
		else{
			$_SESSION['MessageNotSend'] = 'Your Message Not Send';
			header('location:index.php#contact');
		}
	}
}

?>