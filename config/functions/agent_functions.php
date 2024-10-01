<?php
function all_agents() {
	global $con;
	global $res;
	$id = 2;

	try {
		$con->beginTransaction();

		$sql = "SELECT * FROM accounts WHERE role_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$id]);
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}
	return $res;
}

function get_agent($id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT * FROM accounts WHERE id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function save_agent($name, $email, $country, $tel, $password, $role_id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();
		$sql = "INSERT INTO accounts (name, email, country, phone_no, password, role_id) VALUES (?,?,?,?,?,?)";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$name, $email, $country, $tel, $password, $role_id])) {
			$res = "Success";
		} else {
			$res = "Failed";
		}
		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

//partner booking count
function agent_booking_count($agent_id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT count(b.id) AS booking_count FROM bookings b INNER JOIN accounts a ON a.id = b.account_id WHERE a.id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$agent_id]);
		$res = $stmt->fetch();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function agent_bookings($agent_id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT b.id, a.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id INNER JOIN accounts a ON b.account_id = a.id WHERE a.id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$agent_id]);
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

?>