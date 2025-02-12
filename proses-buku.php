<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $deskripsi = $_POST['deskripsi'];
    $tahunTerbit = $_POST['tahunterbit'];
    $stok = $_POST['stok'];
    $kategori_ids = $_POST['kategori'];

    // Mengambil informasi file gambar
    $file_name = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $file_size = $_FILES['gambar']['size'];
    $file_error = $_FILES['gambar']['error'];

    // Mengecek apakah ada file yang diupload
    if ($file_error === 0) {
        // Tentukan folder untuk menyimpan gambar
        $target_dir = "images/";
        $target_file = $target_dir . basename($file_name);

        // Mengecek apakah ukuran file terlalu besar (misal 2MB)
        if ($file_size <= 2097152) {
            // Memindahkan file gambar ke folder
            if (move_uploaded_file($file_tmp, $target_file)) {
                $sql = "INSERT INTO buku (Judul, Penulis, Penerbit, TahunTerbit, Deskripsi, Gambar, Stok) 
                        VALUES ('$judul', '$penulis', '$penerbit', '$tahunTerbit', '$deskripsi', '$target_file', '$stok')";
                if (mysqli_query($conn, $sql)) {
                    $buku_id = mysqli_insert_id($conn);
                    foreach ($kategori_ids as $kategori_id) {
                        $sql_relasi = "INSERT INTO kategoribuku_relasi (BukuID, KategoriID) VALUES ('$buku_id', '$kategori_id')";
                        mysqli_query($conn, $sql_relasi);
                    }
                    echo "<script>
                    alert('Data Berhasil Disimpan');
                        window.location.href='master-buku.php';
                        </script>";
                } else {
                    echo "<script>
                    alert('Gagal Menyimpan Data');
                    window.location.href='tambah-buku.php';
                    </script>";
                }
            } else {
                echo "<script>
                alert('Gagal Mengunggah Gambar');
                window.location.href='tambah-buku.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('Ukuran File Gambar Terlalu Besar');
            window.location.href='tambah-buku.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Terjadi Kesalahan Saat Mengunggah File Gambar');
        window.location.href='tambah-buku.php';
        </script>";
    }
} elseif (isset($_POST['edit'])) {
    $id_buku = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $deskripsi = $_POST['deskripsi'];
    $tahunTerbit = $_POST['tahunterbit'];
    $stok = $_POST['stok'];
    $kategori_ids = $_POST['kategori'];

    // Mengambil informasi file gambar (jika ada)
    $gambar = $_FILES['gambar']['name'];
    $lokasiGambar = $_FILES['gambar']['tmp_name'];
    $file_size = $_FILES['gambar']['size'];
    $file_error = $_FILES['gambar']['error'];

    if ($gambar == "") {
        // Jika tidak ada gambar baru, hanya update data lainnya
        $sql = "UPDATE buku 
                SET Judul = '$judul', 
                    Penulis = '$penulis', 
                    Penerbit = '$penerbit', 
                    Deskripsi = '$deskripsi',
                    TahunTerbit = '$tahunTerbit',
                    Stok = '$stok' 
                WHERE BukuID = $id_buku";
        $result = mysqli_query($conn, $sql);
    } else {
        $folder_gambar = "images/"; // Folder untuk menyimpan gambar
        $target_file = $folder_gambar . basename($gambar);

        // Mengecek apakah ukuran file lebih besar dari 2MB
        if ($file_size > 2097152) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar! Maksimal 2MB.');
                    window.location.href='edit-buku.php?id=$id_buku';
                  </script>";
            exit();
        }

        // Memindahkan gambar yang di-upload ke folder
        if (move_uploaded_file($lokasiGambar, $target_file)) {
            // Jika berhasil, update data buku dan gambar baru
            $sql = "UPDATE buku 
                    SET Judul = '$judul', 
                        Penulis = '$penulis', 
                        Penerbit = '$penerbit', 
                        Deskripsi = '$deskripsi',
                        TahunTerbit = '$tahunTerbit', 
                        Gambar = '$target_file', 
                        Stok = '$stok' 
                    WHERE BukuID = $id_buku";
            $result = mysqli_query($conn, $sql);
        } else {
            echo "<script>
                    alert('Gagal mengunggah gambar!');
                    window.location.href='edit-buku.php?id=$id_buku';
                  </script>";
            exit();
        }
    }

    if ($result) {
        $sql_delete_relasi = "DELETE FROM kategoribuku_relasi WHERE BukuID = $id_buku";
        mysqli_query($conn, $sql_delete_relasi);

        foreach ($kategori_ids as $kategori_id) {
            $sql_relasi = "INSERT INTO kategoribuku_relasi (BukuID, KategoriID) VALUES ('$id_buku', '$kategori_id')";
            mysqli_query($conn, $sql_relasi);
        }

        echo "
        <script>
            alert('Data Buku Berhasil diubah');
            window.location.href='master-buku.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Buku Gagal diubah');
            window.location.href='edit-buku.php?id=$id_buku';
        </script>";
    }
}

// Hapus buku
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete_relasi = "DELETE FROM kategoribuku_relasi WHERE BukuID = $id";
    mysqli_query($conn, $sql_delete_relasi);

    $sql = "DELETE FROM buku WHERE BukuID=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "<script>alert('Hapus berhasil');
        window.location.href='master-buku.php';
        </script>";
    } else {
        echo "<script>alert('Gagal di hapus');
        window.location.href='master-buku.php';
        </script>";
    }
}
