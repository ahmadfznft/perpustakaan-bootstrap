<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjam</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    include "navbar.php";

    $query = "SELECT peminjaman.*, user.Username, buku.Judul
              FROM peminjaman 
              LEFT JOIN user ON user.UserID = peminjaman.UserID 
              LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID";
    $result = mysqli_query($conn, $query);
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="text-center mb-4">Data Peminjam Buku</h2>

                <div class="d-flex justify-content-end mb-3">
                    <input type="text" id="searchInput" class="form-control w-25" onkeyup="searchTable()" placeholder="Cari data role   ...">
                </div>
                
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['Username'] ?: 'Data Tidak Tersedia'; ?></td>
                                <td><?= $row['Judul'] ?: 'Data Tidak Tersedia'; ?></td>
                                <td><?= $row['TanggalPeminjaman']; ?></td>
                                <td><?= $row['TanggalPengembalian']; ?></td>
                                <td>
                                    <?php
                                    switch ($row['StatusPeminjaman']) {
                                        case 'Menunggu Konfirmasi':
                                            echo '<span class="badge bg-warning">Menunggu Konfirmasi</span>';
                                            break;
                                        case 'Buku Dipinjam':
                                            echo '<span class="badge bg-primary">Buku Dipinjam</span>';
                                            break;
                                        case 'Buku Dikembalikan':
                                            echo '<span class="badge bg-success">Buku Dikembalikan</span>';
                                            break;
                                        default:
                                            echo '<span class="badge bg-secondary">Status Tidak Diketahui</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if ($row['StatusPeminjaman'] == 'Menunggu Konfirmasi') { ?>
                                        <a href="konfirmasi-peminjaman.php?konfirmasi=<?= $row['PeminjamanID']; ?>" class="btn btn-warning btn-sm">Konfirmasi</a>
                                    <?php } elseif ($row['StatusPeminjaman'] == 'Buku Dipinjam') { ?>
                                        <a href="proses-peminjaman.php?ubah=<?= $row['PeminjamanID']; ?>" class="btn btn-primary btn-sm">Ubah Status</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Fungsi pencarian manual
        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementById("example");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        }
                    }
                }
            }
        }
    </script>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>