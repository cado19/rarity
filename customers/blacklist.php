<?php
// THIS FILE FLAGS/BLACKLISTS CUSTOMERS

$reason_err = $reason = $response = $result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST['id'];

	//VALIDATIONS
	if (empty($_POST['reason'])) {
		$reason_err = "Required";
		header("Location: index.php?page=customers/blacklist_form&id=$id&reason_err=$reason_err");
		exit;
	}

	$reason = $_POST['reason'];

	$bl = [$id, $reason];
	$log->info('bl:', $bl);

	// First save the reason for blacklisting customer
	$response = blacklist_reason($id, $reason);

	if ($response == "Success") {
		// set blacklisted to true in customer_details
		$result = blacklist_customer($id);
		if ($result == "Success") {
			$msg = "Customer blacklisted";
			header("Location: index.php?page=customers/show&id=$id&msg=$msg");
		} else {
			$msg = "An error occured";
			header("Location: index.php?page=customers/show&id=$id&err_msg=$msg");
		}

	} else {
		$msg = "An error occured";
		header("Location: index.php?page=customers/show&id=$id&err_msg=$msg");
	}

} else {
	$msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?err_msg=$msg");
	exit;
}
