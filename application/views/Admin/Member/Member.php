
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Member</h1>                    
                    <a href="<?= base_url('MemberController/add_member_view') ?>" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Member</span>
                    </a>
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTabel</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- tabel -->
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>                                            
                                            <th>Nama</th>
                                            <th>Email</th>                                            
                                            <!-- <th>Barcode</th> -->
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($member as $mb) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td> 
                                                <td><?= $mb->nim_member ?></td>                                             
                                                <td><?= $mb->nama_member ?></td>
                                                <td><?= $mb->email_member ?></td>                                            
                                                <!-- <td>
                                                    <img height="75" width="175" src="<?= base_url("MemberController/Barcode/") . $mb->kode_member ?>" alt="">
                                                </td> -->
                                                <td>
                                                    <img src="<?= base_url() ?>./assets/upload/foto_member/<?= $mb->foto_member ?>" alt="" height="150" width="120">
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('MemberController/edit_member_view/') . $mb->id_member ?>" type="button" class="btn btn-primary"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                                    <a href="<?= base_url('MemberController/get_id_member/') . $mb->id_member ?>"type="button" class="btn btn-warning" ><i class="fas fa-eye" aria-hidden="true"></i></a>
                                                    <!-- <a  type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#getIdMember"> <i class="fas fa-eye" aria-hidden="true"></i> </a> -->
                                                    <!-- <a href="<?= base_url('MemberController/delete_member/') . $mb->id_member ?>" type="button" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a> -->
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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