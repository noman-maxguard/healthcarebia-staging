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
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

            <form action="<?= base_url() ?>admin/set-password" method="post">

                <div style="text-align:center; display:<?= (!empty($reset_error)) ? 'block' : 'none' ?>"
                     class="alert alert-danger col-sm-12"><?php if (!empty($reset_error)) {
                        echo $reset_error;
                    } ?></div>


                <div class="input-group mb-3">
                    <input required type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input required type="password" name="confirm_password" class="form-control"
                           placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="hidden" name="token" value="<?= !empty($token) ? $token : 0; ?>">
                        <button type="submit" class="btn btn-primary btn-block">Change password</button>
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
