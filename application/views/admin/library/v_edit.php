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
                            <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/e-library/up_edit/'.$this->uri->segment(4)); ?>">
                                <div class="row mb-3">
                                    <label for="Kategori" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kategori" name="kategori" required="">
                                            <option value="">----Pilih Kategori ----</option>
                                            <option value="E-Book" <?= $library->kategori == 'E-Book' ? 'selected' : '' ?>>E-Book</option>
                                            <option value="E-Journal" <?= $library->kategori == 'E-Journal' ? 'selected' : '' ?>>E-Journal</option>
                                            <option value="Others" <?= $library->kategori == 'Others' ? 'selected' : '' ?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required="" value="<?= $library->judul ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Nama Pengarang" required="" value="<?= $library->pengarang ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Tahun Terbit" required="" value="<?= $library->tahun_terbit ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre" required="" value="<?= $library->genre ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 100px" id="deskripsi" name="deskripsi" required="" placeholder="Deskripsi Singkat"><?= $library->deskripsi ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="gambar" class="col-sm-2 col-form-label">Gambar </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="gambar" name="gambar">
                                        <small><b>Kosongkan jika tidak ingin merubah gambar e-library.</b></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="gambar" class="col-sm-2 col-form-label">File </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="file" name="file">
                                        <small><b>Kosongkan jika tidak ingin merubah file e-library (Format PDF).</b></small>
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