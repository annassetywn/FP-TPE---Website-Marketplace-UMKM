<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrasi Pembeli</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url ('css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Pembeli</h1>
                            </div>
                            <form class="user" method="POST" action="<?php echo site_url('landingpage/insert_reg')?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="username" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Username" value="<?php echo set_value('username'); ?>">
                                            <small><?php echo form_error('username'); ?></small>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="namalengkap" type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Nama Lengkap" value="<?php echo set_value('namalengkap'); ?>">
                                            <small><?php echo form_error('namalengkap'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                                        <small><?php echo form_error('email'); ?></small>
                                </div>
                                <div class="col-sm-6">
                                    <input name="no_telepon" type="number" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nomor Telepon" value="<?php echo set_value('no_telepon'); ?>">
                                        <small><?php echo form_error('no_telepon'); ?></small>
                                </div>
                                </div>
                                <div class="form-group">
                                    <input name="alamat" type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Alamat" value="<?php echo set_value('alamat'); ?>">
                                        <small><?php echo form_error('alamat'); ?></small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                            <small><?php echo form_error('password'); ?></small>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="confirmpassword" type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Ulangi Password">
                                            <small><?php echo form_error('confirmpassword'); ?></small>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>
                            
            
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo site_url('landingpage/loginPembeli')?>">Sudah punya akun? Login</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo site_url('landingpage')?>">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url ('assets/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url ('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url ('assets/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url ('js/sb-admin-2.min.js')?>"></script>

</body>

</html>