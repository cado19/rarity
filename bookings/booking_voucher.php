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
        <div class="col-12 col-xs-12">
            <img src="assets/rarity_contract_top.png" alt="" class="img-fluid">
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-xs-12 col-sm-9 col-6">
            <h2 class="text-center">Booking Voucher</h2>
            <p><b>Booking No:</b><?php echo " "; ?><?php show_value($voucher, 'booking_no');?></p>
            <p><b>Client:</b><?php echo " "; ?><?php show_value($voucher, 'first_name');?><?php echo " "; ?><?php show_value($voucher, 'last_name');?></p>
            <p><b>Vehicle:</b><?php echo " "; ?><?php show_value($voucher, 'make');?><?php echo " "; ?><?php show_value($voucher, 'model');?> </p>
            <p><b>Registration:</b><?php echo " "; ?><?php show_value($voucher, 'number_plate');?></p>
            <?php if ($voucher['custom_rate'] == 0): ?>
                <p><b>Daily Rate:</b><?php echo " "; ?><?php show_value($voucher, 'daily_rate');?>/-</p>
            <?php else: ?>
                <p><b>Daily Rate:</b><?php echo " "; ?><del><?php show_value($voucher, 'daily_rate');?>/-</del> <ins><?php show_value($voucher, 'custom_rate');?>/-</ins></p>
            <?php endif;?>
            <p><b>Total:</b><?php echo " "; ?><?php show_numeric_value($voucher, 'total');?>/- </p>
            <p><b>Start Date:</b><?php echo " "; ?><?php echo date("l jS \of F Y", $start_date); ?></p>
            <p><b>End Date:</b><?php echo " "; ?><?php echo date("l jS \of F Y", $end_date); ?> </p>
            <p><b>Start Time:</b><?php echo " "; ?><?php show_value($voucher, 'start_time');?></p>
            <p><b>End Time:</b><?php echo " "; ?><?php show_value($voucher, 'end_time');?></p>
        </div>
    </div>
</div>