<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $alamat = $_POST['alamat'];
    $roleID = $_POST['roleID'];
    $username = $_POST['username'];
    $sql = "INSERT INTO `user` (`UserID`, `RoleID`, `Password`, `Email`, `Namalengkap`, `Alamat`, `Username`)
            VALUES (NULL, '$roleID', '$password', '$email', '$namalengkap', '$alamat', '$username');";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>
                alert('User Berhasil Di Tambahkan');
                window.location.href='master-user.php';
            </script>";
    } else {
        echo "<script>
                alert('User Gagal Di Tambahkan');
                window.location.href='tambah-user.php';
            </script>";
    }
} elseif (isset($_POST['update'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $namalengkap = $_POST['namalengkap'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $role = $_POST['roleID'];

    // Query update
    $sql = "UPDATE user SET
                    `Username` = '$user',
                    `NamaLengkap` = '$namalengkap',
                    `Password` = '$pass',
                    `Email` = '$email',
                    `Alamat` = '$alamat',
                    `RoleID` = '$role'
                WHERE UserID = '$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
                alert('User Berhasil diubah');
                window.location.href='master-user.php';
            </script>";
    } else {
        echo "<script>
                alert('User Gagal diubah');
                window.location.href='master-user.php?id=$id';
            </script>";
    }
}

$id = $_GET['id'];
$sql = "DELETE FROM user WHERE userID=$id";
$hapus = mysqli_query($conn, $sql);

if ($hapus) {
    $del = mysqli_query($conn, "ALTER TABLE user AUTO_INCREMENT =$id");
    echo "<script>alert('hapus berhasil');
    window.location.href='master-user.php';
    </script>";
} else {
    echo "<script>alert('gagal di hapus');
    window.location.href='master-user.php';
    </script>";
}
