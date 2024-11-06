<?php
    // THIS FILE WILL DISPLAY AN INDIVIDUAL CUSTOMER

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Showing Client";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=customers/all";
    $home_link_name = "All Customers";

    $new_link      = "index.php?page=customers/new";
    $new_link_name = "New Customers";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Customers";
    $breadcrumb_active = "Customer";

    // include navbar, functions, db_conn and sidebar
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    // fetch id from url and use to fetch client record from database
    if (isset($_GET['id'])) {
        $id       = $_GET['id'];
        $customer = get_customer($id);
        $bookings = customer_bookings($id);
        $log->info('Foo: ', $customer);
    }

    // get customer edit url
    // Program to display complete URL
    // if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    //     $link = "https";
    // } else {
    //     $link = "http";
    // }

    // // Here append the common URL characters
    // $link .= "://";

    // // Append the host(domain name,
    // // ip) to the URL.
    // $link .= $_SERVER['HTTP_HOST'];

    // // Append the requested resource
    // // location to the URL
    // $link .= $_SERVER['PHP_SELF'];

    // $link .= "?page=client/register/edit&id=${id}";

    $customer_edit_link        = customer_edit_link($id);
    $customer_profile_pic_link = customer_profile_pic_link($id);
    $customer_id_link          = customer_id_link($id);

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                        <?php if (isset($customer['profile_image'])): ?>
                            <img class="profile-user-img img-fluid img-circle"
                               src="customers/profile/<?php echo $customer['profile_image']; ?>"
                               alt="User profile picture">
                        <?php else: ?>
                            <img class="profile-user-img img-fluid img-circle"
                               src="images/male-laughter-avatar.jpg"
                               alt="User profile picture">
                        <?php endif;?>

                    </div>

                    <h3 class="profile-username text-center"><?php show_value($customer, 'first_name');?><?php echo " "; ?><?php show_value($customer, 'last_name');?></h3>

                    <p class="text-muted text-center">customer</p>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Driving License No</b> <a class="float-right"><?php show_value($customer, 'dl_no');?></a>
                      </li>
                      <li class="list-group-item">
                        <b>National ID</b> <a class="float-right"><?php show_value($customer, 'id_no');?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Tel</b> <a class="float-right"><?php show_value($customer, 'phone_no');?></a>
                      </li>
                    </ul>

                    <!-- Edit Profile  -->
                    <p id="customer-link" class="d-none"><?php echo $customer_edit_link; ?></p>
                    <button onclick="copyToClipboard('#customer-link')" class="btn btn-sm btn-success btn-block">Copy Profile Link</button>
                    <a href="index.php?page=customers/edit&id=<?php echo $id; ?>" class="btn btn-sm btn-primary btn-block"><b>Edit Profile</b></a>

                    <!-- Edit Profile Picture -->
                    <p id="profile-pic-link" class="d-none"><?php echo $customer_profile_pic_link; ?></p>
                    <button onclick="copyToClipboard('#profile-pic-link')" class="btn btn-sm btn-success btn-block mt-2">Copy Profile Picture Link</button>
                    <a href="index.php?page=customers/profile_form&id=<?php echo $id; ?>" class="btn btn-sm btn-primary btn-block"><b>Edit Profile Picture</b></a>

                    <a href="index.php?page=customers/delete&id=<?php echo $id; ?>" class="btn btn-sm btn-danger btn-block">Delete Client</a>
                    <a href="index.php?page=customers/blacklist_form&id=<?php echo $id; ?>" class="btn btn-sm btn-warning btn-block">Blacklist Client</a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-9">
                <div class="row">
                    <!-- show id images through a carousel -->
                    <div class="col-6">
                        <div class="card mb-3">
                          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                              <!-- <li data-target="#carouselExampleCaptions" data-slide-to="2"></li> -->
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <?php if (isset($customer['id_image'])): ?>
                                    <img src="customers/id/<?php echo $customer['id_image']; ?>" class="card-img-top display-img d-block" alt="Client Front ID Image">
                                <?php else: ?>
                                    <img src="images/male-laughter-avatar.jpg" class="card-img-top" alt="Client ID Image">
                                <?php endif;?>
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Front ID Image</h5>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <?php if (isset($customer['id_back_image'])): ?>
                                    <img src="customers/id/<?php echo $customer['id_back_image']; ?>" class="card-img-top display-img d-block" alt="Client Back ID Image">
                                <?php else: ?>
                                    <img src="images/male-laughter-avatar.jpg" class="card-img-top" alt="Client ID Image">
                                <?php endif;?>
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Back ID Image</h5>
                                </div>
                              </div>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>

                          <div class="card-body">
                            <h5 class="card-title">Identification</h5>
                            <p class="card-text">This is the customer's identification card.</p>
                            <a href="index.php?page=customers/id_form&id=<?php echo $id; ?>" class="btn btn-primary">Upload ID Card</a>
                            <p id="id-pic-link" class="d-none"><?php echo $customer_id_link; ?></p>
                            <button onclick="copyToClipboard('#id-pic-link')" class="btn btn-success">Copy ID Upload Link</button>
                          </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="card mb-3">
                            <?php if (isset($customer['license_image'])): ?>
                                <img src="customers/license/<?php echo $customer['license_image']; ?>" class="card-img-top display-img" alt="Client License Image">
                            <?php else: ?>
                                <img src="images/male-laughter-avatar.jpg" class="card-img-top" alt="Client License Image">
                            <?php endif;?>

                            <div class="card-body">
                                <h5 class="card-title">License</h5>
                                <p class="card-text">This is the customer's license.</p>
                                <a href="index.php?page=customers/license_form&id=<?php echo $id; ?>" class="btn btn-primary">Upload customer's License</a>
                                <p id="license-pic-link" class="d-none"><?php echo $customer_id_link; ?></p>
                                <button onclick="copyToClipboard('#license-pic-link')" class="btn btn-success">Copy License Upload Link</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $customer['first_name']; ?>'s Bookings</h3>
                    <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (empty($bookings)): ?>
                        <p><?php echo $customer['first_name']; ?> has no bookings</p>
                    <?php else: ?>
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Vehicle</th>
                                    <th>Plate</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bookings as $booking): ?>
                                    <tr>
                                        <td><?php show_value($booking, 'first_name');?><?php show_value($booking, 'last_name');?> </td>
                                        <td> <?php show_value($booking, 'make');?><?php echo " "; ?><?php show_value($booking, 'model');?> </td>
                                        <td>  <?php show_value($booking, 'number_plate');?> </td>
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
                                        <td> <a href="index.php?page=bookings/show&id=<?php echo $booking['id']; ?>">Details</a> </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "partials/footer.php";?>
