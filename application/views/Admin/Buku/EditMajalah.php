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
                            <h6 class="m-0 font-weight-bold text-primary">Edit Majalah</h6>
                            <?php foreach ($buku as $b) : ?>
                                <!-- <center>
                                    <img height="75" width="175" src="<?= base_url("BukuController/Barcode/") . $b->kode_buku ?>" alt="">
                                </center> -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">



                                <form action="<?= base_url('BukuController/edit_buku') ?>" enctype="multipart/form-data" method="POST">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Judul Majalah</label>
                                        <input type="hidden" name="id_buku" value="<?= $b->id_buku ?>">
                                        <input type="text" class="form-control" name="judul_buku" value="<?= $b->judul_buku ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputCity">Penulis E-Book</label> -->
                                        <input type="hidden" class="form-control" name="penulis_buku" value="<?= $b->penulis_buku ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Penerbit Majalah</label>
                                        <input type="text" class="form-control" name="penerbit_buku" value="<?= $b->penerbit_buku ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Edisi Majalah</label>
                                        <input type="text" class="form-control" name="edisi_majalah" value="<?= $b->edisi_majalah ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Tahun Terbit</label>
                                        <input type="number" class="form-control" name="tahun_terbit" value="<?= $b->tahun_terbit ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputCity">Sinopsis</label> -->
                                        <!-- <textarea type="hidden" class="form-control" name="sinopsis"><?= $b->sinopsis ?></textarea> -->
                                        <input type="hidden" class="form-control" name="sinopsis">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Sampul Majalah</label>
                                        <input type="file" class="form-control" name="sampul_buku">
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <label for="inputCity">File E-Book</label>
                                        <input type="file" class="form-control" name="sampul_buku">
                                    </div> -->
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Rak Buku</label>
                                        <input type="text" class="form-control" name="rak_buku" value="<?= $b->rak_buku ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Stok Majalah</label>
                                        <input type="text" class="form-control" name="stok_buku" value="<?= $b->stok_buku ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" class="form-control" name="stok_buku">
                                        <!-- <input type="hidden" class="form-control" name="rak_buku"> -->
                                        <!-- <input type="hidden" class="form-control" name="edisi_majalah"> -->
                                    </div>
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