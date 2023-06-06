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
                			<h6 class="m-0 font-weight-bold text-primary">Edit Admin</h6>
                		</div>
                		<div class="card-body">
                			<div class="table-responsive">

                				<?php foreach ($admin as $ad) : ?>

                				<form action="<?php echo base_url(). 'AdminController/edit_admin'; ?>"
                					enctype="multipart/form-data" method="POST">
                					<div class="form-group col-md-6">
                						<label for="inputCity">Nama</label>
                						<input type="hidden" name="id_admin" value="<?= $ad->id_admin ?>">
                						<input type="text" class="form-control" name="nama_admin"
                							value="<?= $ad->nama_admin ?>">
                					</div>
                					<div class="form-group col-md-6">
                						<label for="inputCity">Email</label>
                						<input type="email" class="form-control" name="email_admin"
                							value="<?= $ad->email_admin ?>">
                					</div>
                					<!-- <div class="form-group col-md-6">
                                            <label for="inputCity">Password</label>
                                            <input type="password" class="form-control" name="password_admin"> -->
                			</div>
                			<div class="form-group col-md-6">
                				<label for="inputCity">No Telepon</label>
                				<input type="number" class="form-control" name="no_telp_admin"
                					value="<?= $ad->no_telp_admin ?>">
                			</div>
                			<div class="form-group col-md-6">
                				<label for="inputCity">Alamat</label>
                				<input type="text" class="form-control" name="alamat_admin"
                					value="<?= $ad->alamat_admin ?>">
                			</div>

                			<div class="form-group col-md-6">
                				<label for="inputCity">Foto Profil</label>
                				<input type="file" class="form-control" name="foto_admin">
                			</div>
                			<button type="submit" class="btn btn-primary">Submit</button>
                			</form>
                			<?php endforeach ?>
                		</div>
                	</div>
                </div>

                </div>
                <!-- /.container-fluid -->

                <footer class="sticky-footer bg-white">
                	<div class="container my-auto">
                		<div class="copyright text-center my-auto">
                			<span>Copyright &copy; Your Website 2020</span>
                		</div>
                	</div>
                </footer>
                </div>
                </div>
                </div>
                <!-- End of Main Content -->

                <!-- Footer  -->
                <!-- End of Content Wrapper -->
                <!-- End of Footer -->
