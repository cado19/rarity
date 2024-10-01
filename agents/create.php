<?php
// THIS FILE WILL HANDLE SAVING OF PARTNER INTO THE DB
$name = $email = $country = $tel = '';
$name_err = $email_err = $tel_err = $msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//VALIDATIONS
	if (empty($_POST['name'])) {
		$name_err = "Required";
		header("Location: index.php?page=agents/new&name_err=$name_err");
		exit;
	}

	if (empty($_POST['email'])) {
		$email_err = "Required";
		header("Location: index.php?page=agents/new&email_err=$email_err");
		exit;
	}

	$name = ucwords($_POST['name']);
	$pass = '1234';
	$role_id = '2';
	$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}

	if (isset($_POST['country'])) {
		$country = $_POST['country'];
	}

	if (isset($_POST['tel'])) {
		$tel = $_POST['tel'];
	}

	$details = [$name, $email, $country, $tel, $hashed_password];

	$result = save_agent($name, $email, $country, $tel, $hashed_password, $role_id);

	if ($result == "Success") {
		$msg = "Successfully added agent";
		header("Location: index.php?page=agents/all&msg=$msg");
		exit;
	} else {
		$msg = "An error occured. Please try again later";
		header("Location: index.php?page=agents/all&err_msg=$msg");
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
<script>
	console.log(<?php echo json_encode($details); ?>);
</script>