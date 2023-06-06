
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>                    
                    <!-- <a href="<?= base_url('MemberController/add_member_view') ?>" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Peminjaman</span>
                    </a> -->
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Peminnjaman <?= $user['nama_member']; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                            
                                            <th>Buku</th>
                                            <th>Tgl Peminjaman</th>                                            
                                            <th>Tanggal Pengembalian</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>     
                                    <?php 
                                        $no=1;
                                        foreach($peminjaman as $pj) : ?>                                   
                                            <tr>
                                                <td><?= $no++?></td>
                                                <td><?php echo $pj->judul_buku;?></td>
                                                <td><?php echo $pj->tgl_peminjaman;?></td>
                                                <td><?php echo $pj->tgl_pengembalian;?></td>                                                
                                                
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