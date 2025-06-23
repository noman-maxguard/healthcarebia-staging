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
                                <h3 class="card-title">Edit Profile</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="<?= base_url() ?>admin/account" enctype="multipart/form-data"
                                  method="post">


                                <div class="card-body">
                                    <?php
                                    if (!empty($personal_data)) { ?>


                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <div class="controls">
                                                <input class="form-control" placeholder="Name" required type="text"
                                                       name="name"
                                                       value="<?= isset($name) ? $name : $personal_data->name ?>">
                                            </div>
                                        </div>

                                        <div class=" control-label">
                                        </div>
                                        <div class="controls" style="padding-bottom: 5px;color: red">
                                            <?= isset($n_error) ? $n_error : '' ?>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <div class="controls">
                                                <input class="form-control" name="email" required type="email"
                                                       value="<?= $personal_data->email ?>">
                                            </div>
                                        </div>

                                        <div class=" control-label">
                                        </div>
                                        <div class="controls" style="padding-bottom: 5px;color: red">
                                            <?= isset($e_error) ? $e_error : '' ?>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <div class="controls">
                                                <input class="form-control"
                                                       placeholder="Enter only if you want to change" type="password"
                                                       name="password" value="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Confirm Password</label>
                                            <div class="controls">
                                                <input class="form-control" placeholder="Confirm Password"
                                                       type="password" name="confirm" value="">
                                            </div>
                                        </div>

                                        <div class=" control-label">
                                        </div>
                                        <div class="controls" style="padding-bottom: 5px;color: red">
                                            <?= isset($p_error) ? $p_error : '' ?>
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


</script>

</body>
</html>
