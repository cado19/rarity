<?php
// THIS PAGE OUGHT TO SHOW ALL ISSUES

//page name. We set this inn the content start and also in the page title programatically
$page = "Vehicle Issues";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=fleet/all";
$home_link_name = "All Vehicles";

$new_link = "index.php?page=fleet/new";
$new_link_name = "New Vehicle";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Vehicles";
$breadcrumb_active = "Vehicle Issues";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$no_of_issues = issues_count($id);
	$vehicle = get_vehicle($id);
	$ownership = is_partner_vehicle($id);
	$issues = all_issues($id);

	// $ownership = is_partner_vehicle($id);
	// $bookings = vehicle_bookings($id);
	// $log->info('Foo: ', $vehicle);
} else {
	$msg = "Couldn't fetch fetch vehicle";
	// header("Location: index.php?page=fleet/all&msg=$msg");
}

?>
<script>
	console.log(<?php echo json_encode($ownership); ?>);
</script>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
				<div class="row d-flex justify-content-center">

                    <div class="col-12 col-sm-4">
                      <div class="info-box bg-light">
                        <div class="info-box-content">
                          <span class="info-box-text text-center text-muted"><?php show_value($vehicle, 'model');?> <?php show_value($vehicle, 'make');?></span>
                          <span class="info-box-number text-center text-muted mb-0"><?php show_value($vehicle, 'number_plate');?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-4">
                      <div class="info-box bg-light">
                        <div class="info-box-content">
                          <span class="info-box-text text-center text-muted"><?php show_value($vehicle, 'model');?> <?php show_value($vehicle, 'make');?></span>
                          <span class="info-box-number text-center text-muted mb-0"><a href="index.php?page=fleet/new_issue&vehicle_id=<?php echo $id; ?>">Add issue <span class="fa fa-arrow-right"></span></a></span>
                        </div>
                      </div>
                    </div>

				</div>
			</div>
		</div>
		<div class="row">
			<?php if ($ownership['name'] != "Our vehicle"): ?>
				<h5>Can't handle partner vehicle issues</h5>
			<?php else: ?>
				<?php if ($no_of_issues['issue_count'] == 0): ?>
					<h5>This vehicle has no issues. <a href="index.php?page=fleet/new_issue&id=<?php echo $id; ?>"></a></h5>
				<?php else: ?>

					<table id="example1" class="table">
						<thead>
							<tr>
								<th>Issue</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php forEach ($issues as $issue): ?>
								<tr>
									<td><?php show_value($issue, 'title')?></td>
									<td><?php show_value($issue, 'status')?></td>
									<td><a href="index.php?page=fleet/issue&id=<?php echo $issue['id'] ?>">Details</a></td>
								</tr>
							<?php endforeach;?>
						</tbody>
					</table>

				<?php endif;?>
			<?php endif;?>
		</div>
	</div>
</section>
<?php include_once "partials/footer.php";?>