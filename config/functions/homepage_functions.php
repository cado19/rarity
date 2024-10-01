<?php
function vehicle_count() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT COUNT(id) AS number_of_cars FROM vehicle_basics";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch();

		$con->commit();
	} catch (\Throwable $th) {
		$con->rollback();
	}

	return $res;
}

function customer_count() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT COUNT(id) AS number_of_customers FROM customer_details";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (\Throwable $th) {
		$con->rollback();
	}

	return $res;
}

function home_active_bookings() {
	global $con;
	global $res;
	$status = "active";

	try {
		$con->beginTransaction();

		$sql = "SELECT COUNT(id) AS number_of_bookings FROM bookings WHERE status = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$status]);
		$res = $stmt->fetch(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (\Throwable $th) {
		$con->rollback();
	}

	return $res;
}

function partner_count() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT COUNT(id) AS number_of_partners FROM partners";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (\Throwable $th) {
		$con->rollback();
	}

	return $res;
}

function home_bookings() {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id ORDER BY b.created_at DESC LIMIT 5";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}
?>