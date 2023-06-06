                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Buku</h1>
                    <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#myModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </button>
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table Buku</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Buku</th>
                                            <!-- <th>Judul Buku</th> -->
                                            <th>Stok Buku</th>
                                            <th>Sampul Buku</th>
                                            <th>Jenis Buku</th>
                                            <!-- <th>Rak Buku</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- memanggil data buku -->
                                        <?php
                                        $no = 1;
                                        foreach ($buku as $b) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <!-- <img height="75" width="175" src="<?= base_url("BukuController/Barcode/") . $b->kode_buku ?>" alt=""> -->
                                                    <?php echo $b->kode_buku ?>
                                                </td>
                                                <td><?= $b->judul_buku ?></td>
                                                <!-- <td><?= $b->stok_buku ?></td> -->
                                                <td><img height="150" width="120" src="<?= base_url() ?>assets/upload/cover/<?= $b->sampul_buku ?>"></td>
                                                <td><?= $b->jenis_buku ?></td>
                                                <!-- <td><?= $b->rak_buku ?></td> -->
                                                <td>
                                                    <a href="<?= base_url("BukuController/detail_buku/") . $b->id_buku ?>" type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="<?= base_url("BukuController/edit_buku_view/") . $b->id_buku ?>" type="button" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                                    <!-- <a href="<?= base_url("BukuController/cetak_barcodebuku/") . $b->id_buku ?>" type="button" class="btn btn-info" alt="Cetak Barcode Buku"><i class="fas fa-barcode" aria-hidden="true"></i></a> -->
                                                    <a href="<?= base_url("BukuController/delete_buku/") . $b->id_buku ?>" type="button" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title">Pilih Jenis Buku yang akan di tambahkan :</h4>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                                <a href="<?= base_url('BukuController/add_view_buku') ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Buku Umum</span>
                                </a>
                                <!-- <a href="<?= base_url('BukuController/add_view_komik') ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Komik</span>
                                </a> -->
                                <a href="<?= base_url('BukuController/add_view_tugasakhir') ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Tugas Akhir</span>
                                </a>
                                <a href="<?= base_url('BukuController/add_view_pkl') ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Laporan PKL</span>
                                </a>
                                <a href="<?= base_url('BukuController/add_view_majalah') ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Hiburan </span>
                                </a>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>