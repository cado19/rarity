<?php
    include_once 'partials/header.php';
    // include_once 'partials/content_start.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $voucher    = booking_voucher_details($id);
    $created    = strtotime($voucher['created_at']);
    $start_date = strtotime($voucher['start_date']);
    $end_date   = strtotime($voucher['end_date']);

?>

<script>
    console.log(<?php echo json_encode($voucher); ?>);
</script>

<div class="container">
    <div class="row">
        <div class="col-12">
            <img src="assets/rarity_contract_top.png" alt="">
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <h2 class="text-center">Booking Voucher</h2>
            <p><b>Client:</b><?php echo " "; ?><?php show_value($voucher, 'first_name');?><?php echo " "; ?><?php show_value($voucher, 'last_name');?></p>
            <p><b>Vehicle:</b><?php echo " "; ?><?php show_value($voucher, 'make');?><?php echo " "; ?><?php show_value($voucher, 'model');?> </p>
            <p><b>Registration:</b><?php echo " "; ?><?php show_value($voucher, 'number_plate');?></p>
            <p><b>Total:</b><?php echo " "; ?><?php show_value($voucher, 'total');?> </p>
            <p><b>Start Date:</b><?php echo " "; ?><?php echo date("l jS \of F Y", $start_date); ?></p>
            <p><b>End Date:</b><?php echo " "; ?><?php echo date("l jS \of F Y", $end_date); ?> </p>
            <p><b>Start Time:</b><?php echo " "; ?><?php show_value($voucher, 'start_time');?></p>
            <p><b>End Time:</b><?php echo " "; ?><?php show_value($voucher, 'end_time');?></p>
        </div>
    </div>
</div>