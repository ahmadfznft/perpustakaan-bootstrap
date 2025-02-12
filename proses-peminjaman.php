<?php
include "connection.php";

if (isset($_GET['ubah'])) {
    $peminjamanID = $_GET['ubah'];

    $queryBukuID = "SELECT BukuID, StatusPeminjaman FROM peminjaman WHERE PeminjamanID = $peminjamanID";
    $resultBukuID = mysqli_query($conn, $queryBukuID);
    $rowBukuID = mysqli_fetch_assoc($resultBukuID);

    if ($rowBukuID) {
        $bukuID = $rowBukuID['BukuID'];
        $statusPeminjaman = $rowBukuID['StatusPeminjaman'];

        if ($statusPeminjaman == 'Buku Dipinjam') {
            $queryUpdateStatus = "UPDATE peminjaman SET StatusPeminjaman = 'Buku Dikembalikan' WHERE PeminjamanID = $peminjamanID";

            if (mysqli_query($conn, $queryUpdateStatus)) {
                $queryUpdateStok = "UPDATE buku SET Stok = Stok + 1 WHERE BukuID = $bukuID";
                mysqli_query($conn, $queryUpdateStok);

                $_SESSION['message'] = "Status peminjaman berhasil diubah dan stok buku diperbarui.";
                header("Location: data-peminjam.php?status=success");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Status peminjaman tidak dapat diubah.";
        }
    } else {
        echo "ID peminjaman tidak ditemukan.";
    }

    mysqli_close($conn);
} else {
    echo "Tidak ada ID peminjaman yang diberikan.";
}
