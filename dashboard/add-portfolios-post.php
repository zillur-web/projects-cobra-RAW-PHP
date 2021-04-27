<?php
require_once '../database-connector.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title =$_POST['title'];
	$category =$_POST['category'];
	$summary =$_POST['summary'];
	// Thumbnail
	$thumbnail_img =$_FILES['thumbnail'];
	$thumbnail_name = $thumbnail_img['name'];
	$thumbnail_explode = explode('.', $thumbnail_name);
	$thumbnail_ext = end($thumbnail_explode);
	$thumbnail_file_size = $thumbnail_img['size'];
	// featured_image
	$featured_img =$_FILES['featured_image'];
	$featured_name = $featured_img['name'];
	$featured_explode = explode('.', $featured_name);
	$featured_ext = end($thumbnail_explode);
	$featured_file_size = $featured_img['size'];  

	// list($width, $height) = getimagesize($thumbnail_img['tmp_name']);

	$allow_format = ['jpg','png','JPEG'];

	if (empty($title)) {
		$_SESSION['titleErr'] = 'Please Enter Your Title';
		header('location:add-portfolios.php');
	}
	else if (empty($category)) {
		$_SESSION['categoryErr'] = 'Please Enter Your Category';
		header('location:add-portfolios.php');
	}
	else if (empty($summary)) {
		$_SESSION['summaryErr'] = 'Please Enter Your Summary';
		header('location:add-portfolios.php');
	}
	else{
		$portfolio_insert = "INSERT INTO portfolio (title, category, summary) VALUES ('$title', '$category', '$summary')";
		$portfolio_query = mysqli_query($db, $portfolio_insert);
		$last_insert_id = mysqli_insert_id($db);
		
		// Thumbnail Image File Format Check
		if (!in_array($thumbnail_ext, $allow_format)) {
			$_SESSION['thumbnail_Err'] = 'Please Select Use jpg, png, JPEG file format Image';
			header('location:add-portfolios.php');
		}
		// Thumbnail Image File Size Check
		else if($thumbnail_file_size > 5000000) { 
			$_SESSION['thumbnail_size_Err'] = 'You typing to big size attachment file, Maximum 5MB';
			header('location:add-portfolios.php');
		}
		// Thumbnail Image File Format Check
		else if (!in_array($featured_ext, $allow_format)) {
			$_SESSION['featured_Err'] = 'Please Select Use jpg, png, JPEG file format Image';
			header('location:add-portfolios.php');
		}
		// Thumbnail Image File Size Check
		else if($featured_file_size > 5000000) { 
			$_SESSION['featured_size_Err'] = 'You typing to big size attachment file, Maximum 5MB';
			header('location:add-portfolios.php');
		}
		else{
			$new_thumbnail_ext = $last_insert_id.'.'.$thumbnail_ext;
			$new_thumbnail_location = 'upload/thumbnail/' . $new_thumbnail_ext;
			move_uploaded_file($thumbnail_img['tmp_name'], $new_thumbnail_location);

			$new_featured_ext = $last_insert_id.'.'.$featured_ext;
			$new_featured_location = 'upload/featured_image/' . $new_featured_ext;
			move_uploaded_file($featured_img['tmp_name'], $new_featured_location);

			$update = "UPDATE portfolio SET thumbnail = '$new_thumbnail_ext' ,featured_image = '$new_featured_ext' WHERE id = '$last_insert_id'";
			$query = mysqli_query($db, $update);
			if ($query) {
				$_SESSION['PortfolioUpdateSuccess'] = 'Portfolio Add Successfully Done';
				header('location:portfolio.php');
			}
			else{
				$_SESSION['PortfolioUpdateErr'] = 'Portfolio Add Unsuccessfull';
				header('location:add-portfolio.php');
			}
		}
	}
}
?>