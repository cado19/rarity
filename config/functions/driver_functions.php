<?php
// get all driver records
function all_drivers() {
	global $con;
	global $drivers;
	$status = "false";

	try {

		$con->beginTransaction();

		$sql = "SELECT id, first_name, last_name, email, id_no, phone_no FROM drivers WHERE deleted = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$status]);
		$drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $drivers;
}

// get single driver record
function get_driver($id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT * FROM drivers WHERE id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// save driver into the database
function save_driver($first_name, $last_name, $email, $id_number, $dl_number, $tel, $date_of_birth) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "INSERT INTO drivers
				(first_name, last_name, email, id_no, dl_no, phone_no, date_of_birth)
				VALUES (?,?,?,?,?,?,?)";

		$stmt = $con->prepare($sql);
		if ($stmt->execute([$first_name, $last_name, $email, $id_number, $dl_number, $tel, $date_of_birth])) {
			$res = "Success";
		} else {
			$res = "Uncsuccessful";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// update driver record
function update_driver($first_name, $last_name, $email, $id_number, $dl_number, $tel, $date_of_birth, $id) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();
		$sql = "UPDATE drivers SET first_name = ?, last_name = ?, email = ?, id_no = ?, dl_no = ?, phone_no = ?, date_of_birth = ? WHERE id = ?";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$first_name, $last_name, $email, $id_number, $dl_number, $tel, $date_of_birth, $id])) {
			$res = "Success";
		} else {
			$res = "Uncsuccessful";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// function to delete a driver
function delete_driver($id) {
	global $con;
	global $res;
	$status = "true";

	try {
		$con->beginTransaction();

		$sql = "UPDATE drivers SET deleted = ? WHERE id = ?";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$status, $id])) {
			$res = "Deleted";
		} else {
			$res = "Failed to delete";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}
?>