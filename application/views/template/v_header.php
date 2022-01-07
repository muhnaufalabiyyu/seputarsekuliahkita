<!DOCTYPE html>
<html lang="en">
<?php
$pengaturan = $this->db->get_where('pengaturan', ['id !=' => '0'])->row();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"" />
  <title><?= @$title ?> - <?= @$pengaturan->nama_web ?></title>
  <meta content="<?= @$pengaturan->deskripsi_web ?>" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/img/<?= @$pengaturan->favicon ?>" rel="icon">
  <link href="<?= base_url() ?>assets/img/<?= @$pengaturan->favicon ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS File -->
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a class="logo d-flex align-items-center" href="<?= base_url('') ?>" >
        <img src="<?= base_url() ?>assets/img/<?= @$pengaturan->logo_header ?>" alt="">       
        <img src="<?= base_url() ?>assets/img/<?= @$pengaturan->logo ?>" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <?php if(@$title != 'Home') { ?>
          <li><a class="nav-link scrollto <?= active_menu_cust(''); ?>" href="<?= base_url() ?>">Home</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url() ?>">Web Content</a></li>
          <?php } else { ?>
            <li><a class="nav-link scrollto <?= active_menu_cust(''); ?>" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Web Content</a></li>
          <?php } ?>
          <li><a class="nav-link scrollto" href="<?= base_url('program-studi') ?>">Program Studi</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('e-library') ?>">E-Library</a></li>
          <li><a class="nav-link scrollto" href="#footer">About Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>