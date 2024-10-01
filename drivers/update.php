<?php
// THIS FILE WILL HANDLE UPDATING OF DRIVER DETAILS
$first_name = $last_name = $email = $id_number = $dl_number = $tel = $date_of_birth = $msg = '';
$first_name_err = $last_name_err = $email_err = $id_number_err = $dl_number_err = $tel_err = $date_of_birth_err = $msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//VALIDATIONS
	if (empty($_POST['first_name'])) {
		$first_name_err = "Required";
		header("Location: index.php?page=drivers/edit&id=$id&first_name_err=$first_name_err");
		exit;
	}
	if (empty($_POST['last_name'])) {
		$last_name_err = "Required";
		header("Location: index.php?page=drivers/edit&id=$id&last_name_err=$last_name_err");
		exit;
	}
	if (empty($_POST['email'])) {
		$email_err = "Required";
		header("Location: index.php?page=drivers/edit&id=$id&email_err=$email_err");
		exit;
	}

	if (empty($_POST['id_number'])) {
		$id_number_err = "Required";
		header("Location: index.php?page=drivers/edit&id=$id&id_number_err=$id_number_err");
		exit;
	}
	if (empty($_POST['dl_number'])) {
		$dl_number_err = "Required";
		header("Location: index.php?page=drivers/edit&id=$id&dl_number_err=$dl_number_err");
		exit;
	}
	if (empty($_POST['tel'])) {
		$tel_err = "Required";
		header("Location: index.php?page=drivers/edit&id=$id&tel_err=$tel_err");
	}

	if (empty($_POST['date_of_birth'])) {
		$date_of_birth_err = "Required";
		header("Location: index.php?page=drivers/edit&id=$id&date_of_birth_err=$date_of_birth_err");
		exit;
	}

	$id = $_POST['id'];
	$first_name = ucfirst($_POST['first_name']);
	$last_name = ucfirst($_POST['last_name']);
	$email = $_POST['email'];
	$id_number = $_POST['id_number'];
	$dl_number = $_POST['dl_number'];
	$tel = $_POST['tel'];
	$date_of_birth = $_POST['date_of_birth'];

	$details = [$first_name, $last_name, $email, $id_number, $dl_number, $tel, $date_of_birth];

	$result = update_driver($first_name, $last_name, $email, $id_number, $dl_number, $tel, $date_of_birth, $id);

	if ($result == "Success") {
		$msg = "Successfully updated driver";
		header("Location: index.php?page=drivers/show&id=$id&msg=$msg");
		exit;
	} else {
		$msg = "Couldn't update driver";
		header("Location: index.php?page=drivers/show&id=$id&err_msg=$msg");
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