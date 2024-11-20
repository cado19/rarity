<?php
    // THIS DASHBOARD IS THE MIDDLE PART AND IS FOR THE FIRST THING DRIVERS SEE WHEN THEY LOG IN

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Dashboard";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php";
    $home_link_name = "Home";

    $new_link      = "index.php";
    $new_link_name = "Dashboard";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Home";
    $breadcrumb_active = "Dashboard";

    include_once 'partials/refresh_header.php';
    include_once 'partials/content_start.php';

    $account_id = $_SESSION['account']['id'];

    $bookings = home_bookings();

?>

<section class="content">
	<div class="container-fluid">

	</div>
</section>
