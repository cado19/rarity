<?php
// THIS FILE WILL DISPLAY A FORM FOR BLACKLISTING A CUSTOMER

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Customers";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=customers/all";
$home_link_name = "All Customers";

$new_link = "index.php?page=customers/new";
$new_link_name = "New Customers";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Customers";
$breadcrumb_active = "Blacklist Customer";

// include navbar, functions, db_conn and sidebar
include_once 'partials/header.php';
include_once 'partials/content_start.php';

// fetch id from url and use to fetch client record from database
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$customer = get_customer($id);
	$log->info('Foo: ', $customer);
} else {
	$msg = "No such customer";
	header("Location: index.php?page=customers/all");
}

?>

<section class="content">
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8 col-sm-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Blacklist <?php echo $id; ?> <?php echo $customer['last_name']; ?></h5>
						<form action="index.php?page=customers/blacklist" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
							<div class="form-group">
								<textarea name="reason" id="" class="form-control" rows="5" placeholder="Reason..."></textarea>
							</div>
							<button type="submit" class="btn btn-outline-dark">Submit</button>
							<a href="index.php?page=customers/show&id=<?php echo $id; ?>" class="btn btn-danger">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>