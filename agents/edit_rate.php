<?php
    // THIS PAGE WILL BE FOR EDITING VEHICLE CATEGORY CUSTOM RATES FOR AGENTS

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    // head to home screen if user is not admin.
    include_once 'config/user_auth_script.php';

    $page = "Set Agent Rate";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=agents/all";
    $home_link_name = "All Agents";

    $new_link      = "index.php?page=agents/new";
    $new_link_name = "New Agent";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Agents";
    $breadcrumb_active = "Set Agent Rate";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    $categories = categories();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form action="index.php?page=agents/update_rate" method="POST">
							<input type="hidden" name="agent_id" value="<?php echo $id; ?>">
	                        <div class="form-group">
	                            <label for="category">Category</label>
	                            <select name="category" class="form-control form-control-border">
	                                    <option value="">--Please choose an option--</option>
	                                    <?php foreach ($categories as $category): ?>
	                                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
	                                    <?php endforeach;?>
	                            </select>

	                        </div>
	                        <div class="form-group">
	                        	<label for="rate">Rate</label>
	                        	<input type="text" name="rate" id="" class="form-control form-control-border">
	                            <?php if (isset($_GET['rate_err'])): ?>
	                                <p class="text-danger"><?php echo $_GET['rate_err']; ?></p>
	                            <?php endif;?>
	                        </div>
	                        <div class="form-group">
	                        	<button type="submit" class="btn btn-outline-dark">Update Rate</button>
	                        </div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>