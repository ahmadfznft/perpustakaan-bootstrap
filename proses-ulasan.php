<?php
include 'connection.php';

if (isset($_POST['komentar'])) {
    $bukuID = $_POST['buku_id'];
    $isikomentar = $_POST['komentar'];
    $userid = $_SESSION['UserID'];
    $rating = $_POST['rating'];

    $query = "INSERT INTO ulasanbuku (UserID, BukuID, Ulasan, rating, tanggalUlasan) 
              VALUES ('$userid', '$bukuID', '$isikomentar', '$rating', NOW())";

    if (mysqli_query($conn, $query)) {
        header("Location: detail-buku.php?id=$bukuID");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>