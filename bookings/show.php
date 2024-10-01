<?php
// THIS PAGE WILL SHOW INDIVIDUAL BOOKING'S DETAILS

//page name. We set this inn the content start and also in the page title programatically
$page = "Booking Details";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=bookings/all";
$home_link_name = "All Bookings";

$new_link = "index.php?page=bookings/new";
$new_link_name = "New Bookings";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Bookings";
$breadcrumb_active = "Booking";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

// GET BOOKING ID FROM URL
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$booking = booking($id);
	// $log->info('Foo: ', $booking);
}

$start_date = strtotime($booking['start_date']);
$end_date = strtotime($booking['end_date']);
$duration = ($end_date - $start_date) / 86400;
$total = $booking['daily_rate'] * $duration;
// $log->warning($total);

$account_id = $_SESSION['account']['id'];

$current_date = date('Y-m-d');
?>
<script>console.log(<?php echo json_encode($booking); ?>)</script>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card shaadow">
                <div class="card-header">
                    <h2 class="card-title">Booking for: </h2> <h3 class="card-title"> <?php echo $booking['first_name']; ?> <?php echo $booking['last_name']; ?> </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Start Date</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo date("l jS \of F Y", $start_date); ?></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">End Date</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo date("l jS \of F Y", $end_date); ?></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Duration</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo $duration; ?> days</span>
                                    </div>
                                  </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h4>Summary</h4>
                                    <div class="post">
                                      <div class="user-block">
                                        <span class="username">
                                          <a href="#"><?php echo $booking['model']; ?> <?php echo $booking['make']; ?></a>
                                        </span>
                                        <span class="description"><?php echo $booking['number_plate'] ?></span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        The <?php echo $booking['model']; ?> <?php echo $booking['make']; ?> is a <?php echo $booking['drive_train']; ?> <?php echo $booking['category']; ?> loved by many. It can carry <?php echo $booking['seats']; ?>
                                        people. The hire rate is <?php echo number_format($booking['daily_rate']); ?>.
                                      </p>

                                      <?php if ($booking['status'] == "upcoming"): ?>
                                        <div class="col-md-8">
                                          <h5><u>Assign Vehicle</u></h5>
                                          <p>
                                            <form action="index.php?page=bookings/assign" method="POST">
                                              <input type="hidden" name="id" value="<?php echo $id; ?>">
                                              <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
                                              <div class="form-group">
                                                <input type="text" name="fuel" placeholder="Fuel level" class="form-control form-control-border">
                                              </div>
                                              <button type="submit" class="btn btn-outline-dark text-sm"><i class="fa fa-link mr-1"></i> Assign </button>
                                            </form>
                                          </p>
                                        </div>
                                      <?php else: ?>
                                        <div class="row">
                                          <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                              <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Booking State:</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $booking['status']; ?></span>
                                              </div>
                                            </div>
                                          </div>
                                          <?php if ($current_date >= $booking['end_date']): ?>

                                          <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                              <div class="info-box-content">
                                                <form action="index.php?page=bookings/complete" method="POST">
                                                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                  <button type="submit" class="btn btn-outline-dark">Complete booking</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>

                                          <?php endif;?>
                                        </div>
                                      <?php endif;?>
                                    </div>

                                    <div class="row">
                                      <!-- A box with a form to extend booking in one column -->
                                      <div class="col-12 col-sm-4">
                                        <?php if ($booking['status'] == "active"): ?>
                                          <div class="info-box bg-light">
                                            <div class="info-box-content">


                                              <form action="index.php?page=bookings/extend" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input type="hidden" name="start_date" value="<?php echo $booking['start_date']; ?>" >
                                                <input type="hidden" name="rate" value="<?php echo $booking['daily_rate']; ?>" >

                                                <div class="form-group">
                                                    <label for="date_of_birth">New End Date</label>
                                                    <div class="input-group date" id="extenddate" data-target-input="nearest">
                                                        <input type="text" name="extend_date" class="form-control datetimepicker-input" data-target="#extenddate"/>
                                                        <div class="input-group-append" data-target="#extenddate" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    <?php if (isset($_GET['extend_date_err'])): ?>
                                                        <p class="text-danger"> <?php echo $_GET['extend_date_err']; ?> </p>
                                                    <?php endif;?>
                                                </div>
                                                <button type="submit" class="btn btn-outline-dark text-sm"> Extend Booking </button>
                                              </form>
                                            </div>
                                          </div>
                                        <?php endif;?>
                                      </div>

                                      <!-- A box with a form to stop booking early in one column -->
                                      <div class="col-12 col-sm-4">
                                        <?php if ($booking['status'] != "cancelled"): ?>
                                          <div class="info-box bg-light">
                                            <div class="info-box-content">
                                              <form action="index.php?page=bookings/cancel" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <button type="submit" class="btn btn-outline-danger text-sm"> Cancel Booking </button>
                                              </form>
                                            </div>
                                          </div>
                                        <?php endif;?>
                                      </div>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                          <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Contract Details</h3>
                          <p class="text-muted">This is the contract between The renter and <?php echo $booking['first_name']; ?> <?php echo $booking['last_name']; ?>. The current state of the contract is <?php echo $booking['signature_status']; ?>.</p>
                          <br>
                          <div class="text-muted">
                            <p class="text-sm">Company Name
                              <b class="d-block">Kizusi Rentals</b>
                            </p>
                            <p class="text-sm">Client
                              <b class="d-block"><?php echo $booking['first_name']; ?> <?php echo $booking['last_name']; ?></b>
                            </p>
                          </div>

                          <div class="text-center mt-5 mb-3">
                            <?php if ($booking['signature_status'] == "unsigned"): ?>
                              <a href="index.php?page=contracts/edit&id=<?php echo $id; ?>" class="btn btn-sm btn-primary">Sign Contract</a>
                            <?php endif;?>
                            <a href="index.php?page=contracts/updated_contract&id=<?php echo $id; ?>" class="btn btn-sm btn-warning" target="_blank">Show contract</a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "partials/footer.php";?>