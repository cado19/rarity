<?php
$page = "New Driver";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=drivers/all";
$home_link_name = "All Drivers";

$new_link = "index.php?page=drivers/new";
$new_link_name = "Edit Driver";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Drivers";
$breadcrumb_active = "Edit Driver";

include_once 'partials/header.php';
include_once 'partials/content_start.php';
$account_id = $_SESSION['account']['id'];

// fetch id from url and use to fetch driver record from database
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$driver = get_driver($id);
	$log->info('Foo: ', $driver);
} else {
	$msg = "Couldn't fetch user";
	header("Location: index.php?page=customers/all&err_msg=$msg");
	exit;
}
?>

<main>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="index.php?page=drivers/update" method="post" autocomplete="off">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" value="<?php echo $driver['first_name']; ?>" class="form-control form-control-border"  required>
                                            <?php if (isset($_GET['first_name_err'])): ?>
                                                <p class="text-danger"><?php echo $_GET['first_name_err']; ?></p>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" value="<?php echo $driver['last_name']; ?>" class="form-control form-control-border"  required>
                                            <?php if (isset($_GET['last_name_err'])): ?>
                                                <p class="text-danger"><?php echo $_GET['last_name_err']; ?></p>
                                            <?php endif;?>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-border" value="<?php echo $driver['email']; ?>" required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="id">Id Number</label>
                                    <input type="text" name="id_number" class="form-control form-control-border" value="<?php echo $driver['id_no']; ?>" required>
                                    <?php if (isset($_GET['id_no_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['id_no_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="dl">Driver's License Number</label>
                                    <input type="text" name="dl_number" class="form-control form-control-border" value="<?php echo $driver['dl_no']; ?>" required>
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
                                        <input type="text" name="tel" class="form-control form-control-border" value="<?php echo $driver['phone_no']; ?>" required>
                                        <?php if (isset($_GET['tel_err'])): ?>
                                            <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="date_of_birth" class="form-control form-control-border datetimepicker-input" data-target="#reservationdate" value="<?php echo $driver['date_of_birth']; ?>"/>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <?php if (isset($_GET['date_of_birth_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['date_of_birth_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Update Driver</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "partials/footer.php";?>