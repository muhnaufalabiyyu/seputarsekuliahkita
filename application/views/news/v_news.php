<div class="news">
   <div class="container">
        <div class="title">
          <h2>NEWS</h2>
          <p>
            Berikut seputar informasi resmi dari Politeknik STMI Jakarta
          </p>
        </div>
        
        <?php if(count($berita) > 0){ ?>
        <?php foreach($berita as $i=>$berita): ?>
        
        <div class="berita">
                <h2><?= $berita->judul; ?></h2>
            <div class="content-news">
                
                <div class="gambar-news">
                    <?php if($berita->gambar != null) { ?>
                    <img src="<?= base_url('assets/img/berita/'); ?><?= $berita->gambar; ?>">
                    <?php } else { ?>
                    <img src="<?= base_url('assets/img/'); ?>no-image.jpg">
                    <?php } ?>
                </div>
                
                <div class="text-news">
                <p>
                  <strong> <?= tanggal_indo($berita->tgl_buat); ?> </strong>
                  <br/>
                  <br/>
                  <?= substr(strip_tags($berita->konten),0,500); ?>
    
                </p>
                <a class="n-more" href="<?= base_url('news/') ?><?= $berita->slug; ?>">Read More <span>>></span></a>
    
                </div>
            </div>
        </div>


    <?php endforeach; ?>
    <?php } else { ?>
    <?php } ?>
    </div>
</div>

