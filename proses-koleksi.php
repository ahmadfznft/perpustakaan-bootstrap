<?php
include 'connection.php';

if (isset($_POST['tambah'])) {
    $buku = $_POST['bukuID'];
    $id = $_POST['userID'];

    // Cek apakah buku sudah ada di koleksi pribadi
    $check_sql = "SELECT * FROM koleksipribadi WHERE BukuID = $buku AND UserID = $id";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Buku ini sudah ada dalam koleksi pribadi Anda!'); window.location.href='koleksi-pribadi.php';</script>";
    } else {
        $sql = "INSERT INTO koleksipribadi (BukuID, UserID) VALUES ($buku, $id)";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Buku berhasil ditambahkan ke koleksi pribadi'); window.location.href='koleksi-pribadi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan buku ke koleksi pribadi'); window.location.href='detail-buku.php';</script>";
        }
    }
}

// Hapus buku dari koleksi pribadi
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM koleksipribadi WHERE KoleksiID = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Buku berhasil dihapus dari koleksi pribadi'); window.location.href='koleksi-pribadi.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus buku dari koleksi pribadi'); window.location.href='koleksi-pribadi.php';</script>";
    }
}

if (isset($_GET['BukuID']) && isset($_GET['UserID'])) {
    $buku_id = $_GET['BukuID'];
    $user_id = $_GET['UserID'];

    // Cek apakah buku sudah ada di koleksi pribadi
    $check_sql = "SELECT * FROM koleksipribadi WHERE BukuID = $buku_id AND UserID = $user_id";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Buku ini sudah ada dalam koleksi pribadi Anda!'); window.location.href='koleksi-pribadi.php';</script>";
    } else {
        // Jika buku belum ada, masukkan ke dalam koleksi pribadi
        $sql = "INSERT INTO koleksipribadi (BukuID, UserID) VALUES ($buku_id, $user_id)";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Buku berhasil ditambahkan ke koleksi pribadi'); window.location.href='koleksi-pribadi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan buku ke koleksi pribadi'); window.location.href='detail-buku.php';</script>";
        }
    }
}
