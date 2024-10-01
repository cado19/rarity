<?php

// THIS SCRIPT WILL PROCESS VEHICLE IMAGE UPLOAD

// PROCESS THE FORM
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$msg = "";

	$id = $_POST['id'];

	$filename = $_FILES["profile_image"]["name"];
	$tempname = $_FILES["profile_image"]["tmp_name"];
	// new file name to eliminate conflicts even if someone uploads the same file twice for different records.
	$filenameNew = "vehicle_image_" . date("his") . ".png";

	// folder to upload the image and also its destination
	$folder = "fleet/images/" . $filenameNew;

	$sql = "UPDATE vehicle_basics SET image = ? WHERE id = ?";
	$stmt = $con->prepare($sql);
	$stmt->execute([$filenameNew, $id]);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		$msg = " Image uploaded successfully!";
		header("Location: index.php?page=fleet/show&id=$id&msg=$msg");
		exit;
	} else {
		$err_msg = "Failed to upload image!";
		header("Location: index.php?page=fleet/show&id=$id&err_msg=$err_msg");
		exit;
	}

}