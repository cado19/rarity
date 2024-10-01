<?php
// THIS PAGE DISPLAYS A SELF REGISTERED CUSTOMER'S DETAILS AND ALLOWS EDITING AND UPDATING OF DETAILS
session_start();
if (!(isset($_SESSION['client_logged_in']))) {
	header("Location: index.php?page=client/auth/login");
	exit;
}

$page = "Catalog";

include_once 'partials/client-header.php';
include_once 'partials/client-nav.php';

$vehicles = catalog_vehicles();
$client = $_SESSION['client'];
$id = $client['id'];
?>
<script>
	console.log(<?php echo json_encode($client); ?>);
</script>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="customers/profile/<?php show_value($client, 'profile_image')?>" alt="http://bootdey.com/img/Content/avatar/avatar1.png">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <a href="index.php?page=client/profile/profile_form" class="btn btn-primary">Upload new image</a>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST" action="index.php?page=client/profile/update">
                        <!-- id -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="first_name">First name</label>
                                <input class="form-control"  name="first_name" type="text" placeholder="Enter your first name" value="<?php edit_input_value($client, 'first_name');?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="last_name">Last name</label>
                                <input class="form-control" name="last_name" type="text" placeholder="Enter your last name" value="<?php edit_input_value($client, 'last_name');?>">
                            </div>
                        </div>

                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (name Type)-->
                            <div class="col-md-6">
                                <label for="id_type">ID Type</label>
                                <select name="id_type" class="form-control form-control-border">
                                        <option  value="<?php edit_input_value($client, 'id_type');?>"><?php edit_dropdown_value($client, 'id_type');?></option>
                                        <option value="national_id"> National ID </option>
                                        <option value="passport"> Passport </option>
                                        <option value="military_id"> Military ID </option>
                                </select>
                            </div>
                            <!-- Form Group (name Number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="id_number">ID Number</label>
                                <input class="form-control" name="id_number" type="text" placeholder="Enter your location" value="<?php edit_input_value($client, 'id_no');?>">
                            </div>
                        </div>


                        <!-- Form Group (home address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="work_address">Home address</label>
                            <input class="form-control" name="residential_address" type="text" placeholder="Enter your home address" value="<?php edit_input_value($client, 'residential_address');?>">
                        </div>
                        <!-- Form Group (work address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="work_address">Work address</label>
                            <input class="form-control" name="work_address" type="text" placeholder="Enter your work address" value="<?php edit_input_value($client, 'work_address');?>">
                        </div>


                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="tel">Phone number</label>
                                <input class="form-control" name="tel" type="tel" placeholder="Include country code" value="<?php edit_input_value($client, 'phone_no');?>">
                            </div>

                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label for="date_of_birth">Date of Birth</label>
                                <div class="input-group date" id="birthdate" data-target-input="nearest">
                                    <input type="text" name="date_of_birth" class="form-control datetimepicker-input" data-target="#birthdate" value="<?php edit_input_value($client, 'date_of_birth');?>" />
                                    <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <?php if (isset($_GET['date_of_birth_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['date_of_birth_err']; ?></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'partials/client-footer.php';?>