<?php
//check permission
$user_id = $userdata['user_id'];
$user_role = $userdata['role'];
//check permission


?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a target="_blank" href="<?= base_url() ?>" class="nav-link">Website</a>
        </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-th-large"></i>
                <?= !empty($userdata['name']) ? $userdata['name'] : 'Guest' ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>admin/account" class="dropdown-item">
                    <i class="fas fa-user-circle"></i> Profile
                </a>


                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>admin/settings" class="dropdown-item">
                    <i class="fas fa-cog"></i> Settings
                </a>


                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>admin/email-settings" class="dropdown-item">
                    <i class="fas fa-envelope"></i> Email Settings
                </a>


                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>admin/user-log" class="dropdown-item">
                    <i class="fas fa-history"></i> User Log
                </a>


                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>admin/login/logout" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>


            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->



