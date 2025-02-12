<?php
include 'navbar.php';

$user_id = $_SESSION['UserID'];

$id_buku = $_GET['id'];

$query = "SELECT * FROM buku WHERE BukuID = $id_buku";
$result = mysqli_query($conn, $query);
$buku = mysqli_fetch_assoc($result);

$query_kategori = "SELECT kategori_buku.NamaKategori 
                   FROM kategoribuku_relasi 
                   JOIN kategori_buku ON kategoribuku_relasi.KategoriID = kategori_buku.KategoriID 
                   WHERE kategoribuku_relasi.BukuID = $id_buku";
$result_kategori = mysqli_query($conn, $query_kategori);

$qulasan = "SELECT ulasanbuku.*, user.Username 
                   FROM ulasanbuku 
                   JOIN user ON ulasanbuku.UserID = user.UserID 
                   WHERE ulasanbuku.BukuID = $id_buku";
$result_komentar = mysqli_query($conn, $qulasan);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Detail Buku</h1>

        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="<?= $buku['Gambar'] ?>" alt="<?= $buku['Judul'] ?>" class="img-fluid rounded-lg" style="max-width: 200px; max-height: 300px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?= $buku['Judul'] ?></h2>
                        <p class="card-text"><strong>Penulis:</strong> <?= $buku['Penulis'] ?></p>
                        <p class="card-text"><strong>Penerbit:</strong> <?= $buku['Penerbit'] ?></p>
                        <p class="card-text"><strong>Tahun Terbit:</strong> <?= $buku['TahunTerbit'] ?></p>
                        <p class="card-text">
                            <strong>Deskripsi:</strong>
                            <span id="short-description"><?= mb_strimwidth($buku['Deskripsi'], 0, 150, "...") ?></span>
                            <span id="full-description" class="d-none"><?= $buku['Deskripsi'] ?></span>
                            <a href="javascript:void(0)" id="toggle-description" class="text-primary">Baca Selengkapnya</a>
                        </p>
                        <p class="card-text"><strong>Kategori:</strong>
                            <?php
                            $kategori_list = [];
                            while ($kategori = $result_kategori->fetch_assoc()) {
                                $kategori_list[] = "<span class='badge bg-primary'>" . $kategori['NamaKategori'] . "</span>";
                            }
                            echo implode(" ", $kategori_list);
                            ?>
                        </p>
                        <p class="card-text"><strong>Stok:</strong>
                            <?= $buku['Stok'] > 0 ? "<span class='text-success'>{$buku['Stok']}</span>" : "<span class='text-danger'>Stok Habis</span>" ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Komentar</h5>
                <div class="list-group">
                    <?php while ($komentar = $result_komentar->fetch_assoc()) : ?>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $komentar['Username'] ?></h5>
                                <small><?= date('d M Y', strtotime($komentar['tanggalUlasan'])) ?></small>
                            </div>
                            <p class="mb-1"><?= $komentar['Ulasan'] ?></p>
                            <small>Rating: <span class="text-warning"><?= str_repeat("★", $komentar['rating']) ?></span></small>
                        </div>
                    <?php endwhile; ?>
                </div>

                <form action="proses-ulasan.php" method="POST" class="mt-4">
                    <input type="hidden" name="buku_id" value="<?= $id_buku ?>">
                    <div class="form-group mb-3">
                        <textarea name="komentar" class="form-control" rows="3" placeholder="Tambahkan komentar" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <select name="rating" class="form-control" required>
                            <option value="" disabled selected>Rating</option>
                            <option value="1">1 ★</option>
                            <option value="2">2 ★★</option>
                            <option value="3">3 ★★★</option>
                            <option value="4">4 ★★★★</option>
                            <option value="5">5 ★★★★★</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>

        <form method="POST" action="proses-koleksi.php">
            <input type="hidden" name="bukuID" value="<?= $id_buku ?>">
            <input type="hidden" name="userID" value="<?= $user_id ?>">
            <button type="submit" class="btn btn-primary" name="tambah">Tambah ke Favorit</button>
        </form>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('toggle-description').addEventListener('click', function() {
            var fullDescription = document.getElementById('full-description');
            var shortDescription = document.getElementById('short-description');
            var toggleText = document.getElementById('toggle-description');

            if (fullDescription.classList.contains('d-none')) {
                fullDescription.classList.remove('d-none');
                shortDescription.classList.add('d-none');
                toggleText.textContent = 'Baca Lebih Sedikit';
            } else {
                fullDescription.classList.add('d-none');
                shortDescription.classList.remove('d-none');
                toggleText.textContent = 'Baca Selengkapnya';
            }
        });
    </script>
</body>

</html>