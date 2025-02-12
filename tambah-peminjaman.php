<?php
include "navbar.php";

if (isset($_GET['id'])) {
    $buku_id = $_GET['id'];

    $query_buku = "SELECT BukuID, Judul, Stok FROM buku WHERE BukuID = '$buku_id'";
    $result_buku = mysqli_query($conn, $query_buku);
    $buku = mysqli_fetch_assoc($result_buku);
    $stok_buku = $buku['Stok'];
}

$today = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman Buku</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">Tambah Peminjaman Buku</h1>
        <div class="card shadow-sm p-4">
            <h2 class="mb-3">Form Peminjaman</h2>
            <form method="POST" action="proses-pinjam.php">
                <div class="mb-3">
                    <label class="form-label">Buku yang Dipilih:</label>
                    <input type="hidden" name="buku_id" value="<?php echo $buku['BukuID']; ?>">
                    <input type="text" value="<?php echo $buku['Judul']; ?>" class="form-control bg-light" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Peminjaman:</label>
                    <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" required class="form-control" min="<?php echo $today; ?>" onchange="updateReturnDate()">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pengembalian:</label>
                    <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" required class="form-control" min="<?php echo $today; ?>">
                </div>
                <a href="home-peminjam.php" class="btn btn-secondary me-2">Kembali</a>
                <input type="submit" name="submit" value="Simpan Peminjaman" class="btn btn-primary">
            </form>
        </div>
    </div>
    <script>
        function updateReturnDate() {
            const startDate = document.getElementById('tanggal_peminjaman').value;
            document.getElementById('tanggal_pengembalian').setAttribute('min', startDate);
        }
    </script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
