<?php
    // FOR NOW THIS WILL BE THE HOME DASHBOARD. WE'LL CUSTOMIZE IT AS THE APP GROWS
include 'config/session_script.php';
    $account_id = $_SESSION['account']['id'];
    $role_id = $_SESSION['account']['role_id'];
?>
    
    <?php if($role_id == 3): ?>
        <?php include_once 'partials/dashboard_partials/driver_dashboard.php'; ?>
    <?php endif; ?>

    <?php if($role_id == 0 || $role_id == 1): ?>
        <?php include_once 'partials/dashboard_partials/main_dashboard.php'; ?>
    <?php endif; ?>

    <?php if($role_id == 2): ?>
        <?php include_once 'partials/dashboard_partials/agent_dashboard.php'; ?>
    <?php endif; ?>





