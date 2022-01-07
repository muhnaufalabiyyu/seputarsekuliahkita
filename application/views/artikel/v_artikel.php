<div class="news">
    <div class="container">
    
    <div class="title">
      <h2>ARTIKEL</h2>
      <p>
        Berikut artikel yang bisa diakses terkait kegiatan atau informasi di POLITEKNIK STMI JAKARTA
      </p>
    </div>

    <?php if(count($artikel) > 0){ ?>
    <?php foreach($artikel as $i=>$artikel): ?>

    <div class="berita">
            <h2><?= $artikel->judul; ?></h2>
        <div class="content-news">
            
          <div class="gambar-news">
            <?php if($artikel->gambar != null) { ?>
            <img src="<?= base_url('assets/img/artikel/'); ?><?= $artikel->gambar; ?>">
            <?php } else { ?>
            <img src="<?= base_url('assets/img/'); ?>no-image.jpg">
            <?php } ?>
          </div>
            
            <div class="text-news">
                <p>
               <strong> <?= tanggal_indo($artikel->tgl_buat); ?> </strong>
                <br/>
                <br/>
                <?= substr(strip_tags($artikel->konten),0,500); ?>
            
                </p>
                <a href="<?= base_url('artikel/') ?><?= $artikel->slug; ?>">Read More <span>>></span></a>
              </div>
        </div>
    </div>
    
    <?php endforeach; ?>
    <?php } else { ?>
    <?php } ?>
    </div>
</div>
