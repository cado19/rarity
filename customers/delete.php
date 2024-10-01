<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo $id;
	$response = delete_customer($id);
	if ($response == "Deleted") {
		$msg = "Successfully deleted customer";
		header("Location: index.php?page=customers/all&msg=$msg");
	} else {
		$msg = "Could nor delete customer. Try again";
		header("Location: index.php?page=customers/all&msg=$msg");
	}

} else {
	$msg = "No such customer";
	header("Location: index.php?page=customers/all&msg=$msg");
	exit;
}