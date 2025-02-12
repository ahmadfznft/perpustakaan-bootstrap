<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Role</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <?php
    include "navbar.php";
    $sql = "SELECT * FROM `role` ORDER BY RoleID ASC";
    $role = mysqli_query($conn, $sql);
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Data Role</h1>
                <div class="text-end mb-3">
                    <a href="tambah-role.php" class="btn btn-warning">Tambah Data Role</a>
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <input type="text" id="searchInput" class="form-control w-25" onkeyup="searchTable()" placeholder="Cari data role   ...">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">ID Role</th>
                                <th class="text-center">Nama Role</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($role as $row) { ?>
                                <tr>
                                    <td class="text-center"><?= $row['RoleID']; ?></td>
                                    <td class="text-center"><?= $row['NamaRole']; ?></td>
                                    <td class="text-center">
                                        <a href="edit-role.php?id=<?= $row['RoleID'] ?>" class="btn btn-success">Edit</a>
                                        <a href="proses-role.php?id=<?= $row['RoleID'] ?>" onclick="return konfirmasiHapus()" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
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