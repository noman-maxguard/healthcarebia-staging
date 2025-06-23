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
            <p class="login-box-msg">Sign in to start your session</p>

            <form id="loginform" action="<?= base_url() ?>admin/login" method="post">

                <div style="text-align:center; display:<?= (!empty($error)) ? 'block' : 'none' ?>"
                     class="alert alert-danger col-sm-12"><?php if (!empty($error)) {
                        echo $error;
                    } ?></div>

                <div class="input-group mb-3">
                    <input type="email" name="email" required class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" required class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <!--              <input type="checkbox" id="remember">-->
                            <!--              <label for="remember">-->
                            <!--                Remember Me-->
                            <!--              </label>-->
                            <a href="<?= base_url() ?>admin/reset-password">Recover Password</a>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <input type="hidden" name="back_url" value="<?= !empty($back_url) ? $back_url : '' ?>">
                        <button type="submit" id="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<?php include 'includes/inc_footer_scripts.php' ?>

<script>
    $('#loginform').submit(function () {
        $('#submit').html('Please wait...');
        $('#submit').prop('disabled', true);
    })
</script>


</body>
</html>
