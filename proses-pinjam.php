<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $buku_id = $_POST['buku_id'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_peminjaman = 'Menunggu Konfirmasi';
    $user_id = $_SESSION['UserID'];

    // cek user sudah meminjam buku atau belum
    $query_check = "SELECT COUNT(*) as total FROM peminjaman WHERE UserID = '$user_id' AND StatusPeminjaman = 'Buku Dipinjam'";
    $result_check = mysqli_query($conn, $query_check);
    $data_check = mysqli_fetch_assoc($result_check);

    if ($data_check['total'] > 0) {
        echo "<script>
                alert('Anda sudah meminjam satu buku, tidak bisa meminjam buku lain.');
                window.location.href='home-peminjam.php';
            </script>";
        exit;
    }

    // Cek Stok
    $query_stok = "SELECT Stok FROM buku WHERE BukuID = '$buku_id'";
    $result_stok = mysqli_query($conn, $query_stok);
    $buku = mysqli_fetch_assoc($result_stok);
    $stok_buku = $buku['Stok'];
    if ($stok_buku > 0) {

        $new_stok = $stok_buku - 1;
        $update_stok = "UPDATE buku SET Stok = '$new_stok' WHERE BukuID = '$buku_id'";
        mysqli_query($conn, $update_stok);

        $query = "INSERT INTO peminjaman (UserID, BukuID, TanggalPeminjaman, TanggalPengembalian, StatusPeminjaman) 
                  VALUES ('$user_id', '$buku_id', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')";

        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Peminjaman Berhasil Dilakukan, menunggu konfirmasi admin.');
                    window.location.href='pinjam-buku.php';
                </script>";
        } else {
            echo "<script>
                    alert('Peminjaman Gagal Dilakukan');
                    window.location.href='tambah-peminjaman.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Stok buku habis, peminjaman tidak bisa dilakukan');
                window.location.href='home-peminjam.php';
            </script>";
    }
}

//hapus buku + jika dihapus stok kembali
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $id = mysqli_real_escape_string($conn, $id);

    $query_buku_id = "SELECT BukuID FROM peminjaman WHERE PeminjamanID = '$id'";
    $result_buku_id = mysqli_query($conn, $query_buku_id);
    $buku_data = mysqli_fetch_assoc($result_buku_id);
    $buku_id = $buku_data['BukuID'];

    $sql = "DELETE FROM peminjaman WHERE PeminjamanID = '$id'";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        $query_stok = "SELECT Stok FROM buku WHERE BukuID = '$buku_id'";
        $result_stok = mysqli_query($conn, $query_stok);
        $buku = mysqli_fetch_assoc($result_stok);
        $stok_buku = $buku['Stok'];

        $new_stok = $stok_buku + 1;
        $update_stok = "UPDATE buku SET Stok = '$new_stok' WHERE BukuID = '$buku_id'";
        mysqli_query($conn, $update_stok);

        $reset_auto_increment = "ALTER TABLE peminjaman AUTO_INCREMENT = 1";
        mysqli_query($conn, $reset_auto_increment);

        echo "<script>alert('Peminjaman berhasil dibatalkan');
        window.location.href='home-peminjam.php';
        </script>";
    } else {
        echo "<script>alert('Peminjaman gagal dibatalkan');
        window.location.href='home-peminjam.php';
        </script>";
    }
}
