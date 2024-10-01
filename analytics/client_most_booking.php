<?php
// FOR NOW THIS WILL BE THE HOME DASHBOARD. WE'LL CUSTOMIZE IT AS THE APP GROWS

//page name. We set this inn the content start and also in the page title programatically
$page = "Client Analytics";

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
// most popular client
$popular_client = client_most_booking();
// most ptofitable customer
$profitable_client = most_profitable_client();

// most popular clients
$popular_clients = client_most_bookings();
$pop_clients = array();
// push income of each client into the array
// foreach ($popular_clients as $client) {
// 	array_push($popular_clients, $client['income']);
// }

// most profitable clients
$profitable_clients = most_profitable_clients();
$loaded_clients = array();
$loaded_client_names = array();
// push income of each client into the array
foreach ($profitable_clients as $client) {
	array_push($loaded_clients, $client['Income']);
	// join first and last names
	$name = $client['first_name'] . " " . $client['last_name'];
	array_push($loaded_client_names, $name);
}

?>
<!-- <script>console.log(<?php echo json_encode($profitable_clients); ?>)</script> -->
<!-- <script>console.log(<?php echo json_encode($loaded_clients); ?>)</script> -->
<script>console.log(<?php echo json_encode($loaded_client_names); ?>)</script>

    <section class="content">
        <div class="container-fluid">
             <!-- Small boxes (Stat box) -->
             <div class="row">
                 <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h5><?php echo $popular_client['first_name']; ?> <?php echo $popular_client['last_name']; ?></h5>

                        <p>Most Popular Customer</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-happy"></i>
                      </div>
                      <a href="index.php?page=fleet/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->

                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h5><?php echo $profitable_client['first_name']; ?> <?php echo $profitable_client['last_name']; ?></h5>

                        <p>Most Profitable Customer</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-cash"></i>
                      </div>
                      <a href="index.php?page=customers/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->


             </div>

             <div class="row d-flex justify-content-center">
                <div class="col-8">
                                <!-- AREA CHART -->
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Clients by Revenue</h3>

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
                             <canvas id="myChart" style="min-height: 350px; height: 350px; max-height: 350px;"></canvas>
                          </div>
                         </div>
                         <!-- /.card-body -->
                     </div>
                        <!-- /.card -->
                </div>
             </div>

        </div>
        <!-- /.container-fluid -->
    </section>

<?php include_once "partials/footer.php";?>

    <script>

    </script>

