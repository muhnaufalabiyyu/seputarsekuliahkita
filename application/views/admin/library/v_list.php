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
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-md-12">
                                    <a href="<?= base_url('admin/e-library/tambah') ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah</span>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th width="15%">Gambar</th>
                                            <th>Judul</th>
                                            <th width="15%">Tanggal</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($library as $i=>$library): ?>
                                        <tr>
                                            <td><?= $library->id; ?></td>
                                            <?php if($library->gambar != null) { ?>
                                            <td><img src="<?= base_url('assets/img/library/'); ?><?= $library->gambar; ?>" width="150"></td>
                                            <?php } else { ?>
                                            <td><img src="<?= base_url('assets/img/'); ?>no-image.jpg" width="150"></td>
                                            <?php } ?>
                                            <td><?= $library->judul; ?></td>
                                            <td><?= tanggal_indo($library->tgl_buat, true); ?></td>
                                            <td><a href="<?= base_url(); ?>admin/library/edit/<?= $library->id; ?>" class="btn btn-sm btn-primary" style="color: white;">Edit</a> <a href="<?= base_url(); ?>admin/library/hapus/<?= $library->id; ?>" id="<?= $library->id; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->