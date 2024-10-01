<?php
// FOR NOW THIS WILL BE THE ANALYTIC DASHBOARD. WE'LL USE IT AS THE LANDING PAGE FOR ANALYTICS MODULE

//page name. We set this inn the content start and also in the page title programatically
$page = "Analytics";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php";
$home_link_name = "Home";

$new_link = "index.php";
$new_link_name = "Dashboard";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Home";
$breadcrumb_active = "Dashboard";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

$account_id = $_SESSION['account']['id'];
// GRAPH SCRIPTS
// revenue last 3 months
$last_three_money = income_last_three_months();
$months = array();
$money = array();
foreach ($last_three_money as $cash) {
	array_push($months, $cash['Month']);
	array_push($money, $cash['Total']);
}

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

?>
<script>console.log(<?php echo json_encode($booking_count_this_month); ?>)</script>
<script>console.log(<?php echo json_encode($expected_revenue); ?>)</script>
<script>console.log(<?php echo json_encode($earned_revenue); ?>)</script>

<section class="content">
	<div class="container-fluid">
		<!-- a row with info boxes as links to booking, customer and vehicle analytics  -->
		<div class="row">
			<div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">More booking Stats</span>
                  <a href="index.php?page=fleet/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">More Client Stats</span>
                  <a href="index.php?page=fleet/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">More Vehicle Stats</span>
                  <a href="index.php?page=fleet/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
        </div>
		<!-- a row with a graph showing revenue last 3 months   -->
        <div class="row">
           <div class="col-8">
                           <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Revenue last 3 months</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                          </button>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="threeMonthChart" style="min-height: 350px; height: 350px; max-height: 350px;"></canvas>
                     </div>
                    </div>
                    <!-- /.card-body -->
                </div>
           <!-- /.card -->
            </div>
	<!-- right side -->
			<!-- a bar chart showing most booked vehicles -->
			<div class="col-4">
                           <!-- DOUGHNUT CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Top 3 Vehicles by popularity</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                          </button>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="popularCarChart" style="min-height: 250px; height: 250px; max-height: 350px;"></canvas>
                     </div>
                    </div>
                    <!-- /.card-body -->
                </div>
           <!-- /.card -->
            </div>

         </div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-4">
	        <!-- small box -->
	        <div class="small-box bg-primary">
	        	<div class="inner">
	            	<h3><?php echo number_format($booking_count_this_month['total']); ?></h3>
		            <p>Bookings this month</p>
		        </div>
		        <div class="icon">
		        	<i class="ion ion-android-car"></i>
		        </div>
		        <a href="index.php?page=fleet/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		    </div>
	    </div>
	      <!-- ./col -->
	     <div class="col-lg-4 col-4">
	       <!-- small box -->
	        <div class="small-box bg-success">
		       	<div class="inner">
		           	<h3><?php echo number_format($expected_revenue['total']); ?></h3>
		            <p>Expected Revenue this month</p>
		        </div>
			    <div class="icon">
				   	<i class="ion ion-android-car"></i>
			    </div>
			    <a href="index.php?page=fleet/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		    </div>
	     </div>
	      <!-- ./col -->

		<div class="col-lg-4 col-4">
	       <!-- small box -->
	        <div class="small-box bg-info">
		       	<div class="inner">
		           	<h3><?php echo number_format($earned_revenue['total']); ?></h3>
		            <p>Earned Revenue this month</p>
		        </div>
			    <div class="icon">
				   	<i class="ion ion-android-car"></i>
			    </div>
			    <a href="index.php?page=fleet/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		    </div>
	    </div>
	      <!-- ./col -->



	</div>
		<!-- a row with info boxes showing expected revenue, Revenue earned this month and Number of bookings this month  -->

	</div>
</section>

<?php include_once "partials/footer.php";?>