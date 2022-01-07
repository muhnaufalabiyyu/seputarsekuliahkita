<section class="detail pb-0">
    <div class="container pt-5" data-aos="fade-up">
      <div class="atas">
          <ol class="breadcrumb mb-0 pb-0" aria-label="breadcrumbs">
            <li class="breadcrumb-item">
              <a href="<?= base_url('e-library/all') ?>">E-library</a>
            </li>
              <li class="breadcrumb-item"><a href="<?= base_url('e-library/all') ?>?category=<?= @$library->kategori ?>"><?= @$library->kategori ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?= @$library->judul ?></li>
          </ol>
      </div>

      <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-8">
            <div class="card-body">
              <h5 class="card-title"><?= @$library->kategori ?></h5>
              <div class="table table-responsive">
                <table class="table table-bordered"  id="dataTable" cellspacing="0"?>
                    <tr>
                        <td width="20%">Judul</td>
                        <td width="100"><?= @$library->judul ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Pengarang</td>
                        <td width="100"><?= @$library->pengarang ?></td>
                    <tr> 
                        <td width="20%">Tahun Terbit</td>
                        <td width="100"><?= @$library->tahun_terbit ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Genre</td>
                        <td width="100"><?= @$library->genre ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Deskripsi</td>
                        <td width="100"><?= @$library->deskripsi; ?></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <a class="btn btn-primary" href="<?= base_url() ?>assets/img/library/<?= @$library->file ?>" role="button" style="width: 100%">Download E-Book</a>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
          
        </div>
        <div class="col-sm-4 col-lg-4">

            <div class="text-center">
                <?php if($library->gambar != null) { ?>
                    <img class="detailimg" src="<?= base_url('assets/img/library/'); ?><?= @$library->gambar; ?>">
                <?php } else { ?>
                    <img src="<?= base_url('assets/img/'); ?>no-image.jpg" class="detailimg">
                <?php } ?>
            </div>
        </div>
      </div>
    </div>
  </section>


<!-- <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">
    <div class="container h-100 pt-5">
            <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('e-library/all') ?>">
                          E-library
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('e-library/all') ?>?category=<?= @$library->kategori ?>"><?= @$library->kategori ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= @$library->judul ?></li>
                </ol>
              <div class="row justify-content-center ">
            
                <div class="col-8">
                  <div class="card-body">

                        <div class="table table-responsive">
                            <table class="table table-bordered"  id="dataTable" width="auto" cellspacing="0"?>

                                <tbody>
                                  <tr>
                                        <td width="20%">Judul</td>
                                        <td width="100"><?= @$library->judul ?></td>
                                  </tr>
                                  <tr>
                                        <td width="20%">Pengarang</td>
                                        <td width="100"><?= @$library->pengarang ?></td>
                                  <tr> 
                                        <td width="20%">Tahun Terbit</td>
                                        <td width="100"><?= @$library->tahun_terbit ?></td>
                                  </tr>
                                  <tr>
                                        <td width="20%">Genre</td>
                                        <td width="100"><?= @$library->genre ?></td>
                                  </tr>
                                  <p class="card-text" style="font-size:13px"><?= substr($library->deskripsi, 0, 100); ?> ...</p>
                                  <tr>
                                        <td width="20%">Deskripsi</td>
                                        <td width="100"><?= @$library->deskripsi; ?></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <a class="btn btn-primary" href="<?= base_url() ?>assets/img/library/<?= @$library->file ?>" role="button" style="width: 100%">Download E-Book</a>
                                    </td>
                                  </tr>
                                </tbody>

                            </table>



                        </div>
                    </div>
                </div>
                <div class="col-3" p-0>
                  <?php if($library->gambar != null) { ?>
                  <img class="detail" src="<?= base_url('assets/img/library/'); ?><?= @$library->gambar; ?>">
                  <?php } else { ?>
                  <img src="<?= base_url('assets/img/'); ?>no-image.jpg" class="detail">
                  <?php } ?>
                </div>

            </div>
            
        
        </div>
      </div>
    </div>
  </section> -->