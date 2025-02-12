<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $sql = "SELECT u.UserID, r.NamaRole AS Role, u.Username, u.Namalengkap, u.Alamat
            FROM user u
            JOIN role r ON u.RoleID = r.RoleID;";
    $kategori = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data User</h1>

        <div class="text-end mb-3">
            <a href="tambah-user.php" class="btn btn-warning">
                <i class="bi bi-person-plus"></i> Tambah Data User
            </a>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <input type="text" id="searchInput" class="form-control w-25" onkeyup="searchTable()" placeholder="Cari data user...">
        </div>

        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Role</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($kategori)) {
                    ?>
                        <tr>
                            <td><?= $row['UserID']; ?></td>
                            <td><?= $row['Role']; ?></td>
                            <td><?= $row['Username']; ?></td>
                            <td><?= $row['Namalengkap']; ?></td>
                            <td><?= $row['Alamat']; ?></td>
                            <td>
                                <a href="edit-user.php?id=<?= $row['UserID'] ?>" class="btn btn-success">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="proses-user.php?id=<?= $row['UserID'] ?>" onclick="return konfirmasiHapus()" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
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

        // Konfirmasi hapus
        function konfirmasiHapus() {
            var agree = confirm("Apakah Anda yakin ingin menghapus ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>