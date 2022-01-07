<div class="container-news">
<div class="container">
    <h1 class="heading-1"><?= $artikel->judul; ?></h1>

    <div class="sub-heading">
        <p><span><?= tanggal_indo($artikel->tgl_buat); ?></span></p>
      <p class ="impotent">Administrator </p>
    </div>
    
    <div class="main">
        <div class="home-news">
            <div class="left">
      <?php if($artikel->gambar != null) { ?>
      <img src="<?= base_url('assets/img/artikel/'); ?><?= $artikel->gambar; ?>" class="home-img" alt="Paper photo">
      <?php } else { ?>
      <img src="<?= base_url('assets/img/'); ?>no-image.jpg" class="home-img" alt="Paper photo">
      <?php } ?>
            </div>
        </div>

    <p>
      <?= $artikel->konten; ?>
    </p>
    
    </div>
    </div>
</div>