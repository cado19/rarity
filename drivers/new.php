<?php
$page = "New Driver";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=drivers/all";
$home_link_name = "All Drivers";

$new_link = "index.php?page=drivers/new";
$new_link_name = "New Driver";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Drivers";
$breadcrumb_active = "New Driver";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

$account_id = $_SESSION['account']['id'];
?>

<main>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="index.php?page=drivers/create" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" placeholder="eg: Michelle" class="form-control form-control-border"  required>
                                            <?php if (isset($_GET['first_name_err'])): ?>
                                                <p class="text-danger"><?php echo $_GET['first_name_err']; ?></p>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" placeholder="eg: Ngele" class="form-control form-control-border"  required>
                                            <?php if (isset($_GET['last_name_err'])): ?>
                                                <p class="text-danger"><?php echo $_GET['last_name_err']; ?></p>
                                            <?php endif;?>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="id">Id Number</label>
                                    <input type="text" name="id_number" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['id_no_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['id_no_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="dl">Driver's License Number</label>
                                    <input type="text" name="dl_number" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['dl_number_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['dl_number_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="tel">Tel</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+254</span>
                                        </div>
                                        <input type="text" name="tel" class="form-control form-control-border" placeholder="without '0'" required>
                                        <?php if (isset($_GET['tel_err'])): ?>
                                            <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="date_of_birth" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <?php if (isset($_GET['date_of_birth_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['date_of_birth_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Add Driver</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>