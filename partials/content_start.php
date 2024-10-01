<?php
    // THIS PAGE HAS WILL DETERMINE STARTING TEMPLATE OF MOST PAGES. IT WILL HOLD PIECES TOGETHER EG SIDEBAR 
?>

<div class="wrapper">
    <!-- Navbar  -->
    <?php include 'partials/navbar.php'; ?>

    <!-- Sidebar  -->
    <?php include 'partials/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"><?php echo $page ?></h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><?php echo $breadcrumb; ?></li>
                  <li class="breadcrumb-item active"><?php echo $breadcrumb_active; ?></li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->




