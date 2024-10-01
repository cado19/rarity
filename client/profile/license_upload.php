<?php

// THIS SCRIPT WILL PROCESS ID UPLOAD

// PROCESS THE FORM
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$msg = "";

	$id = $_POST['id'];

	$filename = $_FILES["license_image"]["name"];
	$tempname = $_FILES["license_image"]["tmp_name"];
	// new file name to eliminate conflicts even if someone uploads the same file twice for different records.
	$filenameNew = "license_" . date("his") . ".png";

	// folder to upload the image and also its destination
	$folder = "customers/license/" . $filenameNew;

	$sql = "UPDATE customer_details SET license_image = ? WHERE id = ?";
	$stmt = $con->prepare($sql);
	$stmt->execute([$filenameNew, $id]);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		$msg = " Image uploaded successfully!";
		header("Location: index.php?page=client/profile/show&msg=$msg");
		exit;
	} else {
		$err_msg = "Failed to upload image!";
		header("Location: index.php?page=client/profile/show&err_msg=$err_msg");
		exit;
	}

	header("Location: index.php?page=customers/show&id=$id&msg=$msg");
}