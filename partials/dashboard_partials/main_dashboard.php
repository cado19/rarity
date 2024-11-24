<?php
    // FOR NOW THIS WILL BE THE HOME DASHBOARD. WE'LL CUSTOMIZE IT AS THE APP GROWS

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

    include_once 'partials/refresh_header.php';
    include_once 'partials/content_start.php';

    // might need to call functions also based on roles
    $vehicle_count   = vehicle_count();
    $customer_count  = customer_count();
    $active_bookings = home_active_bookings();
    $partner_count   = partner_count();
    $bookings        = home_bookings();
    $booked_vehicles = booked_vehicles_home();

    $log->info('bookings', $bookings);
?>

    <section class="content">
        <div class="container-fluid">
             <!-- Small boxes (Stat box) -->
             <div class="row">
                 <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo number_format($vehicle_count['number_of_cars']); ?></h3>

                        <p>Total Vehicles</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-android-car"></i>
                      </div>
                      <a href="index.php?page=fleet/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->

                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3><?php echo number_format($customer_count['number_of_customers']); ?></h3>

                        <p>Your customers</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="index.php?page=customers/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->

                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo number_format($active_bookings['number_of_bookings']); ?></h3>

                        <p>Your active bookings</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-android-list"></i>
                      </div>
                      <a href="index.php?page=bookings/active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->


                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                      <div class="inner">
                        <h3><?php echo number_format($partner_count['number_of_partners']); ?></h3>

                        <p>Your partners</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-ios-people"></i>
                      </div>
                      <a href="index.php?page=partners/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->


             </div>

              <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-body">
                            <p id="customer-link" class="d-none">www.raritycars.com/index.php?page=client/register/new</p>
                            <button onclick="copyToClipboard('#customer-link')" class="btn btn-primary">Copy Customer Link</button>
                         </div>
                     </div>
                 </div>
             </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                    <!-- Recent Orders Table  -->
                             <div class="recent-orders">
                                <h2>Recent Orders</h2>
                                <?php if (empty($bookings)): ?>
                                    <h4>You currently have no bookings yet</h4>
                                <?php else: ?>
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Car</th>
                                            <th>Registration</th>
                                            <th>Start</th>
                                            <th>End</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bookings as $booking): ?>
                                            <tr>
                                                <td><?php echo $booking['first_name']; ?><?php echo " "; ?><?php echo $booking['last_name']; ?> </td>
                                                <td><?php echo $booking['model']; ?><?php echo " "; ?><?php echo $booking['make']; ?> </td>
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
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php endif;?>
                                <a href="index.php?page=bookings/all">Show All</a>

                         </div>
                     </div>
                </div>
            </div>
                 <!-- End of Recent Orders  -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                    <!-- Vehicles on active bookings Table  -->
                             <div class="duty-vehicles">
                                <h2>Vehicles on active bookings</h2>
                                <?php if (empty($bookings)): ?>
                                    <h4>You currently have no booked vehicles yet</h4>
                                <?php else: ?>
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Booking Number</th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Registration</th>
                                            <th>Booking End</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($booked_vehicles as $b_vehicle): ?>
                                            <tr>
                                                <td><?php echo $b_vehicle['booking_no']; ?> </td>
                                                <td><?php echo $b_vehicle['make']; ?> </td>
                                                <td><?php echo $b_vehicle['model']; ?></td>
                                                <td> <?php echo $b_vehicle['number_plate']; ?> </td>
                                                <td>
                                                    <?php
                                                        $end = strtotime($b_vehicle['end_date']);
                                                        echo date("l jS \of F Y", $end);
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php endif;?>
                                <a href="index.php?page=bookings/active_vehicle">Show All</a>

                         </div>
                     </div>
                </div>
            </div>
                 <!-- End of Recent Orders  -->

                 
         </div>

        </div>
    </section>

    <?php include_once "partials/footer.php";?>