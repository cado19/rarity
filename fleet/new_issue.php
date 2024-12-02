<?php
    // THIS PAGE OUGHT TO DISPLAY A FORM TO COLLECT A VEHICLE'S ISSUE
    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    // head to home screen if user is not admin.
    include_once 'config/user_auth_script.php';

    $page = "New Issue";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=fleet/all";
    $home_link_name = "All Vehicles";

    $new_link      = "index.php?page=fleet/new";
    $new_link_name = "New Vehicle";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Vehicles";
    $breadcrumb_active = "New Issue";

    if (isset($_GET['vehicle_id'])) {
        $vehicle_id = $_GET['vehicle_id'];
    }

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

						<form action="index.php?page=fleet/create_issue" method="post" autocomplete="off">
							<input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id; ?>">
							<div class="form-group">
								<label for="title">Issue</label>
								<input type="text" name="title" class="form-control form-control-border">
								<?php if (isset($_GET['title_err'])): ?>
									<p class="text-danger"><?php echo $_GET['title_err']; ?></p>
								<?php endif;?>
							</div>
							<div class="form-group">
			                    <label>Describe the issue</label>
		                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"></textarea>
			                </div>
			                
			                <div class="form-group">
			                    <label>Cost to resolve the issue</label>
		                        <input type="text" name="cost" class="form-control form-control-border">
								<?php if (isset($_GET['cost_err'])): ?>
									<p class="text-danger"><?php echo $_GET['cost_err']; ?></p>
								<?php endif;?>
			                </div>

                            <div class="form-group">
                                <label for="date_of_birth">Issue Date</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="issue_date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <?php if (isset($_GET['issue_date_err'])): ?>
                                    <p class="text-danger"> <?php echo $_GET['issue_date_err']; ?> </p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Add Issue</button>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once "partials/footer.php";?>