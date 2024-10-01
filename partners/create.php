<?php
// THIS FILE WILL HANDLE SAVING OF PARTNER INTO THE DB
$name = $email = $tel = '';
$name_err = $email_err = $tel_err = $msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//VALIDATIONS
	if (empty($_POST['name'])) {
		$name_err = "Required";
		header("Location: index.php?page=partners/new&first_name_err=$first_name_err");
		exit;
	}

	if (empty($_POST['email'])) {
		$email_err = "Required";
		header("Location: index.php?page=partners/new&email_err=$email_err");
		exit;
	}

	if (empty($_POST['tel'])) {
		$tel_err = "Required";
		header("Location: index.php?page=partners/new&tel_err=$tel_err");
	}

	$name = ucwords($_POST['name']);
	$email = $_POST['email'];
	$tel = $_POST['tel'];

	$details = [$name, $email, $tel];

	$result = save_partner($name, $email, $tel);

	if ($result == "Success") {
		$msg = "Successfully added partner";
		header("Location: index.php?page=partners/all&msg=$msg");
		exit;
	} else {
		$msg = "An error occured. Please try again later";
		header("Location: index.php?page=partners/all&err_msg=$msg");
		exit;
	}

	// $log->info($result);

} else {
	$msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?err_msg=$msg");
	exit;
}

?>