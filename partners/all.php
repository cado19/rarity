<?php

//page name. We set this inn the content start and also in the page title programatically
$page = "Partners";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=partners/all";
$home_link_name = "All Partners";

$new_link = "index.php?page=partners/new";
$new_link_name = "New Partner";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Partners";
$breadcrumb_active = "All Partners";

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
                                    <th>Email</th>
                                    <th>Tel</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php forEach ($partners as $partner): ?>
                                    <tr>
                                        <td><?php echo $partner['name'] ?> </td>
                                        <td> <?php echo $partner['email']; ?> </td>
                                        <td> 254<?php echo $partner['phone_no']; ?> </td>
                                        <td> <a href="index.php?page=partners/show&id=<?php echo $partner['id']; ?>">Details</a> </td>
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