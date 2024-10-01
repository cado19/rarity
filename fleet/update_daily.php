<?php
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = trim($_POST['id']);
		$daily_rate = trim($_POST['daily_rate']);

		$response = update_daily_rate($id,$daily_rate);
		header("Location: index.php?page=fleet/show&id=".$id."&msg=".$response);
	}
	
?>