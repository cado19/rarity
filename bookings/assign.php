<?php
$fuel = $result = $response = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST['id']; // this is the id of the booking
	$account_id = $_POST['account_id'];
	if (!empty($_POST['fuel'])) {
		$fuel = $_POST['fuel'];
	}
	$result = assign_vehicle($id, $fuel, $account_id);

	if ($result == "Success") {
		//activate booking
		$response = activate_booking($id);
		if ($response == "Success") {
			$msg = "Successfully assigned vehicle. Booking activated";
			header("Location: index.php?page=bookings/show&id=$id&msg=$msg");
		} else {
			$err_msg = "There was an error activating the booking. Contact admin";
			header("Location: index.php?page=bookings/show&id=$id&err_msg=$err_msg");
		}
	} else {
		$err_msg = "There was an error assigning vehicle. Try again";
		header("Location: index.php?page=bookings/show&id=$id&err_msg=$err_msg");
	}

} else {
	$msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?msg=$msg");
	exit;
}
