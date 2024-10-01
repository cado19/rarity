<?php
$id = $status = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (!(isset($_POST['id']))) {
		$err_msg = "An error occured fetching booking. Try again";
		header("Location: index.php?page=bookings/show&id=$id&err_msg=$err_msg");
		exit;
	} else {
		$id = $_POST['id'];
		$status = "cancelled";

		$sql = "UPDATE bookings SET status = ? WHERE id = ?";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$status, $id])) {
			$msg = "Successfully cancelled booking";
			header("Location: index.php?page=bookings/show&id=$id&msg=$msg");
			exit;
		} else {
			$err_msg = "An error occured. Try again";
			header("Location: index.php?page=bookings/show&id=$id&err_msg=$err_msg");
			exit;
		}
	}
} else {
	$msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?msg=$msg");
	exit;
}
?>
