<?php
// THIS PAGE WILL SHOW INDIVIDUAL DRIVER'S WORKPLAN

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Driver Workplan";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=drivers/all";
$home_link_name = "All Drivers";

$new_link = "index.php?page=drivers/new";
$new_link_name = "New Drivers";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Drivers";
$breadcrumb_active = "Driver";

// include navbar, functions, db_conn and sidebar
include_once 'partials/header.php';
include_once 'partials/content_start.php';

// fetch id from url and use to fetch driver record from database
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$driver = get_driver($id);
	$workplan_bookings = driver_workplan_bookings($id);
	$log->info('Foo: ', $driver);
} else {
	$msg = "Couldn't fetch user";
	header("Location: index.php?page=customers/all&err_msg=$msg");

}

?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<a href="index.php?page=drivers/show&id=<?php echo $id; ?>" class="btn btn-outline-success"><span class="fa fa-arrow-left"></span>Back</a>
				<h1> <?php echo $driver['first_name'] ?>'s Workplan </h1>
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