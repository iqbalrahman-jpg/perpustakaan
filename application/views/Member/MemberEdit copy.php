                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="<?= base_url('MemberController/index') ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-reply"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>

                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Member</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <?php foreach ($member as $mb) : ?>

                                    <form action="<?= base_url('MemberController/edit_member') ?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Kode</label>
                                            <input type="hidden" name="id_member" value="<?= $mb->id_member ?>">
                                            <input type="text" class="form-control" name="kode_member" value="<?= $mb->kode_member ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Nama</label>
                                            <input type="text" class="form-control" name="nama_member" value="<?= $mb->nama_member ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">No Telfon</label>
                                            <input type="number" class="form-control" name="no_telp_member" value="<?= $mb->no_telp_member ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Alamat</label>
                                            <input type="text" class="form-control" name="alamat_member" value="<?= $mb->alamat_member ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Email</label>
                                            <input type="email" class="form-control" name="email_member" value="<?= $mb->email_member ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Password</label>
                                            <input type="password" class="form-control" name="password_member">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Foto Profil</label>
                                            <input type="file" class="form-control" name="foto_member">
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