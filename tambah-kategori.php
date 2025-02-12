<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kategori</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <?php include "navbar.php"; ?>

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center mb-4">Tambah Kategori</h1>
                <form method="post" action="proses-kategori.php">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Kategori" required>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-warning w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>