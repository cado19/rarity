 <!-- display table showing an overview of stats with a link to details --><!-- show options for month stats and year stats  -->
<?php
// FOR NOW THIS WILL BE THE MONTHLY VEHICLE ANALYTIC DASHBOARD. WE'LL USE IT AS THE LANDING PAGE FOR MONTHLY VEHICLE ANALYTICS MODULE

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

// Get month from the URL
if (isset($_GET['month'])) {
	$month = $_GET['month'];
	$monthname = date("F", mktime(0, 0, 0, $month, 10));
}

//page name. We set this inn the content start and also in the page title programatically
$page = $monthname . " Stats";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php";
$home_link_name = "Home";

$new_link = "index.php";
$new_link_name = "Dashboard";


// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Vehicle Analytics";
$breadcrumb_active = $monthname . " Stats";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

$account_id = $_SESSION['account']['id'];


// GRAPH SCRIPTS
// revenue last 3 months


// most popular vehicles

// END GRAPH SCRIPTS

// INFO BOX SCRIPTS

$booking_count_this_month = booking_count_this_month();

$most_popular_vehicle = month_most_popular_vehicle($month);
$most_profitable_vehicle = month_most_profitable_vehicle($month); 

// get adr, totals for the year
$vehicle_totals = month_vehicles_totals($month);

// most popular vehicles in the month
$most_popular_vehicles = month_most_popular_vehicles($month);

?>
<script>
	console.log(<?php echo json_encode($most_popular_vehicles) ?>);
</script>

<section class="content">
	<div class="container-fluid">

		<!-- Info Boxes -->
		<div class="row">
			<div class="col-12 col-sm-4">
	            <div class="info-box bg-light shadow">
	                <div class="info-box-content">
	                  <span class="info-box-text text-center text-muted">Most Popular Vehicle</span>
	                  <h5 class="small-box-footer text-center"><?php show_value($most_popular_vehicle, 'make'); ?> <?php show_value($most_popular_vehicle, 'model'); ?> <?php show_value($most_popular_vehicle, 'number_plate'); ?></h5>
	                  <p class="small-box-footer text-center"><?php show_numeric_value($most_popular_vehicle, 'total') ?> bookings</p>
	                </div>
	            </div>
            </div>

	        <div class="col-12 col-sm-4">
	          <div class="info-box bg-light shadow">
	            <div class="info-box-content">
	              <span class="info-box-text text-center text-muted">Most Profitable Vehicle</span>
	              <h5 class="small-box-footer text-center"><?php show_value($most_profitable_vehicle, 'make'); ?> <?php show_value($most_profitable_vehicle, 'model'); ?> <?php show_value($most_profitable_vehicle, 'number_plate'); ?></h5>
	                  <p class="small-box-footer text-center"><?php show_monetary_value($most_profitable_vehicle, 'Income') ?>/-</p>
	            </div>
	          </div>
	        </div>

	    </div>

		<!-- Month Tabs -->
		<div class="row">
			<div class="col-12 col-sm-12">
				<ul class="nav">
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/vehicle_stats/month_stats&month=10" target="_blank">October</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/vehicle_stats/month_stats&month=11" target="_blank">November</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/vehicle_stats/month_stats&month=12" target="_blank">December</a>
				  </li>

				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-12">
				<div class="card shadow">
					<div class="card-header"><h3>General Vehicle Money Stats</h3></div>
					<div class="card-body">
						<table class="table" id="example1">
							<thead>
								<th>Make</th>
								<th>Model</th>
								<th>Number Plate</th>
								<th>Total Income </th>
								<th>Average Daily Rate </th>
								<th>Deficit (Daily Rate - ADR)</th>
							</thead>
							<tbody>
								<?php foreach($vehicle_totals as $vt): ?>
									<tr>
										<td> <?php show_value($vt, 'make'); ?> </td>
										<td> <?php show_value($vt, 'model'); ?> </td>
										<td> <?php show_value($vt, 'number_plate'); ?> </td>
										<td> <?php show_monetary_value($vt, 'total'); ?> </td>
										<td> <?php show_monetary_value($vt, 'ADR'); ?> </td>
										<td>
											<?php 
												$deficit = $vt['daily_rate'] - $vt['ADR'];
												echo number_format($deficit, 2) ;
											 ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-12">
				<div class="card shadow">
					<div class="card-header"><h3>Most Popular Vehicles</h3></div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th>Make</th>
								<th>Model</th>
								<th>Number Plate</th>
								<th>No. of Bookings</th>
							</thead>
							<tbody>
								<?php foreach($most_popular_vehicles as $mpv): ?>
									<tr>
										<td> <?php show_value($mpv, 'make'); ?> </td>
										<td> <?php show_value($mpv, 'model'); ?> </td>
										<td> <?php show_value($mpv, 'number_plate'); ?> </td>
										<td> <?php show_value($mpv, 'total'); ?> </td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once 'partials/footer.php'; ?>