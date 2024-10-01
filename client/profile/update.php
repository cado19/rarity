<?php
// THIS SCRIPT WILL HANDLE THE NEW CUSTOMER FORM PROCESSING

$first_name = $last_name = $email = $id_type = $id_number = $tel = $residential_address = $work_address = $date_of_birth = '';
$current_date = date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST['id'];

	//VALIDATIONS
	// if (empty($_POST['first_name'])) {
	// 	$first_name_err = "Required";
	// 	header("Location: index.php?page=client/profile/show&id=$id&first_name_err=$first_name_err");
	// 	exit;
	// }

	// if (empty($_POST['last_name'])) {
	// 	$last_name_err = "Required";
	// 	header("Location: index.php?page=client/profile/show&id=$id&last_name_err=$last_name_err");
	// 	exit;
	// }

	// if (empty($_POST['id_type'])) {
	// 	$id_type_err = "Required";
	// 	header("Location: index.php?page=client/profile/show&id=$id&id_type_err=$id_type_err");
	// 	exit;
	// }

	// if (empty($_POST['id_number'])) {
	// 	$id_number_err = "Required";
	// 	header("Location: index.php?page=client/profile/show&id=$id&id_number_err=$id_number_err");
	// 	exit;
	// }

	// if (empty($_POST['tel'])) {
	// 	$tel_err = "Required";
	// 	header("Location: index.php?page=client/profile/show&id=$id&tel_err=$tel_err");
	// }
	// if (empty($_POST['residential_address'])) {
	// 	$residential_address_err = "Required";
	// 	header("Location: index.php?page=client/profile/show&id=$id&residential_address_err=$residential_address_err");
	// 	exit;
	// }

	// if (empty($_POST['work_address'])) {
	// 	$work_address_err = "Required";
	// 	header("Location: index.php?page=client/profile/show&id=$id&work_address_err=$work_address_err");
	// 	exit;
	// }

	// if (empty($_POST['date_of_birth'])) {
	// 	$date_of_birth_err = "Required";
	// 	header("Location: index.php?page=client/profile/show&id=$id&date_of_birth_err=$date_of_birth_err");
	// 	exit;
	// }

	if (!(empty($_POST['date_of_birth']))) {
		$current_date = strtotime($current_date);
		$calc_bdate = strtotime($_POST['date_of_birth']);
		if (($current_date - $calc_bdate) < 725328000) {
			$date_of_birth_err = "You must be atleast 23 years old.";
			header("Location: index.php?page=client/profile/show&id=$id&date_of_birth_err=$date_of_birth_err");
			exit;
		}
	}

	$first_name = ucfirst($_POST['first_name']);
	$last_name = ucfirst($_POST['last_name']);
	$id_type = $_POST['id_type'];
	$id_number = $_POST['id_number'];
	$tel = $_POST['tel'];
	$residential_address = $_POST['residential_address'];
	$work_address = $_POST['work_address'];
	$date_of_birth = $_POST['date_of_birth'];

	$details = [$first_name, $last_name, $email, $id_type, $id_number, $tel, $residential_address, $work_address, $date_of_birth, $account_id];
	// $log->warning('client:',$details);

	$result = update_client($first_name, $last_name, $id_type, $id_number, $tel, $residential_address, $work_address, $date_of_birth, $id);
	if ($result == "Success") {
		$msg = "Successfully updated customer's details";
		header("Location: index.php?page=client/profile/show&msg=$msg");
	} else {
		$msg = "An error occured. Try again";
		header("Location: index.php?page=client/catalog/show&err_msg=$msg");
	}

	// $log->info($result);

} else {
	$msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?page=client/auth/login&err_msg=$msg");
	exit;
}

?>

