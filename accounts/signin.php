<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
	header("location: index.php?page=home");
	exit;
}

// Include config file
// require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$email = $_POST['email'];
	$password = $_POST['password'];

	$posts = [$email, $password];
	// $log->warning('posts', $posts);

	//fetch account with the above credentials
	$account = fetch_account($email);

	$hashed_password = $account['password'];

	if (password_verify($password, $hashed_password)) {
		session_start();

		$_SESSION['logged_in'] = true;

		$_SESSION['account'] = $account;

		header("Location: index.php");
		exit;
	} else {
		$msg = "Incorrect email/password combination";
		header("Location: index.php?page=accounts/login&msg=$msg");
		exit;
	}

	$log->info('account', $account);

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