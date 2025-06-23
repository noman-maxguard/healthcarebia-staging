<?php
$role = !empty($userdata['role']) ? $userdata['role'] : 2;

$common_pages = $this->MDL_Settings->get_common_pages_active3();
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <?php
    if (!empty($settings->logo)) {
        ?>
        <a style="border-bottom: none;" href="<?= base_url() ?>admin" class="brand-link">
            <img src="<?= base_url() ?>uploads/images/<?= $settings->logo ?>"
                 alt="<?= $settings->company_name ?>"
                 class="brand-image  elevation-3"
                 style="opacity: .8; margin-left: 0!important;">

        </a>
        <?php
    }
    ?>


    <div class="clearfix"></div>


    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: 20px">


        <?php
        /*
         <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

            </div>
            <div class="info">
                <a  class="d-block"><?=!empty($ret_data['name'])?$ret_data['name']:'Guest'?></a>
            </div>
        </div>
         */
        ?>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="nav-item ">
                    <a href="<?= base_url() ?>admin/enquiries"
                       class="nav-link <?= isset($page) ? (($page == 'enquiries') ? 'active' : '') : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Enquiries
                        </p>
                    </a>
                </li>


                <li class="nav-item has-treeview <?= isset($page) ? (($page == 'banners' || strpos($page, 'pages_') !== false) ? 'menu-open' : '') : '' ?>">
                    <a href="#"
                       class="nav-link <?= isset($page) ? (($page == 'banners' || strpos($page, 'pages_') !== false) ? 'active' : '') : '' ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Manage Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item" title="Create New Page">
                            <a href="<?= base_url() ?>admin/manage-pages"
                               class="nav-link <?= isset($page) ? (($page == 'pages_') ? 'active' : '') : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New Page</p>
                            </a>
                        </li>

                        <?php
                        if ($common_pages) {
                            foreach ($common_pages as $common_pages_one) {
                                ?>
                                <li class="nav-item" title="<?= $common_pages_one->name ?>">
                                    <a href="<?= base_url() ?>admin/manage-pages/<?= $common_pages_one->id ?>"
                                       class="nav-link <?= isset($page) ? (($page == 'pages_' . $common_pages_one->id) ? 'active' : '') : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?= $common_pages_one->name ?></p>
                                    </a>
                                </li>

                                <?php
                            }
                        }
                        ?>


                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>




