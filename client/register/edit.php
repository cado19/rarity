<?php
    $page = "Update Profile";
    include_once 'partials/client-header.php';

    if (isset($_GET['id'])) {
        $id       = $_GET['id'];
        $customer = get_customer($id);
    }

    $countries = countries();
?>
<script>
  console.log(<?php echo json_encode($customer) ?>);
</script>
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-xs-12 col-sm-9">
    <form class="form-horizontal" method="POST" action="index.php?page=client/register/update" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="panel panel-default">
          <div class="panel-body text-center">
           <img src="assets/rarity_banner.jpg" class="img-fluid">
          </div>
        </div>
      <div class="panel panel-default">
        <div class="panel-heading">
	        <h4 class="panel-title">User info</h4>
        </div>

        <div class="panel - body">
    	  <!-- Country  -->
          <div class="form-group">
            <label class="col-sm-2control-label">Location</label>
            <div class="col-sm-10">
              <select name="country" class="form-control">
                <option selected="">Select country</option>
                    <?php foreach ($countries as $country): ?>
                        <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                    <?php endforeach;?>
              </select>
            </div>
          </div>
          <!-- Name  -->
          <div class="row">
          	<div class="col-6">
          		<div class="form-group">

	          		<label for="first_name" class="col-sm-2 control-label">First Name</label>
	          		<div class="col-sm-10">

		                <input type="text" name="first_name" value="<?php show_value($customer, 'first_name')?>" class="form-control" disabled>
		                <?php if (isset($_GET['first_name_err'])): ?>
		                    <p class="text-danger"><?php echo $_GET['first_name_err']; ?></p>
		                <?php endif;?>
	          		</div>
          		</div>
          	</div>
          	<div class="col-6">
          		<div class="form-group">

	          		<label for="first_name" class="col-sm-2 control-label">Last Name</label>
	          		<div class="col-sm-10">
		                <input type="text" name="last_name" value="<?php show_value($customer, 'last_name')?>" class="form-control" disabled>
		                <?php if (isset($_GET['first_name_err'])): ?>
		                    <p class="text-danger"><?php echo $_GET['first_name_err']; ?></p>
		                <?php endif;?>
	          		</div>
          		</div>
          	</div>
          </div>

          <!-- Date of Birth  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">Date of Birth</label>
            <div class="col-sm-10">
	            <div class="input-group date" id="birthdate" data-target-input="nearest">
                    <input type="text" name="date_of_birth" class="form-control datetimepicker-input" data-target="#birthdate"/>
                    <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
          </div>

          <!-- ID Type  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">ID Type</label>
            <div class="col-sm-10">
            <select name="id_type" class="form-control">
                    <option value="">--Please choose an option--</option>
                    <option value="national_id"> National ID </option>
                    <option value="passport"> Passport </option>
                    <option value="military_id"> Military ID </option>
            </select>
            </div>
          </div>

          <!-- ID Number  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">ID Number</label>
            <div class="col-sm-10">
              <input type="text" name="id_number" class="form-control" value="<?php edit_input_value($customer, 'id_no');?>">
            </div>
            <?php if (isset($_GET['id_number_err'])): ?>
                <p class="text-danger"><?php echo $_GET['id_number_err']; ?></p>
            <?php endif;?>
          </div>
          <!-- DL Number  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">DL Number</label>
            <div class="col-sm-10">
              <input type="text" name="dl_number" class="form-control" value="<?php edit_input_value($customer, 'dl_no');?>">
            </div>
            <?php if (isset($_GET['dl_number_err'])): ?>
                <p class="text-danger"><?php echo $_GET['dl_number_err']; ?></p>
            <?php endif;?>
          </div>


          <!-- DL Expiry  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">DL Expiry</label>
            <div class="col-sm-10">
              	<div class="input-group date" id="dl_expiry" data-target-input="nearest">
                    <input type="text" name="dl_expiry" class="form-control datetimepicker-input" data-target="#dl_expiry" value="<?php edit_input_value($customer, 'dl_expiry');?>"/>
                    <div class="input-group-append" data-target="#dl_expiry" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <?php if (isset($_GET['dl_expiry_err'])): ?>
                    <p class="text-danger"><?php echo $_GET['dl_expiry_err']; ?></p>
                <?php endif;?>
            </div>
          </div>

        </div>


      <!-- </div> -->

      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Contact info</h4>
        </div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Mobile number</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="phone" name="tel" value="<?php edit_input_value($customer, 'phone_no');?>">
                <?php if (isset($_GET['tel_err'])): ?>
                    <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
                <?php endif;?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">E-mail address</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" value="<?php show_value($customer, 'email')?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Work address</label>
            <div class="col-sm-10">
            	<input type="text" name="work_address" id="" class="form-control"  value="<?php edit_input_value($customer, 'work_address');?>">
                <?php if (isset($_GET['work_address_err'])): ?>
                    <p class="text-danger"><?php echo $_GET['work_address_err']; ?></p>
                <?php endif;?>
            </div>
          </div>

    		  <div class="form-group">
            <label class="col-sm-2 control-label">Residential address</label>
            <div class="col-sm-10">
            	<input type="text" name="residential_address" class="form-control"  value="<?php edit_input_value($customer, 'residential_address');?>">
              <?php if (isset($_GET['residential_address_err'])): ?>
                  <p class="text-danger"><?php echo $_GET['residential_address_err']; ?></p>
              <?php endif;?>
            </div>
          </div>


        </div>
      </div>

      <div class="panel panel-default">
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2 mt-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

<?php include_once 'partials/client-footer.php';?>