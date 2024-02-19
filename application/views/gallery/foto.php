<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-..."></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">

    <style>
        .card {
            width: 18rem;
            margin-bottom: 20px;
            border: none;
            transition: transform 0.2s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            height: 300px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1rem;
            font-weight: bold;
        }

        .card-text {
            color: #6c757d;
        }

        .card-footer a {
            color: #fff;
        }

        .card-text-judul {
        font-size: 18px;
        color: #000; /* Warna hitam */
        }

    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galery Foto</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>


        <!-- judul (card) -->
        <div class="container mt-1">
        <button type="button" class="btn btn-info position-fixed bottom-0 end-0 m-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: #fff;">
            Tambah
    <i class="fas fa-plus"></i>
        </button>

                  <!-- Modal tambah data -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color: #9EC8B9; color: #fff;">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Foto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('Welcome/addDataFoto'); ?>" method="post" onsubmit="return tambahData()"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="judulfoto" class="card-text-judul">Judul Foto</label>
                                <input type="text" class="form-control" id="judulfoto" name="judulfoto"
                                placeholder="Masukkan Judul Foto">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsifoto" class="form-label">Deskripsi Foto</label>
                                <input type="text" class="form-control" id="deskripsifoto" name="deskripsifoto"
                                placeholder="Masukkan Deskripsi Foto">
                            </div>
                            <div class="mb-3">
                                <label for="tanggalunggah" class="form-label">Tanggal Unggah</label>
                                <input type="date" class="form-control" id="tanggalunggah" name="tanggalunggah"
                                placeholder="Masukkan Tanggal Unggah">
                            </div>
                            <div class="mb-3">
                                <label for="lokasifile" class="form-label">Lokasi File</label>
                                <input type="file" class="form-control" id="lokasifile" name="lokasifile"
                                placeholder="Masukkan Lokasi File">
                            </div>
                            <div class="mb-3">
                                <label for="albumid" class="form-label">Album ID</label>
                                <input type="text" class="form-control" id="albumid" name="albumid"
                                 placeholder="Masukkan Album ID">
                            </div>
                            <div class="mb-3">
                                <label for="userid" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="userid" name="userid"
                                value="<?php $userid = $this->session->userdata('userid'); echo $userid; ?>"
                                placeholder="Masukkan Album ID">
                            </div>
                            <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            </button>
                        </form>
                        <div id="pesan" class="alert" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- tabel -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php if (!empty($DataFoto)) {
                foreach ($DataFoto as $ReadDS) {
                    $likeCount = $this->MSudi->hitung_like($ReadDS->userid, $ReadDS->fotoid)->jumlah;
                    ?>
                    <div class="col-md-3 mb-4"> <!-- Adjust the col class to make the column smaller -->
                        <div class>
                            <img src="<?= base_url('/assets/img/' . $ReadDS->lokasifile) ?>" class="card-img-top"
                             alt="..." data-bs-toggle="modal" data-bs-target="#fotoModal<?= $ReadDS->fotoid ?>">
                             <p class="card-text-judul" style="font-size: 18px; font-family:'Courier New', Courier, monospace; bold; color: #333;">Judul Foto: <?= $ReadDS->judulfoto ?></p>
                             <p class="card-text" style="font-size: 18px; font-family:'Courier New', Courier, monospace;color: #333; ">Deskripsi Foto: <?= $ReadDS->deskripsifoto ?></p>
                            <div class="card-body" style="padding: 10px; margin: 0;">
                               <!-- ini adlah tampilan update -->
                               <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#fotoModal<?php echo $ReadDS->fotoid; ?>">
                               <i class="fas fa-edit"></i>
                              </button>
                              <!-- ini adalah tampilan delete -->
                              <a href="<?php echo site_url('Welcome/deleteDataFoto/'.$ReadDS->fotoid)?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                              <i class="fas fa-trash"></i>
                              </a>
                        </div>
                    </div>

                    <!-- Modal detail foto-->
                    <div class="modal fade" id="fotoModal<?= $ReadDS->fotoid ?>" tabindex="-1" aria-labelledby="fotoModalLabel<?= $ReadDS->fotoid ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color: #9EC8B9; color: #fff; border-bottom: none;">
                    <h5 class="modal-title" id="fotoModalLabel<?= $ReadDS->fotoid ?>">Detail Foto</h5>
                    <button type="button" class="btn-close" style="color: #fff; font-size: 1.5rem;" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding: 30px;">
                  <div class="row">
                    <div class="col-md-6">
                        <img src="<?= base_url('/assets/img/' . $ReadDS->lokasifile) ?>" class="img-fluid" alt="<?= $ReadDS->judulfoto ?>">
                    </div>
                    <div class="col-md-6">
                        <form action="<?= site_url('Welcome/updateDataFoto/' . $ReadDS->fotoid) ?>" method="post" onsubmit="return updateData()">
                            <div class="mb-3">
                                <label for="editJudul" class="form-label">Judul Foto</label>
                                <input type="text" class="form-control" id="editjudulfoto" name="judulfoto" value="<?= $ReadDS->judulfoto ?>">
                            </div>
                            <input type="hidden" name="userid" value="<?php echo $this->session->userdata('userid'); ?>">
                            <div class="mb-3">
                                <label for="editDeskripsi" class="form-label">Deskripsi Foto</label>
                                <input type="text" class="form-control" id="editdeskripsifoto" name="deskripsifoto" value="<?= $ReadDS->deskripsifoto ?>">
                            </div>
                            <!-- Hidden input to pass like count -->
                            <input type="hidden" name="likeCount" value="<?= $likeCount ?>">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="fas fa-save"></i> 
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
 </div>
                    <?php
                }
            } ?>
        </div>

    </div>


    <script>

    function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }

    function tambahData() {
    // Menampilkan Sweet Alert setelah form disubmit
    Swal.fire({
      icon: 'success',
      title: 'Data berhasil ditambahkan',
      showConfirmButton: false,
      timer: 2500
    });

    // Jangan lupa untuk mengembalikan nilai true agar form dapat dilanjutkan pengirimannya
    return 
    }

  function updateData() {
    // Menampilkan Sweet Alert setelah form disubmit
    Swal.fire({
      icon: 'success',
      title: 'Data berhasil diupdate',
      showConfirmButton: false,
      timer: 2500
    });

    // Jangan lupa untuk mengembalikan nilai true agar form dapat dilanjutkan pengirimannya
    return true;
    }    
    
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- <!-Core plugin JavaScript -->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>