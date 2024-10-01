<?php
$page = "New Organisation";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=organisations/all";
$home_link_name = "All Organisations";

$new_link = "index.php?page=organisations/new";
$new_link_name = "New Partner";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Organisations";
$breadcrumb_active = "New Organisation";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

$account_id = $_SESSION['account']['id'];
$countries = countries();
$length = count($countries);
?>

<script>
    console.log(<?php echo json_encode($length); ?>);
</script>
<main>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="index.php?page=organisations/create" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="eg: Kenya Rentals LTD" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['name_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['name_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-border"  >
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="contact_name">Contact Name</label>
                                    <input type="text" name="contact_name" class="form-control form-control-border">
                                </div>

                                <div class="form-group">
                                    <label for="id_type">Country</label>
                                    <select name="country" class="form-control form-control-border">

                                            <option value="">--Please choose an option--</option>
                                            <?php forEach ($countries as $country): ?>
                                                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                            <?php endforeach;?>

                                    </select>
                                    <?php if (isset($_GET['id_type_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['id_type_err']; ?></p>
                                    <?php endif;?>
                            </div>

                                <div class="form-group">
                                    <label for="contact_name">Tel</label>
                                    <input type="tel" name="tel" placeholder="" class="form-control form-control-border">
                                </div>

                                <div class="form-group">
                                    <label for="contact_name">KRA PIN (Optional)</label>
                                    <input type="text" name="kra_pin" class="form-control form-control-border">
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Add Organisation</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>