<?php
include 'connection.php';

$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

if (!$start_date || !$end_date) {
    echo "<script>alert('Silakan pilih tanggal mulai dan tanggal akhir.'); window.location.href = 'laporan.php';</script>";
    exit;
}

if ($end_date < $start_date) {
    echo "<script>alert('Tanggal akhir tidak boleh lebih awal dari tanggal mulai.'); window.location.href = 'laporan.php';</script>";
    exit;
}

$query = "SELECT * 
          FROM peminjaman 
          LEFT JOIN user ON user.UserID = peminjaman.UserID 
          LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID";

if ($start_date && $end_date) {
    $query .= " WHERE TanggalPeminjaman BETWEEN '$start_date' AND '$end_date'";
}

$result = mysqli_query($conn, $query);

$username = $_SESSION['Username'] ?? 'Pengguna Tidak Dikenal';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Peminjaman Buku</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 20px;
        }

        .header,
        .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1,
        .footer p {
            margin: 0;
        }

        .footer p {
            font-size: 14px;
            color: #555;
        }

        .no-data {
            text-align: center;
            font-style: italic;
        }

        .signature-section {
            position: absolute;
            bottom: 90px;
            right: 50px;
            text-align: center;
        }

        .signature-box {
            width: 200px;
        }

        .signature-box .line {
            margin-top: 90px;
            width: 100%;
        }

        .signature-box p {
            margin: 10px 0 0 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Perpustakaan Digital Xenon</h1>
        <div class="footer">
            <p>Jl. Daeng Moh. Ardiwinata, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40513</p>
            <p>Telp: (021) 12345678 | Email: perpusdigitalxenon@perpus.go.id</p>
        </div>
        <hr>
        <h2>Laporan Peminjaman Buku</h2>
        <h2>Periode: <?= htmlspecialchars($start_date) ?> s/d <?= htmlspecialchars($end_date) ?></h2>
    </div>

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
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['Username'] ?: 'Data Tidak Tersedia'); ?></td>
                            <td><?= htmlspecialchars($row['Judul'] ?: 'Data Tidak Tersedia'); ?></td>
                            <td><?= htmlspecialchars($row['TanggalPeminjaman']); ?></td>
                            <td><?= htmlspecialchars($row['TanggalPengembalian']); ?></td>
                            <td><?= htmlspecialchars($row['StatusPeminjaman']); ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-data'>Tidak ada data peminjaman.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="signature-section">
        <div class="signature-box">
            <p>Tanggal: <?= date('d-m-Y') ?></p>
            <div class="line"><?= htmlspecialchars($username); ?></div>
            <p></p>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>