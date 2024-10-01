<?php

//page name. We set this inn the content start and also in the page title programatically
$page = "Agents";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=agents/all";
$home_link_name = "All Agents";

$new_link = "index.php?page=agents/new";
$new_link_name = "New Agent";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Agents";
$breadcrumb_active = "All Agents";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

// fetch account_id from the account session set in login
$account_id = $_SESSION['account']['id'];

// fetch all the agents
$agents = all_agents();
?>

<!-- Main Content  -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (empty($agents)): ?>
                            <p>No agents. <a href="index.php?page=agents/new" class="btn btn-link">Add some</a></p>
                        <?php else: ?>

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
                                    <?php forEach ($agents as $agent): ?>
                                        <tr>
                                            <td><?php echo $agent['name'] ?> </td>
                                            <td> <?php echo $agent['email']; ?> </td>
                                            <td> <?php echo $agent['phone_no']; ?> </td>
                                            <td> <a href="index.php?page=agents/show&id=<?php echo $agent['id']; ?>">Details</a> </td>
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