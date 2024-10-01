<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo $id;
	$response = delete_vehicle($id);
	if ($response == "Deleted") {
		$msg = "Successfully deleted vehicle";
		header("Location: index.php?page=fleet/all&msg=$msg");
	} else {
		$msg = "Could nor delete vehicle. Try again";
		header("Location: index.php?page=fleet/all&msg=$msg");
	}

} else {
	$msg = "No such vehicle";
	header("Location: index.php?page=fleet/all&msg=$msg");
	exit;
}