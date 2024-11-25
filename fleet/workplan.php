<?php
// THIS PAGE OUGHT TO SHOW A SINGLE VEHICLE

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Vehicle Workplan";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=fleet/all";
$home_link_name = "All Vehicles";

$new_link = "index.php?page=fleet/new";
$new_link_name = "New Vehicle";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Vehicles";
$breadcrumb_active = "Vehicle Workplan";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$workplan_bookings = vehicle_workplan_bookings($id);
	$vehicle = get_vehicle_min_details($id);
	// $log->info('Foo: ', $vehicle);
} else {
	$msg = "Couldn't fetch fetch vehicle";
	header("Location: index.php?page=fleet/all&msg=$msg");
}

?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col">

				<h1> <?php show_value($vehicle, 'make'); ?> <?php show_value($vehicle, 'model') ?> <?php show_value($vehicle, 'number_plate'); ?> </h1>
				<br>
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</section>

<?php include 'config/dependencies.php';?>

<script>
     document.addEventListener('DOMContentLoaded', function(){
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, 
            {
                initialView: 'dayGridMonth',
                height: 650,
                events: <?php echo json_encode($workplan_bookings);?>
            }
        
        );
        calendar.render();
     });
</script>


<?php include 'partials/driver_footer.php';?>