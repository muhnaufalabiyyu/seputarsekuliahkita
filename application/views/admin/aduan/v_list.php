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
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th width="10%">Berkas</th>
                                            <th width="15%">Jenis</th>
                                            <th width="10%">Angkatan</th>
                                            <th>Isi</th>
                                            <th width="17%">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($pengaduan as $i=>$pengaduan): ?>
                                        <tr>
                                            <td><?= $pengaduan->id; ?></td>
                                            <?php if($pengaduan->berkas != null) { ?>
                                            <td><a href="<?= base_url('assets/img/aduan/'); ?><?= $pengaduan->berkas; ?>">Lihat Disini</a></td>
                                            <?php } else { ?>
                                            <td>Tidak Ada Berkas</td>
                                            <?php } ?>
                                            <td><?= $pengaduan->jenis; ?></td>
                                            <td><?= $pengaduan->angkatan; ?></td>
                                            <td><?= $pengaduan->aduan; ?></td>
                                            <td><?= tanggal_indo($pengaduan->tgl_buat, true); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->