<!DOCTYPE html>
<html lang="en">
<?php
$pengaturan = $this->db->get_where('pengaturan', ['id !=' => '0'])->row();
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= @$pengaturan->deskripsi_web ?>">
    <meta name="author" content="">

    <title><?= @$title ?> - Admin <?= @$pengaturan->nama_web ?></title>
    <link href="<?= base_url() ?>assets/img/<?= @$pengaturan->favicon ?>" rel="icon">
    <link href="<?= base_url() ?>assets/img/<?= @$pengaturan->favicon ?>" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/') ?>img/<?= @$pengaturan->logo ?>" width="40">
                </div>
                <div class="sidebar-brand-text mx-3"><?= @$pengaturan->nama_web ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= active_menu('beranda'); ?>">
                <a class="nav-link" href="<?= base_url('admin/beranda') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="nav-item <?= active_menu('aduan'); ?>">
                <a class="nav-link" href="<?= base_url('admin/aduan') ?>">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Aduan</span>
                </a>
            </li>
            <li class="nav-item <?= active_menu('artikel'); ?>">
                <a class="nav-link" href="<?= base_url('admin/artikel') ?>">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Artikel</span>
                </a>
            </li>
            <li class="nav-item <?= active_menu('berita'); ?>">
                <a class="nav-link" href="<?= base_url('admin/berita') ?>">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita / Pengumuman</span>
                </a>
            </li>
            <li class="nav-item <?= active_menu('e-library'); ?>">
                <a class="nav-link" href="<?= base_url('admin/e-library') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>E-Library</span>
                </a>
            </li>

            <li class="nav-item <?= active_menu('event'); ?>">
                <a class="nav-link" href="<?= base_url('admin/event') ?>">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Event</span>
                </a>
            </li>

            <li class="nav-item <?= active_menu('pengaturan'); ?>">
                <a class="nav-link" href="<?= base_url('admin/pengaturan') ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->nama; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/admin/') ?>img/profile-img.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->