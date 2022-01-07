  <section class="elibrary">
    <div class="container" style="margin-top: 2cm;">
       <div class="row">
        <div class="col-12 col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">Welcome to <br> 
          <h1 class="display-5 fw-bold lh-1 mb-3" style="color: #005A8D">E-Library</h1>
          <br><hr><br>
          <p class="lead">Akses E-Book, E-Jurnal, Open-Source Book, Makalah Penelitian, dan File Tugas Akhir.</p>
          <br>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="<?= base_url('e-library/all') ?>" button class="btn btn-primary btn-lg px-4 me-md-2">See More</a>
          </div>
        </div>
        <div class="col-12 col-sm-5 col-md-6 col-lg-6 py-3">
          <div class="row justify-content-center">
            <?php foreach($library as $i=>$library): ?>
            <div class="col-8 col-lg-4 py-3">
            <a style="color:black;" href="<?= base_url('e-library') ?>/read/<?= $library->slug; ?>">
              <div class="card h-100">
                <?php if($library->gambar != null) { ?>
                <img src="<?= base_url('assets/img/library/'); ?><?= $library->gambar; ?>" width="100" height="300" class="card-img-top" alt="...">
                <?php } else { ?>
                <img src="<?= base_url('assets/img/'); ?>no-image.jpg" width="100" height="300" class="card-img-top" alt="...">
                <?php } ?>
                <div class="card-body">
                  <h5 class="card-title"  style="font-size:15px"><?= substr($library->judul, 0,30); ?>...</h5>
                </div>
                <div class="card-footer">
                  <small class="text-muted"><?= tanggal_indo($library->tgl_buat); ?></small>
                </div>
              </div>
             </a>
            </div>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>