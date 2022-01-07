<!--- Footer -->
  <footer id="footer" class="footer">
    <?php
            $pengaturan = $this->db->get_where('pengaturan', ['id !=' => '0'])->row();
            ?>
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
              <span><?= @$pengaturan->nama_web ?></span>
            </a>
            <br>
            <p><?= @$pengaturan->deskripsi_web ?></p>
            <br>
            <div class="social-links mt-3">
              <a href="<?= @$pengaturan->twitter ?>" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="<?= @$pengaturan->facebook ?>" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="<?= @$pengaturan->instagram ?>" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="<?= @$pengaturan->linkedin ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('artikel') ?>">Artikel</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('event') ?>">Events</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('news') ?>">News</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('e-library') ?>">E-library</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="http://e-learning.stmi.ac.id" target="_blank">E-Learning</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="http://pjj.stmi.ac.id" target="_blank">Pembelajaran Jarak Jauh</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-6 footer-links">
            <h4>Contact Us</h4>
            <p>
              <?= @$pengaturan->alamat_web ?><br>
              <strong>Phone:</strong> <?= @$pengaturan->no_kontak ?> <br>
              <strong>Email:</strong> <?= @$pengaturan->email ?> <br>
            </p>
          </div>
          <div class="col-lg-2 col-6 footer-links">
          <?= @$pengaturan->embed ?>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?= @$pengaturan->nama_web ?></span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>

</html>