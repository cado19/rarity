<?php
$page = "New Partner";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=partners/all";
$home_link_name = "All Partners";

$new_link = "index.php?page=partners/new";
$new_link_name = "New Partner";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Partners";
$breadcrumb_active = "New Partner";

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


                            <form action="index.php?page=partners/create" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="eg: Kenya Rentals LTD" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['name_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['name_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
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
                                    <button type="submit" class="btn btn-outline-dark">Add Partner</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>