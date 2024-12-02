<?php
    // THIS PAGE OUGHT TO SHOW ALL ISSUES

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    // head to home screen if user is not admin.
    include_once 'config/user_auth_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Vehicle Issues";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=fleet/all";
    $home_link_name = "All Vehicles";

    $new_link      = "index.php?page=fleet/new";
    $new_link_name = "New Vehicle";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Vehicles";
    $breadcrumb_active = "Vehicle Issues";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    $issues       = get_issues();

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <table class="table" id="example1">
                    <thead>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Issue</th>
                        <th>Cost</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php foreach($issues as $issue): ?>
                            <tr>
                                <td> <?php show_value($issue, 'make') ?> </td>
                                <td> <?php show_value($issue, 'model') ?> </td>
                                <td> <?php show_value($issue, 'title') ?> </td>
                                <td> <?php show_value($issue, 'cost') ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>