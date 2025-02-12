<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <?php
    include "navbar.php";

    $q = "SELECT * FROM buku ORDER BY BukuID ASC";
    $q = mysqli_query($conn, $q);
    ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Buku</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="tambah-buku.php" class="btn btn-warning">Tambah Data Buku</a>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <input type="text" id="searchInput" class="form-control w-25" onkeyup="searchTable()" placeholder="Cari data buku...">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID Buku</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($q as $row) { ?>
                        <tr>
                            <td><?= $row['BukuID']; ?></td>
                            <td><?= $row['Judul']; ?></td>
                            <td><?= $row['Penulis']; ?></td>
                            <td><?= $row['Penerbit']; ?></td>
                            <td><?= $row['TahunTerbit']; ?></td>
                            <td>
                                <a href="edit-buku.php?id=<?= $row['BukuID'] ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="proses-buku.php?id=<?= $row['BukuID'] ?>" onclick="return konfirmasiHapus()" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
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

        function konfirmasiHapus() {
            return confirm("Apakah Anda yakin ingin menghapus ini?");
        }
    </script>
</body>

</html>