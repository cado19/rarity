<?php
// THIS PAGE OUGHT TO SHOW INDIVIDUAL ISSUES

//page name. We set this inn the content start and also in the page title programatically
$page = "Vehicle Issue";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=fleet/all";
$home_link_name = "All Vehicles";

$new_link = "index.php?page=fleet/new";
$new_link_name = "New Vehicle";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Vehicles";
$breadcrumb_active = "Vehicle Issue";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

if (isset($_GET['id'])) {
	$id = $_GET['id']; // this is the id of the issue
	$vehicle = vehicle_from_issues($id);
	// $ownership = is_partner_vehicle($id);
	$issue = get_issue($id);

	// $ownership = is_partner_vehicle($id);
	// $bookings = vehicle_bookings($id);
	// $log->info('Foo: ', $vehicle);
} else {
	$msg = "Couldn't fetch fetch issue";
	// header("Location: index.php?page=fleet/all&msg=$msg");
}

?>
<script>
	console.log(<?php echo json_encode($vehicle); ?>);
</script>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><b><?php show_value($vehicle, 'model');?> <?php show_value($vehicle, 'make');?> <?php show_value($vehicle, 'number_plate');?></b></h5> <br>
						<p><b>Issue: </b><?php show_value($issue, 'title');?></p>
						<p><b>Description: </b> <?php show_value($issue, 'description');?> </p>
						<p><b>Status: </b> <?php show_value($issue, 'status');?> </p>
						<?php if ($issue['status'] == 'unresolved'): ?>
							<form action="index.php?page=fleet/resolve_issue" method="POST" class="form-inline">
								<input type="hidden" name="issue_id" value="<?php echo $id; ?>">
								<div class="form-group mx-sm-3 mb-2">
									<label for="cost" class="sr-only">Cost</label>
									<input type="text" name="cost" class="form-control form-control-border" placeholder="Cost">
								</div>
								<button class="btn btn-outline-dark mb-2">Resolve</button>
							</form>
						<?php else: ?>
							<p><b>Cost to resolve: </b> <?php show_numeric_value($issue, 'resolution_cost');?> </p>
							<p><b>Date resolved: </b> <?php show_date_value($issue, 'resolution_date');?> </p>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once "partials/footer.php";?>