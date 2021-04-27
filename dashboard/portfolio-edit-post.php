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
	$id = $_SESSION['id'];

	if (empty($title)) {
		$_SESSION['EdittitleErr'] = 'Please Enter Your Title';
		header('location:edit-portfolios.php');
	}
	else if (empty($category)) {
		$_SESSION['EditcategoryErr'] = 'Please Enter Your Category';
		header('location:edit-portfolios.php');
	}
	else if (empty($summary)) {
		$_SESSION['EditsummaryErr'] = 'Please Enter Your Summary';
		header('location:edit-portfolios.php');
	}
	// Thumbnail Image File Format Check
	elseif (!in_array($thumbnail_ext, $allow_format)) {
		$_SESSION['Editthumbnail_Err'] = 'Please Select Use jpg, png, JPEG file format Image';
		header('location:edit-portfolios.php');
	}
	// Thumbnail Image File Size Check
	else if($thumbnail_file_size > 5000000) { 
		$_SESSION['Editthumbnail_size_Err'] = 'You typing to big size attachment file, Maximum 5MB';
		header('location:edit-portfolios.php');
	}
	// Thumbnail Image File Format Check
	else if (!in_array($featured_ext, $allow_format)) {
		$_SESSION['Editfeatured_Err'] = 'Please Select Use jpg, png, JPEG file format Image';
		header('location:edit-portfolios.php');
	}
	// Thumbnail Image File Size Check
	else if($featured_file_size > 5000000) { 
		$_SESSION['Editfeatured_size_Err'] = 'You typing to big size attachment file, Maximum 5MB';
		header('location:edit-portfolios.php');
	}
	else{
		//thumbnail location
		$new_thumbnail_ext = $id.'.'.$thumbnail_ext;
		//featured location
		$new_featured_ext = $id.'.'.$featured_ext;

		$selectOldImage = "SELECT * FROM portfolio WHERE id = $id";
        $oldQ = mysqli_query($db,$selectOldImage);
        $oldImage = mysqli_fetch_assoc($oldQ);
        $thumbnailOldLocation = '../upload/thumbnail/'.$oldImage['thumbnail'];
        $featured_imageOldLocation = '../upload/featured_image/'.$oldImage['featured_image'];

        if(file_exists($thumbnailOldLocation)){
            unlink($thumbnailOldLocation);
        }
        if(file_exists($featured_imageOldLocation)){
            unlink($featured_imageOldLocation);
        }

		$update = "UPDATE portfolio SET title = '$title', category = '$category', summary = '$summary',  thumbnail = '$new_thumbnail_ext' ,featured_image = '$new_featured_ext' WHERE id = $id";
		$query = mysqli_query($db, $update);
		if ($query) {
			$new_thumbnail_location = 'upload/thumbnail/' . $new_thumbnail_ext;
			move_uploaded_file($thumbnail_img['tmp_name'], $new_thumbnail_location);

			$new_featured_location = 'upload/featured_image/' . $new_featured_ext;
			move_uploaded_file($featured_img['tmp_name'], $new_featured_location);

			$_SESSION['PortfolioEditSuccess'] = 'Portfolio Update Successfully Done';
			header('location:portfolio.php');
		}
		else{
			$_SESSION['PortfolioEditErr'] = 'Portfolio Update Unsuccessfull';
			header('location:edit-portfolios.php');
		}
	}
}
?>