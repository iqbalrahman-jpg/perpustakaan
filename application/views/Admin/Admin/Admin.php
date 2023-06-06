                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Admin</h1>
                    <a href="<?= base_url('AdminController/add_view') ?>" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Admin</span>
                    </a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <!-- <th>Password</th> -->
                                            <!-- <th>No Telepon</th> -->
                                            <!-- <th>Alamat</th> -->
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $no=1;
                                        foreach($admin as $ad) : ?>
                                            <tr>
                                                <td><?= $no++?></td>
                                                <td><?= $ad->nama_admin?></td>
                                                <td><?= $ad->email_admin?></td>
                                                <!-- <td><?= $ad->password_admin?></td> -->
                                                <!-- <td><?= $ad->no_telp_admin?></td> -->                                               
                                                <!-- <td><?= $ad->alamat_admin?></td> -->
                                                <td>
                                                    <img src="<?= base_url()?>/upload/<?= $ad->foto_admin?>" heigt="150" width="120">
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('AdminController/edit_view/') . $ad->id_admin ?>" type="button" class="btn btn-primary"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                                    <a href="<?= base_url("AdminController/get_id_admin/") . $ad->id_admin ?>" type="button" class="btn btn-warning"><i class="fas fa-eye" aria-hidden="true"></i></a>
                                                    <!-- <a href="<?= base_url('AdminController/delete_admin/') . $ad->id_admin ?>" type="button" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a> -->
                                                </td>                                          
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->