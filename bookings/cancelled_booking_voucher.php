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
            <h2 class="text-center">Cancelled Booking Voucher</h2>
            <p><b>Booking No:</b><del><?php echo " "; ?><?php show_value($voucher, 'booking_no');?></del></p>
            <p><b>Client:</b><del><?php echo " "; ?><?php show_value($voucher, 'first_name');?><?php echo " "; ?><?php show_value($voucher, 'last_name');?></del></p>
            <p><b>Vehicle:</b><del><?php echo " "; ?><?php show_value($voucher, 'make');?><?php echo " "; ?><?php show_value($voucher, 'model');?></del> </p>
            <p><b>Registration:</b><del><?php echo " "; ?><?php show_value($voucher, 'number_plate');?></del></p>
            <?php if ($voucher['custom_rate'] == 0): ?>
                <p><b>Daily Rate:</b><del><?php echo " "; ?><?php show_value($voucher, 'daily_rate');?>/-</del></p>
            <?php else: ?>
                <p><b>Daily Rate:</b><?php echo " "; ?><del><?php show_value($voucher, 'daily_rate');?>/-</del> <ins><?php show_value($voucher, 'custom_rate');?>/-</ins></p>
            <?php endif;?>
            <p><b>Total:</b><del><?php echo " "; ?><?php show_numeric_value($voucher, 'total');?>/- </del></p>
            <p><b>Start Date:</b><del><?php echo " "; ?><?php echo date("l jS \of F Y", $start_date); ?></del></p>
            <p><b>End Date:</b><del><?php echo " "; ?><?php echo date("l jS \of F Y", $end_date); ?> </del></p>
            <p><b>Start Time:</b><del><?php echo " "; ?><?php show_value($voucher, 'start_time');?></del></p>
            <p><b>End Time:</b><del><?php echo " "; ?><?php show_value($voucher, 'end_time');?></del></p>

        </div>
    </div>
</div>