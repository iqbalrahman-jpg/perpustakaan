<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Reading Corner - Member</title>



    <!-- Custom fonts for this template -->

    <link href="<?= base_url() ?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    <!-- Custom styles for this template -->

    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">



    <!-- Custom styles for this page -->

    <link href="<?= base_url() ?>/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



    <link href="<?php echo base_url(); ?>/assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">



    <!-- DataTables Responsive CSS -->

    <link href="<?php echo base_url(); ?>/assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

    <script src="<?= base_url() ?>/assets/jquery/jquery.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>



    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>



</head>



<body id="page-top">



    <!-- Page Wrapper -->

    <div id="wrapper">



        <!-- Sidebar -->

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center">

                <div class="sidebar-brand-icon rotate-n-15">

                    <i class="fas fa-book"></i>

                </div>

                <div class="sidebar-brand-text mx-3">Reading Corner</div>

            </a>



            <!-- Divider -->

            <hr class="sidebar-divider my-0">



            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Member/Member/index') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

            <li class="nav-item">

                <a class="nav-link" href="<?= base_url('Member/Member/index');?>">

                    <i class="fas fa-fw fa-tachometer-alt"></i>

                    <span>Peminjaman</span></a>

            </li>



            <hr class="sidebar-divider my-0">



            <!-- <li class="nav-item">

                <a class="nav-link" href="<?= base_url('Member/EbookController/download');?>">

		    <i class="fas fa-file-download"></i>
                    <span>Download E-Book</span></a>

            </li> -->

            

            <!-- <li class="nav-item">

                <a class="nav-link" href="<?= base_url('Member/HistoryController/download_ebook');?>">

                    <i class="fas fa-history"></i>

                    <span>History Download</span></a>

            </li> -->



            

            <!-- Divider -->

            <hr class="sidebar-divider d-none d-md-block">



            <!-- Sidebar Toggler (Sidebar) -->

            <div class="text-center d-none d-md-inline">

                <button class="rounded-circle border-0" id="sidebarToggle"></button>

            </div>



        </ul>

        <!-- End of Sidebar -->



        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->

            <div id="content">



                <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



                    <!-- Sidebar Toggle (Topbar) -->

                    <form class="form-inline">

                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">

                            <i class="fa fa-bars"></i>

                        </button>

                    </form>





                    <!-- Topbar Navbar -->

                    <ul class="navbar-nav ml-auto">





                        <div class="topbar-divider d-none d-sm-block"></div>



                        <!-- Nav Item - User Information -->

                        <li class="nav-item dropdown no-arrow">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama_member']; ?></span>

                                <img class="img-profile rounded-circle" src="<?= base_url('upload/'). $user['foto_member']; ?>">

                            </a>

                            <!-- Dropdown - User Information -->

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="<?= base_url('Member/Member/Edit_View')?>">

                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Profile

                                </a>



                                <div class="dropdown-divider"></div>

                                

                                <a class="dropdown-item" href="<?= base_url('AuthController/logout');?>">

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Logout

                                </a>

                            </div>

                        </li>



                    </ul>



                </nav>

                <!-- End of Topbar -->