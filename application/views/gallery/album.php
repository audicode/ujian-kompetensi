<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-...">
  </script>

  <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Galery Foto</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

  <!-- judul (card) -->
  <div class="container mt-4">
    <h2 class="text-center mb-4" style="color: #3C3633; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: bold;">
      Halaman Album
    </h2>
    <button type="button" class="btn btn-info position-fixed bottom-0 end-0 m-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: #fff;">
      Tambah
      <i class="fas fa-plus"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #9EC8B9; color: #fff;">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Album</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?php echo site_url('Welcome/addDataAlbum'); ?>" method="post" onsubmit="return tambahData()">
              <div class="mb-3">
                <label for="albumid" class="form-label" hidden>Album ID</label>
                <input type="text" class="form-control" id="albumid" name="albumid" placeholder="Masukkan Album ID" hidden>
              </div>
              <div class="mb-3">
                <label for="namaalbum" class="form-label">Nama Album</label>
                <input type="text" class="form-control" id="namaalbum" name="namaalbum" placeholder="Masukkan Nama Album">
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi">
              </div>
              <div class="mb-3">
                <label for="tanggaldibuat" class="form-label">Tanggal Dibuat</label>
                <input type="date" class="form-control" id="tanggaldibuat" name="tanggaldibuat" placeholder="Masukkan Tanggal Dibuat">
              </div>
              <div class="mb-3">
                <input type="hidden" class="form-control" id="userid" name="userid" value="<?php $userid = $this->session->userdata('userid');
                                                                                            echo $userid; ?>" placeholder="Masukkan Tanggal Dibuat">
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
      <?php
      if (!empty($DataAlbum)) {
        $no = 1;
        foreach ($DataAlbum as $ReadDS) {
      ?>
      <div class="col-md-3">
          <div class="card mb-3 shadow">
            <div class="card-header bg-aquamarine text-center" style="background-color: #9EC8B9; color: #fff;">
              <h5 class="mb-0">Data Album</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $ReadDS->namaalbum; ?></h5>
              <p class="card-text"><?php echo $ReadDS->deskripsi; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <!-- ini dalah tampilan detail -->
                <a href="<?php echo site_url('Welcome/foto/' . $ReadDS->albumid); ?>" class="btn btn-outline-primary">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="<?php echo site_url('Welcome/deleteDataAlbum/' . $ReadDS->albumid) ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                  <i class="fas fa-trash"></i>
                </a>
                <div>
                  <!-- ini adlah tampilan update -->
                  <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $ReadDS->albumid; ?>">
                    <i class="fas fa-edit"></i>
                  </button>
                  <!-- ini adalah tampilan delete -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="exampleModal_<?php echo $ReadDS->albumid; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <!-- Konten modal -->
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #9EC8B9; color: #fff;">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Album</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('Welcome/updateDataAlbum/' . $ReadDS->albumid) ?>" method="post" onsubmit="return updateData()">
                    <div class="mb-3">
                      <label for="albumid" class="form-label">Album ID</label>
                      <input type="text" class="form-control" id="albumid" name="albumid" value="<?= $ReadDS->albumid; ?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="namaalbum" class="form-label">Nama Album</label>
                      <input type="text" class="form-control" id="namaalbum" name="namaalbum" value="<?= $ReadDS->namaalbum; ?>">
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $ReadDS->deskripsi; ?>">
                    </div>
                    <div class="mb-3">
                      <label for="tanggaldibuat" class="form-label">Tanggal Dibuat</label>
                      <input type="date" class="form-control" id="tanggaldibuat" name="tanggaldibuat" value="<?= $ReadDS->tanggaldibuat; ?>">
                    </div>
                    <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    </button>
                  </form>
                  <!-- Akhir formulir -->
                </div>
              </div>
            </div>
            <!-- Akhir konten modal -->
        </div>
          <!-- Akhir Modal Edit -->
          </td>
          </tr>
      <?php
          $no++;
        }
      }
      ?>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>