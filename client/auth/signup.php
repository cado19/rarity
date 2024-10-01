<?php
$page = "Sign Up";
include_once 'partials/client-header.php';
?>
<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Hello,</h1>
                    <p class="lead">
                        Create your account to continue
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <div class="text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Andrew Jones" class="img-fluid rounded-circle" width="132" height="132">
                            </div>
                            <form method="POST" action="index.php?page=client/auth/signup_process">

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <?php if (isset($_GET['email_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                <?php endif;?>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-lg btn-outline-primary">Sign up</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>