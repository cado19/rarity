<?php
// THIS PAGE DISPLAYS ALLOWS A SELF REGISTERED CUSTOMER TO UPLOAD LICENSE IMAGE
session_start();
if (!(isset($_SESSION['client']))) {
	header("Location: index.php?page=client/auth/login");
	exit;
}

$page = "Upload Profile Picture";

include_once 'partials/client-header.php';
include_once 'partials/client-nav.php';

$vehicles = catalog_vehicles();
$client = $_SESSION['client'];
$id = $client['id'];
?>


	<div class="container">
		<div class="row mt-3">
			<div class="col-10">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Upload License Image</h3>
					</div>
					<div class="card-body">
						<form action="index.php?page=client/profile/license_upload" method="post" enctype="multipart/form-data">
						    <div class="form-group">
							    <label for="id_profile">Select Image Files to Upload:</label>
							    <input type="hidden" name="id" value="<?php echo $id; ?>">
							    <input type="file" class="form-control-file" name="license_image">
						    </div>
						    <input type="submit" name="submit" class="btn btn-outline-dark" value="UPLOAD">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
