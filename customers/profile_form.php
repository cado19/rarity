<?php
    // THIS PAGE DISPLAYS DISPLAYS A FORM TO UPLOAD PROFILE IMAGE
    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Upload Customer Profile";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=customers/all";
    $home_link_name = "All Customers";

    $new_link      = "index.php?page=customers/new";
    $new_link_name = "New Customer";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Customers";
    $breadcrumb_active = "Upload Profile";

    // GET DRIVER ID FROM URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';
?>


	<div class="container">
		<div class="row mt-3">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Upload Profile Image</h3>
				</div>
				<div class="card-body">
					<form action="index.php?page=customers/profile_upload" method="post" enctype="multipart/form-data">
					    <div class="form-group">
						    <label for="id_profile">Select Image Files to Upload:</label>
						    <input type="hidden" name="id" value="<?php echo $id ?>">
						    <input type="file" class="form-control-file" name="profile_image">
					    </div>
					    <input type="submit" name="submit" class="btn btn-outline-dark" value="UPLOAD">
					</form>
				</div>
			</div>
		</div>
	</div>
