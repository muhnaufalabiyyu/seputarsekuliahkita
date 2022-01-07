<div class="container-news">
    <div class="container-sm">

    <h1 class="heading-1"><?= $berita->judul; ?></h1>

    <div class="sub-heading">
        <p><span><?= tanggal_indo($berita->tgl_buat); ?></span></p>
      <p class ="impotent">Administrator </p>
    </div>
    
    <div class="main">
        <div class="home-news">
            <div class="left">
      <?php if($berita->gambar != null) { ?>
      <img src="<?= base_url('assets/img/berita/'); ?><?= $berita->gambar; ?>" class="home-img" alt="Paper photo">
      <?php } else { ?>
      <img src="<?= base_url('assets/img/'); ?>no-image.jpg" class="home-img" alt="Paper photo">
      <?php } ?>
            </div>
        </div>

    <p>
      <?= $berita->konten; ?> 
    </p>
    
    </div>
    </div>
</div>