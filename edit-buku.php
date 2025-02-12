<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <?php
    include "navbar.php"; 

    if (isset($_GET['id'])) {
        $BukuID = $_GET['id'];
        $query = "SELECT * FROM buku WHERE BukuID = '$BukuID'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $query_kategori = "SELECT * FROM kategori_buku";
        $result_kategori = mysqli_query($conn, $query_kategori);

        $query_selected_kategori = "SELECT KategoriID FROM kategoribuku_relasi WHERE BukuID = '$BukuID'";
        $result_selected_kategori = mysqli_query($conn, $query_selected_kategori);
        $selected_kategori = [];
        while ($row_selected_kategori = mysqli_fetch_assoc($result_selected_kategori)) {
            $selected_kategori[] = $row_selected_kategori['KategoriID'];
        }
    }
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 700px;">
            <div class="card-body">
                <h2 class="text-center mb-4">Edit Buku</h2>
                <form action="proses-buku.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['BukuID']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" value="<?= $row['Judul']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="<?= $row['Penulis']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" value="<?= $row['Penerbit']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahunterbit" class="form-control" value="<?= $row['TahunTerbit']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" value="<?= $row['Stok']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required><?= $row['Deskripsi']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <div class="d-flex align-items-center">
                            <img src="<?= $row['Gambar']; ?>" alt="Gambar" class="me-3" style="width: 80px; height: 80px; object-fit: cover;">
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <small class="text-danger">*Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <div>
                            <?php while ($kategori = mysqli_fetch_assoc($result_kategori)) { ?>
                                <div class="form-check">
                                    <input type="checkbox" name="kategori[]" value="<?php echo $kategori['KategoriID']; ?>" class="form-check-input" <?php echo in_array($kategori['KategoriID'], $selected_kategori) ? 'checked' : ''; ?>>
                                    <label class="form-check-label"> <?php echo $kategori['NamaKategori']; ?> </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <button type="submit" name="edit" class="btn btn-warning w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>