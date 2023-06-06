                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Laporan Buku</h1>
                    <!-- <a href="<?= base_url('BukuController/add_view') ?>" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Buku</span>
                    </a> -->
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table Buku</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group col">
                                            <label>Pilih Buku</label>
                                            <select class="form-control jenis-buku" name="">
                                                <option>-- Pilih --</option>
                                                <option value="laki-laki">E-Book</option>
                                                <option value="perempuan">Buku</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="card-body"></div>
                                    <div class="form-group rec-element">
                                        <div class="container align-items-center">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="inputMulaiTanggal" class="font-weight-bold">Tanggal :</label>
                                                        <input type="date" id="inputMulaiTanggal" name="mulai_tanggal" class="form-control" name="tgl_pemasukan" required>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label>
                                                        <input type="date" id="inputSampaiTanggal" name="sampai_tanggal" class="form-control" name="tgl_pemasukan" required>
                                                    </div>
                                                    <button type="submit" class="col btn btn-success mt-3">Tampilkan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Kode Buku</th> -->
                                            <th>Judul Buku</th>
                                            <th>Penulis Buku</th>
                                            <th>Penerbit Buku</th>
                                            <th>Tahun Terbit</th>
                                            <th>Stok Buku</th>
                                            <!-- <th>Sampul Buku</th> -->
                                            <th>Jenis Buku</th>
                                            <!-- <th>Rak Buku</th> -->
                                            <!-- <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($buku as $b) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <!-- <td>
                                                    <img height="75" width="175" src="<?= base_url("BukuController/Barcode/") . $b->kode_buku ?>" alt="">
                                                </td> -->
                                                <td><?= $b->judul_buku ?></td>
                                                <td><?= $b->penulis_buku ?></td>
                                                <td><?= $b->penerbit_buku ?></td>
                                                <td><?= $b->tahun_terbit ?></td>
                                                <td><?= $b->stok_buku ?></td>
                                                <!-- <td><img height="150" width="120" src="<?= base_url() ?>assets/upload/cover/<?= $b->sampul_buku ?>"></td> -->
                                                <td><?= $b->jenis_buku ?></td>
                                                <!-- <td><?= $b->rak_buku ?></td> -->
                                                <!-- <td>
                                                    <a href="<?= base_url("BukuController/detail_buku/") . $b->id_buku ?>" type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="<?= base_url("BukuController/edit_buku_view/") . $b->id_buku ?>" type="button" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                                    <a href="<?= base_url("BukuController/delete_buku/") . $b->id_buku ?>" type="button" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                                </td> -->
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