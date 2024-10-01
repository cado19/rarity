<?php
include_once 'config/db_conn.php';
$make = $model = $number_plate = $category = $transmission = $fuel = $seats = $daily_rate = $vehicle_excess = $deposit = '';
$bluetooth = $keyless_entry = $reverse_cam = $audio_input = $gps = $android_auto = $apple_carplay = 'No';

$make_err = $model_err = $number_plate_err = $categor_erry = $transmission_err = $fuel_err = $seats_err = $daily_rate_err = $vehicle_excess_err = $deposit_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//VALIDATIONS
	if (empty($_POST['make'])) {
		$make_err = "Required";
		header("Location: index.php?page=fleet/partners/new&make=$make_err");
		exit;
	}
	if (empty($_POST['model'])) {
		$model_err = "Required";
		header("Location: index.php?page=fleet/partners/new&model_err=$model_err");
		exit;
	}
	if (empty($_POST['number_plate'])) {
		$number_plate_err = "Required";
		header("Location: index.php?page=fleet/partners/new&$number_plate_err=$number_plate_err");
		exit;
	}

	if (empty($_POST['category'])) {
		$category_err = "Required";
		header("Location: index.php?page=fleet/partners/new&category_err=$category_err");
		exit;
	}
	if (empty($_POST['transmission'])) {
		$transmission_err = "Required";
		header("Location: index.php?page=fleet/partners/new&transmission_err=$transmission_err");
		exit;
	}
	if (empty($_POST['fuel'])) {
		$fuel_err = "Required";
		header("Location: index.php?page=fleet/partners/new&fuel_err=$fuel_err");
	}

	if (empty($_POST['seats'])) {
		$seats_err = "Required";
		header("Location: index.php?page=fleet/partners/new&seats_err=$seats_err");
		exit;
	}

	if (empty($_POST['colour'])) {
		$colour_err = "Required";
		header("Location: index.php?page=fleet/partners/new&colour_err=$colour_err");
		exit;
	}

	if (empty($_POST['partner_rate'])) {
		$partner_rate_err = "Required";
		header("Location: index.php?page=fleet/partners/new&partner_rate_err=$partner_rate_err");
		exit;
	} elseif (($_POST['partner_rate']) <= 0) {
		$daily_rate_err = "Must be greater than 0";
		header("Location: index.php?page=fleet/partners/new&partner_rate_err=$partner_rate_err");
		exit;
	}

	if (empty($_POST['daily_rate'])) {
		$daily_rate_err = "Required";
		header("Location: index.php?page=fleet/partners/new&daily_rate_err=$daily_rate_err");
		exit;
	} elseif (($_POST['daily_rate']) <= 0) {
		$daily_rate_err = "Must be greater than 0";
		header("Location: index.php?page=fleet/partners/new&daily_rate_err=$daily_rate_err");
		exit;
	}

	if (empty($_POST['vehicle_excess'])) {
		$vehicle_excess_err = "Required";
		header("Location: index.php?page=fleet/partners/new&vehicle_excess_err=$vehicle_excess_err");
		exit;
	} elseif (($_POST['vehicle_excess']) <= 0) {
		$vehicle_excess_err = "Must be greater than 0";
		header("Location: index.php?page=fleet/partners/new&vehicle_excess_err=$daily_rate_err");
		exit;
	}

	if (empty($_POST['deposit'])) {
		$deposit_err = "Required";
		header("Location: index.php?page=fleet/partners/new&deposit_err=$deposit_err");
		exit;
	} elseif (($_POST['deposit']) <= 0) {
		$deposit_err = "Must be greater than 0";
		header("Location: index.php?page=fleet/partners/new&deposit_err=$deposit_err");
		exit;
	}

	// vehicle basics data
	$partner_id = $_POST['partner_id'];
	$make = ucfirst($_POST['make']);
	$model = ucfirst($_POST['model']);
	$number_plate = $_POST['number_plate'];
	$category = $_POST['category'];
	$transmission = $_POST['transmission'];
	$fuel = $_POST['fuel'];
	$seats = $_POST['seats'];
	$drive_train = $_POST['drive_train'];
	$colour = ucfirst($_POST['colour']);

	// vehicle pricing data
	$partner_rate = $_POST['partner_rate'];
	// remove commas from daily_rate
	$partner_rate = intval(preg_replace('/[^\d.]/', '', $partner_rate));

	$daily_rate = $_POST['daily_rate'];
	// remove commas from daily_rate
	$daily_rate = intval(preg_replace('/[^\d.]/', '', $daily_rate));

	$vehicle_excess = $_POST['vehicle_excess'];
	// remove commas from vehicle_excess
	$vehicle_excess = intval(preg_replace('/[^\d.]/', '', $vehicle_excess));

	$deposit = $_POST['deposit'];
	// remove commas from deposit
	$deposit = intval(preg_replace('/[^\d.]/', '', $deposit));

	// vehicle extras
	if (isset($_POST['bluetooth'])) {
		$bluetooth = $_POST['bluetooth'];
	}

	if (isset($_POST['keyless_entry'])) {
		$keyless_entry = $_POST['keyless_entry'];
	}

	if (isset($_POST['reverse_cam'])) {
		$reverse_cam = $_POST['reverse_cam'];
	}

	if (isset($_POST['audio_input'])) {
		$audio_input = $_POST['audio_input'];
	}

	if (isset($_POST['gps'])) {
		$gps = $_POST['gps'];
	}

	if (isset($_POST['android_auto'])) {
		$android_auto = $_POST['android_auto'];
	}

	if (isset($_POST['apple_carplay'])) {
		$apple_carplay = $_POST['apple_carplay'];
	}
	if (isset($_POST['sunroof'])) {
		$sunroof = $_POST['sunroof'];
	}

	$post = [
		'make' => $make,
		'model' => $model,
		'number_plate' => $number_plate,
		'category' => $category,
		'transmission' => $transmission,
		'fuel' => $fuel,
		'seats' => $seats,
		'daily_rate' => $daily_rate,
		'vehicle_excess' => $vehicle_excess,
		'drive_train' => $drive_train,
	];

	$log->info('foo:', $post);

	// insert vehicle basics data

	$sql = "INSERT INTO vehicle_basics (make,model,number_plate,category,transmission,fuel,seats,drive_train,colour,partner_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
	$stmt = $con->prepare($sql);
	if ($stmt->execute([$make, $model, $number_plate, $category, $transmission, $fuel, $seats, $drive_train, $colour, $partner_id])) {
		$res = $con->lastInsertId();
	} else {
		$res = "Couldn't save vehicle";
		header("Location: index.php?page=fleet/all&msg=$res");
		exit;
	}

	// insert vehicle pricing data
	$log->info($res);

	$sql1 = "INSERT INTO vehicle_pricing (vehicle_id, partner_rate, daily_rate, vehicle_excess, refundable_security_deposit) VALUES (?,?,?,?,?)";
	$stmt1 = $con->prepare($sql1);
	if ($stmt1->execute([$res, $partner_rate, $daily_rate, $vehicle_excess, $deposit])) {
		$result = "Success";
	} else {
		$result = "Failed";
		header("Location: index.php?page=fleet/all&msg=$result");
		exit;
	}

	$sql2 = "INSERT INTO vehicle_extras (vehicle_id,bluetooth,keyless_entry,reverse_cam,audio_input,gps,android_auto,apple_carplay,sunroof)
			 VALUES (?,?,?,?,?,?,?,?,?)";
	$stmt2 = $con->prepare($sql2);
	if ($stmt2->execute([$res, $bluetooth, $keyless_entry, $reverse_cam, $audio_input, $gps, $android_auto, $apple_carplay, $sunroof])) {
		$response = "Successfully created vehicle";
		header("Location: index.php?page=fleet/partners/all&msg=$response");
		exit;
	} else {
		$response = "Failed";
		header("Location: index.php?page=fleet/all&msg=$response");
		exit;
	}

	// $log->warning($response);

	// header("Location: index.php?page=fleet/all&msg=$response");
} else {
	$msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?msg=$msg");
	exit;
}
?>