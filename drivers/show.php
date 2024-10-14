<?php
// THIS PAGE WILL SHOW INDIVIDUAL DRIVER'S DETAILS

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Drivers";

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
	$log->info('Foo: ', $driver);
} else {
	$msg = "Couldn't fetch user";
	header("Location: index.php?page=customers/all&err_msg=$msg");

}

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                         <?php if (isset($driver['profile_image'])): ?>
                            <img class="profile-user-img img-fluid img-circle"
                               src="drivers/profile/<?php echo $driver['profile_image']; ?>"
                               alt="User profile picture">
                        <?php else: ?>
                            <img class="profile-user-img img-fluid img-circle"
                               src="images/male-laughter-avatar.jpg"
                               alt="User profile picture">
                        <?php endif;?>
                    </div>

                    <h3 class="profile-username text-center"><?php echo $driver['first_name']; ?> <?php echo $driver['last_name']; ?></h3>

                    <p class="text-muted text-center">Driver</p>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Driving License No</b> <a class="float-right"><?php echo $driver['dl_no'] ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>National ID</b> <a class="float-right"><?php echo $driver['id_no']; ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Tel</b> <a class="float-right">254<?php echo ($driver['phone_no']); ?></a>
                      </li>
                    </ul>

                    <a href="index.php?page=drivers/profile_form&id=<?php echo $id; ?>" class="btn btn-primary btn-block"><b>Edit Profile Picture</b></a>
                    <a href="index.php?page=drivers/edit&id=<?php echo $id; ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                    <a href="index.php?page=drivers/delete&id=<?php echo $id; ?>" class="btn btn-danger btn-block">Delete Vehicle</a>

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
                            <?php if (isset($driver['id_image'])): ?>
                                <img class="card-img-top display-img"
                                   src="drivers/id/<?php echo $driver['id_image']; ?>"
                                   alt="Driver ID picture">
                            <?php else: ?>
                                <img class="card-img-top display-img"
                                   src="images/male-laughter-avatar.jpg"
                                   alt="User profile picture">
                            <?php endif;?>

                          <div class="card-body">
                            <h5 class="card-title">Identification</h5>
                            <p class="card-text">This is the driver's identification card.</p>
                            <a href="index.php?page=drivers/id_form&id=<?php echo $id; ?>" class="btn btn-primary">Upload ID Card</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card mb-3">
                            <?php if (isset($driver['license_image'])): ?>
                                <img class="card-img-top display-img"
                                   src="drivers/license/<?php echo $driver['license_image']; ?>"
                                   alt="User profile picture">
                            <?php else: ?>
                                <img class="card-img-top display-img"
                                   src="images/male-laughter-avatar.jpg"
                                   alt="Driver License picture">
                            <?php endif;?>
                          <div class="card-body">
                            <h5 class="card-title">Driver's License</h5>
                            <p class="card-text">This is the driver's license.</p>
                            <a href="index.php?page=drivers/license_form&id=<?php echo $id; ?>" class="btn btn-primary">Upload Driver's License</a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>

