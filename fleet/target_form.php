<?php
    // THIS PAGE DISPLAYS A FORM TO SET A VEHICLE'S MONTHLY TARGET

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    // head to home screen if user is not admin.
    include_once 'config/user_auth_script.php';

    $page = "Vehicle Monthly Target";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=fleet/all";
    $home_link_name = "All Vehicles";

    $new_link      = "index.php?page=fleet/new";
    $new_link_name = "New Vehicle";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Vehicles";
    $breadcrumb_active = "Set Vehicle Monthly Target";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    if (isset($_GET['id'])) {
        $id      = $_GET['id'];
        $vehicle = get_vehicle($id);
        $log->info('Foo: ', $vehicle);
    } else {
        $msg = "Couldn't fetch fetch vehicle";
        header("Location: index.php?page=fleet/all&msg=$msg");
    }

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Set Target for <?php show_value($vehicle, 'make'); ?> <?php show_value($vehicle, 'model'); ?> <?php show_value($vehicle, 'number_plate'); ?> </h5>
                    </div>
                    <div class="card-body">
                        <form action="index.php?page=fleet/target_process" method="POST">
                            <input type="hidden" name="vehicle_id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="">Monthly Target</label>
                                <input type="text" name="target" id="" class="form-control form-control-border">
                                <?php if (isset($_GET['target_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['target_err']; ?></p>
                                <?php endif;?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>