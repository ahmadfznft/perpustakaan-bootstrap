-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2025 pada 08.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fauzan_digitallibrary_bootstrap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `BukuID` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Penerbit` varchar(255) NOT NULL,
  `TahunTerbit` int(11) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`BukuID`, `Judul`, `Penulis`, `Penerbit`, `TahunTerbit`, `Deskripsi`, `Gambar`, `Stok`) VALUES
(1, 'Burlian', 'Tere Liye', 'Republika', 2009, 'Novel yang mengangkat tema persahabatan dan kekeluargaan dengan latar kehidupan anak-anak di Pulau Sumatera pada era Orde Baru. Cerita ini berfokus pada kehidupan Burlian, seorang anak dari keluarga kurang mampu yang tinggal di desa terpencil. Meskipun dikenal sebagai \"si Anak Spesial,\" Burlian harus menghadapi berbagai tantangan hidup, salah satunya adalah pendidikan yang sangat dihargai oleh orang tuanya.\r\nKehidupan Burlian dipenuhi petualangan dan kenakalan bersama kakak dan adiknya. Meskipun sering berbuat nakal, Burlian belajar banyak dari orang tuanya, terutama dari hukuman yang diberikan Mamak dan Bapak yang mendidiknya dengan cara bijak tanpa kekerasan. Salah satu pelajaran berharga adalah pentingnya pendidikan, yang disampaikan melalui pengalaman kerja keras di kebun dan hutan.\r\nBurlian juga menjalin persahabatan dengan Nakamura-San, seorang pria Jepang yang datang ke desa mereka untuk proyek pembangunan. Persahabatan ini membuka jalan bagi Burlian untuk meraih impian, yaitu mendapatkan beasiswa ke Jepang.\r\nNovel ini mengajarkan nilai-nilai seperti kesederhanaan, kerja keras, kejujuran, kasih sayang, dan pengorbanan orang tua. Meskipun ada beberapa bagian cerita yang terasa lambat, novel ini tetap memberikan pesan inspiratif bagi pembaca, terutama anak-anak.', 'images/burlian.jpeg', 2),
(2, 'Bulan', 'Tere Liye', 'Gramedia Pustaka Utama', 2015, 'Setelah pertempuran di Klan Bulan, Raib, Seli, dan Ali kembali menjalani kehidupan normal di Klan Bumi. Enam bulan kemudian, Miss Selena datang untuk mengajak mereka ke Klan Matahari untuk tujuan diplomasi. Setibanya di sana, mereka ikut serta dalam Festival Matahari, sebuah kompetisi berbahaya untuk menemukan bunga matahari pertama yang mekar. Bersama Ily, putra Ilo, mereka melewati berbagai rintangan seperti padang perdu, danau, dan pegunungan, serta bertarung melawan monster dan gorila mengamuk.\r\n\r\nPetualangan ini mengajarkan pentingnya kerja sama, sikap positif, dan ketangguhan dalam menghadapi tantangan. Novel ini penuh dengan misteri yang terungkap, namun masih banyak teka-teki baru yang harus dipecahkan.', 'images/bulan.jpeg', 5),
(3, 'Matahari', 'Tere Liye', 'Kompas Gramedia', 2018, 'melanjutkan petualangan Raib, Seli, dan Ali setelah tewasnya sahabat mereka, Ily. Mereka kembali ke klan Bumi, namun Ali terlibat dalam kontroversi kompetisi basket dan mulai mengembangkan teknologi baru dari klan Matahari dan Bulan. Ali kemudian mengajak Raib dan Seli untuk mengeksplorasi klan Bintang, meskipun Raib menolak menggunakan Buku Kehidupan yang bisa menghancurkan kepercayaan Miss Selena.\r\n\r\nMereka melakukan perjalanan menggunakan pesawat kapsul versi kedua, Ily, menuju gua yang mengarah ke sebuah lorong kuno. Dalam perjalanan, mereka terjebak dalam konflik di Lembah Hijau dan kota Zaramaraz, dihadapkan pada pasukan bayangan dan pengadilan yang melarang kekuatan mereka. Ketiga sekawan ini akhirnya berhadapan dengan Marsekal Laar dan terlibat dalam pertempuran besar.\r\n\r\nKetegangan meningkat saat Ali, Raib, dan Seli berusaha merebut kembali Buku Kehidupan Raib, namun mereka tertangkap dan dibawa ke ruangan isolasi. Pertarungan seru berlanjut, dengan kekuatan mereka yang saling terhubung. Di akhir cerita, Ali melompat ke portal menuju klan Komet, membawa mereka ke dunia paralel yang semakin penuh ancaman.\r\n\r\nNovel ini mengisahkan petualangan, pertarungan, dan tantangan baru yang harus dihadapi oleh ketiga sahabat dalam dunia paralel yang penuh bahaya.', 'images/matahari.jpeg', 5),
(4, 'Bumi', 'Tere Liye', 'Gramedia Pustaka Utama', 2019, 'Novel Bumi menceritakan petualangan tiga remaja—Raib, Seli, dan Ali—yang memiliki kekuatan luar biasa dan terikat takdir untuk menyelamatkan Bumi dari kehancuran. Raib, keturunan Klan Bulan, memiliki kemampuan menghilang dan menguasai Buku Kehidupan; Seli, dari Klan Matahari, memiliki kekuatan api dan tekad kuat; dan Ali, dari Klan Bumi, bisa berkomunikasi dengan hewan. Ketiganya menyadari kekuatan mereka setelah insiden tower listrik, yang kemudian membawa mereka ke dunia paralel.\r\n\r\nMereka menjelajahi Klan Bulan, Klan Matahari, dan Klan Bumi, menghadapi berbagai bahaya seperti monster dan pasukan Tamus, sosok jahat yang ingin menguasai dunia. Dalam perjalanan, mereka bertemu karakter-karakter fantastis yang membantu mereka mengungkap rahasia dunia paralel dan berusaha mengalahkan Tamus.', 'images/bumin.jpg', 6),
(6, 'Laut Bercerita', 'Leila Salikha Chudori.', 'Gramedia', 2017, 'Laut Bercerita mengisahkan Biru Laut, seorang mahasiswa Sastra Inggris di Universitas Gadjah Mada, Yogyakarta, yang terlibat dalam organisasi Winatra yang aktif dalam diskusi sastra dan pergerakan melawan rezim pemerintah. Laut, yang tertarik pada karya-karya Pramoedya Ananta Toer yang dilarang, bergabung dengan aktivis muda lainnya untuk memperjuangkan kebebasan berpikir. Namun, mereka ditangkap, disiksa, dan dipaksa untuk mengungkapkan siapa yang menggerakkan mereka. Keluarga Laut yang tidak mengetahui nasibnya, terus berharap dan berdoa agar ia kembali. Novel ini menceritakan penderitaan, perjuangan, dan semangat kebebasan para aktivis muda di tengah ketidakadilan.', 'images/laut_bercerita.jpg', 15),
(7, 'In a Blue Moon', 'Ilana Tan', 'Gramedia Pustaka Utama', 2015, 'Lucas Ford pertama kali bertemu dengan Sophie Wilson di bulan Desember pada tahun terakhir SMA-nya. Gadis itu membencinya. Lucas kembali bertemu dengan Sophie di bulan Desember sepuluh tahun kemudian di kota New York. Gadis itu masih membencinya.\r\nMasalah utamanya bukan itu—oh, bukan!—melainkan kenyataan bahwa gadis yang membencinya itu kini ditetapkan sebagai tunangan Lucas oleh kakeknya yang suka ikut campur.\r\nLucas mendekati Sophie bukan karena perintah kakeknya. Ia mendekati Sophie karena ingin mengubah pendapat Sophie tentang dirinya. Juga karena ia ingin Sophie menyukainya sebesar ia menyukai gadis itu. Dan, kadang-kadang—ini sangat jarang terjadi, tentu saja—kakeknya bisa mengambil keputusan yang sangat tepat.\r\nPerjalanan kisah dua orang yang belajar untuk saling mengenal. Tidak ada konflik yang berarti di novel ini. Kehadiran Adrian dan Miranda sebagai pihak ketiga pun tidak menimbulkan masalah besar. Ini tentang kisah remaja cowok yang suka dengan cewek tapi gengsi untuk menunjukkannya. Dan tentang cewek dewasa yang dari awal sudah suka sama cowok tapi gengsi buat mengakuinya.\r\nHubungan Lucas dan Sophie dulunya tidak bisa dibilang baik. Sampai sekarang Sophie masih menyimpan kebencian terhadap Lucas, hal yang berbeda dengan Lucas. Novel ini akan mencoba mengangkat tema benci jadi cinta. Bagaimana Lucas pelan-pelan mencoba meyakinkan Sophie bahwa dia telah berubah dan dia layak menjadi kekasih Sophie.', 'images/inabluemoon.jpg', 6),
(8, 'Mariposa ', 'Luluk HF', 'Gramedia Pustaka Utama', 2024, 'Mariposa masa seandainya adalah \"what if\" dari Mariposa Universe. \r\nMengisahkan Iqbal dan Acha dengan alur \"SEANDAINYA\" di Mariposa pertama,   Iqbal masih tidak membalas perasaan Acha dan Acha akhirnya menyerah untuk mengejar seorang Iqbal.\r\nSetelah lulus SMA Iqbal langsung kuliah di luar negeri meninggalkan Acha dan Acha memilih kuliah kedokteran dan berusaha keras melupakan seorang Iqbal. \r\nEnam tahun kemudian, Iqbal dan Acha untuk pertama kalinya bertemu kembali di reuni SMA Arwana.\r\nKisah mereka berdua berlanjut lagi setelah enam tahun lamanya terpisah.', 'images/mariposa.jpg', 6),
(9, 'Hafalan Shalat Delisa', 'Tere Liye', 'Republika', 2005, 'Hafalan Shalat Delisa berlatar tragedi Tsunami Aceh yang terjadi pada 2004. Dalam novel ini tersirat nilai keikhlasan yang dirajut oleh Tere Liye dengan cukup mulus melalui sudut pandang anak-anak.\r\nKisah bermula dari sebuah keluarga di Lhoknga, Aceh, yang selalu mengamalkan ajaran Islam dalam kesehariannya. Mereka adalah keluarga Umi Salamah dan Abi Usman, yang memiliki empat anak yakni Alisa Fatimah, si kembar Alisa Zahra & Alisa Aisyah, dan si bungsu Delisa.\r\nNamun, keempat anak itu terpaksa hanya tinggal bersama ibunya, karena abinya bekerja sebagai mekanik kapak. Pekerjaan itu membuatnya hanya bisa pulang 3 bulan sekali, bahkan terkadang lebih lama.\r\nMeski begitu, ajaran Islam yang sudah mengakar di keluarga tersebut terus dipertahankan. Setiap subuh, umi selalu mengajak anak-anaknya salat berjamaah.\r\nAwalnya, Delisa sulit mengikuti kebiasaan itu. Namun, kakak-kakaknya mengajarinya dengan sabar. Setiap salat berjamaah, Aisyah melantangkan suara bacaannya agar Delisa bisa mengikuti.\r\nSuatu hari, Delisa mendapat tugas dari sekolahnya untuk menghafal bacaan salat. Si bungsu berusaha memenuhi tugas itu dengan baik. Apalagi, umi menjanjikannya hadiah berupa kalung emas jika Delisa berhasil menghafal bacaan tersebut.\r\nWaktu ujian tiba, tepat pada 26 Desember 2004. Namun, terjadi peristiwa memilukan saat tiba pada giliran Delisa.\r\nPersis ketika Delisa sampai pada bacaan takbiratulihram, bangunan sekolah tiba-tiba bergetar hebat. Genting-genting berjatuhan, papan tulis yang menempel di dinding terlepas, berdebam menghajar lantai.\r\nTak lama setelahnya air laut naik ke daratan. Gelombang air menerpa dinding luar sekolah. Akan tetapi, Delisa tak memedulikan hal itu. Ia tetap khusuk melafalkan bacaan salat yang sudah lama ia persiapkan.\r\nTiba-tiba tubuh Delisa terpelanting, lalu terseret ombak. Namun, untungnya ia selamat. Tubuhnya tersangkut di semak belukar.\r\nSeorang prajurit marinir Amerika Serikat, Smith, berhasil menemukan Delisa tetapi dalam kondisi yang tidak baik-baik saja. Tubuhnya penuh luka, lengan kanannya dan kakinya patah. Delisa pun dibawa ke Kapal Induk John F. Kennedy.\r\nDelisa dioperasi, kaki kanannya diamputasi. Siku tangan kanannya di-gips. Luka-luka kecil di kepalanya dijahit. Muka lebamnya dibalsem tebal-tebal. Lebih dari seratus baret di sekujur tubuhnya.\r\nSementara itu, tiga kakak perempuan Delisa, Aisyah, Fatimah, dan Zahra, tak terselamatkan. Mayatnya ditemukan sedang berpelukan. Hanya Umi Salamah yang belum ditemukan.\r\nMenurut pandangan Smith, apa yang terjadi pada Delisa adalah sebuah keajaiban. Gadis kecil itu bisa selamat padahal peluangnya begitu kecil.\r\nKarena peristiwa itu, Smith memutuskan menjadi mualaf dan mengganti namanya menjadi Salam.\r\nTiga minggu setelah dirawat di Kapal Induk, Delisa diizinkan pulang. Delisa dipertemukan dengan sang ayah, yang tidak tahu menahu tentang peristiwa itu karena sedang berlayar ke tempat nun jauh. Abi pun membawa Delisa pulang ke Lhok Nga, tepatnya di tenda pengungsian.', 'images/hafalandelisa.jpg', 7),
(10, 'Perahu Kertas', 'Dee Lestari', 'Bentang Pustaka', 2009, 'Novel Perahu Kertas karya Dewi \"Dee\" Lestari mengisahkan tentang persahabatan, percintaan, dan idealisme. Cerita berfokus pada dua tokoh utama: Keenan, seorang remaja laki-laki berbakat dalam melukis yang terpaksa kuliah di Fakultas Ekonomi, Bandung, dan Kugy, perempuan dengan imajinasi tinggi yang bercita-cita menjadi juru dongeng. Mereka bertemu di Bandung dan menjadi sahabat bersama Eko dan Noni.\r\nKeenan dan Kugy memiliki perasaan satu sama lain, namun keadaan menghalangi mereka untuk mengungkapkan perasaan itu. Keenan menjalin hubungan dengan Wanda, sementara Kugy memiliki kekasih bernama Ojos. Hubungan mereka semakin rumit, dan akhirnya, Keenan pindah ke Bali setelah berpisah dengan Wanda, sementara Kugy menemukan pekerjaan di Jakarta.\r\nDi Bali, Keenan mendapatkan inspirasi untuk melukis, sementara Kugy menemukan cinta sejatinya dalam sosok Remi. Namun, hubungan mereka diuji, dan akhirnya, Keenan dan Kugy bertemu kembali setelah lima tahun dengan hati yang penuh perubahan. Kisah ini menggambarkan perjuangan mereka dalam menghadapi cinta, persahabatan, dan impian, serta bagaimana hidup membawa mereka ke titik yang tak terduga.', 'images/perahukertas.jpg', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `KategoriBukuID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `KategoriID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`KategoriBukuID`, `BukuID`, `KategoriID`) VALUES
(13, 4, 1),
(14, 4, 5),
(15, 4, 12),
(18, 6, 4),
(19, 6, 6),
(20, 6, 12),
(24, 3, 1),
(25, 3, 5),
(26, 3, 12),
(27, 1, 1),
(28, 1, 12),
(29, 2, 1),
(30, 2, 5),
(31, 2, 12),
(32, 7, 12),
(34, 8, 4),
(35, 8, 13),
(36, 9, 9),
(37, 9, 14),
(38, 9, 15),
(39, 10, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `KategoriID` int(11) NOT NULL,
  `NamaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`KategoriID`, `NamaKategori`) VALUES
(1, 'petualangan'),
(2, 'horror'),
(3, 'komedi'),
(4, 'romansa'),
(5, 'fantasi'),
(6, 'sejarah'),
(7, 'misteri'),
(8, 'thriller'),
(9, 'keluarga'),
(10, 'inspiratif'),
(12, 'fiksi'),
(13, 'teenlit'),
(14, 'religi'),
(15, 'drama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `KoleksiID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `PeminjamanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `TanggalPeminjaman` date NOT NULL,
  `TanggalPengembalian` date NOT NULL,
  `StatusPeminjaman` enum('Menunggu Konfirmasi','Buku Dipinjam','Buku Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`PeminjamanID`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`) VALUES
(11, 2, 3, '2025-02-05', '2025-02-06', 'Buku Dikembalikan'),
(12, 2, 2, '2025-02-12', '2025-02-13', 'Buku Dikembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `NamaRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`RoleID`, `NamaRole`) VALUES
(1, 'admin'),
(2, 'petugas'),
(3, 'peminjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `UlasanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `Ulasan` text NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggalUlasan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `RoleID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'admin'),
(2, 3, 'ujang ', 'ed84089fcb1b864597cf6dc504859d1d', 'ujang@gmail.com', 'ujanaja', 'di jalan jalan'),
(4, 2, 'uus', 'a6e8c26fdaeff2c0230f864ccbc610d2', 'uus@gmail.com', 'uus', 'jalanaja');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`BukuID`);

--
-- Indeks untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`KategoriBukuID`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indeks untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`KoleksiID`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`PeminjamanID`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indeks untuk tabel `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`UlasanID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `BukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `KategoriBukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `KategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `KoleksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `PeminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `UlasanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
