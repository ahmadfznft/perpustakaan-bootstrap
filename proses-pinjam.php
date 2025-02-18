<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $buku_id = $_POST['buku_id'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_peminjaman = 'Menunggu Konfirmasi';  // Status awal
    $user_id = $_SESSION['UserID'];

    // Cek apakah user sudah meminjam buku lainnya
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

    // Cek Stok Buku
    $query_stok = "SELECT Stok FROM buku WHERE BukuID = '$buku_id'";
    $result_stok = mysqli_query($conn, $query_stok);
    $buku = mysqli_fetch_assoc($result_stok);
    $stok_buku = $buku['Stok'];

    if ($stok_buku > 0) {
        // Update stok buku
        $new_stok = $stok_buku - 1;
        $update_stok = "UPDATE buku SET Stok = '$new_stok' WHERE BukuID = '$buku_id'";
        mysqli_query($conn, $update_stok);

        // Insert peminjaman
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

// Mengubah status ketika admin mengonfirmasi atau menolak
if (isset($_GET['ubah'])) {
    $peminjaman_id = $_GET['ubah'];
    $status_baru = 'Pengembalian Telat'; // Misalnya diubah status ke "Pengembalian Telat" jika terlambat

    // Update status peminjaman
    $query_update = "UPDATE peminjaman SET StatusPeminjaman = '$status_baru' WHERE PeminjamanID = '$peminjaman_id'";

    if (mysqli_query($conn, $query_update)) {
        echo "<script>alert('Status peminjaman berhasil diperbarui.');
        window.location.href='data-peminjam.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui status peminjaman.');
        window.location.href='data-peminjam.php';</script>";
    }
}

// Admin menolak peminjaman
if (isset($_GET['tolak'])) {
    $peminjaman_id = $_GET['tolak'];
    $status_peminjaman = 'Ditolak'; // Status jika ditolak

    $query_update = "UPDATE peminjaman SET StatusPeminjaman = '$status_peminjaman' WHERE PeminjamanID = '$peminjaman_id'";

    if (mysqli_query($conn, $query_update)) {
        echo "<script>alert('Peminjaman Ditolak');
        window.location.href='data-peminjam.php';</script>";
    } else {
        echo "<script>alert('Gagal menolak peminjaman');
        window.location.href='data-peminjam.php';</script>";
    }
}
