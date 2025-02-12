<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="path/to/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include "navbar.php";

    $userCount = $conn->query("SELECT COUNT(*) as count FROM user")->fetch_assoc()['count'];
    $roleCount = $conn->query("SELECT COUNT(*) as count FROM role")->fetch_assoc()['count'];
    $categoryCount = $conn->query("SELECT COUNT(*) as count FROM kategori_buku")->fetch_assoc()['count'];
    $bookCount = $conn->query("SELECT COUNT(*) as count FROM buku")->fetch_assoc()['count'];
    $borrowerCount = $conn->query("SELECT COUNT(*) as count FROM peminjaman")->fetch_assoc()['count'];

    $userId = $_SESSION['UserID']; // Pastikan UserID disimpan di session saat login
    $userQuery = $conn->query("SELECT Username FROM user WHERE UserID = '$userId'");
    $row = $userQuery->fetch_assoc();
    ?>

    <div class="container mt-5">
        <h1 class="text-center">Selamat datang, <?php echo $row['Username']; ?>!</h1>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <a href="master-kategori.php" class="text-decoration-none" style="color: black;">
                            <h5 class="card-title">Daftar Kategori</h5>
                            <p class="card-text">Jumlah kategori: <?php echo $categoryCount; ?></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <a href="master-buku.php" class="text-decoration-none" style="color: black;">
                            <h5 class=" card-title">Daftar Buku</h5>
                            <p class="card-text">Jumlah buku: <?php echo $bookCount; ?></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <a href="data-peminjam.php" class="text-decoration-none" style="color: black;">
                            <h5 class=" card-title">Data Peminjam</h5>
                            <p class="card-text">Jumlah peminjam: <?php echo $borrowerCount; ?></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="path/to/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>