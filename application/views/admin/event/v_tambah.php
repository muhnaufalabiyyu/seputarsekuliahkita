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
                            <form method="post" action="<?= base_url('admin/event/simpan'); ?>" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="Kategori" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kategori" name="kategori" required="">
                                            <option value="">----Pilih Kategori ----</option>
                                            <option value="Webinar">Webinar</option>
                                            <option value="Workshop">Workshop</option>
                                            <option value="Social Activity">Social Activity</option>
                                            <option value="Training">Training</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="judul" class="col-sm-2 col-form-label">Nama Event</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Nama Event" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgl" class="col-sm-2 col-form-label">Tanggal & Waktu</label>
                                    <div class="col-sm-4">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" id="tgl" name="tgl"required="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Waktu Mulai</label>
                                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Waktu Selesai</label>
                                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="judul" class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Event" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="judul" class="col-sm-2 col-form-label">Nomor Kontak</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_kontak" name="no_kontak" placeholder="Nomor Kontak" required="" onkeypress="return hanyaAngka(event)">
                                        <small><b>Contoh : 6281xxxxxxxxx</b></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="judul" class="col-sm-2 col-form-label">Link Registrasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="link_register" name="link_register" placeholder="Link Registrasi" required="">
                                        <small><b>Contoh : www.google.com atau https://www.instagram.com/sekut/</b></small>
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