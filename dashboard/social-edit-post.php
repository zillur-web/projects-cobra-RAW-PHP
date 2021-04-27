<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_SESSION['id'];
	$name =$_POST['name'];
	$icon =$_POST['icon'];
	$link =$_POST['link'];
	


	if (empty($name)) {
		$_SESSION['SocialEditNameErr'] = 'Please Enter Your Social Name';
		header('location:social-add.php');
	}
	elseif (empty($icon)) {
		$_SESSION['SocialEditChooseErr'] = 'Please Choose The Social Icon';
		header('location:social-add.php');
	}
	elseif (empty($link)) {
		$_SESSION['SocialEditLinkErr'] = 'Please Enter Your Social Link';
		header('location:social-add.php');
	}
	else {
		$social_update = "UPDATE socials SET name = '$name', icon = '$icon', link = '$link' WHERE id = $id";
		$social_query = mysqli_query($db, $social_update);

		if ($social_query) {
			$_SESSION['SocialEditSucess'] = 'Social Icon Update Successfull!';
			header('location:social.php');
		}
		else{
			$_SESSION['SocialEditErr'] = 'Social Icon Update  Unsuccessfull, Please Try Again!';
			header('location:social-edit.php');
		}
	}



}
?>