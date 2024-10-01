<?php
$name = $email = $password = "";
$username_err = $email_err = "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$posts = [$email, $password];

	$log->info('posts', $posts);

	// Validate username
	// $taken_email = unique_email($email);
	// if ($taken_email == "Email Taken") {
	// 	$email_err = "Choose another email";
	// 	header("Location: index.php?page=accounts/new&msg=" . $email_err);
	// } else {
	// 	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	// }

	// validate email
	$response = get_email($email);
	$log->warning($response);

	if ($response == "No such email") {
		$msg = "There is no account with such an email";
		header("Location: index.php?page=accounts/edit&msg=$msg");
	} elseif ($response == "You may proceed") {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "UPDATE accounts SET password = ? WHERE email = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$hashed_password, $email]);
		$msg = "Changed Password";
		header("Location: index.php?page=accounts/login&msg=$msg");
	}

}
?>