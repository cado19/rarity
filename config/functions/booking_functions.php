<?php
// function to get all bookings
function bookings()
{
    global $con;
    global $res;

    try {

        $con->beginTransaction();

        $sql  = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id ORDER BY b.created_at DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to get upcoming bookings
function upcoming_bookings()
{
    global $con;
    global $res;
    $status = "upcoming";

    try {

        $con->beginTransaction();

        $sql  = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.status = ? ORDER BY b.created_at DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$status]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to get active bookings
function active_bookings()
{
    global $con;
    global $res;
    $status = "active";

    try {

        $con->beginTransaction();

        $sql  = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.status = ? ORDER BY b.created_at DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$status]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to get completed bookings
function completed_bookings()
{
    global $con;
    global $res;
    $status = "completed";

    try {

        $con->beginTransaction();

        $sql  = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.status = ? ORDER BY b.created_at DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$status]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to get cancelled bookings
function cancelled_bookings()
{
    global $con;
    global $res;
    $status = "cancelled";

    try {

        $con->beginTransaction();

        $sql  = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.status = ? ORDER BY b.created_at DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$status]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

function partner_bookings($partner_id)
{
    global $con;
    global $res;

    try {

        $con->beginTransaction();

        $sql  = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE v.partner_id = ? ORDER BY b.created_at DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$partner_id]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to get all active bookings created by agents
function active_agent_bookings()
{
    global $con;
    global $res;
    $status = "active";

    try {

        $con->beginTransaction();

        $sql = "SELECT
    b.id,
    c.first_name,
    c.last_name,
    v.model,
    v.make,
    v.number_plate,
    b.start_date,
    b.end_date
FROM
    customer_details c
        INNER JOIN
    bookings b ON c.id = b.customer_id
        INNER JOIN
    vehicle_basics v ON b.vehicle_id = v.id
WHERE
    b.account_id IS NOT NULL AND b.status = ?
ORDER BY b.created_at DESC;";

        $stmt = $con->prepare($sql);
        $stmt->execute([$status]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to get single booking
function booking($id)
{
    global $con;
    global $res;

    try {

        $con->beginTransaction();

        $sql  = "SELECT c.first_name, c.last_name, v.model, v.make, v.number_plate, v.drive_train, cat.name AS category, v.seats, vp.daily_rate, b.start_date, b.end_date, b.total, b.status, b.booking_no, ct.status AS signature_status FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id INNER JOIN vehicle_pricing vp ON b.vehicle_id = vp.vehicle_id INNER JOIN contracts ct ON b.id = ct.booking_id INNER JOIN vehicle_categories cat ON v.category_id = cat.id WHERE b.id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to update last booking details (total_price)
function update_booking($total, $id)
{
    global $con;
    global $res;

    try {

        $con->beginTransaction();

        $sql  = "UPDATE bookings SET total = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        if ($stmt->execute([$total, $id])) {
            $res = "Success";
        } else {
            $res = "Error";
        }

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to assign(hand over) a vehicle to the client
function assign_vehicle($id, $fuel, $account_id)
{
    global $con;
    global $res;

    try {

        $con->beginTransaction();

        $sql  = "UPDATE bookings SET fuel = ?, assign_id = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        if ($stmt->execute([$fuel, $account_id, $id])) {
            $res = "Success";
        } else {
            $res = "Error";
        }

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}

// function to get all vehicles for the booking process
function booking_vehicles()
{
    global $con;
    global $bk_vehicles;
    $status = "false";

    try {

        $con->beginTransaction();

        $sql  = "SELECT id, make, model, number_plate FROM vehicle_basics WHERE deleted = ? AND partner_id IS NULL ORDER BY id DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$status]);
        $bk_vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $bk_vehicles;
}

// function to get all partner vehicles for the booking process
function partner_booking_vehicles()
{
    global $con;
    global $bk_vehicles;
    $status  = "false";
    $partner = '';

    try {

        $con->beginTransaction();

        $sql  = "SELECT id, make, model, number_plate FROM vehicle_basics WHERE deleted = ? AND partner_id != ? ORDER BY id DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$status, $partner]);
        $bk_vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $bk_vehicles;
}

// function to get all customers for the booking process
function booking_customers()
{
    global $con;
    global $bk_customers;
    $status = "false";

    try {

        $con->beginTransaction();

        $sql  = "SELECT id, first_name, last_name FROM customer_details WHERE deleted = ? ORDER BY id DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$status]);
        $bk_customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $bk_customers;
}

// function to get all drivers for the booking process
function booking_drivers()
{
    global $con;
    global $bk_drivers;
    $status = "false";

    try {

        $con->beginTransaction();

        $sql  = "SELECT id, first_name, last_name FROM drivers WHERE deleted = ? ORDER BY id DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$status]);
        $bk_drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $bk_drivers;
}

// function to insert booking into database
function save_booking($v_id, $c_id, $d_id, $a_id, $start_date, $end_date, $start_time, $end_time)
{
    global $con;
    global $res;
    $status = "upcoming";

    try {
        $con->beginTransaction();

        $sql  = "INSERT INTO bookings (vehicle_id, customer_id, driver_id, account_id, start_date, end_date, start_time, end_time, status) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        if ($stmt->execute([$v_id, $c_id, $d_id, $a_id, $start_date, $end_date, $start_time, $end_time, $status])) {
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

// function to insert booking number into the database
function save_booking_number($id, $number)
{
    global $con;
    global $res;

    try {
        $con->beginTransaction();
        $sql  = "UPDATE bookings SET booking_no = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$number, $id]);
        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

}

// function to activate booking
function activate_booking($id)
{
    global $con;
    global $res;
    $status = "active";

    try {
        $con->beginTransaction();
        $sql  = "UPDATE bookings SET status = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        if ($stmt->execute([$status, $id])) {
            $res = "Success";
        } else {
            $res = "Failed";
        }
        $con->commit();
    } catch (\Throwable $th) {
        $con->rollback();
    }

    return $res;
}

// get details for booking voucher
function booking_voucher_details($id)
{
    global $con;
    global $res;

    try {
        $con->beginTransaction();

        $sql  = "SELECT b.id, b.total, b.start_date, b.start_time, b.end_date, b.end_time, b.created_at, v.make, v.model, v.number_plate, c.first_name, c.last_name FROM bookings b INNER JOIN vehicle_basics v ON b.vehicle_id = v.id INNER JOIN customer_details c ON b.customer_id = c.id WHERE b.id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();

        $con->commit();
    } catch (\Throwable $th) {
        $con->rollback();
    }

    return $res;
}
