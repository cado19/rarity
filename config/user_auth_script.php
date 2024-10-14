<?php
$account = $_SESSION['account'];
$role_id = $account['role_id'];
if ($role_id == 2) {
	$err_msg = "Unauthorized";
	header("Location: index.php?page=home&err_msg=$err_msg");
	exit;
}

?>