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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Buku</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <?php foreach ($buku as $b) : ?>

                                    <form action="<?= base_url('BukuController/edit_buku') ?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Kode Buku</label>
                                            <input type="hidden" name="id_buku" value="<?= $b->id_buku ?>">
                                            <input type="text" class="form-control" name="kode_buku" value="<?= $b->kode_buku ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Judul Buku</label>
                                            <input type="text" class="form-control" name="judul_buku" value="<?= $b->judul_buku ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Penulis Buku</label>
                                            <input type="text" class="form-control" name="penulis_buku" value="<?= $b->penulis_buku ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Penerbit Buku</label>
                                            <input type="text" class="form-control" name="penerbit_buku" value="<?= $b->penerbit_buku ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Tahun Terbit</label>
                                            <input type="number" class="form-control" name="tahun_terbit" value="<?= $b->tahun_terbit ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Sinopsis</label>
                                            <textarea type="text" class="form-control" name="sinopsis"><?= $b->sinopsis ?></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Stok Buku</label>
                                            <input type="number" class="form-control" name="stok_buku" value="<?= $b->stok_buku ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Sampul Buku</label>
                                            <input type="file" class="form-control" name="sampul_buku">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Jenis Buku</label>
                                            <select name="jenis_buku">
                                                <option value="E-Book">E-Book</option>
                                                <option value="Buku">Buku</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Rak Buku</label>
                                            <input type="text" class="form-control" name="rak_buku" value="<?= $b->rak_buku ?>">
                                        </div>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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