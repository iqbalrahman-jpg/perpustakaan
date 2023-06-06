<!-- Menampilkan halaman Login -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 mt-5">
            <h2 class="text-center text-white">READING CORNER<br>
            JURUSAN BAHASA KOMUNIKASI DAN PARIWISATA <br>
            POLITEKNIK NEGERI JEMBER</h2>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">


                    <div class="row">

                        <div class="col-lg">

                            <!-- Menampilkan Button untuk memilih Tab Content Login Admin dan Member -->
                            <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

                                <li class="nav-item">

                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="pills-home" aria-selected="true">Member</a>  <!-- Mengarahkan ke tab login Member -->

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="pills-profile" aria-selected="false">Admin</a> <!-- Mengarahkan ke tab login Admin -->

                                </li>

                            </ul>
                            <!-- Menampilkan Button untuk memilih Tab Content Login Admin dan Member End -->


                            <!-- Menampilkan Tab Content Login Admin dan Member -->
                            <div class="tab-content">


                                <!-- Tab Login Member -->
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div class="p-5">

                                        <div class="text-center">

                                            <h1 class="h4 text-gray-900 mb-4">Login Page Member</h1>

                                        </div>



                                        <?= $this->session->flashdata('message'); ?> <!-- Menampilkan message yang diambil dari AuthController pada Function Login -->



                                        <form class="user" method="post" action="<?= base_url('Member/AuthMemberController'); ?>">



                                            <div class="form-group">

                                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">

                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

                                            </div>



                                            <div class="form-group">

                                                <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Password">

                                                <?= form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>

                                            </div>



                                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>



                                        </form>



                                        <hr>
                                      
                                        <div class="text-center">

                                            <a class="small" href="<?= base_url('Member/AuthMemberController/register') ?>">Create an Account!</a>

                                        </div>

                                    </div>

                                </div>
                                <!-- Tab Login Member End -->


                                <!-- Tab Login Admin -->
                                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <div class="p-5">

                                        <div class="text-center">

                                            <h1 class="h4 text-gray-900 mb-4">Login Page Admin</h1>

                                        </div>



                                        <?= $this->session->flashdata('message'); ?> <!-- Menampilkan message yang diambil dari AuthController pada Function Login -->



                                        <form class="user" method="post" action="<?= base_url('AuthController'); ?>">



                                            <div class="form-group">

                                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">

                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

                                            </div>



                                            <div class="form-group">

                                                <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Password">

                                                <?= form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>

                                            </div>



                                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>



                                        </form>

                                    </div>

                                </div>
                                <!-- Tab Login Admin End-->


                            </div>
                            <!-- Menampilkan Tab Content Login Admin dan Member End-->

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Menampilkan halaman Login End -->
