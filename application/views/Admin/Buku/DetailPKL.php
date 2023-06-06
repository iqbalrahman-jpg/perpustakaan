                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a href="<?= base_url('BukuController/index') ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-reply"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                    <!-- Page Heading -->
                    <div class="my-2"></div> 
                    <!-- DataTales Example -->
                    <?php foreach ($buku as $b) : ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">

                                <center>
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $b->judul_buku ?></h6><br>
                                    <!-- <img height="75" width="175" src="<?= base_url("BukuController/Barcode/") . $b->kode_buku ?>" alt=""> -->
                                    <td>
                                        <img src="<?= base_url() ?>./assets/upload/cover/<?= $b->sampul_buku ?>" alt="" height="250" width="220">
                                    </td>
                                </center>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">



                                    <form action="<?= base_url('BukuController/edit_buku') ?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Kode Buku</label>
                                            <input type="hidden" name="id_buku" value="<?= $b->id_buku ?>">
                                            <input type="text" class="form-control" readonly name="kode_buku" value="<?= $b->kode_buku ?>">
                                        </div>
                                        <!-- <div class="form-group col-md-6">
                                            <label for="inputCity">Judul Buku</label>
                                            <input type="text" class="form-control" readonly name="judul_buku" value="<?= $b->judul_buku ?>">
                                        </div> -->
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Penulis Laporan PKL</label>
                                            <input type="text" class="form-control" readonly name="penulis_buku" value="<?= $b->penulis_buku ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">NIM Penulis</label>
                                            <input type="text" class="form-control" readonly name="nim_penulis" value="<?= $b->nim_penulis ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Tahun Terbit</label>
                                            <input type="number" class="form-control" readonly name="tahun_terbit" value="<?= $b->tahun_terbit ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Abstrak</label>
                                            <textarea type="text" class="form-control" readonly name="sinopsis"><?= $b->sinopsis ?></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Jenis Buku</label>
                                            <input type="text" class="form-control" readonly name="jenis_buku" value="<?= $b->jenis_buku ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Rak Buku</label>
                                            <input type="text" class="form-control" readonly name="rak_buku" value="<?= $b->rak_buku ?>">
                                        </div>
                                        <!-- <div class="form-group col-md-6">
                                            <tr><label for="inputCity">Sampul Buku</label><br></tr>
                                            <input type="file" class="form-control" name="sampul_buku"> -->
                                        <!-- <center>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url() ?>./assets/upload/cover/<?= $b->sampul_buku ?>" alt="" height="250" width="220">
                                                </td>
                                            </tr>
                                        </center> -->
                                        <!-- </div> -->
                                    </form>
                                <?php endforeach ?>
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