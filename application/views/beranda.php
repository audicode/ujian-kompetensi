<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-..."></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 20px;
        }

        .card {
            margin-bottom: 20px;
            width: 18rem;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .card img {
            max-height: 200px;
            object-fit: cover;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.25rem;
        }

        .btn-like,
        .btn-comment {
            transition: opacity 0.3s ease-in-out;
        }

        .card:hover .btn-like,
        .card:hover .btn-comment {
            opacity: 1;
        }

        .modal-content {
            background-color: #f8f9fa;
        }

        .modal-title {
            color: #343a40;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            margin-top: 10px;
        }

        .modal-title {
        color: #fff; /* Ganti warna teks sesuai kebutuhan, misalnya putih (#fff) */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Halaman Beranda</h2>

		<!-- Modal Komentar -->
		<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #9EC8B9;">
						<h5 class="modal-title" id="commentModalLabel">Tambah Komentar</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<!-- Diubah sedikit biar komentar masuk database -->
					<form action="<?= site_url('Komentar/tambahKomentar'); ?>" method="post">
						<!-- Hidden input buat input fotoid yang ketangkep JS waktu Komentar di klik -->
						<input type="hidden" name="fotoid" id="fotoidInput" value="">
						<div class="mb-3">
							<label for="comment" class="form-label">Isi Komentar</label>
							<textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Tambahkan komentar"></textarea>
						</div>
						<button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>
                        </button>
					</form>
					</div>
				</div>
			</div>
		</div>
		 <!-- Akhir Modal Komentar -->

        <!-- Modal -->
        <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #9EC8B9; color: #fff;">
                        <h5 class="modal-title" id="photoModalLabel">Detail Foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="photoModalBody">
                        <!-- Informasi foto akan ditampilkan di sini -->
                    </div>
					<input type="hidden" name="fotoid" id="fotoidInput" value="">
                </div>
            </div>
    	</div>

        <div class="row row-cols-1 row-cols-md-4">
            <?php
            if (!empty($DataFoto)) {
                foreach ($DataFoto as $ReadDS) {
					$likeCount = $this->MSudi->hitung_like($ReadDS->userid, $ReadDS->fotoid)->jumlah;
					?>
					<div class="col">
						<div class="card">
							<img src="<?= base_url('/assets/img/' . $ReadDS->lokasifile) ?>" class="card-img-top" alt="Foto" data-bs-toggle="modal" data-bs-target="#photoModal" onclick="displayPhotoInfo('<?php echo $ReadDS->fotoid; ?>', '<?php echo $ReadDS->judulfoto; ?>', '<?php echo $ReadDS->deskripsifoto; ?>', '<?php echo $ReadDS->userid; ?>', '<?php echo $likeCount; ?>')">
							<div class="card-body">
								<h5 class="card-title"><?php echo $ReadDS->judulfoto; ?></h5>
								<p class="card-text">Like: <?php echo $likeCount; ?></p>
								<a href="<?= site_url('Like/likeFoto/'.$ReadDS->fotoid) ?>" class="btn btn-danger btn-sm btn-like">
                                <i class="fas fa-heart"></i></a>
								<!-- Ini diubah biar bisa nangkep fotoid buat masuk ke hidden input -->
								<a href="#" class="btn btn-info btn-sm btn-comment" data-bs-toggle="modal" data-bs-target="#commentModal" onclick="captureFotoid('<?php echo $ReadDS->fotoid; ?>')">
                                <i class="fas fa-comment" style="color: #fff"></i></a>
							</div>
						</div>
					</div>
				<?php
				}
				
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <script>
		// Versi Lama
		// function displayPhotoInfo(fotoId, judulFoto, deskripsiFoto, userId, likeCount) {
        //     var modalBody = document.getElementById('photoModalBody');
        //     modalBody.innerHTML = '<p>Foto ID: ' + fotoId + '</p>' +
        //                           '<p>Judul Foto: ' + judulFoto + '</p>' +
        //                           '<p>Deskripsi Foto: ' + deskripsiFoto + '</p>' +
        //                           '<p>User: ' + userId + '</p>' +
        //                           '<p>Jumlah Like: ' + likeCount + '</p>';
        // }

		// Ini versi baru
		function displayPhotoInfo(fotoId, judulFoto, deskripsiFoto, userId, likeCount) {
        $.ajax({
        url: '<?= site_url('Welcome/getComments'); ?>',
        type: 'GET',
        data: { fotoid: fotoId },
        dataType: 'json',
        success: function(response) {
            $.ajax({
                url: '<?= site_url('Welcome/getUsername'); ?>/' + userId,
                type: 'GET',
                dataType: 'json',
                success: function(usernameResponse) {
                    var modalBody = document.getElementById('photoModalBody');
                    var commentsHTML = '<p>Foto ID: ' + fotoId + '</p>' +
                        '<p>Judul Foto: ' + judulFoto + '</p>' +
                        '<p>Deskripsi Foto: ' + deskripsiFoto + '</p>' +
                        '<p>User: ' + usernameResponse.username + '</p>' +
                        '<p>Jumlah Like: ' + likeCount + '</p><hr>' +
                        '<p><b>Komentar</b></p>';

                    response.forEach(function(comment) {
                        commentsHTML += '<p><b>' + comment.username + ':</b> ' + comment.isikomentar + '</p>';
                    });

                    modalBody.innerHTML = commentsHTML;
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


		// Menangkap fotoid saat button Komentar di klik
		function captureFotoid(fotoid) {
			document.getElementById('fotoidInput').value = fotoid;
		}
    </script>

</body>
</html>
