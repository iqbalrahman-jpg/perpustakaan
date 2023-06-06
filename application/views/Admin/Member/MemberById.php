                <!-- Detail Member  -->
                
                <!-- Begin Page Content -->

                <div class="container-fluid">



                    <!-- Page Heading -->

                    <!-- <a type="button" class="btn btn-danger" href="<?= base_url('MemberController/index') ?>">Kembali</a>            -->

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

                            <h6 class="m-0 font-weight-bold text-primary">Detail Member</h6>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                              <?php foreach($detail as $dt) : ?>

                                <form action="<?= base_url('MemberController/edit_member') ?>" enctype="multipart/form-data" method="POST">

				<div class="row">
 				  <div class="col">                                       
				      <div class="form-group col-md-6">

                                        <center>

                                            <tr>

                                               <td>                                                  

                                                   <img src="<?= base_url() ?>./assets/upload/foto_member/<?= $dt->foto_member ?>" alt="" height="200" width="170">

                                                    <br><br>

                                                    <img height="75" width="175" src="<?= base_url("MemberController/Barcode/") . $dt->kode_member ?>" alt="">

                                                    </td>

                                                    </tr>                                                

                                                </center>

                                        </div>
 					</div> 
 					</div>                                         

                 <div class="row">
 				  <div class="col"> 
                                        <div class="form-group col-md-6">

                                            <label for="inputCity">Kode</label>                      

                                            <input type="text" class="form-control" name="kode_member" value="<?= $dt->kode_member ?>" readonly>

                                        </div>

                                        <div class="form-group col-md-6">
<label for="inputCity">NIM</label>

<input type="text" class="form-control" name="nim_member" value="<?= $dt->nim_member ?>" readonly>

</div>

                                         <div class="form-group col-md-6">

                                            <label for="inputCity">Nama</label>

                                            <input type="text" class="form-control" name="nama_member" value="<?= $dt->nama_member ?>" readonly>

                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="inputCity">Nama</label>

                                            <input type="text" class="form-control" name="nama_member" value="<?= $dt->nama_member ?>" readonly>

                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="inputCity">No Telfon</label>

                                            <input type="number" class="form-control" name="no_telp_member" value="<?= $dt->no_telp_member ?>" readonly>

                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="inputCity">Alamat</label>

                                            <input type="text" class="form-control" name="alamat_member" value="<?= $dt->alamat_member ?>" readonly>

                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="inputCity">Email</label>

                                            <input type="email" class="form-control" name="email_member" value="<?= $dt->email_member ?>" readonly>

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