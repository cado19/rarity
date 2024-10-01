<?php
$title = $description = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['title'])) {
		$title_err = "Required";
		header("Location: index.php?page=fleet/new_issue&title_err=$title_err");
		exit;
	}

	$vehicle_id = $_POST['vehicle_id'];
	$title = $_POST['title'];

	if (isset($_POST['description'])) {
		$description = $_POST['description'];
	}

	$details = array($vehicle_id, $title, $description);

	$result = save_issue($vehicle_id, $title, $description);

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