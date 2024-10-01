<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $home_link; ?>" class="nav-link"><?php echo $home_link_name; ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $new_link; ?>" class="nav-link"> <?php echo $new_link_name ?> </a>
      </li>

      <!-- Show blacklisted only if in customers index page  -->
      <?php if ($page == "Customers"): ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $blacklist_link; ?>" class="nav-link"> <?php echo $blacklist_link_name; ?> </a>
        </li>
      <?php endif;?>

      <!-- Show partner vehicle only if in fleet index page  -->
      <?php if ($page == "Vehicles"): ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $partner_vehicle_link; ?>" class="nav-link"> <?php echo $partner_vehicle_link_name; ?> </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $new_partner_vehicle_link; ?>" class="nav-link"> <?php echo $new_partner_vehicle_link_name; ?> </a>
        </li>
      <?php endif;?>

      <!-- Show new partner booking only if in bookings index page  -->
      <?php if ($page == "Bookings"): ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $new_pb_link; ?>" class="nav-link"> <?php echo $new_pb_link_name; ?> </a>
        </li>
      <?php endif;?>

    </ul>
</nav>




