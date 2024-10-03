<?php
// THIS FILE CONTAINS THE FORM FOR CREATING A NEW CUSTOMER

//page name. We set this inn the content start and also in the page title programatically
$page = "New Client";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=customers/all";
$home_link_name = "All Clients";

$new_link = "index.php?page=customers/new";
$new_link_name = "New Client";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Clients";
$breadcrumb_active = "New Client";

include_once 'partials/header.php';
include_once 'partials/content_start.php';
$account_id = $_SESSION['account']['id'];
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="index.php?page=customers/create" method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" placeholder="eg: Michelle" class="form-control form-control-border" required>
                                        <?php if (isset($_GET['first_name_err'])): ?>
                                            <p class="text-danger"><?php echo $_GET['first_name_err']; ?></p>
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" placeholder="eg: Ngele" class="form-control form-control-border" required>
                                        <?php if (isset($_GET['last_name_err'])): ?>
                                            <p class="text-danger"><?php echo $_GET['last_name_err']; ?></p>
                                        <?php endif;?>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control form-control-border" required>
                                <?php if (isset($_GET['email_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="id_type">Id Type</label>
                                <select name="id_type" class="form-control form-control-border">
                                        <option value="">--Please choose an option--</option>
                                        <option value="national_id"> National ID </option>
                                        <option value="passport"> Passport </option>
                                        <option value="military_id"> Military ID </option>
                                </select>
                                <?php if (isset($_GET['id_type_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['id_type_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="id">Id Number</label>
                                <input type="text" name="id_number" class="form-control form-control-border" required>
                                <?php if (isset($_GET['id_no_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['id_no_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="id">DL Number</label>
                                <input type="text" name="dl_number" class="form-control form-control-border" required>
                                <?php if (isset($_GET['dl_no_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['dl_no_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">DL Expiry</label>
                                <div class="input-group date" id="dl_expiry" data-target-input="nearest">
                                    <input type="text" name="dl_expiry" class="form-control datetimepicker-input" data-target="#dl_expiry"/>
                                    <div class="input-group-append" data-target="#dl_expiry" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <?php if (isset($_GET['dl_expiry_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['dl_expiry_err']; ?></p>
                                <?php endif;?>

                            </div>


                            <div class="form-group">
                                <label for="tel">Tel</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="tel" placeholder="Include country code" class="form-control form-control-border" required>
                                    <?php if (isset($_GET['tel_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
                                    <?php endif;?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="residential_address">Residential Address</label>
                                <input type="text" name="residential_address" class="form-control form-control-border" required>
                                <?php if (isset($_GET['residential_address_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['residential_address_err']; ?></p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="work_address">Work Address</label>
                                <input type="text" name="work_address" class="form-control form-control-border">
                                <?php if (isset($_GET['work_address_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['work_address_err']; ?></p>
                                <?php endif;?>
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
                                <button type="submit" class="btn btn-outline-dark">Add User</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>
