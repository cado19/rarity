<?php
$page = "New Driver";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=fleet/all";
$home_link_name = "All Drivers";

$new_link = "index.php?page=fleet/new";
$new_link_name = "New Driver";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Drivers";
$breadcrumb_active = "New Driver";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$vehicle = get_vehicle($id);
	$log->info('Foo: ', $vehicle);
} else {
	$msg = "Couldn't fetch fetch vehicle";
	header("Location: index.php?page=fleet/all&msg=$msg");
}

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="index.php?page=fleet/update" method="post" autocomplete="off">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Vehicle's Primary Details</h3>
                           <div class="card-tools">
                               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="make">Make</label>
                                        <input type="text" name="make" value="<?php edit_input_value($vehicle, 'make');?>" placeholder="eg: Toyota" class="form-control form-control-border" required>
                                        <?php if (isset($_GET['make_err'])): ?>
                                            <p class="text-danger"><?php echo $_GET['make_err']; ?></p>
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" value="<?php edit_input_value($vehicle, 'model');?>" placeholder="eg: Land Cruiser" class="form-control form-control-border" required>
                                        <?php if (isset($_GET['model_err'])): ?>
                                            <p class="text-danger"><?php echo $_GET['model_err']; ?></p>
                                        <?php endif;?>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="email">Number Plate</label>
                                <input type="text" name="number_plate" value="<?php edit_input_value($vehicle, 'number_plate');?>" class="form-control form-control-border" required>
                                <?php if (isset($_GET['number_plate_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['number_plate_err']; ?></p>
                                <?php endif;?>

                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" value="<?php edit_input_value($vehicle, 'category');?>" class="form-control form-control-border">
                                        <option value="<?php edit_input_value($vehicle, 'category');?>"><?php edit_dropdown_value($vehicle, 'category');?></option>
                                        <option value="Mid-size SUV"> Mid Size SUV </option>
                                        <option value="Mid-size SUV"> Crossover SUV </option>
                                        <option value="Medium Car"> Medium Car </option>
                                        <option value="Small Car "> Small Car </option>
                                        <option value="Safari"> Safari </option>
                                        <option value="Luxury"> Luxury </option>
                                </select>
                                <?php if (isset($_GET['category_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['category_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="transmission">Transmission</label>
                                <select name="transmission" value="<?php edit_input_value($vehicle, 'transmission');?>" class="form-control form-control-border">
                                        <option value="<?php edit_input_value($vehicle, 'transmission');?>"><?php edit_dropdown_value($vehicle, 'transmission');?></option>
                                        <option value="Automatic"> Automatic </option>
                                        <option value="Manual"> Manual </option>
                                </select>
                                <?php if (isset($_GET['transmission_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['transmission_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="fuel">Fuel Type</label>
                                <select name="fuel" value="<?php edit_input_value($vehicle, 'fuel');?>" class="form-control form-control-border">
                                        <option value="<?php edit_input_value($vehicle, 'fuel');?>"><?php edit_dropdown_value($vehicle, 'fuel');?></option>
                                        <option value="Petrol"> Petrol </option>
                                        <option value="Diesel"> Diesel </option>
                                        <option value="Hybrid"> Hybrid </option>
                                </select>
                                <?php if (isset($_GET['fuel_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['fuel_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="fuel">Drive Train</label>
                                <select name="drive_train" value="<?php edit_input_value($vehicle, 'drive_train');?>" class="form-control form-control-border">
                                        <option value="<?php edit_input_value($vehicle, 'drive_train');?>"><?php edit_dropdown_value($vehicle, 'drive_train');?></option>
                                        <option value="2WD"> 2WD </option>
                                        <option value="4WD"> 4WD </option>
                                </select>
                                <?php if (isset($_GET['drive_train_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['drive_train_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="seats">Seats</label>
                                <input type="text" name="seats" value="<?php edit_input_value($vehicle, 'seats');?>" class="form-control form-control-border" required>
                                <?php if (isset($_GET['seats_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['seats_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="seats">Colour</label>
                                <input type="text" value="<?php edit_input_value($vehicle, 'colour');?>" name="colour" class="form-control form-control-border" required>
                                <?php if (isset($_GET['colour_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['colour_err']; ?></p>
                                <?php endif;?>
                            </div>

                          </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Pricing</h3>
                           <div class="card-tools">
                               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="daily_rate">Daily Rate</label>
                                <input type="text" name="daily_rate" value="<?php edit_input_value($vehicle, 'daily_rate');?>" class="form-control form-control-border" required>
                                <?php if (isset($_GET['daily_rate_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['daily_rate_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="vehicle_excess">Vehicle Excess</label>
                                <input type="text" name="vehicle_excess" value="<?php edit_input_value($vehicle, 'vehicle_excess');?>" class="form-control form-control-border" required>
                                <?php if (isset($_GET['vehicle_excess_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['vehicle_excess_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="deposit">Refundable Security Deposit</label>
                                <input type="text" name="deposit" value="<?php edit_input_value($vehicle, 'refundable_security_deposit');?>" class="form-control form-control-border" required>
                                <?php if (isset($_GET['deposit_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['deposit_err']; ?></p>
                                <?php endif;?>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Extras</h3>
                           <div class="card-tools">
                               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="bluetooth">Sunroof</label>
                                <select name="sunroof" class="form-control form-control-border">
                                    <option value="<?php edit_input_value($vehicle, 'sunroof');?>">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bluetooth">Bluetooth</label>
                                <select name="bluetooth" class="form-control form-control-border">
                                    <option value="<?php edit_input_value($vehicle, 'bluetooth');?>">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vehicle_excess">Keyless Entry</label>
                                <select name="keyless_entry" class="form-control form-control-border">
                                    <option value="<?php edit_input_value($vehicle, 'keyless_entry');?>">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="reverse_cam">Reverse Camera</label>
                                <select name="reverse_cam" class="form-control form-control-border">
                                    <option value="<?php edit_input_value($vehicle, 'reverse_cam');?>">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="audio_input">Audio Input</label>
                                <select name="audio_input" class="form-control form-control-border">
                                    <option value="<?php edit_input_value($vehicle, 'audio_input');?>">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gps">GPS</label>
                                <select name="gps" class="form-control form-control-border">
                                    <option value="<?php edit_input_value($vehicle, 'gps');?>">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="android_auto">Android Auto</label>
                                <select name="android_auto" class="form-control form-control-border">
                                    <option value="<?php edit_input_value($vehicle, 'make');?>">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="apple_carplay">Apple Car Play</label>
                                <select name="apple_carplay" class="form-control form-control-border">
                                    <option value="<?php edit_input_value($vehicle, 'apple_carplay');?>">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Update Vehicle</button>
                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>