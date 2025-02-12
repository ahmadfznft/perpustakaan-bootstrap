<?php
include 'navbar.php';

$user_id = $_SESSION['UserID'];

$query = "SELECT peminjaman.*, buku.Judul
          FROM peminjaman 
          JOIN buku ON peminjaman.BukuID = buku.BukuID 
          WHERE peminjaman.UserID = '$user_id' 
          ORDER BY peminjaman.TanggalPeminjaman DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Buku</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pinjam Buku</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td class="text-center"> <?= $no++; ?> </td>
                                <td> <?= htmlspecialchars($row['Judul']); ?> </td>
                                <td> <?= htmlspecialchars($row['TanggalPeminjaman']); ?> </td>
                                <td> <?= htmlspecialchars($row['TanggalPengembalian']); ?> </td>
                                <td> <?= htmlspecialchars($row['StatusPeminjaman']); ?> </td>
                                <td class="text-center">
                                    <?php if ($_SESSION['RoleID'] == 3 || $_SESSION['RoleID'] == 1) : ?>
                                        <?php if (trim($row['StatusPeminjaman']) != 'Buku Dikembalikan') : ?>
                                            <a href="proses-pinjam.php?hapus=<?= $row['PeminjamanID'] ?>" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Yakin Untuk Membatalkan Peminjaman ?')">Hapus</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Anda belum meminjam buku apapun.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
