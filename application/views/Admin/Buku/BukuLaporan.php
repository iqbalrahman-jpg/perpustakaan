<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- <a href="" class="btn btn-success btn-icon-split" data-toggle="modal" data-target=".bd-example-modal-lg">

        <span class="icon text-white-50">

            <i class="fas fa-save"></i>

        </span>

        <span class="text">Simpan</span>

    </a> -->

    <br>

    <!--Form Tambah Buku -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Filter Buku Masuk</h6>

        </div>

        <div class="card-body">

            <div class="container">

                <!-- View Laporan Buku Masuk -->

                <form action="<?= base_url("BukuController/search"); ?>" method="post">

                    <div class="form-row">
                            <div class="form-group col-md-6">

                                <label for="inputMulaiTanggal" class="font-weight-bold">Tanggal :</label>

                                <input type="date" id="inputMulaiTanggal" name="first_date" class="form-control date" required>

                            </div>

                            <div class="form-group col-md-6">

                                <label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label>

                                <input type="date" id="inputSampaiTanggal" name="second_date" class="form-control date" required>

                            </div>

                            

                      

                    </div>
		   <div class="form-group col-md-12">

                   <!-- <label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label> -->

                   <input type="submit" name="search" value="Cari" class="btn btn-primary form-control" required>

                   </div>

                </form>

                <!-- End Form Pinjam Buku -->

            </div>

        </div>





    </div>



    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Laporan Buku Masuk</h6>

        </div>

        <div class="card-body">

            <!-- Tabel Pinjam Buku -->

            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>



                        <tr>

                            <th>No</th>

                            <th>Kode Buku</th>

                            <th>Judul Buku</th>

                            <th>Penulis Buku</th>

                            <th>Penerbit Buku</th>

                            <th>Tahun Terbit</th>

                            <th>Stok Buku</th>

                            <th>Jenis Buku</th>

                            <th>Tanggal Buku Masuk</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $no = 1;

                        foreach ($buku as $b) : ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= $b->kode_buku ?></td>

                                <td><?= $b->judul_buku ?></td>

                                <td><?= $b->penulis_buku ?></td>

                                <td><?= $b->penerbit_buku ?></td>

                                <td><?= $b->tahun_terbit ?></td>

                                <td><?= $b->stok_buku ?></td>

                                <td><?= $b->jenis_buku ?></td>

                                <td><?= $b->tanggal_masuk ?></td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>



            <!-- End Tabel Pinjam Buku -->

        </div>





    </div>





</div>



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