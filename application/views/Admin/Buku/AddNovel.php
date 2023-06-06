                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <a type="button" class="btn btn-danger" href="<?= base_url('BukuController/index') ?>">
                        <span class="icon text-white-50">
                            <i class="fas fa-reply" aria-hidden="true">
                        </span>
                        <span class="text">Kembali</span>
                    </a> -->
                    <a href="<?= base_url('BukuController/index') ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-reply"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="modal-body">
                                <a href="<?= base_url('BukuController/add_view_majalah') ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Majalah</span>
                                </a>
                                <a href="<?= base_url('BukuController/add_view_komik') ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Komik</span>
                                </a>
                                <a href="<?= base_url('BukuController/add_view_novel') ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Novel</span>
                                </a>
            </div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Novel</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action=<?php echo base_url() . 'BukuController/add_buku'; ?> enctype="multipart/form-data" method="POST">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Judul Buku</label>
                                        <input type="text" class="form-control" name="judul_buku" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Penulis Buku</label>
                                        <input type="text" class="form-control" name="penulis_buku" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Penerbit Buku</label>
                                        <input type="text" class="form-control" name="penerbit_buku" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Tahun Terbit</label>
                                        <input type="number" class="form-control" name="tahun_terbit" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Sinopsis</label>
                                        <textarea type="text" class="form-control" name="sinopsis"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Stok Buku</label>
                                        <input type="number" class="form-control" name="stok_buku">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Cover</label>
                                        <input type="file" class="form-control" name="sampul_buku">
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <label for="inputCity">Upload File</label>
                                        <input type="file" class="form-control" name="file_ebook">
                                    </div> -->
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputCity"></label> -->
                                        <input type="hidden" class="form-control" name="jenis_buku" value="Novel">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputCity"></label> -->
                                        <input type="hidden" class="form-control" name="edisi_majalah" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputCity"></label> -->
                                        <input type="hidden" class="form-control" name="rak_buku" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputCity"></label> -->
                                        <input type="hidden" class="form-control" name="stok_buku" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Tanggal Buku Masuk</label>
                                        <input type="date" class="form-control date" name="tanggal_masuk">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">ISBN</label>
                                        <input type="text" class="form-control" name="isbn" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Kode Buku</label>
                                        <div class="input-group-prepend">
                                            <input type="text" id="kodeBuku" class="form-control" name="kode_buku" required>
                                            <a class="btn btn-sm btn-primary" id="generateNumber" onclick="generateNumber()"><i class="fa fa-barcode"></i></a>
                                        </div>
                                    </div>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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


                <script type="text/javascript">
                    function generateNumber() {
                        document.getElementById("kodeBuku").value = Math.floor(Math.random() * 100000000);
                    }
                </script>
                <script>
                    $(document).ready(function() {
                        $('.datepicker').datepicker({
                            format: 'yyyy-mm-dd',
                            autoclose: true,
                            todayHighlight: true,
                        });
                    });
                </script>