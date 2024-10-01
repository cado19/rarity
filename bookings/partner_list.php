<?php

//page name. We set this inn the content start and also in the page title programatically
$page = "Select Partner";

// Navbar Links. We set these link in the navbar programatically.
// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=bookings/all";
$home_link_name = "All Bookings";

$new_link = "index.php?page=bookings/new";
$new_link_name = "New Bookings";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Bookings";
$breadcrumb_active = "All Bookings";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

// fetch account_id from the account session set in login
$account_id = $_SESSION['account']['id'];

// fetch all the partners
$partners = all_partners();
?>

<!-- Main Content  -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php forEach ($partners as $partner): ?>
                                    <tr>
                                        <td><?php echo $partner['name'] ?> </td>
                                        <td> <a href="index.php?page=bookings/new_pb&id=<?php echo $partner['id']; ?>">Select</a> </td>
                                        <td> <a href="index.php?page=bookings/partner_bookings&id=<?php echo $partner['id']; ?>">View bookings</a> </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>