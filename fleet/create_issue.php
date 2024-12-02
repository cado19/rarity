<?php
$title = $description = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$vehicle_id = $_POST['vehicle_id'];

	if (empty($_POST['title'])) {
		$title_err = "Required";
		header("Location: index.php?page=fleet/new_issue&vehicle_id=$vehicle_id&title_err=$title_err");
		exit;
	}
	if (empty($_POST['cost'])) {
		$cost_err = "Required";
		header("Location: index.php?page=fleet/new_issue&vehicle_id=$vehicle_id&cost_err=$cost_err");
		exit;
	}
	if (empty($_POST['issue_date'])) {
		$issue_date_err = "Required";
		header("Location: index.php?page=fleet/new_issue&vehicle_id=$vehicle_id&issue_date_err=$issue_date_err");
		exit;
	}

	$title = $_POST['title'];
	$cost = $_POST['cost'];
	$issue_date = $_POST['issue_date'];

	if (isset($_POST['description'])) {
		$description = $_POST['description'];
	}

	$details = array($vehicle_id, $title, $description);

	$result = save_issue($vehicle_id, $title, $description, $cost, $issue_date);

	if ($result == "Success") {
		$msg = "Successfully added issue";
		header("Location: index.php?page=fleet/issues&id=$vehicle_id&msg=$msg");
		exit;
	} else {
		$msg = "An error occured. Please try again later";
		header("Location: index.php?page=fleet/issues&id=$vehicle_id&err_msg=$msg");
		exit;
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
	console.log(<?php echo json_encode($details); ?>);
</script>