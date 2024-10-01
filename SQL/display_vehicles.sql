select vb.make AS Make, vb.model AS Model, vb.number_plate AS REG, vb.category AS Category, vp.daily_rate AS Rate FROM
`kisuzi-rental`.`vehicle_basics` vb INNER JOIN `kisuzi-rental`.`vehicle_pricing` vp ON vb.id = vp.vehicle_id;   

ALTER TABLE `kisuzi-rental`.`vehicle_basics` 
ADD COLUMN `availability` VARCHAR(45) NULL AFTER `deleted`;

ALTER TABLE `kisuzi-rental`.`vehicle_basics` 
ADD COLUMN `colour` VARCHAR(100) NULL DEFAULT 'White' AFTER `created_at`,
ADD COLUMN `catalog_display` VARCHAR(45) NULL DEFAULT 'No' AFTER `colour`,
CHANGE COLUMN `deleted` `deleted` VARCHAR(45) NULL DEFAULT 'false' ,
CHANGE COLUMN `availability` `availability` VARCHAR(45) NULL DEFAULT 'Free' ;

ALTER TABLE `kisuzi-rental`.`vehicle_extras` 
ADD COLUMN `sunroof` VARCHAR(11) NULL DEFAULT 'No' AFTER `apple_carplay`;

ALTER TABLE `kisuzi-rental`.`vehicle_extras` 
CHANGE COLUMN `bluetooth` `bluetooth` VARCHAR(11) NULL DEFAULT 'No' ,
CHANGE COLUMN `keyless_entry` `keyless_entry` VARCHAR(11) NULL DEFAULT 'No' ,
CHANGE COLUMN `reverse_cam` `reverse_cam` VARCHAR(11) NULL DEFAULT 'No' ,
CHANGE COLUMN `audio_input` `audio_input` VARCHAR(11) NULL DEFAULT 'No' ,
CHANGE COLUMN `gps` `gps` VARCHAR(11) NULL DEFAULT 'No' ,
CHANGE COLUMN `android_auto` `android_auto` VARCHAR(11) NULL DEFAULT 'No' ,
CHANGE COLUMN `apple_carplay` `apple_carplay` VARCHAR(11) NULL DEFAULT 'No' ;

ALTER TABLE `kisuzi-rental`.`customer_details` 
ADD COLUMN `password` VARCHAR(255) NULL AFTER `email`;

ALTER TABLE `kisuzi-rental`.`customer_details` 
ADD COLUMN `self_registered` VARCHAR(45) NULL DEFAULT 'No' AFTER `license_image`;

ALTER TABLE `kisuzi-rental`.`drivers` 
ADD COLUMN `deleted` VARCHAR(11) NULL DEFAULT 'false' AFTER `license_image`;

ALTER TABLE `kisuzi-rental`.`vehicle_basics` 
ADD COLUMN `partner_vehicle` VARCHAR(11) NULL DEFAULT 'No' AFTER `catalog_display`;

ALTER TABLE `kisuzi-rental`.`partners` 
CHANGE COLUMN `deleted` `deleted` VARCHAR(15) NULL DEFAULT 'false' ;

-- Add partner_id to bookings table 
ALTER TABLE `kisuzi-rental`.`vehicle_basics` 
ADD COLUMN `partner_id` INT NULL AFTER `catalog_display`;

-- Add partner rate to bookings table 
ALTER TABLE `kisuzi-rental`.`vehicle_pricing` 
ADD COLUMN `partner_rate` VARCHAR(11) NULL AFTER `refundable_security_deposit`;

-- Add status to bookings table 
ALTER TABLE `kisuzi-rental`.`bookings` 
ADD COLUMN `status` VARCHAR(20) NULL AFTER `account_id`;

-- add status to contracts
ALTER TABLE `kisuzi-rental`.`contracts` 
ADD COLUMN `status` VARCHAR(15) NULL DEFAULT 'unsigned' AFTER `account_id`;


-- add fuel to bookings
ALTER TABLE `kisuzi-rental`.`bookings` 
ADD COLUMN `fuel` VARCHAR(20) NULL AFTER `created_at`;

-- add start and end time to booking 
ALTER TABLE `kisuzi-rental`.`bookings` 
ADD COLUMN `start_time` TIME NULL AFTER `start_date`,
ADD COLUMN `end_time` TIME NULL AFTER `end_date`;

-- change time to varchar
ALTER TABLE `kisuzi-rental`.`bookings` 
CHANGE COLUMN `start_time` `start_time` VARCHAR(20) NULL DEFAULT NULL ,
CHANGE COLUMN `end_time` `end_time` VARCHAR(20) NULL DEFAULT NULL ;

-- add image to vehicle_basics
ALTER TABLE `kisuzi-rental`.`vehicle_basics` 
ADD COLUMN `image` VARCHAR(255) NULL AFTER `partner_id`;

-- add roles to accounts 
ALTER TABLE `kisuzi-rental`.`accounts` 
ADD COLUMN `role_id` VARCHAR(45) NULL AFTER `verified`;

-- add country to accounts
ALTER TABLE `kisuzi-rental`.`accounts` 
ADD COLUMN `country` VARCHAR(100) NULL AFTER `representative`;

-- assignment id to bookings. person who assigns the car
ALTER TABLE `kisuzi-rental`.`bookings` 
ADD COLUMN `assign_id` INT NULL AFTER `account_id`;