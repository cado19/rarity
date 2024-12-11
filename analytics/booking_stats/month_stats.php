<!-- show options for month stats and year stats  -->
<?php
	// THIS WILL BE THE BOOKING ANALYTICS DASHBOARD. WE'LL USE IT AS THE LANDING PAGE FOR BOOKING ANALYTICS MODULE

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
	$breadcrumb = "Booking Analytics";
	$breadcrumb_active = $monthname . " Stats";

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

	$booking_count = total_month_booking_count($month);
	$completed_booking_count = completed_booking_count_this_month($month);
	$cancelled_booking_count = cancelled_booking_count_this_month($month);
	$active_booking_count = cancelled_booking_count_this_month($month);

	// PERCENTAGES
	$cancellation_percentage = $cancelled_booking_count['count'] / $booking_count['count'] * 100;
	$completion_percentage = $completed_booking_count['count'] / $booking_count['count'] * 100;
	$activation_percentage = $active_booking_count['count'] / $booking_count['count'] * 100;
?>

<section class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12 col-sm-4">
	            <div class="info-box bg-light shadow">
	                <div class="info-box-content">
	                  <span class="info-box-text text-center text-muted">Booking Count:</span>
	                  <h5 class="small-box-footer text-center"><?php echo $booking_count['count']; ?> </h5>
	                  <p class="small-box-footer text-center"> bookings</p>
	                </div>
	            </div>
            </div>

	        <div class="col-12 col-sm-4">
	          <div class="info-box bg-light shadow">
	            <div class="info-box-content">
	              <span class="info-box-text text-center text-muted">Completed Booking Count:</span>
	              <h5 class="small-box-footer text-center"> <?php show_numeric_value($completed_booking_count, 'count'); ?> </h5>
	                  <p class="small-box-footer text-center">bookings</p>
	            </div>
	          </div>
	        </div>

	        <div class="col-12 col-sm-4">
	          <div class="info-box bg-light shadow">
	            <div class="info-box-content">
	              <span class="info-box-text text-center text-muted">Cancelled Booking Count:</span>
	              <h5 class="small-box-footer text-center"> <?php show_numeric_value($cancelled_booking_count, 'count'); ?> </h5>
	                  <p class="small-box-footer text-center">bookings</p>
	            </div>
	          </div>
	        </div>



	        
	    </div>
		<div class="row">
			<div class="col-12 col-sm-12">
				<ul class="nav">
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/booking_stats/month_stats&month=10" target="_blank">October</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/booking_stats/month_stats&month=11" target="_blank">November</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="index.php?page=analytics/booking_stats/month_stats&month=12" target="_blank">December</a>
				  </li>

				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-12">
				<div class="card shadow">
					<div class="card-header"><h3>Some Rates That Might Help</h3></div>
					<div class="card-body">
						<div class="progress-group">
							Booking Completion Rate
							<span class="float-right">
								<b><?php echo number_format($completion_percentage, 2); ?>%</b>
								<b><?php show_numeric_value($completed_booking_count, 'count'); ?></b>
								/<?php show_numeric_value($booking_count, 'count'); ?>
							</span>
							<div class="progress progress-sm">
								<div class="progress-bar bg-primary" style="width: <?php echo $completion_percentage; ?>%"></div>
							</div>
						</div>

						<div class="progress-group">
							Booking Cancellation Rate
							<span class="float-right">
								<b><?php show_numeric_value($cancelled_booking_count, 'count'); ?></b>
								/<?php show_numeric_value($booking_count, 'count'); ?>
							</span>
							<div class="progress progress-sm">
								<div class="progress-bar bg-danger" style="width: <?php echo $cancellation_percentage; ?>%"></div>
							</div>
						</div>

						<div class="progress-group">
							Booking Activation Rate
							<span class="float-right">
								<b><?php echo number_format($activation_percentage, 2); ?>%</b>
								[<b><?php show_numeric_value($active_booking_count, 'count'); ?></b>
								/<?php show_numeric_value($booking_count, 'count'); ?>]
							</span>
							<div class="progress progress-sm">
								<div class="progress-bar bg-success" style="width: <?php echo $activation_percentage; ?>%"></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<?php include_once 'partials/footer.php'; ?>