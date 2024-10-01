<?php
session_start();
if (!(isset($_SESSION['client_logged_in']))) {
	header("Location: index.php?page=client/auth/login");
	exit;
}
$page = "Catalog";

include_once 'partials/client-header.php';
include_once 'partials/client-nav.php';

$vehicles = catalog_vehicles();
$log->info('vehicles', $vehicles);
$logged_in = $_SESSION['client_logged_in'];
?>
<script>
    console.log(<?php echo json_encode($logged_in); ?>);
</script>
<div class="container">

    <div class="row mt-3">
    	<?php foreach ($vehicles as $vehicle): ?>

        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <div class="product-imitation">
                        [ INFO ]
                    </div>
                    <div class="product-desc">
                        <span class="product-price">
                            <?php echo number_format($vehicle['daily_rate']); ?>/-
                        </span>
                        <small class="text-muted"><?php echo $vehicle['category']; ?></small>
                        <a href="#" class="product-name"> <?php echo $vehicle['make']; ?> <?php echo $vehicle['model']; ?> </a>

                        <div class="small m-t-xs">
                            Many desktop publishing packages and web page editors now.
                        </div>
                        <div class="m-t text-righ">

                            <a href="index.php?page=client/catalog/show&id=<?php echo $vehicle['id']; ?>" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach;?>
    </div>
</div>
<?php include_once 'partials/client-footer.php';?>