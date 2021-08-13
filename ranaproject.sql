-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 02:41 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ranaproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `idbiodata` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `notelp` char(13) DEFAULT NULL,
  `npwp` char(15) DEFAULT NULL,
  `idjenjang` int(11) DEFAULT NULL,
  `jeniskelamin` char(1) DEFAULT NULL,
  `idkeahlian` int(11) DEFAULT NULL,
  `idlokasi` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `sertifikasi` varchar(255) DEFAULT NULL,
  `pengalamankerja` text DEFAULT NULL,
  `isajukan` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `isapprove` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`idbiodata`, `iduser`, `namalengkap`, `nik`, `alamat`, `notelp`, `npwp`, `idjenjang`, `jeniskelamin`, `idkeahlian`, `idlokasi`, `avatar`, `sertifikasi`, `pengalamankerja`, `isajukan`, `created_at`, `updated_at`, `isapprove`) VALUES
(3, 2, 'Muhammad Ma\'sum', '6666666666666666', NULL, '082232171383', NULL, NULL, 'L', NULL, NULL, 'PXL-1622001566.jpeg', NULL, NULL, NULL, '2021-05-26 03:43:09', '2021-05-28 03:39:05', NULL),
(4, 3, 'Seller Ma\'sum', '1213138123812381', NULL, '082232171383', NULL, NULL, 'L', NULL, 1, 'PXL-1622288179.jpeg', NULL, NULL, NULL, '2021-05-28 03:49:10', '2021-05-29 11:36:19', NULL),
(5, 4, 'Adrian', '0899990001001000', '<p>jalan wonosobo</p>', '082232171383', '299292282828288', 4, 'L', 3, 2, 'no-photo.png', 'PXL-8bc9e4e53d25134e210ac4c5cae167fa.pdf', '<p>sebagai web enginer di tokopedia</p>', 1, '2021-06-12 10:03:15', '2021-06-13 05:36:08', 1),
(6, 7, 'Muhammad Ma\'sum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-13 05:01:35', NULL, NULL),
(7, 8, 'Rana Adhiella', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-13 06:25:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jeniskeahlian`
--

CREATE TABLE `jeniskeahlian` (
  `idkeahlian` int(11) NOT NULL,
  `jeniskeahlian` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jeniskeahlian`
--

INSERT INTO `jeniskeahlian` (`idkeahlian`, `jeniskeahlian`, `created_at`, `updated_at`, `created_by`) VALUES
(2, 'Mandor', '2021-06-01 02:44:25', NULL, 'Muhammad Ma\'sum'),
(3, 'Programmer', '2021-06-01 02:44:32', NULL, 'Muhammad Ma\'sum'),
(4, 'Frontend Developer', '2021-06-01 02:44:40', NULL, 'Muhammad Ma\'sum'),
(5, 'Teknisi Mesin', '2021-06-12 10:33:40', NULL, 'Muhammad Ma\'sum');

-- --------------------------------------------------------

--
-- Table structure for table `jenjangpendidikan`
--

CREATE TABLE `jenjangpendidikan` (
  `idjenjang` int(11) NOT NULL,
  `kodejenjang` char(10) DEFAULT NULL,
  `jenjangpendidikan` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenjangpendidikan`
--

INSERT INTO `jenjangpendidikan` (`idjenjang`, `kodejenjang`, `jenjangpendidikan`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'SMA', 'Sekolah Menengah Atas', 'Muhammad Ma\'sum', '2021-05-26 07:11:45', NULL),
(2, 'SMP', 'Sekolah Menengah Pertama', 'Muhammad Ma\'sum', '2021-05-26 07:15:20', NULL),
(4, 'S1', 'Sarjana', 'Muhammad Ma\'sum', '2021-05-26 07:15:47', NULL),
(5, 'S2', 'Magister', 'Muhammad Ma\'sum', '2021-05-26 07:15:54', '2021-05-26 07:22:55'),
(6, 'S3', 'Doktor', 'Muhammad Ma\'sum', '2021-05-29 11:30:39', '2021-05-29 11:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `kategorijasa`
--

CREATE TABLE `kategorijasa` (
  `idkategori` int(11) NOT NULL,
  `kodekategori` char(10) DEFAULT NULL,
  `kategorijasa` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorijasa`
--

INSERT INTO `kategorijasa` (`idkategori`, `kodekategori`, `kategorijasa`, `created_by`, `created_at`, `updated_at`, `slug`) VALUES
(2, 'SERVAC', 'Service AC (Air Conditioner)', 'Muhammad Ma\'sum', '2021-05-26 10:25:39', NULL, 'service-ac-air-conditioner'),
(3, 'TK1', 'TUKANG BANGUNAN', 'Muhammad Ma\'sum', '2021-05-29 11:31:12', NULL, 'tukang-bangunan'),
(4, 'IT', 'Teknologi', 'Muhammad Ma\'sum', '2021-06-12 15:12:03', NULL, 'teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `idlayanan` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `deskripsilayanan` text NOT NULL,
  `hargalayanan` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `displaylayanan` varchar(255) DEFAULT NULL,
  `isaktif` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`idlayanan`, `iduser`, `idkategori`, `layanan`, `deskripsilayanan`, `hargalayanan`, `rating`, `displaylayanan`, `isaktif`, `created_at`, `updated_at`, `slug`) VALUES
(6, 3, 2, 'Service AC', 'Saat ini pompa air di Surabaya Selatan memang sudah menjadi alat kebutuhan rumah tangga yang banyak dipenuhi oleh masyarakat terutama di Surabaya Timur, sebagai alternatif dalam memenuhi kebutuhan air rumah tangga anda. alat tersebut tidak hanya dapat digunakan untuk air PDAM tetapi juga air sumur. sehingga tidak perlu panik lagi jika ada kendala pada air PDAM atau sumur anda.\r\n\r\nBerbagai merk pompa air banyak beredar dipasaran, sering kali kita bingung memilih kualiatas manakah yang terbaik, lalu pemasangan dan perawatan yang mudah, namun pemasangan pompa air tanpa ahli pastinya juga akan lebih ribet dan menghabiskan banyak waktu dan tenaga. Pastikan kami dapat membantu anda menyelesaikan permasalahan seperti ini dengan cepat dan efektif.', 249000, NULL, 'PXL-091bdb6195bbe393a76cbf130ebd00964ea903f2.png', 1, '2021-05-28 07:15:05', '2021-06-20 10:30:14', 'service-ac'),
(7, 3, 2, 'Perbaikan Ac (Air Conditioner)', 'Jasa service water heater atau pemanas air. Jasa service AC, Jasa service pompa air, Jasa service kompor tanam yang bergaransi. CV Mapan Jaya Teknik siap melayani Anda untuk dapat mengatasi masalah dan memberikan solusi terbaik untuk segala peralatan elektronik rumah tangga.\r\n\r\nJika water heater atau pemanas air Anda mengalami kasus sebagai berikut :\r\n\r\nMesin water heater Anda tidak memproduksi air panas, Dan tekanan air kurang kencang\r\nTangki bocor\r\nJasa penurunan unit atau bongkar pasang\r\nPenggantian sparepart, element, termorstat, 1/2 valve, cek valve\r\nPemasangan titik air panas atau instalasi pipa air panas\r\ndan sebagainya', 199999, NULL, 'PXL-1bdfa4cd6950c35a9effc0733eb473ea3dad96c2.jpeg', 1, '2021-05-28 07:15:36', '2021-05-29 11:33:38', 'perbaikan-ac-(air-conditioner)'),
(8, 3, 2, 'Jasa Joki Ninja Saga', 'aweawea', 200000, NULL, 'PXL-f03e1265615626b4013de5b8c5372d1c75e8e896.png', 1, '2021-05-28 08:53:04', NULL, 'jasa-joki-ninja-saga'),
(9, 4, 2, 'SERVICE AC MURAH JAKARTA', 'menerima layanan service ac, berbagai jenis ac', 250000, NULL, 'PXL-c16465ffa39e7d05598d3e108e7613decdfb7576.png', 1, '2021-06-12 10:12:33', NULL, 'service-ac-murah-jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `idlokasi` int(11) NOT NULL,
  `kodelokasi` char(10) NOT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`idlokasi`, `kodelokasi`, `lokasi`, `created_by`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'SBY', 'Surabaya', 'Muhammad Ma\'sum', '2021-05-26 05:32:26', NULL, 'surabaya'),
(2, 'JKT', 'Jakarta', 'Muhammad Ma\'sum', '2021-05-26 05:47:07', NULL, 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `role` char(50) NOT NULL,
  `alias` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `role`, `alias`) VALUES
(1, 'ADMIN', 'Administrator'),
(2, 'SELLER', 'Penyedia Jasa'),
(3, 'BUYER', 'Klien');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `invoice` varchar(35) DEFAULT NULL,
  `idpenyediajasa` int(11) DEFAULT NULL,
  `idcustomer` int(11) DEFAULT NULL,
  `namacustomer` varchar(100) DEFAULT NULL,
  `emailcustomer` varchar(100) DEFAULT NULL,
  `nohpcustomer` char(13) DEFAULT NULL,
  `idlokasicustomer` int(11) DEFAULT NULL,
  `alamatcustomer` text DEFAULT NULL,
  `idlayanan` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `accepted_by` varchar(30) DEFAULT NULL,
  `requested_at` datetime DEFAULT NULL,
  `accepted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idrole` int(1) NOT NULL,
  `isaktif` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `hint`, `idrole`, `isaktif`, `created_at`, `updated_at`) VALUES
(2, 'muhammadmasum50@gmail.com', '$2y$10$Z0e7INfGEYGapRUtds.Lu.8QFVYbpQ6Vq.Wohq5Z2Ih.nfX4hqQtC', 'qwerty123', 1, 1, '2021-05-25 20:43:09', NULL),
(3, 'csmasum50@gmail.com', '$2y$10$Z0e7INfGEYGapRUtds.Lu.8QFVYbpQ6Vq.Wohq5Z2Ih.nfX4hqQtC', 'qwerty123', 2, 1, '2021-05-27 20:49:10', NULL),
(4, 'adrian@gmail.com', '$2y$10$eemVjXqfiXoMDTsWDIt4g.fqwACxzDgdygGaDlIufIavMwM0Dy4.W', 'qwerty123', 2, 1, '2021-06-12 03:03:15', '2021-06-12 22:36:08'),
(7, 'muhmasum6661@gmail.com', '$2y$10$BjteDjzEcmO3GXqtGEhuYeL2.Q74pBP8cVk6Rxyl3Lqhc.KiJvf/e', 'masum123', 3, 1, '2021-06-12 22:01:35', '2021-06-12 22:24:10'),
(8, 'ranaadhiella@gmail.com', '$2y$10$gmDEqOaHGqBfXbfbLSCHn.ng7NphzXI.EHsdyQ6fDYYgyrGn3uRDK', 'rana123', 3, 1, '2021-06-12 23:25:42', '2021-06-12 23:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `idverifikasi` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`idbiodata`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idjenjang` (`idjenjang`),
  ADD KEY `biodata_ibfk_3` (`idlokasi`),
  ADD KEY `idkeahlian` (`idkeahlian`);

--
-- Indexes for table `jeniskeahlian`
--
ALTER TABLE `jeniskeahlian`
  ADD PRIMARY KEY (`idkeahlian`);

--
-- Indexes for table `jenjangpendidikan`
--
ALTER TABLE `jenjangpendidikan`
  ADD PRIMARY KEY (`idjenjang`);

--
-- Indexes for table `kategorijasa`
--
ALTER TABLE `kategorijasa`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`idlayanan`),
  ADD KEY `layanan_ibfk_1` (`iduser`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`idlokasi`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `idrole` (`idrole`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`idverifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `idbiodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jeniskeahlian`
--
ALTER TABLE `jeniskeahlian`
  MODIFY `idkeahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenjangpendidikan`
--
ALTER TABLE `jenjangpendidikan`
  MODIFY `idjenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategorijasa`
--
ALTER TABLE `kategorijasa`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `idlayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `idlokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `idverifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `biodata_ibfk_2` FOREIGN KEY (`idjenjang`) REFERENCES `jenjangpendidikan` (`idjenjang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `biodata_ibfk_3` FOREIGN KEY (`idlokasi`) REFERENCES `lokasi` (`idlokasi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `biodata_ibfk_4` FOREIGN KEY (`idkeahlian`) REFERENCES `jeniskeahlian` (`idkeahlian`) ON UPDATE CASCADE;

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `layanan_ibfk_2` FOREIGN KEY (`idkategori`) REFERENCES `kategorijasa` (`idkategori`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
