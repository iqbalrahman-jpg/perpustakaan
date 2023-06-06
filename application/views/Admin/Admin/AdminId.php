                <!-- Begin Page Content -->

                <div class="container-fluid">



                    <!-- Page Heading -->

                    <a href="<?= base_url('AdminController/index') ?>" class="btn btn-danger btn-icon-split">

                        <span class="icon text-white-50">

                            <i class="fas fa-reply"></i>

                        </span>

                        <span class="text">Kembali</span>

                    </a>



                    <div class="my-2"></div>

                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">

                            <h6 class="m-0 font-weight-bold text-primary">Detail Admin</h6>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">



                                <?php foreach ($detail as $ad) : ?>



                                    <form action="<?= base_url('AdminController/edit_admin') ?>" enctype="multipart/form-data" method="POST">
					<div class="row">
					<div class="col">
                                        <div class="form-group col">

                                            <label for="inputCity">Nama</label>

                                            <input type="text" class="form-control" readonly name="nama_admin" value="<?= $ad->nama_admin ?>">

                                        </div>

                                        <div class="form-group col">

                                            <label for="inputCity">Email</label>

                                            <input type="email" class="form-control" readonly name="email_admin" value="<?= $ad->email_admin ?>">

                                        </div>

                                        <div class="form-group col">

                                            <label for="inputCity">No Telepon</label>

                                            <input type="number" class="form-control" readonly name="no_telp_admin" value="<?= $ad->no_telp_admin ?>">

                                        </div>

                                        <div class="form-group col">

                                            <label for="inputCity">Alamat</label>

                                            <input type="text" class="form-control" readonly name="alamat_admin" value="<?= $ad->alamat_admin ?>">

                                        </div>
					</div>

				<div class="col-sm">
                                        <div class="form-group col-md-6">
					<label for="inputCity">Foto Profile</label>
                                            <center>

                                                <tr>

                                                    <td>
 						    
                                                    <img class="rounded-square" src="<?= base_url()?>/upload/<?= $ad->foto_admin?>" heigt="263" width="243">

                                                    </td>

                                                </tr>

                                            </center>

                                	</div>
				</div>
				</div>

                                </div>

                                        </tabel>

                                </div>

                                </div>

                                </div>

                                    </form>

                                <?php endforeach ?>

                            </div>

                        </div>

                    </div>



                </div>

                <!-- /.container-fluid -->

                

                <!-- Footer  -->

                <!-- <footer class="sticky-footer bg-white">

                    <div class="container my-auto">

                        <div class="copyright text-center my-auto">

                            <span>Copyright &copy; Your Website 2020</span>

                        </div>

                    </div>

                </footer> -->

                <!-- End of Footer -->

            </div>

                </div>

                <!-- End of Main Content -->





                </div>

                <!-- End of Content Wrapper -->