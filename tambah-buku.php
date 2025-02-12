<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <?php
    include "navbar.php";

    // Ambil kategori dari database
    $query_kategori = "SELECT * FROM kategori_buku";
    $result_kategori = mysqli_query($conn, $query_kategori);
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 700px;">
            <div class="card-body">
                <h2 class="text-center mb-4">Tambah Buku</h2>
                <form action="proses-buku.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="judulbuku" class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Buku" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis" required>
                    </div>

                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit" required>
                    </div>

                    <div class="mb-3">
                        <label for="tahunterbit" class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahunterbit" class="form-control" placeholder="Masukkan Tahun Terbit" required>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <div class="form-check">
                            <?php while ($kategori = mysqli_fetch_assoc($result_kategori)) { ?>
                                <div class="form-check">
                                    <input type="checkbox" name="kategori[]" value="<?php echo $kategori['KategoriID']; ?>" class="form-check-input">
                                    <label class="form-check-label" for="kategori"> <?php echo $kategori['NamaKategori']; ?> </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-warning w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>