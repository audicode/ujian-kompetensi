<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Detail Foto</h2>
                <!-- Tampilkan detail foto -->
                <div class="card">
                    <img src="<?= base_url('/assets/img/' . $ReadDS->lokasifile) ?>" class="card-img-top" alt="Foto">
                    <div class="card-body">
                        <h5 class="card-title">Nama Foto</h5>
                        <p class="card-text">Deskripsi atau informasi tambahan tentang foto.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8">
                <h2>Komentar</h2>
                <!-- Tampilkan daftar komentar -->
                <?php foreach ($comments as $comment) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="card-title"><strong><?= $comment->username ?></strong></h6>
                            <p class="card-text"><?= $comment->isikomentar ?></p>
                            <p class="card-text"><small class="text-muted"><?= $comment->tanggalkomentar ?></small></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-4">
                <!-- Formulir komentar -->
                <?php if ($this->session->userdata('userid')) : ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Komentar</h5>
                            <form action="<?= site_url('comment/add_comment') ?>" method="post">
                                <input type="hidden" name="fotoid" value="<?= $photo_id ?>">
                                <div class="form-group">
                                    <textarea class="form-control" name="isikomentar" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Komentar</button>
                            </form>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="card">
                        <div class="card-body">
                            <p>Silakan login untuk menambahkan komentar.</p>
                            <a href="<?php echo site_url("Welcome/foto")?>">Back To Menu</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
