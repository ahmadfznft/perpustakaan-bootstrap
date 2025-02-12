<?php
include 'connection.php';

if (isset($_POST['simpan'])) {


    $nama = $_POST['nama'];
    $sql = "INSERT INTO `kategori_buku` VALUES (NULL, '$nama');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Data Berhasil di simpan');
				window.location.href='master-kategori.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Gagal di Simpan');
			window.location.href='master-kategori.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $id_kategori = $_POST['KategoriID'];
    $nama = $_POST['nama'];
    $result = mysqli_query($conn, "UPDATE `kategori_buku` SET `NamaKategori` = '$nama' WHERE `KategoriID` = $id_kategori");

    if ($result) {
        echo "
		<script>
				alert('Data Berhasil diubah');
				window.location.href='master-kategori.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Gagal diubah');
			window.location.href='master-kategori.php';
		</script>";
    }
} else {

    $id = $_GET['id'];
    $sql = "DELETE FROM `kategori_buku` WHERE KategoriID=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data Berhasil di Hapus');
				window.location.href='master-kategori.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Gagal di Hapus');
			window.location.href='master-kategori.php';
		</script>";
    }
}
