<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kategori</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <?php
    include "navbar.php";

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `kategori_buku` WHERE KategoriID=$id");

    while ($kategori_data = mysqli_fetch_array($result)) {
        $nama_kategori = $kategori_data['NamaKategori'];
        $id_kategori = $kategori_data['KategoriID'];
    }
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center mb-4">Edit Kategori</h1>
                <form method="post" action="proses-kategori.php">
                    <input type="hidden" name="KategoriID" value="<?= $id_kategori ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="<?= $nama_kategori ?>" required>
                    </div>
                    <button type="submit" name="ubah" class="btn btn-warning w-100">Ubah</button>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>