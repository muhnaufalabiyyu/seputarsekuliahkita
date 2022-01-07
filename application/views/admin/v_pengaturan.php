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
                            <form method="post" action="<?= base_url('admin/pengaturan/simpan'); ?>" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="nama_web" class="col-sm-2 col-form-label">Nama Website</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_web" name="nama_web" placeholder="Nama Website" required="" value="<?= @$pengaturan->nama_web ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="deskripsi_web" class="col-sm-2 col-form-label">Deskripsi Website</label>
                                    <div class="col-sm-10">
                                        <textarea  class="form-control" id="deskripsi_web" name="deskripsi_web" placeholder="Deskripsi Website" required=""><?= @$pengaturan->deskripsi_web ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat_web" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea  class="form-control" id="alamat_web" name="alamat_web" placeholder="Alamat Website" required=""><?= @$pengaturan->alamat_web ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required="" value="<?= @$pengaturan->email ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="no_kontak" class="col-sm-2 col-form-label">Nomor Kontak</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_kontak" name="no_kontak" placeholder="Nomor Kontak" required="" value="<?= @$pengaturan->no_kontak ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="logo" class="col-sm-2 col-form-label">Logo </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="logo" name="logo">
                                        <small><b>Kosongkan jika tidak ingin merubah</b></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="logo_header" class="col-sm-2 col-form-label">Logo Header</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="logo_header" name="logo_header">
                                        <small><b>Kosongkan jika tidak ingin merubah</b></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="favicon" class="col-sm-2 col-form-label">Favicon</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="favicon" name="favicon">
                                        <small><b>Kosongkan jika tidak ingin merubah</b></small>
                                    </div>
                                </div>
                                <!-- <div class="row mb-3">
                                    <label for="embed" class="col-sm-2 col-form-label">Embed Lokasi Maps</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="embed" name="embed" placeholder="Embed Lokasi Maps" required="" rows="5"><?= @$pengaturan->embed ?></textarea>
                                    </div>
                                </div> -->
                                <div class="row mb-3">
                                    <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" required="" value="<?= @$pengaturan->facebook ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="no_kontak" class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" required="" value="<?= @$pengaturan->instagram ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter" required="" value="<?= @$pengaturan->twitter ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin" required="" value="<?= @$pengaturan->linkedin ?>">
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