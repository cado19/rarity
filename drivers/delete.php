<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo $id;
	$response = delete_driver($id);
	if ($response == "Deleted") {
		$msg = "Successfully deleted driver";
		header("Location: index.php?page=drivers/all&msg=$msg");
	} else {
		$msg = "Could nor delete driver. Try again";
		header("Location: index.php?page=drivers/all&err_msg=$msg");
	}

} else {
	$msg = "No such driver";
	header("Location: index.php?page=drivers/all&err_msg=$msg");
	exit;
}