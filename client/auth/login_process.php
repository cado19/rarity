<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["client_logged_in"]) && $_SESSION["client_logged_in"] === true) {
	header("location: index.php?page=client/catalog/all");
	exit;
}

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// validate presence of email and password
	if (empty($_POST['email'])) {
		$email_err = "Email required";
		header("location: index.php?page=client/auth/login&login_err=$login_err");
		exit;
	}
	if (empty($_POST['password'])) {
		$password_err = "Email required";
		header("location: index.php?page=client/auth/login&password_err=$password_err");
		exit;
	}

	$email = $_POST['email'];
	$password = $_POST['password'];

	$posts = [$email, $password];
	// $log->warning('posts', $posts);

	//fetch account with the above credentials
	$client = fetch_client($email);

	if ($client == "No such person") {
		$err_msg = "Incorrect email/password combination";
		header("Location: index.php?page=client/auth/login&err_msg=$err_msg");
		exit;
	} else {
		$hashed_password = $client['password'];

		if (password_verify($password, $hashed_password)) {
			session_start();

			$_SESSION['client_logged_in'] = true;

			$_SESSION['client'] = $client;

			header("Location: index.php?page=client/catalog/all");
			exit;
		} else {
			$msg = "Incorrect email/password combination";
			header("Location: index.php?page=client/auth/login&msg=$msg");
			exit;
		}
	}

	// $log->info('account', $account);

	// Validate credentials
	// if(empty($username_err) && empty($password_err)){
	//     // Prepare a select statement
	//     $sql = "SELECT id, username, password FROM users WHERE username = :username";

	//     if($stmt = $pdo->prepare($sql)){
	//         // Bind variables to the prepared statement as parameters
	//         $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

	//         // Set parameters
	//         $param_username = trim($_POST["username"]);

	//         // Attempt to execute the prepared statement
	//         if($stmt->execute()){
	//             // Check if username exists, if yes then verify password
	//             if($stmt->rowCount() == 1){
	//                 if($row = $stmt->fetch()){
	//                     $id = $row["id"];
	//                     $username = $row["username"];
	//                     $hashed_password = $row["password"];
	//                     if(password_verify($password, $hashed_password)){
	//                         // Password is correct, so start a new session
	//                         session_start();

	//                         // Store data in session variables
	//                         $_SESSION["loggedin"] = true;
	//                         $_SESSION["id"] = $id;
	//                         $_SESSION["username"] = $username;

	//                         // Redirect user to welcome page
	//                         header("location: welcome.php");
	//                     } else{
	//                         // Password is not valid, display a generic msg message
	//                         $login_err = "Invalid username or password.";
	//                     }
	//                 }
	//             } else{
	//                 // Username doesn't exist, display a generic msg message
	//                 $login_err = "Invalid username or password.";
	//             }
	//         } else{
	//             echo "Oops! Something went wrong. Please try again later.";
	//         }

	//         // Close statement
	//         unset($stmt);
	//     }
	// }

	// // Close connection
	// unset($pdo);
}
?>
<script>
	console.log(<?php echo json_encode($client); ?>);
</script>