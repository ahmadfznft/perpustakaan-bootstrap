<?php
include "connection.php";
?>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if ($_SESSION['RoleID'] == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home-admin.php">Home</a>
                    </li>
                <?php } elseif ($_SESSION['RoleID'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home-petugas.php">Home</a>
                    </li>
                <?php } elseif ($_SESSION['RoleID'] == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home-peminjam.php">Home</a>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['RoleID'] == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="master-role.php">Role</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="master-user.php">User</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['RoleID'] == 1 || $_SESSION['RoleID'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="master-kategori.php">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="master-buku.php">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="data-peminjam.php">Data Peminjam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="laporan.php">Laporan</a>
                    </li>
                <?php } if ($_SESSION['RoleID'] == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pinjam-buku.php">Pinjam Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="koleksi-pribadi.php">Favorit Saya</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-outline-danger ms-auto">Logout</a>
            </div>
        </div>
    </div>
</nav>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>