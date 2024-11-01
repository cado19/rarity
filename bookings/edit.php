<?php
    // THIS FILE IS THE FORM FOR CREATING A NEW BOOKING

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Edit booking";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=bookings/all";
    $home_link_name = "All Bookings";

    $new_link      = "index.php?page=bookings/new";
    $new_link_name = "New Booking";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Bookings";
    $breadcrumb_active = "All Bookings";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';
    $account_id = $_SESSION['account']['id'];

    if (isset($_GET['id'])) {
        $id      = $_GET['id'];
        $booking = booking($id);
    } else {
        $err_msg = "There was an error fetching the booking. Try again";
        header("Location: index.php?page=bookings/all&msg=$err_msg");
        exit;
    }

    $vehicles  = booking_vehicles();
    $customers = booking_customers();
    $drivers   = booking_drivers();
?>
<script>
    console.log(<?php echo json_encode($booking) ?>);
</script>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Booking:<?php echo " "; ?><?php show_value($booking, 'booking_no');?> </h2>
                        <br>
                        <div class="row">
                            <div class="col-12">

                                <form action="index.php?page=bookings/update" method="post" autocomplete="off">
                                    <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
                                    <input type="hidden" name="booking_id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <label for="vehicle_id">Vehicle</label>
                                        <select name="vehicle_id"  class="form-control form-control-border">
                                            <?php foreach ($vehicles as $vehicle): ?>
                                                <option value="<?php echo $vehicle['id']; ?>"><?php echo $vehicle['make']; ?><?php echo " "; ?><?php echo $vehicle['model']; ?><?php echo " "; ?><em><?php echo $vehicle['number_plate']; ?></em>
                                                </option>
                                            <?php endforeach;?>
                                        </select>
                                        <p class="text-primary">Current vehicle:<?php echo " "; ?><?php show_value($booking, 'make');?><?php echo " "; ?><?php show_value($booking, 'model');?><?php echo " "; ?><?php echo " "; ?><?php show_value($booking, 'number_plate');?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_id">Customer</label>
                                        <select name="customer_id" class="form-control form-control-border">
                                            <option  value="<?php echo $booking['customer_id']; ?>"><?php edit_dropdown_value($booking, 'customer_first_name');?><?php echo " "; ?><?php edit_dropdown_value($booking, 'customer_last_name');?></option>
                                            <?php foreach ($customers as $customer): ?>
                                                <option value="<?php echo $customer['id']; ?>"><?php echo $customer['first_name']; ?><?php echo " "; ?><?php echo $customer['last_name']; ?> </option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="driver_id">Driver</label>
                                        <select name="driver_id" class="form-control form-control-border">
                                            <option  value="<?php echo $booking['driver_id']; ?>"><?php edit_dropdown_value($booking, 'driver_first_name');?><?php echo " "; ?><?php edit_dropdown_value($booking, 'driver_last_name');?></option>
                                            <?php foreach ($drivers as $driver): ?>
                                                <option value="<?php echo $driver['id']; ?>"><?php echo $driver['first_name']; ?><?php echo " "; ?><?php echo $driver['last_name']; ?> </option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Start Date</label>
                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                    <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php edit_input_value($booking, 'start_date');?>"/>
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker" />
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                <?php if (isset($_GET['start_date_err'])): ?>
                                                    <p class="text-danger"><?php echo $_GET['start_date_err']; ?> </p>
                                                <?php endif;?>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">End Date</label>
                                                <div class="input-group date" id="enddate" data-target-input="nearest">
                                                    <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#enddate" value="<?php edit_input_value($booking, 'end_date');?>" />
                                                    <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                <?php if (isset($_GET['end_date_err'])): ?>
                                                    <p class="text-danger"><?php echo $_GET['end_date_err']; ?> </p>
                                                <?php endif;?>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Start Time</label>
                                                <div class="input-group date" id="starttime" data-target-input="nearest">
                                                    <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#starttime" value="<?php edit_input_value($booking, 'start_time');?>" />
                                                    <div class="input-group-append" data-target="#starttime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php if (isset($_GET['start_time_err'])): ?>
                                                    <p class="text-danger"><?php echo $_GET['start_time_err']; ?> </p>
                                                <?php endif;?>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">End Time</label>
                                                <div class="input-group date" id="endtime" data-target-input="nearest">
                                                    <input type="text" name="end_time" class="form-control datetimepicker-input" data-target="#endtime" value="<?php edit_input_value($booking, 'end_time');?>" />
                                                    <div class="input-group-append" data-target="#endtime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                                    </div>
                                                </div>
                                                <?php if (isset($_GET['end_time_err'])): ?>
                                                    <p class="text-danger"><?php echo $_GET['end_time_err']; ?> </p>
                                                <?php endif;?>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="driver_id">Custom Rate</label>
                                        <input type="text" name="custom_rate" class="form-control form-control-border">
                                    </div>
                                    <?php if (isset($_GET['rate_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['rate_err']; ?> </p>
                                    <?php endif;?>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-dark">Update Booking</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>