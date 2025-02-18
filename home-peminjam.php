<?php
include 'navbar.php';

$qrating = "SELECT b.*, 
          COALESCE(AVG(u.Rating), 0) AS RataRata, 
          COUNT(u.UlasanID) AS JumlahRating 
          FROM buku b 
          LEFT JOIN ulasanbuku u ON b.BukuID = u.BukuID 
          GROUP BY b.BukuID";

$result = mysqli_query($conn, $qrating);

$userId = $_SESSION['UserID'];
$userQuery = $conn->query("SELECT Username FROM user WHERE UserID = '$userId'");
$row = $userQuery->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Xenon</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <h1 class="text-center mb-5 mt-3"">Selamat datang, <?php echo $row['Username']; ?>!</h1>

    <div class="d-flex justify-content-center mb-3">
        <!-- pencarian untuk buku atau penulis -->
        <input type="text" id="searchInput" class="form-control w-50 mx-2" onkeyup="searchTable()" placeholder="Cari buku atau penulis...">

        <!-- Dropdown urutkan berdasarkan -->
        <select id="sortRating" class="form-control w-25 mx-2" onchange="sortBooks()">
            <option value="" hidden>Urutkan berdasarkan</option>
            <option value="high">Rating tertinggi</option>
            <option value="low">Rating terendah</option>
            <option value="asc">A-Z</option>
            <option value="desc">Z-A</option>
        </select>
    </div>

    <div class="container mt-5">
        <div class="row" id="example">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-3 mb-4 book-card">
                    <div class="card shadow-sm">
                        <img src="<?= htmlspecialchars($row['Gambar']); ?>" class="card-img-top" style="height: 250px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['Judul']); ?></h5>
                            <p class="card-text text-muted">Penulis: <?= htmlspecialchars($row['Penulis']); ?></p>

                            <?php $rating = round($row['RataRata']); ?>
                            <p class="card-text">Rating: <?= number_format($row['RataRata'], 1); ?> ★ (<?= $row['JumlahRating']; ?> ulasan)</p>

                            <a href="tambah-peminjaman.php?id=<?= $row['BukuID']; ?>" class="btn btn-primary">Pinjam Buku</a>
                            <a href="detail-buku.php?id=<?= $row['BukuID']; ?>" class="btn btn-success">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fungsi pencarian manual Untuk Mencari Buku / Penulis
        function searchTable() {
            var input, filter, container, cards, card, title, author, i, txtValueTitle, txtValueAuthor;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            container = document.getElementById("example");
            cards = container.getElementsByClassName("book-card");

            // Loop semua card buku
            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                title = card.getElementsByClassName("card-title")[0]; // Mengambil judul buku
                author = card.getElementsByClassName("card-text text-muted")[0]; // Mengambil penulis
                if (title && author) {
                    txtValueTitle = title.textContent || title.innerText;
                    txtValueAuthor = author.textContent || author.innerText;
                    if (txtValueTitle.toLowerCase().indexOf(filter) > -1 || txtValueAuthor.toLowerCase().indexOf(filter) > -1) {
                        card.style.display = "";
                    } else {
                        card.style.display = "none";
                    }
                }
            }
        }

        // Fungsi untuk mengurutkan buku berdasarkan rating atau abjad
        function sortBooks() {
            var container, cards, card, rating, title, i, sortedCards = [],
                sortRating;

            sortRating = document.getElementById("sortRating").value;

            container = document.getElementById("example");
            cards = Array.from(container.getElementsByClassName("book-card"));

            // Sorting berdasarkan rating atau abjad
            if (sortRating) {
                sortedCards = cards.sort(function(a, b) {
                    // Ambil rating buku
                    ratingA = parseFloat(a.getElementsByClassName("card-text")[0].textContent.split(" ★")[0].split("Rating: ")[1]);
                    ratingB = parseFloat(b.getElementsByClassName("card-text")[0].textContent.split(" ★")[0].split("Rating: ")[1]);

                    if (sortRating === "high") return ratingB - ratingA; // Rating tertinggi
                    if (sortRating === "low") return ratingA - ratingB; // Rating terendah
                    if (sortRating === "asc") return a.getElementsByClassName("card-title")[0].textContent.localeCompare(b.getElementsByClassName("card-title")[0].textContent); // A-Z
                    if (sortRating === "desc") return b.getElementsByClassName("card-title")[0].textContent.localeCompare(a.getElementsByClassName("card-title")[0].textContent); // Z-A
                });
            }

            // Menambahkan kembali ke container setelah sorting
            container.innerHTML = "";
            for (i = 0; i < sortedCards.length; i++) {
                container.appendChild(sortedCards[i]);
            }
        }
    </script>

</body>

</html>