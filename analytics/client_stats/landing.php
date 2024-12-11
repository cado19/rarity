<!-- show options for month stats and year stats  -->
<?php
// THIS WILL BE THE BOOKING ANALYTICS DASHBOARD. WE'LL USE IT AS THE LANDING PAGE FOR BOOKING ANALYTICS MODULE

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "General Client Stats";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php";
$home_link_name = "Home";

$new_link = "index.php";
$new_link_name = "Dashboard";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Client Analytics";
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

$most_popular_client = client_most_booking();
$most_profitable_client = most_profitable_client();

//TABLE SCRIPTS
$most_popular_clients = client_most_bookings();
$most_profitable_clients = most_profitable_clients();


// PERCENTAGES
// $cancellation_percentage = $cancelled_booking_count['count'] / $booking_count['count'] * 100;
// $completion_percentage = $completed_booking_count['count'] / $booking_count['count'] * 100;
// $activation_percentage = $active_booking_count['count'] / $booking_count['count'] * 100;
?>

<script>	
	console.log(<?php echo json_encode($booking_count) ?>);
</script>

<section class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12 col-sm-4">
	            <div class="info-box bg-light shadow">
	                <div class="info-box-content">
	                  <span class="info-box-text text-center text-muted">Client with the most bookings</span>
	                  <h5 class="small-box-footer text-center"><?php show_value($most_popular_client, 'first_name'); ?> <?php show_value($most_popular_client, 'last_name'); ?> </h5>
	                  <p class="small-box-footer text-center"><?php show_value($most_popular_client, 'Bookings'); ?> bookings</p>
	                </div>
	            </div>
            </div>

	        <div class="col-12 col-sm-4">
	          <div class="info-box bg-light shadow">
	            <div class="info-box-content">
	              <span class="info-box-text text-center text-muted">Client whose bookings have generated most income:</span>
	              <h5 class="small-box-footer text-center"> <?php show_value($most_profitable_client, 'first_name'); ?> <?php show_value($most_profitable_client, 'last_name'); ?> </h5>
	                  <p class="small-box-footer text-center"><?php show_monetary_value($most_profitable_client, 'Total'); ?>/-</p>
	            </div>
	          </div>
	        </div>

	    </div>
		<div class="row">
			<div class="col-12 col-sm-12">
				<ul class="nav">
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/client_stats/month_stats&month=10" target="_blank">October</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/client_stats/month_stats&month=11" target="_blank">November</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/client_stats/month_stats&month=12" target="_blank">December</a>
				  </li>

				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-12">
				<div class="card shadow">
					<div class="card-header"><h3>10 Clients who have the most bookings</h3></div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th>Name</th>
								<th>Bookings</th>

							</thead>
							<tbody>
								<?php foreach($most_popular_clients as $client): ?>
									<tr>
										<td> <?php show_value($client, 'first_name'); ?> <?php show_value($client, 'last_name'); ?> </td>
										<td> <?php show_numeric_value($client, 'Bookings'); ?> </td>
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
					<div class="card-header"><h3>10 Clients who have generated most revenue</h3></div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th>Name</th>
								<th>Income</th>

							</thead>
							<tbody>
								<?php foreach($most_profitable_clients as $client): ?>
									<tr>
										<td> <?php show_value($client, 'first_name'); ?> <?php show_value($client, 'last_name'); ?> </td>
										<td> <?php show_monetary_value($client, 'Income'); ?> </td>
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