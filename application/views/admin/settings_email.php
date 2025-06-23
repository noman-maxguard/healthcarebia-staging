<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/inc_head_tag.php' ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include 'includes/inc_header.php' ?>

    <?php include 'includes/inc_sidebar.php' ?>

    <!--CONTINUE--->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Email Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="<?= base_url() ?>admin/settings/update_settings_email"
                                  enctype="multipart/form-data" method="post">


                                <div class="card-body">
                                    <?php
                                    if (!empty($settings)) { ?>


                                        <div class="form-group">
                                            <label class="control-label">Email Type: </label>
                                            <div class="controls">
                                                <label class="radio inline">
                                                    <input class="styled email_type" <?= isset($settings->email_smtp_flag) ? ($settings->email_smtp_flag == 0 ? 'checked' : '') : 'checked' ?>
                                                           name="email_smtp_flag" value="0"
                                                           data-prompt-position="topLeft:-1,-5"
                                                           type="radio">
                                                    PHP Mail
                                                </label>
                                                <label class="radio inline" style="margin-left: 20px">
                                                    <input class="styled email_type" <?= isset($settings->email_smtp_flag) ? ($settings->email_smtp_flag == 1 ? 'checked' : '') : '' ?>
                                                           name="email_smtp_flag" value="1"
                                                           data-prompt-position="topLeft:-1,-5"
                                                           type="radio">
                                                    SMTP
                                                </label>

                                            </div>
                                        </div>

                                        <div style="display: <?= $settings->email_smtp_flag == 1 ? 'block' : 'none' ?>"
                                             id="div_smtp">


                                            <div class="form-group">
                                                <label class="control-label">SMTP Server</label>
                                                <div class="controls">
                                                    <input type="text" name="email_host" class="form-control"
                                                           value="<?= htmlentities($settings->email_host, ENT_QUOTES); ?>"/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label">Display Name</label>
                                                <div class="controls">
                                                    <input type="text" name="email_name" class="form-control"
                                                           value="<?= htmlentities($settings->email_name, ENT_QUOTES); ?>"/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label">SMTP Username</label>
                                                <div class="controls">
                                                    <input type="text" name="email_username" class="form-control"
                                                           value="<?= htmlentities($settings->email_username, ENT_QUOTES); ?>"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">SMTP password</label>
                                                <div class="controls">
                                                    <input type="text" name="email_password" class="form-control"
                                                           value="<?= htmlentities($settings->email_password, ENT_QUOTES); ?>"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">SMTP Port</label>
                                                <div class="controls">
                                                    <input type="text" name="email_port" class="form-control"
                                                           value="<?= htmlentities($settings->email_port, ENT_QUOTES); ?>"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">SSL/TLS: </label>
                                                <div class="controls">
                                                    <label class="radio inline">
                                                        <input class="styled" <?= isset($settings->email_ssl_flag) ? ($settings->email_ssl_flag == 1 ? 'checked' : '') : '' ?>
                                                               name="email_ssl_flag" value="1"
                                                               data-prompt-position="topLeft:-1,-5"
                                                               type="radio">
                                                        SSL
                                                    </label>
                                                    <label class="radio inline">
                                                        <input class="styled" <?= isset($settings->email_ssl_flag) ? ($settings->email_ssl_flag == 0 ? 'checked' : '') : 'checked' ?>
                                                               name="email_ssl_flag" value="0"
                                                               data-prompt-position="topLeft:-1,-5"
                                                               type="radio">
                                                        TLS
                                                    </label>

                                                </div>
                                            </div>

                                        </div>

                                    <?php } ?>

                                </div>


                                <div class="card-footer">
                                    <button type="submit" id="submit" name="submit" value="submit"
                                            class="btn btn-primary submit">Submit
                                    </button>

                                </div>


                            </form>
                        </div>
                        <!-- /.card -->


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6"></div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'includes/inc_footer.php' ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/inc_footer_scripts.php' ?>


<script>


    $('.my_tab').click(function () {
        var id_str = $(this).attr('id');
        var id_arr = id_str.split('_');
        var id = id_arr[1];

        $('#tab_id').val(id);
    })


    function confirm_delete() {
        var x = confirm("Are you sure want to Delete this ?");
        if (x) {

            return true;
        } else
            return false;
    }


    //File input
    $(".change_image").change(function () {

        var id = $(this).attr('id');

        displayImage(this, id);
    })

    function displayImage(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_' + id).attr('src', e.target.result);
                $('#div_' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    //File input

    //Delete Image
    $('.deleteImage').click(function () {
        var x = confirm("Are you sure want to remove this image ?");
        if (x) {
            var id_str = $(this).parent().parent().prev().children().next().children().attr('id');

            $('.hidden_' + id_str).val(1);
            $('#div_' + id_str).hide();
        } else
            return false;
    })
    //Delete Image


    $('.email_type').click(function () {


        var val = $(this).val();

        if (val == 0) {
            $('#div_smtp').hide();
        } else {
            $('#div_smtp').show();
        }
    })


</script>

</body>
</html>
