<?php
include 'connection.php';

if (isset($_POST['simpan'])) {


    $nama = $_POST['nama'];
    $sql = "INSERT INTO `role` VALUES (NULL, '$nama');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Data Role Berhasil di simpan');
				window.location.href='master-role.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Role Gagal di Simpan');
			window.location.href='tambah-role.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $id_role = $_POST['RoleID'];
    $nama = $_POST['nama'];
    $result = mysqli_query($conn, "UPDATE `role` SET `NamaRole` = '$nama' WHERE `RoleID` = $id_role");

    if ($result) {
        echo "
		<script>
				alert('Data Role Berhasil diubah');
				window.location.href='master-role.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Role Gagal diubah');
			window.location.href='master-role.php';
		</script>";
    }
} else {

    $id = $_GET['id'];
    $sql = "DELETE FROM `role` WHERE RoleID=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data Role Berhasil di Hapus');
				window.location.href='master-role.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Role Berhasil di Hapus');
			window.location.href='master-role.php';
		</script>";
    }
}
