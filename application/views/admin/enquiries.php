<!DOCTYPE html>
<html>
<head>

    <?php include 'includes/inc_head_tag.php' ?>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include 'includes/inc_header.php' ?>

    <?php include 'includes/inc_sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <h3>Enquiries</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-12 ml-auto">

                                        <?php
                                        if (!empty($data)) {
                                            ?>
                                            <a href="<?= base_url() ?>admin/export-enquiries" title="Export to Excel"
                                               class="btn btn-info float-right"><i class="fas fa-plus"></i>
                                                Export to Excel</a>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?= base_url() ?>admin/enquiries/delete_data_multiple" method="post"
                                      onsubmit="return confirm_delete();">

                                    <table class="table table-bordered table-striped DataTable">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll" name="checkAll" value=""></th>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th style="text-align: left !important;">Name</th>

                                            <th style="text-align: left !important;">Email</th>


                                            <th style="text-align: left !important;">Phone</th>


                                            <th style="text-align: left !important;">Message</th>


                                            <th>Page URL</th>


                                            <th>Location</th>

                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $i = 1;
                                        if (!empty($data)) {
                                            foreach ($data as $one) {


                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="delete[]" value="<?= $one->id ?>">
                                                    </td>
                                                    <td><?= $i ?></td>
                                                    <td><?= $one->date ?></td>
                                                    <td style="text-align: left !important;"><?= $one->name ?></td>


                                                    <td style="text-align: left !important;"><?= $one->email ?></td>


                                                    <td style="text-align: left !important;"><?= $one->phone ?></td>


                                                    <td style="text-align: left !important;"><?= $one->message ?></td>


                                                    <td>
                                                        <a href="<?= $one->url_from ?>" target="_blank">
                                                            <?= $one->url_from ?>
                                                        </a>
                                                    </td>


                                                    <td>
                                                        <?= $one->ip_address ?>
                                                        <br>

                                                        <?php
                                                        $location_arr = array();

                                                        if (!empty($one->city))
                                                            $location_arr[] = $one->city;

                                                        if (!empty($one->region) && ($one->city != $one->region))
                                                            $location_arr[] = $one->region;

                                                        if (!empty($one->country))
                                                            $location_arr[] = $one->country;


                                                        $location_str = implode(',<br>', $location_arr);
                                                        ?>

                                                        <?= $location_str ?>
                                                    </td>


                                                    <td>


                                                        <a href="<?= base_url() ?>admin/enquiries/delete_data/<?= $one->id ?>"
                                                           onclick="return confirm_delete()">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        }
                                        ?>

                                        </tbody>

                                    </table>

                                    <?php
                                    if (!empty($data)) {
                                        ?>
                                        <button type="submit" class="btn btn-danger btn-xs" title="DELETE">
                                            Delete Marked Items
                                        </button>
                                        <?php
                                    }
                                    ?>

                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'includes/inc_footer.php' ?>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include 'includes/inc_footer_scripts.php' ?>



<?php include 'includes/inc_footer_scripts_data_tables.php' ?>


<script>


    function my_submit() {
        var x = confirm("Are you sure want to import from this file ?");

        if (x)
            return true;
        else
            return false;
    }

    function confirm_delete() {
        var x = confirm("Data will be deleted permanently !\nAre you sure want to Delete this Entry ?");
        if (x) {

            return true;
        } else
            return false;
    }


    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);

    });

</script>


</body>
</html>
