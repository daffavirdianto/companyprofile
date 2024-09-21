-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2023 at 04:45 PM
-- Server version: 10.5.20-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalkendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`) VALUES
(1, 'Daffa Virdianto', 'daffa.virdianto@gmail.com', 'daffa123');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_rental`
--

CREATE TABLE `daftar_rental` (
  `id` int(8) NOT NULL,
  `nama_rental` varchar(50) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `kendaraan` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `no_wa` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(20) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(1, 'Bersih'),
(2, 'Wangi'),
(3, 'BBM'),
(4, 'Driver'),
(5, 'Minuman'),
(6, 'Snack'),
(7, 'Unit Baru'),
(8, 'Lepas Kunci');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_rekap`
--

CREATE TABLE `fasilitas_rekap` (
  `id` int(8) NOT NULL,
  `id_fasilitas` int(20) NOT NULL,
  `id_rental` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas_rekap`
--

INSERT INTO `fasilitas_rekap` (`id`, `id_fasilitas`, `id_rental`) VALUES
(1, 1, '1'),
(5, 1, '10'),
(21, 1, '12'),
(25, 1, '13'),
(68, 1, '14'),
(59, 1, '15'),
(53, 1, '16'),
(29, 1, '17'),
(63, 1, '18'),
(67, 1, '19'),
(48, 1, '2'),
(44, 1, '3'),
(38, 1, '4'),
(34, 1, '5'),
(30, 1, '6'),
(17, 1, '7'),
(13, 1, '8'),
(9, 1, '9'),
(2, 2, '1'),
(6, 2, '10'),
(22, 2, '12'),
(26, 2, '13'),
(69, 2, '14'),
(60, 2, '15'),
(54, 2, '16'),
(64, 2, '18'),
(49, 2, '2'),
(45, 2, '3'),
(39, 2, '4'),
(35, 2, '5'),
(31, 2, '6'),
(18, 2, '7'),
(14, 2, '8'),
(10, 2, '9'),
(3, 3, '1'),
(7, 3, '10'),
(23, 3, '12'),
(27, 3, '13'),
(70, 3, '14'),
(61, 3, '15'),
(55, 3, '16'),
(65, 3, '18'),
(50, 3, '2'),
(46, 3, '3'),
(40, 3, '4'),
(36, 3, '5'),
(32, 3, '6'),
(19, 3, '7'),
(15, 3, '8'),
(11, 3, '9'),
(4, 4, '1'),
(8, 4, '10'),
(24, 4, '12'),
(28, 4, '13'),
(71, 4, '14'),
(62, 4, '15'),
(56, 4, '16'),
(66, 4, '18'),
(51, 4, '2'),
(47, 4, '3'),
(41, 4, '4'),
(37, 4, '5'),
(33, 4, '6'),
(20, 4, '7'),
(16, 4, '8'),
(12, 4, '9'),
(42, 5, '4'),
(57, 7, '16'),
(52, 7, '2'),
(43, 7, '4'),
(58, 8, '16');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id_rental` varchar(50) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `nama_rental` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `rating` varchar(200) NOT NULL,
  `harga` int(50) NOT NULL,
  `jarak` varchar(200) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `no_wa` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id_rental`, `logo`, `nama_rental`, `alamat`, `rating`, `harga`, `jarak`, `tipe`, `location`, `no_wa`) VALUES
('1', 'fedina.jpg', 'Fedina Transport', 'Palihan 2, Palihan, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', '5', 350000, '4,3 Km', 'Mobil', 'https://goo.gl/maps/FqdxHHBsE9FHoGBK7', '081226310566'),
('10', 'bangkit57trans.jpeg', 'Bangkit 57 Transport', 'Jl. Nasional III, Kaliwangan, Temon Wetan, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', '5', 500000, '4,8 Km', 'Mobil', 'https://goo.gl/maps/SWKkxe6NCEegipi36', '085954517858'),
('12', 'rent.jpeg', 'Bandara YIA Melayani Transportasi Citytour Wisuda Dll', '425X+CJH, bayeman, Sindutan, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', '4.8', 900000, '4,7 Km', 'Mobil', 'https://goo.gl/maps/Wqjg3KGRPCfN5nFB7', '083869111113'),
('13', 'amanahtravel.jpeg', 'Rent Car & Travel Amanah', 'Jl. Daendels Pantai Sel. No.70, Karang Wuni, Karangwuni, Wates, Kulon Progo, DIY', '5', 200000, '7,8 Km', 'Mobil', 'https://goo.gl/maps/pgAdEShSKxqazvkD9', '085876280167'),
('14', 'rent.jpeg', 'Rent Car + driver, transport & citytour', '4377+F7W, Ngringit, Palihan, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', '5', 600000, '1,8 Km', 'Mobil', 'https://goo.gl/maps/kJoDAHebeFsFxU1ZA', '082328219296'),
('15', 'laxzana.jpeg', 'LAXZANA TRANS', '4377+FF6, Jl. Nasional III, Ngringit, Palihan, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', '5', 750000, '2 Km', 'Mobil', 'https://goo.gl/maps/LM5sbhv8vPB9PrCR8', '087836165777'),
('16', 'hm transport.jpeg', 'Hikmah Mandiri (HM) Transport', 'Jl. Wates - Purworejo, Area Kebun, Kebonrejo, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta', '4.8', 650000, '2 Km', 'Mobil', 'https://goo.gl/maps/MiCpPoYxCQop6cbF8', '081229538840'),
('17', 'sewa motor.jpeg', 'Sewa Motor (Alsya Kost)', '4344+3CJ, Jalan, Selong, Palihan, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', '2.5', 50000, '4,6 Km', 'Motor', 'https://goo.gl/maps/HcFsArMfbe3i4YR36', '085950403531'),
('18', 'kurniatrans.png', 'KURNIA TRANS', 'Seling, Temon Kulon, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', '5', 650000, '3 Km', 'Mobil', 'https://goo.gl/maps/erWUS3dtmuv5CM4b7', '085643643084'),
('19', 'rent.jpeg', 'KURNIA TRANS', 'Seling, Temon Kulon, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', '5', 50000, '3 Km', 'Motor', 'https://goo.gl/maps/erWUS3dtmuv5CM4b7', '085643643084'),
('2', 'seha_logo.jpeg', 'Seha Tour & Travel', 'Jl. Kalidengen- Glagah RT13/07 Temon, Kulonprogo, Yogyakarta', '5', 450000, '3,9 Km', 'Mobil', 'https://goo.gl/maps/dpWb7mdZh17Q677w5', '082130309093'),
('3', 'YIA Transport.jpg', 'YIA Transport', 'Jl. Purworejo - Jogja, Area Kebun, Sindutan, Kec. Temon, Kabupaten Kulon Progo, DIY', '4.6', 600000, '4,9 Km', 'Mobil', 'https://goo.gl/maps/VbYm36dzxH8pT98k6', '082223220543'),
('4', 'bltransport.jpeg', 'BL TRANSPORT TOUR & TRAVEL', '42HQ+G6R, Karangrejo, Karangsari, Kec. Purwodadi, Kabupaten Purworejo, Jawa Tengah 54173', '5', 650000, '4,3 Km', 'Mobil', 'https://goo.gl/maps/MXxvVy5jxrvrtAFa9', '081225391132'),
('5', 'bintang.jpeg', 'Bintang Tour Travel Jogja', 'Jalan Wates No.km 20, Wora Wari, Sukoreno, Sentolo, Kulon Progo, DIY (Terletak Di Bandara YIA) ', '5', 600000, '0,03 Km', 'Mobil', 'https://goo.gl/maps/etWUBSdpRy11Bx4b9', '085100875444'),
('6', 'adestatrans.jpeg', 'Adesta Trans', 'Jl. Daendels Pantai Sel. No.16, Kragon 1, Palihan, Temon, Kulon Progo, DIY', '4.8', 750000, '3,3 Km', 'Mobil', 'https://goo.gl/maps/GFjFGfeh3iUZXtoY6', '081215264411'),
('7', 'travel trans.jpeg', 'Travel Transportasi Bandara YIA', 'Palihan 2, Palihan, Temon, Kulon Progo, DIY', '5', 650000, '3,2 Km', 'Mobil', 'https://goo.gl/maps/DWxc7BufQAXwwq1E7', '087715481314'),
('8', 'YD.png', 'YD Carter', '439P+X2 Temon Wetan, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta', '5', 850000, '4,8 Km', 'Mobil', 'https://goo.gl/maps/C1m5NWtXrDffVKAs8', '081328086450'),
('9', 'abtrans.jpeg', 'Sewa Mobil AB Trans', 'Jl. Wates - Purworejo No.KM 14.5, Sindutan B, Sindutan, Temon, Kulon Progo, DIY', '5', 300000, '4,2 Km', 'Mobil', 'https://goo.gl/maps/bh95JL5y4dwMkFjW9', '082137228224');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
  `id_kendaraan` int(20) NOT NULL,
  `nama_kendaraan` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `tipe`) VALUES
(1, 'Avanza', 'Mobil'),
(2, 'Xenia', 'Mobil'),
(3, 'Terios', 'Mobil'),
(4, 'Ayla', 'Mobil'),
(5, 'Agya', 'Mobil'),
(6, 'Brio', 'Mobil'),
(7, 'Fortuner', 'Mobil'),
(8, 'Pajero', 'Mobil'),
(9, 'Alphard', 'Mobil'),
(10, 'Velvire', 'Mobil'),
(11, 'Luxio', 'Mobil'),
(12, 'VRZ', 'Mobil'),
(13, 'HRV', 'Mobil'),
(14, 'ELF', 'Mobil'),
(15, 'HIEC', 'Mobil'),
(16, 'BUS', 'Mobil'),
(17, 'Innova', 'Mobil'),
(18, 'Mobilio', 'Mobil'),
(19, 'Ertiga', 'Mobil'),
(20, 'Beat', 'Motor'),
(21, 'Vario', 'Motor'),
(22, 'ADV', 'Motor'),
(23, 'Revo', 'Motor'),
(24, 'Supra', 'Motor'),
(25, 'Blade', 'Motor'),
(26, 'Xpander', 'Mobil');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan_rekap`
--

CREATE TABLE `tipe_kendaraan_rekap` (
  `id` int(8) NOT NULL,
  `id_rental` varchar(50) NOT NULL,
  `id_kendaraan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_kendaraan_rekap`
--

INSERT INTO `tipe_kendaraan_rekap` (`id`, `id_rental`, `id_kendaraan`) VALUES
(1, '1', 1),
(2, '1', 2),
(3, '1', 14),
(4, '1', 15),
(5, '1', 17),
(6, '1', 18),
(7, '1', 19),
(8, '1', 26),
(9, '10', 1),
(10, '10', 6),
(11, '10', 13),
(12, '10', 15),
(13, '10', 17),
(20, '12', 1),
(21, '13', 1),
(22, '13', 2),
(85, '14', 1),
(86, '14', 2),
(87, '14', 17),
(69, '15', 1),
(70, '15', 2),
(71, '15', 9),
(72, '15', 12),
(73, '15', 14),
(74, '15', 15),
(75, '15', 17),
(60, '16', 1),
(61, '16', 2),
(62, '16', 5),
(63, '16', 6),
(64, '16', 14),
(65, '16', 15),
(66, '16', 16),
(67, '16', 17),
(68, '16', 18),
(23, '17', 20),
(76, '18', 1),
(77, '18', 2),
(78, '18', 14),
(79, '19', 20),
(80, '19', 21),
(81, '19', 22),
(82, '19', 23),
(83, '19', 24),
(84, '19', 25),
(55, '2', 1),
(56, '2', 14),
(57, '2', 15),
(58, '2', 16),
(59, '2', 17),
(38, '3', 1),
(39, '3', 2),
(40, '3', 3),
(41, '3', 4),
(42, '3', 5),
(43, '3', 6),
(44, '3', 7),
(45, '3', 8),
(46, '3', 9),
(47, '3', 10),
(48, '3', 14),
(49, '3', 15),
(50, '3', 16),
(51, '3', 17),
(52, '3', 18),
(53, '3', 19),
(54, '3', 26),
(32, '4', 1),
(33, '4', 2),
(34, '4', 14),
(35, '4', 15),
(36, '4', 16),
(37, '4', 17),
(27, '5', 1),
(28, '5', 11),
(29, '5', 14),
(30, '5', 15),
(31, '5', 17),
(24, '6', 1),
(25, '6', 15),
(26, '6', 17),
(17, '7', 1),
(18, '7', 2),
(19, '7', 17),
(16, '8', 2),
(14, '9', 1),
(15, '9', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `gadget` varchar(20) NOT NULL,
  `pesan` varchar(200) NOT NULL,
  `rating` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `gadget`, `pesan`, `rating`) VALUES
(1, 'Muhammad Iqbal', 'HP', 'aplikasi sangat informatif memudahkan untuk mencari rental kendaraan', '5'),
(2, 'Muhammad Dicky Afriza', 'HP', 'Mantap dan responsif', '5'),
(3, 'Nadia Earlyna', 'PC', 'Fitur Menarik', '4'),
(4, 'Dinto Bimasatrio', 'Hp ', 'Aplikasi sangat bagus dan user friendly, sedikit masukan pada tampilan dashboard agar diberi icon kendaraan seperti mobil ataupun motor karena mengingat aplikasi ini utk rental kendaraan, dan catatan ', '5'),
(5, 'Brian Hakim', 'PC', 'Fungsi rekomendasi lebih baik di letakkan pada all rental (karena sama saja)', '4'),
(6, 'Muhamad Andika Saputra', 'Hp', 'Tampilan Cukup Rensponsip, mungkin kedepannya tampilan lebih  dibuat menarik lagi. ', '4'),
(7, 'Arif Setiawan', 'Hp', 'Antarmuka pengguna yang menarik dan mudah digunakan', '5'),
(8, 'Fakhri Yahya', 'HP', 'Aplikasi cukup membantu mencari tempat rental sesuai keinginan dengan tampilan aplikasi menarik dan simpel sehingga pengguna tidak kesulitan dalam pengoperasian.', '5'),
(9, 'Aldi Setiawan', 'HP', 'Konten yang informatif dan mudah diakses', '4'),
(10, 'Hilmy Rahadian', 'PC', 'sekedar saran menu rekomendasi bisa dijadikan satu dengan menu all rental karena hanya menampilkan jumlah data, jarak dan kontak saja', '4'),
(11, 'Nur Alif', 'HP', 'Informasi lengkap sudah ada nomer wa dan lokasi rental', '5'),
(12, 'Revanza M', 'Android', 'Apk sangat baik, sangat membantu', '5'),
(13, 'Ibnu Musyafa', 'android', 'aplikasi sangat membantu, mudah di akses tidak perlu install app', '3'),
(14, 'Andhika Bagas Pratama', 'Hp', 'Sangat membantu ', '5'),
(15, 'Jabal Ma\'ruf ', 'PC', 'Aplikasi sangat bagus , simple mudah untuk di gunakan oleh kami sebagai customer ', '5'),
(16, 'Adi Diandoko', 'HP', 'Cukup memudahkan dalam mencari rental kendaraan. ', '5'),
(17, 'Vioga Apriza Pranadewangga', 'Hp', 'Masih terdapat eror pada menu rekomendasi bagian pilihan kendaraan, selebihnya sudah baik, mungkin diberi tambahan seperti live chat bagi penguna yang mau konsultasi langsung', '2'),
(18, 'Andhika Fariz', 'PC', 'Beberapa layout sangat sederhana. Responsif sudah baik namun belum ada min-width  untuk batas resolusi kecilnya. Untuk ukuran card pada all rental kurang konsisten, terlalu banyak drop shadow.', '4'),
(19, 'Rafif Rafi Muzakki Widodo', 'Redmi Note 9', 'bug di prekomendasi pilihan mobil ', '2'),
(20, 'Andika Gilang W', 'Hp', 'Sangat memudahkan untuk mencari rental kendaraan terdekat dan rekomendasi jadi ga perlu repot\" untuk searching\" di instagram atau platform lainnya ', '5'),
(21, 'Dwimas', 'Samsung', 'Pelayanan bagus', '5'),
(22, 'Akmal', 'Pc', 'aplikasi sangat membantu dan memudahkan untuk mencari rental kendaraan di area bandara', '5'),
(23, 'Arditiya Pandu Pratama', 'HP', 'Sangat membantu ketika ingin mencari kendaraan yang mau kita rental', '5'),
(24, 'Lorenzo Arya', 'HP', 'recomended website ini', '5'),
(25, 'M mahev sura arraza', 'Hp', 'Aplikasi ini mudah dan sangat membantu', '5'),
(26, 'Wahyudin', 'HP', 'Terima kasih atas rekomendasi tempat penyewaan kendaraan (melalu site ini), dimana sangat membantu customer utamanya wisatawan dari luar Yogyakarta yang ingin menjelajah Kota Istimewa ini ', '5'),
(27, 'Hussein Yahya Al Aziz Putra', 'Hp', 'Aplikasi ini bisa digunakan untuk rental kendaraan supaya lebih praktis untuk kedepannya', '5'),
(28, 'Adi Nurisa', 'Hp', 'Mantap', '5'),
(29, 'Viky Nur Allifi', 'HP', 'Sangat membantu mencari rental motor deket bandara ', '5'),
(30, 'Aqila Naufal Mahardhika', 'PC', 'tampilan sudah bagus cuma di bagian box rental tidak kompak ada yang lebih panjang', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `daftar_rental`
--
ALTER TABLE `daftar_rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `fasilitas_rekap`
--
ALTER TABLE `fasilitas_rekap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_fasilitas` (`id_fasilitas`,`id_rental`),
  ADD KEY `id_rental` (`id_rental`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tipe_kendaraan_rekap`
--
ALTER TABLE `tipe_kendaraan_rekap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_rental` (`id_rental`,`id_kendaraan`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_rental`
--
ALTER TABLE `daftar_rental`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fasilitas_rekap`
--
ALTER TABLE `fasilitas_rekap`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  MODIFY `id_kendaraan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tipe_kendaraan_rekap`
--
ALTER TABLE `tipe_kendaraan_rekap`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_rekap`
--
ALTER TABLE `fasilitas_rekap`
  ADD CONSTRAINT `fasilitas_rekap_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitas_rekap_ibfk_2` FOREIGN KEY (`id_rental`) REFERENCES `rental` (`id_rental`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tipe_kendaraan_rekap`
--
ALTER TABLE `tipe_kendaraan_rekap`
  ADD CONSTRAINT `tipe_kendaraan_rekap_ibfk_1` FOREIGN KEY (`id_rental`) REFERENCES `rental` (`id_rental`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipe_kendaraan_rekap_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `tipe_kendaraan` (`id_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
