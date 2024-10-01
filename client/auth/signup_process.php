<?php
$email = $password = "";
$username_err = $email_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$posts = [$name, $email, $password];

	$log->info('posts', $posts);

	// Validate email
	$taken_email = unique_customer_email($email);
	if ($taken_email == "Email taken") {
		$email_err = "An account exists with such an email. Log in.";
		header("Location: index.php?page=client/auth/signup&email_err=$email_err");
	} else {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$response = create_customer_account($email, $hashed_password);
		if ($response == "No Success") {
			$err_msg = "An error occured";
			header("Location: index.php?page=client/auth/signup&err_msg=$err_msg");
		} else {
			$signed_in_user = login_customer($response);
			session_start();
			$_SESSION['client'] = $signed_in_user;
			$_SESSION['client_logged_in'] = true;

			$msg = "Your account has been successfully created.";

			header("Location: index.php?page=client/catalog/all&msg=$msg");
		}

	}

} else {
	$err_msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?page=client/auth/login&err_msg=$err_msg");
	exit;
}
?>
<script>
	console.log(<?php echo json_encode($taken_email); ?>);
</script>