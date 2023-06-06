<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-8 mt-5">
    <h2 class="text-center text-white">READING CORNER<br>
            JURUSAN BAHASA KOMUNIKASI DAN PARIWISATA <br>
            POLITEKNIK NEGERI JEMBER</h2>
    </div>
</div>
<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form class="user" method="post" action="<?= base_url('Member/AuthMemberController/Register'); ?>">

                        <!-- Form Nama -->
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama_member" name="nama_member" placeholder="Nama Panjang" value="<?= set_value('nama_member');?>">
                            <?= form_error('nama_member','<small class="text-danger pl-3">','</small>');?>
                        </div>

                        <!-- Form NIM -->
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nim_member" name="nim_member" placeholder="NIM" value="<?= set_value('nim_member');?>">
                            <?= form_error('nim_member','<small class="text-danger pl-3">','</small>');?>
                        </div>

                        <!-- Form Email -->
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email_member" name="email_member" placeholder="Email" value="<?= set_value('email_member');?>">
                            <?= form_error('email_member','<small class="text-danger pl-3">','</small>');?>
                        </div>
                        
                         <!-- Form Alamat -->
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="alamat_member" name="alamat_member" placeholder="Alamat" value="<?= set_value('alamat_member');?>">
                            <?= form_error('alamat_member','<small class="text-danger pl-3">','</small>');?>
                        </div>

                        <!-- Form Password -->
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                <?= form_error('password1','<small class="text-danger pl-3">','</small>');?>

                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                id="password2" name="password2" placeholder="Ulangi Password"> 
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>

                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('Member/AuthMemberController') ?>">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>