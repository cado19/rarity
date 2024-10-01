<?php
//page name. We set this inn the content start and also in the page title programatically
$page = "agent";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=agents/all";
$home_link_name = "All Agents";

$new_link = "index.php?page=agents/new";
$new_link_name = "New agent";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Agents";
$breadcrumb_active = "agent";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	//fetch agent
	$agent = get_agent($id);
	// $no_of_vehicles = partner_vehicle_count($id);
	$bookings = agent_bookings($id);
	$no_of_bookings = agent_booking_count($id);
	// $vehicles = partner_vehicles($id);
}
$log->info('Bookings:', $bookings);

// Program to display complete URL
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$link = "https";
} else {
	$link = "http";
}

// Here append the common URL characters
$link .= "://";

// Append the host(domain name,
// ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource
// location to the URL
$link .= $_SERVER['PHP_SELF'];

$link .= "?page=agents/show&id=${id}";
?>
<script>
	console.log(<?php echo json_encode($bookings); ?>);
</script>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
				<div class="row d-flex justify-content-center">

	                <div class="col-12 col-sm-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Agent</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_value($agent, 'name');?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Tel</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_value($agent, 'phone_no');?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Email</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_value($agent, 'email');?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Bookings</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_numeric_value($no_of_bookings, 'booking_count');?> </span>
	                    </div>
	                  </div>
	                </div>

				</div>

			</div>
		</div>

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $agent['name']; ?>'s Bookings</h3>
                    <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (empty($bookings)): ?>
                        <p><?php echo $agent['name']; ?> has no bookings</p>
                    <?php else: ?>
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Vehicle</th>
                                    <th>Plate</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php forEach ($bookings as $booking): ?>
                                    <tr>
                                        <td> <?php echo $booking['first_name']; ?> <?php echo $booking['last_name']; ?> </td>
                                        <td> <?php echo $booking['model']; ?> <?php echo $booking['make']; ?> </td>
                                        <td> <?php echo $booking['number_plate']; ?> </td>
                                        <td>
                                            <?php
$start = strtotime($booking['start_date']);
echo date("l jS \of F Y", $start);
?>
                                        </td>
                                        <td>
                                            <?php
$end = strtotime($booking['end_date']);
echo date("l jS \of F Y", $end);
?>
                                        </td>
                                        <td> <a href="index.php?page=bookings/show&id=<?php echo $booking['id']; ?>">Details</a> </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    <?php endif;?>
                </div>
            </div>
        </div>

	</div>
</section>

<?php include_once "partials/footer.php";?>