-- I GUESS THIS WILL BE THE GENERAL SQL FILE 


-- GET DETAILS FOR CONTRACT 
SELECT c.first_name, c.last_name, c.id_no, c.phone_no, c.email, c.residential_address, d.first_name, d.last_name, d.id_no, d.phone_no,
 vb.make, vb.model, vb.number_plate, vp.total_price, bk.start_date, bk.end_date FROM bookings bk INNER JOIN customer_details c 
ON bk.customer_id = c.id INNER JOIN drivers d ON bk.driver_id = d.id INNER JOIN vehicle_basics vb ON bk.vehicle_id = vb.id INNER JOIN contracts ct 
ON ct.booking_id = bk.id WHERE bk.id = 4;

-- GET DETAILS FOR CONTRACT 
SELECT c.first_name, c.last_name, c.id_no, c.phone_no, c.email, c.residential_address, d.first_name, d.last_name, d.id_no, d.phone_no,
 vb.make, vb.model, vb.number_plate, vp.daily_rate, bk.start_date, bk.end_date, ct.signature FROM bookings bk INNER JOIN customer_details c 
ON bk.customer_id = c.id INNER JOIN drivers d ON bk.driver_id = d.id INNER JOIN vehicle_basics vb ON bk.vehicle_id = vb.id INNER JOIN contracts ct 
ON ct.booking_id = bk.id INNER JOIN vehicle_pricing vp ON bk.vehicle_id = vp.vehicle_id WHERE bk.id = 4;

ALTER TABLE `kisuzi-rental`.`customer_details` 
ADD COLUMN `password` VARCHAR(255) NULL AFTER `email`;

-- SELECT CUSTOMER DETAILS AT LOGIN FOR STORING IN A SESSION 
SELECT first_name, last_name, phone_no, email, date_of_birth, dl_no, dl_expiration, id_no, residential_address,
work_address, id_image, profile_image, license_image FROM customer_details WHERE id = ?;

-- UPDATE CUSTOMER SQL 
UPDATE customer_details SET first_name = ?, last_name = ?, email = ?, id_type = ?, id_no = ?, phone_no = ?, residential_address = ?, work_address = ?, date_of_birth = ? WHERE id = ?

-- UPDATE VEHICLE BASICS SQL 
UPDATE vehicle_basics SET make = ?,model = ?,number_plate = ?,category = ?,transmission = ?,fuel = ?,seats = ?,drive_train = ? WHERE id = ?;

-- UPDATE VEHICLE PRICING 
UPDATE vehicle_pricing SET  daily_rate = ?, vehicle_excess = ?, refundable_security_deposit = ? WHERE vehicle_id = ?;

-- UPDATE VEHICLE EXTRAS 
UPDATE vehicle_extras SET bluetooth = ?,keyless_entry = ?,reverse_cam = ?,audio_input = ?,gps = ?,android_auto = ?,apple_carplay = ? WHERE vehicle_id = ?;

-- GET MOST BOOKED VEHICLES 
SELECT 
    vb.id, vb.model, vb.make, count(vb.id)
FROM
    vehicle_basics vb
        INNER JOIN
    bookings bk ON vb.id = bk.vehicle_id GROUP BY vb.id ORDER BY count(vb.id) DESC;

-- GET BOOKINGS BELONGING TO A CERTAIN VEHICLE
SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date, b.total FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.vehicle_id = ?

-- GET OUR VEHICLES BASED ON TOTAL INCOME 
SELECT v.model, v.make, sum(b.total) AS Income FROM vehicle_basics v INNER JOIN bookings b ON v.id = b.vehicle_id AND v.partner_id IS NULL GROUP BY v.id ORDER BY Income DESC; 


-- CLIENTS WITH THE MOST BOOKINGS 
SELECT c.first_name, c.last_name, count(c.id) AS Bookings FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id GROUP BY c.id ORDER BY Bookings DESC

-- MOST PROFITABLE CLIENTS 
SELECT c.first_name, c.last_name, sum(b.total) AS Income FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id GROUP BY c.id ORDER BY Income DESC

-- SELF DRIVE 
INSERT INTO `kisuzi-rental`.`drivers` (`first_name`, `last_name`, `id_no`, `dl_no`, `dl_expiration_date`, `date_of_birth`, `phone_no`, `email`, `deleted`) VALUES ('SELF', 'DRIVE', 'NONE', 'NONE', '1970-01-01', '1970-01-01', '123456789', 'self@drive.com', 'false');

-- INSERT ROLES IN ROLES TABLE
INSERT INTO `kisuzi-rental`.`roles` (`name`) VALUES ('admin');
INSERT INTO `kisuzi-rental`.`roles` (`name`) VALUES ('agent');
INSERT INTO `kisuzi-rental`.`roles` (`name`) VALUES ('driver');
INSERT INTO `kisuzi-rental`.`roles` (`name`) VALUES ('fleet manager');

