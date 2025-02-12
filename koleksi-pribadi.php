<?php
include 'navbar.php';

$iduser = $_SESSION['UserID'];

$query = "SELECT k.KoleksiID, b.Judul, b.Penulis, b.Penerbit, b.TahunTerbit, b.Gambar, b.BukuID 
          FROM koleksipribadi k 
          INNER JOIN buku b ON k.BukuID = b.BukuID 
          WHERE k.UserID = $iduser";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku Pribadi</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">Koleksi Pribadi</h1>
        <div class="row">
            <?php while ($book = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= htmlspecialchars($book['Gambar']) ?>" class="card-img-top" alt="Cover Buku">
                        <div class="card-body">
                            <h5 class="card-title"> <?= htmlspecialchars($book['Judul']) ?> </h5>
                            <p class="card-text"><strong>Penulis:</strong> <?= htmlspecialchars($book['Penulis']) ?></p>
                            <p class="card-text"><strong>Penerbit:</strong> <?= htmlspecialchars($book['Penerbit']) ?></p>
                            <p class="card-text"><strong>Tahun Terbit:</strong> <?= htmlspecialchars($book['TahunTerbit']) ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="tambah-peminjaman.php?id=<?= $book['BukuID'] ?>" class="btn btn-success btn-sm">Pinjam Buku</a>
                            <a href="proses-koleksi.php?id=<?= $book['KoleksiID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini dari koleksi Anda?')">Hapus</a>
                            <a href="detail-buku.php?id=<?= $book['BukuID']; ?>" class="btn btn-primary btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>