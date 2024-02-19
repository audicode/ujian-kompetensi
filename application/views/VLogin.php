<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Gallery - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Chonburi&display=swap');

        body {
            background-color: #f8f9fc;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
        }

        .text-custom-style {
            font-family: 'Chonburi', sans-serif;
            color: #092635;
            font-size: 38px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        /* Warna merah untuk tombol Masuk */
        .btn-primary {
            background: linear-gradient( #FF0000 80%, #FF0000 100%);
            color: #ffffff;
            border: 1px solid #FF0000;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        .btn-primary:hover {
            background: #FF0000;
        }
        
        body {
            background: url('<?= base_url('assets/img/wp.jpg') ?>') no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

</head>

<body>

    <div class="container">
    <div class="col-lg-5">
        <div class="p-5 login">
            <div class="text-center mb-8">
                <h1 class="h3 text-custom-style">Halaman Login</h1>
            </div>

            <br>

            <form class="user" action="<?php echo site_url('Login/login'); ?>" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
            </form>

            <hr>

            <div class="text-center">
                <a class="small" href="<?php echo site_url("Registration/")?>" style="color:#FF0000">Buat Akun!</a>
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
