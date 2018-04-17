-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Apr 2018 pada 19.05
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(4) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `pass`) VALUES
(1, 'cahyo', '6ad7bf5a600cbab86029b343506a8557'),
(2, 'admin', 'c3284d0f94606de1fd2af172aba15bf3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `th_terbit` varchar(4) NOT NULL,
  `harga` float NOT NULL,
  `ket` text NOT NULL,
  `stok` int(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `id_ktg` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `th_terbit`, `harga`, `ket`, `stok`, `gambar`, `id_admin`, `id_ktg`) VALUES
(20001, 'Android untuk kids Jaman Now', 'Generasi Micin ', '1997', 500000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, '../../img/android.png', 1, 5),
(20003, 'Android iki buku', 'google', '1002', 60000, 'dadsdasd', 21, '../../img/ayamfra.jpg', 1, 4),
(20004, 'bukan buku ', 'aswin bahar', '2017', 80000, 'fsfdfd', 27, '../../img/pic.png', 1, 5),
(20005, 'Panduan Hacking Website dengan Kali Linux', 'Mr. Doel', '2016', 58000, 'Banyaknya kasus hacking pada website yang terjadi di berbagai belahan dunia telah menyita perhatian banyak orang dan membuat para pengguna internet menjadi cemas. Pasalnya banyak kasus seperti deface, pencurian data-data penting, dan penyebaran data penting ke publik melalui internet menjadi viral. Apa sebenarnya yang dilakukan oleh seorang hacker hingga bisa melakukan aksi hacking pada sebuah website? Buku ini akan menjawab pertanyaan tersebut di mana akan dibahas teknik-teknik Hacking Website mulai dari tingkat dasar hingga menengah dengan menggunakan sistem operasi populer dalam bidang hacking, yaitu Kali Linux. Pada buku ini juga tersedia file latihan berisi website-website vulnerable yang digunakan untuk praktek sehingga akan mempermudah pembaca dalam mempelajari teknik-teknik hacking website.', 21, '../../img/kali.jpg', 1, 4),
(20006, 'Mengolah Database dengan MS Excel 2016', 'Jubilee Enterprise', '2017', 32000, 'MS Excel dapat digunakan untuk mengolah data dari berbagai sumber, termasuk dari database yang dibuat menggunakan MS Access atau MySQL', 6, '../../img/9786020450087_Mengolah-Database-dengan-MS-Excel-2016.jpg', 1, 5),
(20007, 'Mengelola Database Menggunakan Macro Excel', 'Yudhy Wicaksono & Solusi Kantor', '2017', 48000, 'Pengelolaan database yang dilakukan secara manual terkadang membosankan dan memakan banyak waktu dan pikiran. Untuk mempercepat dan mempermudah pengelolaan database, Anda perlu menggunakan Macro Excel. Waktu yang Anda butuhkan untuk mengelola database menggunakan Macro Excel hanya dalam hitungan menit atau bahkan detik. Buku Mengelola Database Menggunakan Macro Excel mengupas berbagai teknik penggunaan Macro Excel untuk mengelola database dengan lebih cepat dan lebih mudah. Melalui buku ini Anda akan mempelajari bagaimana menghapus seluruh kolom atau baris kosong, menyaring data menggunakan shortcut, menyaring data menggunakan klik ganda, menyaring data menggunakan menu klik kanan, membuat laporan penjualan tiap salesman, membuat ringkasan kepuasan pasien dengan PivotTable, membuat aplikasi database dan masih banyak lagi. Buku ini sangat cocok digunakan sebagai referensi dan media latihan untuk meningkatkan kemampuan Anda dalam menggunakan Macro Excel, terutama untuk mengelola database. Contoh kasus yang disajikan merupakan contoh kasus riil yang sering dijumpai dalam dunia bisnis sehari-hari. Keterampilan: Pemula, Menengah Kelompok: Aplikasi Perkantoran Jenis buku: Referensi, Tutorial', 4, '../../img/9786020449845_Mengelola-Database-Menggunakan-Macro-Excel.jpg', 1, 5),
(20008, 'UNDIP', 'tidak tahu', '2017', 80000, 'ini apa', 3, '../../img/Logo Undip (Full Color) (JPG).jpg', 1, 3),
(20009, 'buku tahunana hihihihi', 'hilang', '2016', 5600, 'erwer', 5, '../../img/fransind.jpg', 2, 4),
(20013, 'Blogspot dan Wordpress Komplet', 'Jubilee Enterprise', '2017', 37300, 'Blogspot dan Wordpress adalah jawaban terbaik bagi orang yang ingin sekali menekuni kegiatan blogging, baik untuk menyalurkan hobi maupun mengerjakan profesi. Kedua platform blog tersebut sangat mudah digunakan, populer, dan didukung oleh komunitas blogger yang sangat besar jumlahnya. Buku ini menjelaskan cara menggunakan Blogspot dan Wordpress sekaligus. Anda akan mempelajari cara-cara aktivitas blogging menggunakan dua platform tersebut seperti membuat akun, mengatur bahasa, tampilan, tanggal, dan setting penting lainnya, menulis artikel, memasukkan gambar/foto, memasang link, hingga membuat halaman profil yang menarik. Selain itu, buku ini juga mengajarkan cara-cara mengatur komentar agar blog menjadi tetap menarik. Setelah membaca buku ini, Anda bisa memilih salah satu platform blog yang paling cocok untuk digunakan. Namun, tidak ada salahnya pula jika Anda menggunakan kedua platform tersebut agar aktivitas blogging menjadi lebih seru dan menarik. Ayo ramaikan jagat internet dengan cara nge-blog dengan sehat! (Thinkjubilee.com).', 5, '../../img/9786020450605_Blogspot-dan-Wordpress-Komplet.jpg', 1, 5),
(20014, 'responsi sbd 2017', 'yanuar ATP', '2017', 500000, 'ini responsi', 5, '../../img/natfra.png', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `buku_total`
--
CREATE TABLE `buku_total` (
`tgl_post` date
,`judul` varchar(255)
,`pengarang` varchar(50)
,`th_terbit` varchar(4)
,`harga` float
,`ket` text
,`stok` int(100)
,`gambar` varchar(255)
,`user` varchar(50)
,`kategori` varchar(255)
,`id_buku` int(10)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_ktg` int(6) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_ktg`, `kategori`) VALUES
(1, 'ANAK-ANAK'),
(2, 'SEJARAH'),
(3, 'OTOMOTIF'),
(4, 'KULINER'),
(5, 'TEKNOLOGI'),
(6, 'KESEHATAN'),
(7, 'MANGA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `email`, `pass`) VALUES
(5003, 'cahyo666', 'nugroho@gmail.com', 'ee4eb73176302de1653902cb5fe483ed'),
(5006, 'cahyo', 'cahyo@cahyo.cahyo', '6ad7bf5a600cbab86029b343506a8557'),
(5008, 'bukan cahyo', 'a@a.a', '28c8edde3d61a0411511d3b1866f0636'),
(5010, 'bayu', 'bay@hah.com', '28c8edde3d61a0411511d3b1866f0636'),
(5011, 'z', 'z@z.z', '839ad0a86347fe9f6b8d16123d098287');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(4) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `total_harga` float NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_buku`, `id_pembeli`, `jumlah`, `total_harga`, `tgl`) VALUES
(341, 20014, 5010, 2, 500000, '2017-11-23 11:18:41'),
(342, 20008, 5010, 5, 80000, '2018-01-15 04:09:02'),
(343, 20003, 5010, 9, 60000, '2018-01-15 04:44:15'),
(348, 20001, 5006, 1, 500000, '2018-01-15 08:08:03');

-- --------------------------------------------------------

--
-- Stand-in structure for view `transaksi_total`
--
CREATE TABLE `transaksi_total` (
`id_pembeli` int(11)
,`id_buku` int(11)
,`judul` varchar(255)
,`pengarang` varchar(50)
,`harga` float
,`gambar` varchar(255)
,`jumlah` int(4)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id_admin` int(3) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `tgl_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id_admin`, `id_buku`, `tgl_post`) VALUES
(1, 20001, '2017-11-15'),
(1, 20003, '2017-11-16'),
(1, 20004, '2017-11-17'),
(1, 20005, '2017-11-19'),
(1, 20006, '2017-11-20'),
(1, 20007, '2017-11-20'),
(1, 20008, '2017-11-21'),
(2, 20009, '2017-11-21'),
(1, 20013, '2017-11-23'),
(1, 20014, '2017-11-23');

-- --------------------------------------------------------

--
-- Struktur untuk view `buku_total`
--
DROP TABLE IF EXISTS `buku_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `buku_total`  AS  select `upload`.`tgl_post` AS `tgl_post`,`buku`.`judul` AS `judul`,`buku`.`pengarang` AS `pengarang`,`buku`.`th_terbit` AS `th_terbit`,`buku`.`harga` AS `harga`,`buku`.`ket` AS `ket`,`buku`.`stok` AS `stok`,`buku`.`gambar` AS `gambar`,`admin`.`user` AS `user`,`kategori`.`kategori` AS `kategori`,`buku`.`id_buku` AS `id_buku` from (`admin` join ((`buku` join `kategori` on((`buku`.`id_ktg` = `kategori`.`id_ktg`))) join `upload` on((`buku`.`id_buku` = `upload`.`id_buku`))) on((`admin`.`id_admin` = `buku`.`id_admin`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `transaksi_total`
--
DROP TABLE IF EXISTS `transaksi_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksi_total`  AS  select `transaksi`.`id_pembeli` AS `id_pembeli`,`transaksi`.`id_buku` AS `id_buku`,`buku`.`judul` AS `judul`,`buku`.`pengarang` AS `pengarang`,`buku`.`harga` AS `harga`,`buku`.`gambar` AS `gambar`,`transaksi`.`jumlah` AS `jumlah` from (`transaksi` join `buku` on((`transaksi`.`id_buku` = `buku`.`id_buku`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_ktg`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20015;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_ktg` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5012;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
