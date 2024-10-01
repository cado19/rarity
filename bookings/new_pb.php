<?php
// THIS FILE IS THE FORM FOR CREATING A NEW BOOKING

//page name. We set this inn the content start and also in the page title programatically
$page = "New booking";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=bookings/all";
$home_link_name = "All Bookings";

$new_link = "index.php?page=bookings/new";
$new_link_name = "New Bookings";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Bookings";
$breadcrumb_active = "New partner booking";

include_once 'partials/header.php';
include_once 'partials/content_start.php';
$account_id = $_SESSION['account']['id'];

$id = $_GET['id'];

$vehicles = partner_vehicles($id);
$customers = booking_customers();
$drivers = booking_drivers();
$log->info('customers', $customers);
?>
<script>
    console.log(<?php echo json_encode($vehicles); ?>)
</script>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="index.php?page=bookings/create_pb" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="vehicle_id">Vehicle</label>
                                <select name="vehicle_id"  class="form-control form-control-border">
                                    <?php foreach ($vehicles as $vehicle): ?>
                                        <option value="<?php echo $vehicle['id']; ?>"> <?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?> <?php echo $vehicle['number_plate']; ?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="customer_id">Customer</label>
                                <select name="customer_id" class="form-control form-control-border">
                                    <?php foreach ($customers as $customer): ?>
                                        <option value="<?php echo $customer['id']; ?>"> <?php echo $customer['first_name']; ?> <?php echo $customer['last_name']; ?> </option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="driver_id">Driver</label>
                                <select name="driver_id" class="form-control form-control-border">
                                    <?php foreach ($drivers as $driver): ?>
                                        <option value="<?php echo $driver['id']; ?>"> <?php echo $driver['first_name']; ?> <?php echo $driver['last_name']; ?> </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Start Date</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">End Date</label>
                                        <div class="input-group date" id="enddate" data-target-input="nearest">
                                            <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#enddate"/>
                                            <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <?php if (isset($_GET['end_date_err'])): ?>
                                            <p class="text-danger"> <?php echo $_GET['end_date_err']; ?> </p>
                                        <?php endif;?>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Proceed to Contract</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>