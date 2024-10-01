<?php
$name = $email = $password = "";
$username_err = $email_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$posts = [$name, $email, $password];

	$log->info('posts', $posts);

	// Validate username
	$taken_email = unique_email($email);
	if ($taken_email == "Email taken") {
		$email_err = "An account exists with such an email. Log in.";
		header("Location: index.php?page=accounts/new&msg=$email_err");
	} else {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$response = create_account($name, $email, $hashed_password);

		$msg = "Your application has been received. You will be contacted via email when your account is approved";

		header("Location: index.php?page=accounts/login&msg=$msg");
	}

}
?>