<?php
// THIS PAGE SHOWS ALL ACTIVE BOOKINGS CREATED BY AGENTS

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Bookings";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=bookings/all";
$home_link_name = "All Bookings";

$new_link = "index.php?page=bookings/new";
$new_link_name = "New Booking";

$new_pb_link = "index.php?page=bookings/partner_list";
$new_pb_link_name = "New Partner Booking";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Bookings";
$breadcrumb_active = "Active Agent Bookings";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

include_once 'partials/header.php';
include_once 'partials/content_start.php';
$account_id = $_SESSION['account']['id'];
$booked_vehicles = booked_vehicles();

?>

<!-- Main Content  -->

<section class="content">
    <div class="container-fluid">
        <?php include_once 'partials/booking_nav.php';?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>Booking Number</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Registration</th>
                                    <th>Booking End</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($booked_vehicles as $b_vehicle): ?>
                                    <tr>
                                        <td><?php echo $b_vehicle['booking_no']; ?> </td>
                                        <td><?php echo $b_vehicle['make']; ?> </td>
                                        <td><?php echo $b_vehicle['model']; ?></td>
                                        <td> <?php echo $b_vehicle['number_plate']; ?> </td>
                                        <td>
                                            <?php
                                                $end = strtotime($b_vehicle['end_date']);
                                                echo date("l jS \of F Y", $end);
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "partials/footer.php";?>