<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Gallery</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">

    

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
	<!-- <link href="assets/css/sb-admin-2.min.css" rel="stylesheet"> -->

    
    <style>
        body {
            font-family: 'Open Sans', sans-serif; /* Gunakan nama font yang sesuai */
            background-color: #f8f9fc;
        }

        /* Warna merah untuk judul Daftar */
        .text-custom-style {
            font-family: 'Open Sans', sans-serif; /* Gunakan nama font yang sesuai */
            color: #f8f9fc;
            font-size: 17px;
        }
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav custom-bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Konten navbar lainnya -->
    <style>
    .custom-bg-gradient {
        background: linear-gradient(180deg, #5C8374 80%, #5C8374 100%);
    }
    </style>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="profile">
            <img src="<?= base_url('assets/img/pp.png') ?>" alt="" style="width: 150px; height: 150px; border-radius: 50%;">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="text-custom-style">Galeri Web
                <?php $username = $this->session->userdata('username'); echo $username; ?>
       
                </div>
            </a>
           


            <!-- Divider -->
            <hr class="sidebar-divider my-0" style="color:white">

           
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Welcome/beranda');?>" style="color:white">
                    <span>Beranda</span></a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider" style="color:white">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Welcome/gallery'); ?>" style="color:white">
                    <span>Album</span></a>
            </li>

             

            <li class="nav-item">
                <a class="nav-link"  href="<?php echo site_url('Welcome/foto'); ?>" style="color:white" hidden>
                    <span>Foto</span></a>
            </li>
            


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                 <!-- <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Gallery</span>
                </a> -->
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="<?php echo site_url('Welcome/gallery'); ?>">Album</a>
                        <a class="collapse-item" href="<?php echo site_url('Welcome/foto'); ?>">Foto</a>
                        <a class="collapse-item" href="<?php echo site_url('Welcome/user'); ?>">User</a> 
                    </div>
                </div>
            </li> 


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->
			

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light custom-navbar-bg topbar mb-4 static-top shadow">
                <style>
                    .custom-navbar-bg {
                        background: linear-gradient(180deg, #9EC8B9 80%, #9EC8B9 100%);
                    }
                </style>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        
                        <a class="btn" href="<?php echo site_url('Welcome/logout'); ?>" style="color:white">Logout</a>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
				<div class="container-fluid">

<!-- Page Heading -->
<!-- <h1 class="h3 mb-4 text-gray-800" style="margin: auto;">Blank Page</h1> -->
                </div>
                <!-- /.container-fluid -->
                <?php $this->load->view($content); ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dyxavira | Web Galeri</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

     <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" onclick="konfirmasiLogout()" >Pilih "Logout" jika Anda ingin keluar dari aplikasi ini.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?php echo site_url('Welcome/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>



    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function konfirmasiLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin keluar?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL logout ketika dikonfirmasi
                window.location.href = "<?php echo site_url('Welcome/logout'); ?>";
            }
        });
    }
    </script>

</body>

</html>