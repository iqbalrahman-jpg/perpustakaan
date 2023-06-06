<div class="container-fluid">



    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h1 mb-0 text-gray-700">
            <center>Selamat Datang di Reading Corner Bahasa Komunikasi dan Pariwisata Politeknik Negeri Jember</center>
        </h1>

        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

    </div>



    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-40 col-md-50 mb-4">

            <div class="card border-Under-warning shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 mb-0 text-yellow-700">
                                <center>
                                    Reading Corner Bahasa Komunikasi dan Pariwisata Politeknik Negeri Jember merupakan sebuah ruang baca dimana mahasiswa dapat melakukan peminjaman buku untuk dibaca didalam ruangan maupun untuk dibaca diluar ruangan berdasarkan Prosedur Operasional Standart yang berlaku<br> <br>
                                    “There is a crime worse than burning books. One of them is not reading book”. -Joseph Bordsky </center>
                            </div>

                            <div class="my-2"></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">




        <!-- Earnings (Monthly) Card Example -->

        <div class="col-xl-4 col-md-6 mb-4">

            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                User Admin</div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin ?></div>

                            <div class="my-2"></div>

                            <a href="<?= base_url('AdminController/index') ?>" class="btn btn-light btn-icon-split">

                                <span class="icon text-gray-600">

                                    <i class="fas fa-arrow-right"></i>

                                </span>

                                <span class="text">Ke Halaman Admin</span>

                            </a>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-user-edit fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- Earnings (Monthly) Card Example -->

        <div class="col-xl-4 col-md-6 mb-4">

            <div class="card border-left-success shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">

                                User Member</div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $member ?></div>

                            <div class="my-2"></div>

                            <a href="<?= base_url('MemberController/index') ?>" class="btn btn-light btn-icon-split">

                                <span class="icon text-gray-600">

                                    <i class="fas fa-arrow-right"></i>

                                </span>

                                <span class="text">Ke Halaman Member</span>

                            </a>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-users fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- Pending Requests Card Example -->

        <div class="col-xl-4 col-md-6 mb-4">

            <div class="card border-left-warning shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

                                Jumlah Buku Yang Tersedia</div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $buku ?></div>

                            <div class="my-2"></div>

                            <a href="<?= base_url('BukuController/index') ?>" class="btn btn-light btn-icon-split">

                                <span class="icon text-gray-600">

                                    <i class="fas fa-arrow-right"></i>

                                </span>

                                <span class="text">Ke Halaman Buku</span>

                            </a>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-book fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>