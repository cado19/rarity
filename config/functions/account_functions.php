<?php
function unique_email($email) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "SELECT id FROM accounts WHERE email = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			$res = "Email taken";
		} else {
			$res = "You may proceed";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// get email that will be used for password reset
function get_email($email) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "SELECT id FROM accounts WHERE email = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$email]);
		if ($stmt->rowCount() == 1) {
			$res = "You may proceed";
		} else {
			$res = "No such email";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function create_account($name, $email, $password) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "INSERT INTO accounts (name, email, password) VALUES (?,?,?)";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$name, $email, $password])) {
			$res = $con->lastInsertId();
		} else {
			$res = "No Success";
		}

		$con->commit();
	} catch (\Throwable $th) {
		$con->rollback();
	}

	return $res;
}

function fetch_account($email) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "SELECT * FROM accounts WHERE email = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$email]);
		if ($stmt->rowCount() == 1) {
			$res = $stmt->fetch();
			// $res = ["Proceed"];
		} else {
			$res = ["No such person"];
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function login() {

}

?>