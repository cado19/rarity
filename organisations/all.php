<?php

//page name. We set this inn the content start and also in the page title programatically
$page = "Organisations";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=organisations/all";
$home_link_name = "All Organisations";

$new_link = "index.php?page=organisations/new";
$new_link_name = "New Organisation";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Organisations";
$breadcrumb_active = "All Organisations";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

// fetch account_id from the account session set in login
$account_id = $_SESSION['account']['id'];

// fetch all the Organisations
$organisations = all_organisations();
?>

<!-- Main Content  -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (empty($organisations)): ?>
                            <p>No organisations. <a href="index.php?page=organisations/new" class="btn btn-link">Add some</a></p>
                        <?php else: ?>

                            <table id="example1" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Tel</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php forEach ($organisations as $organisation): ?>
                                        <tr>
                                            <td> <?php echo $organisation['name'] ?> </td>
                                            <td> <?php echo $organisation['email']; ?> </td>
                                            <td> <?php echo $organisation['contact_name']; ?> </td>
                                            <td> <?php echo $organisation['contact_phone_no']; ?> </td>
                                            <td> <a href="index.php?page=Organisations/show&id=<?php echo $organisation['id']; ?>">Details</a> </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>

                        <?php endif;?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>