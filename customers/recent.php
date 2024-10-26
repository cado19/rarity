<?php
    // THIS FILE DISPLAYS ALL THE CUSTOMERS

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Recent Customers";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=customers/all";
    $home_link_name = "All Clients";

    $new_link      = "index.php?page=customers/new";
    $new_link_name = "New Client";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Clients";
    $breadcrumb_active = "Recent Clients";

    // File Inclusions
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    // $account_id = $_SESSION['account']['id'];

    //Fetch all customers
    $customers = recent_customers();

    // Log customers for testing purposes
    $log->info('customers:', $customers);
?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
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
                                <?php foreach ($customers as $customer): ?>
                                    <tr>
                                        <td>
                                            <?php show_value($customer, 'first_name');?><?php echo " "; ?><?php show_value($customer, 'last_name');?>
                                        </td>
                                        <td>                                             <?php show_value($customer, 'id_no');?> </td>
                                        <td>                                             <?php show_value($customer, 'phone_no');?> </td>
                                        <td> <a href="index.php?page=customers/show&id=<?php echo $customer['id']; ?>">Details</a> </td>
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
