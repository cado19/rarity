<?php
//   ******************* */ CLIENT ANALYTIC FUNCTIONS ******************* */

// get clients with the most bookings
function client_most_bookings() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT c.first_name, c.last_name, count(c.id) AS Bookings FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id GROUP BY c.id ORDER BY Bookings DESC LIMIT 5";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// get single client with the most bookings
function client_most_booking() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT c.first_name, c.last_name, count(c.id) AS Bookings FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id GROUP BY c.id ORDER BY Bookings DESC LIMIT 1";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// get clients whose bookings generated the most income
function most_profitable_clients() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT c.first_name, c.last_name, sum(b.total) AS Income FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id GROUP BY c.id ORDER BY Income DESC LIMIT 3";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// get clients whose bookings generated the most income
function most_profitable_client() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT c.first_name, c.last_name, sum(b.total) AS Income FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id GROUP BY c.id ORDER BY Income DESC LIMIT 1";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

//   ******************* */ VEHICLE ANALYTIC FUNCTIONS ******************* */

// vehicles that have generated the most income
function most_profitable_vehicles() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT v.model, v.make, sum(b.total) AS Income FROM vehicle_basics v INNER JOIN bookings b ON v.id = b.vehicle_id AND v.partner_id IS NULL GROUP BY v.id ORDER BY Income DESC LIMIT 5";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// vehicle that has generated the most income
function most_profitable_vehicle() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT v.model, v.make, sum(b.total) AS Income FROM vehicle_basics v INNER JOIN bookings b ON v.id = b.vehicle_id AND v.partner_id IS NULL GROUP BY v.id ORDER BY Income DESC LIMIT 1";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// vehicles that have been booked the most
function most_popular_vehicles() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT vb.id, vb.model, vb.make, count(vb.id) AS total FROM vehicle_basics vb INNER JOIN bookings bk ON vb.id = bk.vehicle_id GROUP BY vb.id ORDER BY count(vb.id) DESC LIMIT 3";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

//   ******************* */ BOOKING ANALYTIC FUNCTIONS ******************* */
// get bookings ending in the current month
function bookings_this_month() {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE datediff(now(), b.created_at) <= 30";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

//   ******************* */ DASHBOARD ANALYTIC FUNCTIONS ******************* */
function income_last_three_months() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();
		$sql = "SELECT monthname(created_at) AS Month, sum(total) AS Total from bookings WHERE datediff(now(), created_at) <= 90 group by Month";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}
// earned revenue this month
function earned_revenue() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT monthname(created_at) AS Month, sum(total) AS total FROM bookings WHERE datediff(now(), created_at) <= 30 GROUP BY Month";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// expected revenue this month
function expected_revenue() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT monthname(created_at) AS Month, sum(total) AS total FROM bookings WHERE datediff(now(), end_date) <= 30 GROUP BY Month";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// booking count this month
function booking_count_this_month() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT monthname(created_at) AS Month, COUNT(id) AS total FROM bookings WHERE datediff(now(), created_at) <= 30 GROUP BY Month";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}
