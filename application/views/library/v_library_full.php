<?php if(@$_GET['category'] == null) { ?>
  <section id="centerlib">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-10">
          <div class="card-body p-0">
            <div class="row g-0 size">
              <div class="col" style="background-color: #8BD0F1; border-radius: 20px;">
                <div class="p-5 pb-2">
                  <div class="col">
                    <h1 style="color: #000 ; text-align: center" style="font-family: 'Poppins';">E-Library Politeknik STMI Jakarta</h1>
                  </div>
                  <br>
                  <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?= base_url('e-library/all') ?>?category=E-Book" style="margin-bottom: 0.5cm">E-Book</a>
                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?= base_url('e-library/all') ?>?category=E-Journal" style="margin-bottom: 0.5cm">E-Journal</a>
                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?= base_url('e-library/all') ?>?category=Others" style="margin-bottom: 0.5cm">Others</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div class="form-outline" style="width: 55%">
                      <form method="get" action="">
                      <input type="text" name="search" class="form-control" placeholder="Cari Judul Buku" aria-label="Search">
                      <input type="submit" style="position: absolute; left: -9999px"/>
                      </form>
                    </div>
                  </div>
                  <br><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center" style="width: 1500px;margin: 15px;">
        <?php foreach($library as $i=>$library): ?>
        <div class="col-8 col-md-3 col-lg-3 p-2 pt-2">
          <div class="card h-100">
            <?php if($library->gambar != null) { ?>
            <img class="card-img-top w-100 d-block" src="<?= base_url('assets/img/library/'); ?><?= $library->gambar; ?>" width="100" height="300">
            <?php } else { ?>
            <img src="<?= base_url('assets/img/'); ?>no-image.jpg" class="card-img-top w-100 d-block" width="100" height="300">
            <?php } ?>
            <div class="card-body">
                <h4 class="card-title" style="font-size:17px"><?= substr($library->judul, 0,30); ?>...</h4>
                <p class="card-text" style="font-size:13px"><?= substr($library->deskripsi, 0, 100); ?> ...</p>
            </div>
            <div class="text-center pb-3">
                <a class="btn btn-primary" href="<?= base_url('e-library') ?>/read/<?= $library->slug; ?>" role="button" style="font-size:15px; width: 70%;margin-top: 30px;">Detail Buku</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  </section>
<?php } else {?>
  <section>
    <div class="container h-100 pt-5">
      <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('e-library/all') ?>">
                          E-library
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= @$_GET['category']; ?></li>
                </ol>
        <div class="row d-flex justify-content-end align-items-center h-100">
            <form method="get" action="">
            <div class="input-group" style="margin-left: 75%; width: 25%;">
              <input type="hidden" name="category" value="<?= @$_GET['category']; ?>">
              <input type="text" name="search" class="form-control" placeholder="Cari Judul Buku" aria-label="Search" value="<?= @$_GET['search']; ?>">
              <input type="submit" style="position: absolute; left: -9999px"/>
            </div>
            </form>
          </div>
    </div>

    <div class="container h-100 pt-0">
      <div class="row d-flex justify-content-center align-items-center">
      <div class="row justify-content-center" style="width: 1500px;margin: 15px;">
        <?php if(@$_GET['search'] != null && count($library) < 1) { ?>
          <div class="col-12">
            <center><b>Not Found</b></center>
          </div>
        <?php } ?>
        <?php if(@$_GET['search'] == null && count($library) < 1) { ?>
          <div class="col-12">
            <center><b>Not Found</b></center>
          </div>
        <?php } ?>
        <?php foreach($library as $i=>$library): ?>
        <div class="col-8 col-md-3 col-lg-3 p-2 pt-2">
          <div class="card h-100">
            <?php if($library->gambar != null) { ?>
            <img class="card-img-top w-100 d-block" src="<?= base_url('assets/img/library/'); ?><?= $library->gambar; ?>" width="100" height="300">
            <?php } else { ?>
            <img src="<?= base_url('assets/img/'); ?>no-image.jpg" class="card-img-top w-100 d-block" width="100" height="300">
            <?php } ?>
            <div class="card-body">
                <h4 class="card-title" style="font-size:17px"><?= substr($library->judul, 0,30) ?>...</h4>
                <p class="card-text" style="font-size:13px"><?= substr($library->deskripsi, 0, 100); ?>...</p>
            </div>
            <div class="text-center pb-3">
                <a class="btn btn-primary" href="<?= base_url('e-library') ?>/read/<?= $library->slug; ?>" role="button" style="font-size:15px; width: 70%;margin-top: 30px;">Detail Buku</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  
</section>
<?php } ?>