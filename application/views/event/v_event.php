  <?php if(@$_GET['category'] == null) { ?>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="margin-top: 2.5cm;">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url() ?>assets/img/event/slide1.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url() ?>assets/img/event/slide2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url() ?>assets/img/event/slide3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container">
    <div class="judul type"> 
      <p>Event Type<p> 
    </div>
    <div class="kotak">
      <div class="kartu event">  
        <img src="<?= base_url() ?>assets/img/event/icon1.png" alt="">
        <h6> Webinar </h6>
        <a href="<?= base_url('event') ?>?category=Webinar" class="stretched-link"></a>
      </div>
      <div class="kartu event">  
        <img src="<?= base_url() ?>assets/img/event/icon2.png"alt="">
        <h6> Workshop</h6>
        <a href="<?= base_url('event') ?>?category=Workshop" class="stretched-link"></a>
      </div>
      
      <div class="kartu event">  
        <img src="<?= base_url() ?>assets/img/event/icon3.png" alt="">
        <h6> Social Activity</h6>
        <a href="<?= base_url('event') ?>?category=Social Activity" class="stretched-link"></a>
      </div>
      <div class="kartu event">  
        <img src="<?= base_url() ?>assets/img/event/icon4.png" alt="">
        <h6> Training </h6>
        <a href="<?= base_url('event') ?>?category=Training" class="stretched-link"></a>
      </div>
    </div>
  
  <div class="judul">
      <p> Upcoming Event</p>
      <p class="kap"> Looking for new event? Save the date !</p>
    </div>
  <div class="container" style="margin-bottom: 2cm;">
     <div class="col-12 h-100">
    <div class="row d-flex justify-content-center">
          <?php foreach($event as $i=>$event): ?>
          <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 pt-2" style="height:660px" >
          <div class="card h-100">
            <?php if($event->gambar != null) { ?>
            <img class="card-img-top w-100 d-block" src="<?= base_url('assets/img/event/'); ?><?= $event->gambar; ?>" width="100" height="300">
            <?php } else { ?>
            <img src="<?= base_url('assets/img/'); ?>no-image.jpg" class="card-img-top w-100 d-block" width="100" height="300">
            <?php } ?>
            <div class="card-body">
                <ul>
                    <li>Day/date : <?= tanggal_indo($event->tgl, false, true); ?> </li>
                    <li>Time     : <?= substr($event->jam_mulai, 0, 5); ?>-<?= substr($event->jam_selesai, 0, 5); ?> WIB</li>
                    <li>Location : <?= $event->lokasi; ?></li>
                </ul>
            </div>
            <div class="text-center pb-3">
                <a class="btn btn-primary" href="<?= $event->link_register; ?>" role="button" style="font-size:15px; width: 70%;margin-top: 25px;">Registration</a>
                <a class="btn btn-primary" href="https://wa.me/<?= $event->no_kontak; ?>" role="button" style="font-size:15px; width: 70%;margin-top: 10px;">Contact Us</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>  
    </div>
    </div>
    </div>
    <?php } else {?>
     <div class="container" style="margin-top: 3cm; margin-bottom: 2cm;">
         <div class="judul">
          <p><?= $_GET['category'] ?></p>
          <p class="kap"> Looking for <?= $_GET['category'] ?>? Save the date !</p>
        </div>
     <div class="col-12 h-100">
    <div class="row d-flex justify-content-center">
          <?php foreach($event as $i=>$event): ?>
          <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 pt-2" style="height:660px" >
          <div class="card h-100">
            <?php if($event->gambar != null) { ?>
            <img class="card-img-top w-100 d-block" src="<?= base_url('assets/img/event/'); ?><?= $event->gambar; ?>" width="100" height="300">
            <?php } else { ?>
            <img src="<?= base_url('assets/img/'); ?>no-image.jpg" class="card-img-top w-100 d-block" width="100" height="300">
            <?php } ?>
            <div class="card-body">
                <ul>
                    <li>Day/date : <?= tanggal_indo($event->tgl, false, true); ?> </li>
                    <li>Time     : <?= substr($event->jam_mulai, 0, 5); ?>-<?= substr($event->jam_selesai, 0, 5); ?> WIB</li>
                    <li>Location : <?= $event->lokasi; ?></li>
                </ul>
            </div>
            <div class="text-center pb-3">
                <a class="btn btn-primary" href="<?= $event->link_register; ?>" role="button" type="button" style="font-size:15px; width: 70%;margin-top: 25px;">Registration</a>
                <a class="btn btn-primary" href="https://wa.me/<?= $event->no_kontak; ?>" role="button" type="button" style="font-size:15px; width: 70%;margin-top: 10px;">Contact Us</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>  
    </div>
    </div>
    </div>

  
<?php } ?>
