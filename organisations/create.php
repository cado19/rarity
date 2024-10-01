<?php
// THIS FILE WILL HANDLE SAVING OF PARTNER INTO THE DB
$name = $email = $contact_name = $country = $tel = $kra_pin = '';
$name_err = $email_err = $tel_err = $msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//VALIDATIONS
	if (empty($_POST['name'])) {
		$name_err = "Required";
		header("Location: index.php?page=agents/new&first_name_err=$first_name_err");
		exit;
	}

	$name = ucwords($_POST['name']);

	if (isset($_POST['contact_name'])) {
		$contact_name = ucwords($_POST['contact_name']);
	}

	if (isset($_POST['kra_pin'])) {
		$kra_pin = ucfirst($_POST['kra_pin']);
	}

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}

	if (isset($_POST['country'])) {
		$country = $_POST['country'];
	}

	if (isset($_POST['tel'])) {
		$tel = $_POST['tel'];
	}

	$details = [$name, $email, $contact_name, $country, $tel, $kra_pin];

	// $result = save_organisation($name, $email, $contact_name, $tel, $kra_pin);

	// if ($result == "Success") {
	// 	$msg = "Successfully added organisation";
	// 	header("Location: index.php?page=organisations/all&msg=$msg");
	// 	exit;
	// } else {
	// 	$msg = "An error occured. Please try again later";
	// 	header("Location: index.php?page=organisations/all&err_msg=$msg");
	// 	exit;
	// }

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