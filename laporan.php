<?php
include 'navbar.php';

$start_date = '';
$end_date = '';
$query = "";
$result = null;

if (isset($_POST['submit'])) {
    if (empty($_POST['start_date']) || empty($_POST['end_date'])) {
        echo "<script>alert('Silakan pilih tanggal mulai dan tanggal akhir.');</script>";
    } else {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Validasi tanggal
        if ($start_date > $end_date) {
            echo "<script>alert('Tanggal akhir tidak boleh lebih awal dari tanggal mulai.');</script>";
        } else {
            $query = "SELECT * 
                      FROM peminjaman 
                      LEFT JOIN user ON user.UserID = peminjaman.UserID 
                      LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID
                      WHERE TanggalPeminjaman BETWEEN '$start_date' AND '$end_date'";
            $result = mysqli_query($conn, $query);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Laporan Peminjaman Buku</h1>

        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="" class="row g-3">
                    <div class="col-md-4">
                        <label for="start_date" class="form-label">Tanggal Mulai:</label>
                        <input type="date" name="start_date" id="start_date" value="<?= $start_date ?>" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="end_date" class="form-label">Tanggal Akhir:</label>
                        <input type="date" name="end_date" id="end_date" value="<?= $end_date ?>" class="form-control">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Tampilkan Laporan</button>
                    </div>
                </form>
                <form method="GET" action="cetak-laporan.php" target="_blank" class="mt-3">
                    <input type="hidden" name="start_date" value="<?= $start_date ?>">
                    <input type="hidden" name="end_date" value="<?= $end_date ?>">
                    <button type="submit" class="btn btn-success w-100">Cetak Laporan</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status Peminjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $row['Username'] ?: 'Data Tidak Tersedia'; ?></td>
                                            <td><?= $row['Judul'] ?: 'Data Tidak Tersedia'; ?></td>
                                            <td><?= $row['TanggalPeminjaman']; ?></td>
                                            <td><?= $row['TanggalPengembalian']; ?></td>
                                            <td><?= $row['StatusPeminjaman']; ?></td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data peminjaman.</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center'>Silakan pilih tanggal terlebih dahulu.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
``` ▋