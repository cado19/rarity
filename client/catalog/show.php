<?php
// THIS FILE SHOULD SHOW AN INDIVIDUAL VEHICLE.
// CLIENT SHOULD BE ABLE TO CREATE A BOOKING REQUEST FROM HERE

include_once 'partials/client-header.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

$vehicle = catalog_vehicle($id);
$log->info('vehicle', $vehicle);
$features = array();

if ($vehicle['bluetooth'] == 'Yes') {
	array_push($features, 'bluetooth');
}

if ($vehicle['keyless_entry'] == 'Yes') {
	array_push($features, 'keyless_entry');
}

if ($vehicle['reverse_cam'] == 'Yes') {
	array_push($features, 'reverse_cam');
}

if ($vehicle['audio_input'] == 'Yes') {
	array_push($features, 'audio_input');
}

if ($vehicle['gps'] == 'Yes') {
	array_push($features, 'gps');
}

if ($vehicle['android_auto'] == 'Yes') {
	array_push($features, 'android_auto');
}

if ($vehicle['apple_carplay'] == 'Yes') {
	array_push($features, 'apple_carplay');
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="project-info-box mt-0">
                <h5><?php echo $vehicle['make']; ?> <?php echo $vehicle['model']; ?></h5>
                <p class="mb-0">The <?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?> is a <?php echo $vehicle['drive_train']; ?> <?php echo $vehicle['category']; ?> loved by many. It can carry <?php echo $vehicle['seats']; ?> people. It's transmission is <?php echo $vehicle['transmission']; ?> and it uses <?php echo $vehicle['fuel']; ?> fuel.</p>
            </div><!-- / project-info-box -->

            <div class="project-info-box">
                <p><b>Transmission:</b> <?php echo $vehicle['transmission']; ?></p>
                <p><b>Seats:</b> <?php echo $vehicle['seats']; ?></p>
                <p><b>Category:</b> <?php echo $vehicle['category']; ?></p>
                <p class="mb-0"><b>Daily Rate:</b> <?php echo number_format($vehicle['daily_rate']); ?>/-</p>
            </div><!-- / project-info-box -->

        </div><!-- / column -->

        <div class="col-md-7">
            <img src="https://www.bootdey.com/image/400x300/FFB6C1/000000" alt="project-image" class="rounded">
            <div class="project-info-box">
                <p>
                    <b>Features:</b>
                    <?php forEach ($features as $feature): ?>
                        <?php echo trim($feature . ", "); ?>
                    <?php endforeach;?>
                </p>
            </div><!-- / project-info-box -->
        </div><!-- / column -->
    </div>
</div>