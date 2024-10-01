<?php
//page name. We set this inn the content start and also in the page title programatically
$page = "Booking Analytics";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=bookings/all";
$home_link_name = "All Bookings";

$new_link = "index.php?page=bookings/new";
$new_link_name = "New Booking";

$new_pb_link = "index.php?page=bookings/new_pb";
$new_pb_link_name = "New Partner Booking";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Bookings";
$breadcrumb_active = "All Bookings";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

include_once 'partials/header.php';
include_once 'partials/content_start.php';
$account_id = $_SESSION['account']['id'];
$bookings = bookings_current_month();

?>

<!-- Main Content  -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Vehicle</th>
                                    <th>Plate</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php forEach ($bookings as $booking): ?>
                                    <tr>
                                        <td> <?php echo $booking['first_name']; ?> <?php echo $booking['last_name']; ?> </td>
                                        <td> <?php echo $booking['model']; ?> <?php echo $booking['make']; ?> </td>
                                        <td> <?php echo $booking['number_plate']; ?> </td>
                                        <td> <a href="index.php?page=bookings/show&id=<?php echo $booking['id']; ?>">Details</a> </td>
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