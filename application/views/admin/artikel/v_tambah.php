<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= @$title ?></h1>
                    <p class="mb-4"><?= @$sub_title ?></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?= @$title ?></h6>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <form method="post" action="<?= base_url('admin/artikel/simpan'); ?>" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="judul" class="col-sm-2 col-form-label">Judul Artikel</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="konten" class="col-sm-2 col-form-label">Isi Artikel</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 100px" id="konten" name="konten" required=""></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="gambar" class="col-sm-2 col-form-label">Gambar </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="gambar" name="gambar">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col-sm-4 offset-md-8">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>