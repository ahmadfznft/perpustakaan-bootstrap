<?php
include 'connection.php';

if (isset($_POST['submit'])) {

    $user = $_POST['username'];
    $pw = $_POST['pass'];
    $email = $_POST['email'];
    $nama = $_POST['fullname'];
    $alamat = $_POST['alamat'];

    $role = 3;

    $pw = md5($pw);

    $sql = "INSERT INTO user (Username, Password, Email, Namalengkap, Alamat, RoleID)
            VALUES ('$user', '$pw', '$email', '$nama', '$alamat', '$role')";
    $insert = mysqli_query($conn, $sql);

    if ($insert) {
        echo "<script>
                alert('Berhasil tambah akun');
                window.location.href='login.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal tambah akun');
                window.location.href='register.php';
            </script>";
    }
}
