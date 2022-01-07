<section class="elibrary">
    <div class="container">
      <div class="row">
          <div class="col-12 col-md-6">
              <h1 style="font-family: poppins;font-size: 52px;padding-top: 75px;width: 508px; color: #005A8D; font-weight: 500">Pengaduan</h1>
              <h1 style="font-family: poppins;font-size: 52px;padding-top: 0px; color: #005A8D; font-weight: 500">Masalah</h1><br><hr style="width: 50%;">
              <p style="font-size: 18px;font-family: Poppins, sans-serif;padding-top: 35px;">Pengaduan Masalah adalah suatu bentuk partisipasi<br>mahasiswa agar penyedia layanan perguruan tinggi<br>dapat menampung keluhan berupa kritik dan saran<br>dari mahasiswa.</p>
          </div>
          <div class="col-12 col-md-6">
              <section class="register-photo">
                  <div class="form-container">
                     
                    <?php if ($this->session->flashdata('message')): ?>    
                    <div class="container mt-3">        
    				    <div class="alert alert-success alert-dismissible fade show" role="alert">
    					    <?php echo $this->session->flashdata('message'); ?>
    					    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    				    </div>
                    </div>
    				<?php endif; ?>
    				
    				
                      <form method="post" action="<?= base_url('pengaduan/simpan') ?>" enctype="multipart/form-data">
                          <p>Jenis Pengaduan</p>
                          <div class="mb-3">
                            <select class="form-select" id="jenis" name="jenis" required="">
                                            <option value="">----Pilih Jenis Aduan ----</option>
                                            <option value="Kampus">Kampus</option>
                                            <option value="Website">Website Kampus</option>
                                            <option value="lain-lain">Lain- lain</option>
                            </select>
                          </div>
                          <p>Angkatan</p>
                          <div class="mb-3">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="angkatan" value="2017">
                              <label class="form-check-label" for="inlineRadio1">2017</label>
                            </div>
                            
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="angkatan" value="2018">
                              <label class="form-check-label" for="inlineRadio2">2018</label>
                            </div>
                            
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="angkatan" value="2019">
                              <label class="form-check-label" for="inlineRadio3">2019</label>
                            </div>
                            
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="angkatan" value="2020">
                              <label class="form-check-label" for="inlineRadio4">2020</label>
                            </div>
                            
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="angkatan" value="2021">
                              <label class="form-check-label" for="inlineRadio5">2021</label>
                            </div>
                            
                            
                          </div>
                          <p>Isi</p>
                          <div class="mb-3">
                            <textarea class="form-control" required name="aduan"></textarea>
                          </div>      
                          <p>Berkas</p>
                          <div class="mb-3">
                            <input class="form-control" type="file" name="berkas" placeholder="" />
                          </div>
                          <br>
                          <div class="mb-3" style="width: 30%; position: static"
                          ><button type="submit" class="btn btn-primary d-block w-100" type="submit" style="width: 343px;height: 46px; border-radius: 5px;">Send</button>
                        </div>
                      </form>
                  </div>
              </section>
          </div>
      </div>
  </div>
</section>