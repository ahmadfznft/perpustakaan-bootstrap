<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['pass'])) {
        $user = $_POST['username'];
        $pw = md5($_POST['pass']);

        $query = mysqli_query($conn, "SELECT * FROM `user` WHERE Username='$user' AND Password='$pw'");

        $count = mysqli_num_rows($query);
        if ($count > 0) {
            $login = mysqli_fetch_array($query);

            $_SESSION['UserID'] = $login['UserID'];
            $_SESSION['RoleID'] = $login['RoleID'];
            $_SESSION['Username'] = $login['Username'];
            $_SESSION['status'] = 'login';

            if ($login['RoleID'] == 1) {
                echo "<script>alert('Login berhasil'); window.location.href='home-admin.php';</script>";
            } elseif ($login['RoleID'] == 2) {
                echo "<script>alert('Login berhasil'); window.location.href='home-petugas.php';</script>";
            } elseif ($login['RoleID'] == 3) {
                echo "<script>alert('Login berhasil'); window.location.href='home-peminjam.php';</script>";
            }
        } else {
            echo "<script>alert('Username atau password salah'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Mohon isi username dan password'); window.location.href='login.php';</script>";
    }
}
?>