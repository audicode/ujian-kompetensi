<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Gallery - Registration</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Chonburi&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
         body {
            background-color: #f8f9fc;
        }

        /* Warna merah untuk judul Daftar */
        .text-custom-style {
            font-family: 'Chonburi', sans-serif;
            color: #092635; /* Ganti dengan kode warna merah yang diinginkan */
            font-size: 30px;
        }

        body {
            background: url('<?= base_url('assets/img/wp.jpg') ?>') no-repeat center center fixed;
            background-size: 100% 100%;
        }
        
    </style>

</head>

<body class="bg-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-11">
                                <div class="p-5 mx-auto"> <!-- Tambahkan kelas mx-auto di sini -->
                                    <div class="text-center">
                                    <h1 class="h4 text-custom-style">Daftar</h1>
                                </div>
                                <form class="user" action="<?php echo site_url('Registration/register'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user"
                                               placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user"
                                               placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="namalengkap" class="form-control form-control-user"
                                               placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="alamat" class="form-control form-control-user"
                                               placeholder="Alamat">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               placeholder="Password">
                                    </div>
                                    <button type="submit" name="btn_register" class="btn btn-primary btn-user btn-block"
                                            style="background: linear-gradient(180deg, #FF0000 100%, #FF0000 100%)">
                                        Daftar
                                    </button>
                                </form>
                                <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= site_url('Login') ?>" style="color:red">Sudah Punya Akun ? Masuk!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>
