 <?php
// THIS SCRIPT WILL HANDLE THE NEW BOOKING FORM PROCESSING

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// VALIDATIONS
	if (empty($_POST['start_date'])) {
		$start_date_err = "Required";
		header("Location: index.php?page=bookings/new&start_date_err=$start_date_err");
		exit;
	}
	if (empty($_POST['end_date'])) {
		$end_date_err = "Required";
		header("Location: index.php?page=bookings/new&end_date_err=$end_date_err");
		exit;
	}

	// if (empty($_POST['start_time'])) {
	// 	$start_time_err = "Required";
	// 	header("Location: index.php?page=bookings/new&start_time_err=$start_time_err");
	// 	exit;
	// }
	// if (empty($_POST['end_time'])) {
	// 	$end_time_err = "Required";
	// 	header("Location: index.php?page=bookings/new&end_time_err=$end_time_err");
	// 	exit;
	// }
	$a_id = $_POST['account_id']
	$v_id = $_POST['vehicle_id'];
	$c_id = $_POST['customer_id'];
	$d_id = $_POST['driver_id'];
	$start_date = $_POST['start_date'];
	$start_time = $_POST['start_time'];
	$end_date = $_POST['end_date'];
	$end_time = $_POST['end_time'];

	$posts = array($v_id, $c_id, $d_id, $a_id, $start_date, $end_date, $start_time, $end_time);
	$log->info('Posts:', $posts);
	// GET THE DURATION (TOTAL NUMBER OF DAYS OF THE BOOKING)
	$start_date_time = strtotime($_POST['start_date']);
	$end_date_time = strtotime($_POST['end_date']);
	$duration = ($end_date_time - $start_date_time) / 86400;

	// VALIDATION TO MAKE SURE BOOKING IS GREATER THAN OR EQUAL TO 3 DAYS
	if ($duration < 3) {
		$end_date_err = "Rental duration must be atleast 3 days";
		header("Location: index.php?page=bookings/new&end_date_err=$end_date_err");
		exit;
	}
	// INSERT BOOKING DATA INTO THE DATABASE

	$result = save_booking($v_id, $c_id, $d_id, $a_id, $start_date, $end_date, $start_time, $end_time);
	if ($result == "No Success") {
		$err = "An error occured. Try again later";
		header("Location: index.php?page=bookings/new&err_msg=$err");
		exit;
	} else {
		//GET BOOKING USING LAST INSERT ID
		$booking = booking($result);

		// GET THE TOTAL PRICE OF THE BOOKING BY MULTIPLYING THE DURATION WITH THE DAILY RATE OF THE VEHICLE
		$total = $booking['daily_rate'] * $duration;

		// UPDATE THE TOTAL PRICE
		$total = update_booking($total, $result);

		// CREATE A CONTRACT WITH THE CURRENT LAST BOOKING ID AS THE REFERENCE ID (THIS JUST MIGHT BE IN THE FUNCTIONS FILE)
		$response = create_contract($result);

		//REDIRECT TO THE CONTRACT PAGE SO THAT A SIGNATURE CAN BE UPLOADED IF IT IS AVAILABLE
		$msg = "Booking created";

		header("Location: index.php?page=contracts/edit&id=$result&msg=$msg");
	}
} else {
	$msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?msg=$msg");
	exit;
}
?>
<script>
	console.log(<?php echo json_encode($posts); ?>);
</script>