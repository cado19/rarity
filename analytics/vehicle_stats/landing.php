<!-- show options for month stats and year stats  -->
<?php
// FOR NOW THIS WILL BE THE ANALYTIC DASHBOARD. WE'LL USE IT AS THE LANDING PAGE FOR ANALYTICS MODULE

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "General Vehicle Stats";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php";
$home_link_name = "Home";

$new_link = "index.php";
$new_link_name = "Dashboard";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Vehicle Analytics";
$breadcrumb_active = "Dashboard";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

$account_id = $_SESSION['account']['id'];

// GRAPH SCRIPTS
// revenue last 3 months


// most popular vehicles
$popular_vehicles = most_popular_vehicles();
$vehicles = array();
$popularity = array();
foreach ($popular_vehicles as $car) {
	$car_name = $car['model'] . " " . $car['make'];
	array_push($vehicles, $car_name);
	array_push($popularity, $car['total']);
}
// END GRAPH SCRIPTS

// INFO BOX SCRIPTS
$earned_revenue = earned_revenue();
$expected_revenue = expected_revenue();
$booking_count_this_month = booking_count_this_month();

$most_popular_vehicle = most_popular_vehicle();
$most_profitable_vehicle = most_profitable_vehicle(); 

// get adr, totals for the year
$vehicle_totals = all_vehicles_totals();


?>

<script>	
	console.log(<?php echo json_encode($popular_vehicles) ?>);
</script>

<section class="content">
	<div class="container-fluid">

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
								<th>Total Income (This Year)</th>
								<th>Average Daily Rate (This Year)</th>
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
								<?php foreach($popular_vehicles as $mpv): ?>
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