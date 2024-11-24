<?php
    // THIS DASHBOARD IS THE MIDDLE PART AND IS FOR THE FIRST THING DRIVERS SEE WHEN THEY LOG IN

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Dashboard";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php";
    $home_link_name = "Home";

    $new_link      = "index.php";
    $new_link_name = "Dashboard";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Home";
    $breadcrumb_active = "Dashboard";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    $account_id   = $_SESSION['account']['id'];
    $account_name = $_SESSION['account']['first_name'];

    $bookings          = driver_home_bookings($account_id);
    $workplan_bookings = driver_workplan_bookings($account_id);

?>
<script>
    console.log(<?php echo json_encode($workplan_bookings) ?>);
</script>
<section class="content">
	<div class="container-fluid">
		<div class="row">
            <div class="col">
                
			<h1>Hello <?php echo $account_name; ?></h1>
            <div class="row">
                <div class="col">
                    
        			<div id="calendar"></div>
                </div>
            </div>
            </div>
		</div>
        <div class="row">
            <div class="col">
                <h3>Your Upcoming Bookings</h3>
                <?php if(empty($bookings)): ?>
                    <p class="text-center">You have no upcoming bookings</p>
                <?php else: ?>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Booking No.</th>
                                <th>Vehicle</th>
                                <th>Start</th>
                                <th>End</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php forEach($bookings as $booking): ?>
                                <tr>
                                    <td><?php show_value($booking, 'booking_no'); ?></td>
                                    <td><?php show_value($booking, 'make'); ?> <?php show_value($booking, 'model'); ?></td>
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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
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