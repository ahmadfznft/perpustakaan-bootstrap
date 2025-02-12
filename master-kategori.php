<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <?php
    include "navbar.php";
    $sql = "SELECT * FROM `kategori_buku` ORDER BY KategoriID ASC";
    $kategori = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Kategori</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="tambah-kategori.php" class="btn btn-warning">
                <i class="bi bi-person-plus"></i> Tambah Data Kategori
            </a>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <input type="text" id="searchInput" class="form-control w-25" onkeyup="searchTable()" placeholder="Cari data kategori...">
        </div>

        <div class="table-responsive">
            <table id="example" class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($kategori)) { ?>
                        <tr>
                            <td><?= $row['KategoriID']; ?></td>
                            <td><?= $row['NamaKategori']; ?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?= $row['KategoriID'] ?>" class="btn btn-success btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="proses-kategori.php?id=<?= $row['KategoriID'] ?>" onclick="return konfirmasiHapus()" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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