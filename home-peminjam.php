<?php
include 'navbar.php';

$qrating = "SELECT b.*, 
          COALESCE(AVG(u.Rating), 0) as RataRata, 
          COUNT(u.UlasanID) as JumlahRating 
          FROM buku b 
          LEFT JOIN ulasanbuku u ON b.BukuID = u.BukuID 
          GROUP BY b.BukuID";

$result = mysqli_query($conn, $qrating);

$userId = $_SESSION['UserID']; // Pastikan UserID disimpan di session saat login
$userQuery = $conn->query("SELECT Username FROM user WHERE UserID = '$userId'");
$row = $userQuery->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Xenon</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <h1 class="text-center">Selamat datang, <?php echo $row['Username']; ?>!</h1>

    <div class="container mt-5">
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm">
                        <img src="<?= htmlspecialchars($row['Gambar']); ?>" class="card-img-top" style="height: 250px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title"> <?= htmlspecialchars($row['Judul']); ?> </h5>
                            <p class="card-text text-muted">Penulis: <?= htmlspecialchars($row['Penulis']); ?></p>

                            <?php $rating = round($row['RataRata']); ?>
                            <p class="card-text">Rating: <?= $rating; ?> (<?= $row['JumlahRating']; ?> ulasan)</p>

                            <a href="tambah-peminjaman.php?id=<?= $row['BukuID']; ?>" class="btn btn-primary">Pinjam Buku</a>
                            <a href="detail-buku.php?id=<?= $row['BukuID']; ?>" class="btn btn-success">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>