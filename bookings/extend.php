<?php
$id = $status = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (!(isset($_POST['id']))) {
		$err_msg = "An error occured fetching booking. Try again";
		header("Location: index.php?page=bookings/show&id=$id&err_msg=$err_msg");
		exit;
	} else {
		$id = $_POST['id'];
		$start_date = $_POST['start_date'];
		$extend_date = $_POST['extend_date'];
		$date_start = strtotime($start_date);
		$date_extend = strtotime($extend_date);
		$rate = $_POST['rate'];

		$duration = ($date_extend - $date_start) / 86400;

		$total = $rate * $duration;
		// $total = number_format($total);

		$sql = "UPDATE bookings SET end_date = ?, total = ? WHERE id = ?";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$extend_date, $total, $id])) {
			$msg = "Successfully extended booking";
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
