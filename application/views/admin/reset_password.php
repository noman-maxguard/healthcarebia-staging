<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/inc_head_tag.php' ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <?php include 'includes/inc_login_header.php' ?>

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            <form action="<?= base_url() ?>admin/reset-password" method="post">

                <div style="text-align:center; display:<?= (!empty($error)) ? 'block' : 'none' ?>"
                     class="alert alert-danger col-sm-12"><?php if (!empty($error)) {
                        echo $error;
                    } ?></div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" required placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="<?= base_url() ?>admin/login">Login</a>
            </p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<?php include 'includes/inc_footer_scripts.php' ?>


</body>
</html>
