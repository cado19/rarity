<?php

//page name. We set this inn the content start and also in the page title programatically
$page = "Drivers";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=drivers/all";
$home_link_name = "All Drivers";

$new_link = "index.php?page=drivers/new";
$new_link_name = "New Driver";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Drivers";
$breadcrumb_active = "All Drivers";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

// fetch account_id from the account session set in login
$account_id = $_SESSION['account']['id'];

// fetch all the drivers
$drivers = all_drivers();
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
                                    <th>Email</th>
                                    <th>ID</th>
                                    <th>Tel</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php forEach ($drivers as $driver): ?>
                                    <tr>
                                        <td><?php echo $driver['first_name'] ?> <?php echo $driver['last_name'] ?> </td>
                                        <td> <?php echo $driver['email']; ?> </td>
                                        <td> <?php echo $driver['id_no']; ?> </td>
                                        <td> 254<?php echo $driver['phone_no']; ?> </td>
                                        <td> <a href="index.php?page=drivers/show&id=<?php echo $driver['id']; ?>">Details</a> </td>
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