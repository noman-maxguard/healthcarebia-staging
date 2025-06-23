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
                                        <h3>User Log</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-12 ml-auto">

                                    </div>
                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped DataTable">
                                    <thead>
                                    <tr>

                                        <th>#</th>
                                        <th style="text-align: left !important;">Email</th>
                                        <th>Login Time</th>
                                        <th>Login IP</th>
                                        <th>Status</th>
                                        <th>Failed Reason</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $i = 1;
                                    if (!empty($data)) {
                                        foreach ($data as $one) {

                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td style="text-align: left !important;"><?= $one->email ?></td>
                                                <td style="font-size: 13px"><?= !empty($one->date) ? $this->MDL_Settings->changeDate($one->date, 'd-M-Y') : '' ?>
                                                    <br>
                                                    <?= !empty($one->date) ? $this->MDL_Settings->changeDate($one->date, 'h:i a') : '' ?>
                                                </td>


                                                <td><?= $one->ip ?></td>
                                                <td>
                                                    <span style="color:<?= $one->status == 1 ? 'green' : 'red' ?>;"><?= $one->status == 1 ? 'Success' : 'Failed' ?></span>

                                                </td>
                                                <td>
                                                    <span><?= $one->reason == 'ip' ? ('Unknown IP Address') : ($one->reason == 'email' ? 'Invalid Email Address' : ($one->reason == 'password' ? 'Invalid Password' : '')) ?></span>

                                                </td>

                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    }

                                    ?>

                                    </tbody>

                                </table>
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


</body>
</html>
