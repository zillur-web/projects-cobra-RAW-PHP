<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name =$_POST['name'];
	$icon =$_POST['icon'];
	$link =$_POST['link'];

	if (empty($name)) {
		$_SESSION['SocialNameErr'] = 'Please Enter Your Social Name';
		header('location:social-add.php');
	}
	elseif (empty($icon)) {
		$_SESSION['SocialChooseErr'] = 'Please Choose The Social Icon';
		header('location:social-add.php');
	}
	elseif (empty($link)) {
		$_SESSION['SocialLinkErr'] = 'Please Enter Your Social Link';
		header('location:social-add.php');
	}
	else {
		define('insart', "INSERT INTO socials(name, icon, link) VALUES ('$name', '$icon', '$link')");
		$Social_icon_query = mysqli_query($db, insart);

		if ($Social_icon_query) {
			$_SESSION['SocialUpdateSucess'] = 'Social Icon Update Successfull!';
			header('location:social.php');
		}
		else{
			$_SESSION['SocialUpdateErr'] = 'Social Icon Update  Unsuccessfull, Please Try Again!';
			header('location:social-add.php');
		}
	}



}
?>