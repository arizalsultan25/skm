-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 10:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skm_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `domain-survei`
--

CREATE TABLE `domain-survei` (
  `id` int(11) UNSIGNED NOT NULL,
  `website_id` int(11) UNSIGNED NOT NULL,
  `layanan_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domain-survei`
--

INSERT INTO `domain-survei` (`id`, `website_id`, `layanan_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) UNSIGNED NOT NULL,
  `pertanyaan_id` int(11) UNSIGNED NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `pertanyaan_id`, `jawaban`, `nilai`) VALUES
(42, 2, 'Terjangkau', 3),
(43, 1, 'Tidak Cepat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `unit_id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `unit_id`, `nama`) VALUES
(1, 1, 'Pengesahan SPPT'),
(3, 1, 'Layanan Pemberdayaan UMKM');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-10-08-000000', 'App\\Database\\Migrations\\RefUnsur', 'default', 'App', 1604412355, 1),
(2, '2020-10-08-000000', 'App\\Database\\Migrations\\UnitLayanan', 'default', 'App', 1604412355, 1),
(3, '2020-10-08-000000', 'App\\Database\\Migrations\\UserOpd', 'default', 'App', 1604412355, 1),
(4, '2020-10-08-000001', 'App\\Database\\Migrations\\Layanan', 'default', 'App', 1604412355, 1),
(5, '2020-10-08-000001', 'App\\Database\\Migrations\\Website', 'default', 'App', 1604412356, 1),
(6, '2020-10-08-000002', 'App\\Database\\Migrations\\DomainSurvei', 'default', 'App', 1604412356, 1),
(7, '2020-10-08-000002', 'App\\Database\\Migrations\\Survei', 'default', 'App', 1604412356, 1),
(8, '2020-10-08-000003', 'App\\Database\\Migrations\\SurveiUnsur', 'default', 'App', 1604412356, 1),
(9, '2020-10-08-000004', 'App\\Database\\Migrations\\Pertanyaan', 'default', 'App', 1604412357, 1),
(10, '2020-10-08-000005', 'App\\Database\\Migrations\\Jawaban', 'default', 'App', 1604412357, 1),
(11, '2020-10-08-000006', 'App\\Database\\Migrations\\Respon', 'default', 'App', 1604412357, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) UNSIGNED NOT NULL,
  `ref_id` int(11) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `ref_id`, `pertanyaan`) VALUES
(1, 3, 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?'),
(2, 4, 'Apakah tarif pelayanan terjangkau?');

-- --------------------------------------------------------

--
-- Table structure for table `ref-unsur`
--

CREATE TABLE `ref-unsur` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref-unsur`
--

INSERT INTO `ref-unsur` (`id`, `nama`) VALUES
(1, 'Persyaratan'),
(2, 'Sistem, Mekanisme, dan Prosedur'),
(3, 'Waktu Penyelesaian'),
(4, 'Biaya/Tarif'),
(5, 'Produk Spesifikasi Jenis Pelayanan'),
(6, 'Kompetensi Pelaksana'),
(7, 'Perilaku Pelaksana'),
(8, 'Penanganan Pengaduan, Saran dan Masukan'),
(9, 'Sarana dan prasarana');

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_responded` int(11) UNSIGNED NOT NULL,
  `jawaban_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id` int(11) UNSIGNED NOT NULL,
  `layanan_id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`id`, `layanan_id`, `nama`, `start`, `end`) VALUES
(1, 1, 'Survei Pengesahan SPPT di Kecamatan Sekupang', '2020-11-05 23:59:00', '2021-01-07 23:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `survei-unsur`
--

CREATE TABLE `survei-unsur` (
  `id` int(11) UNSIGNED NOT NULL,
  `ref_id` int(11) UNSIGNED NOT NULL,
  `survei_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survei-unsur`
--

INSERT INTO `survei-unsur` (`id`, `ref_id`, `survei_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit-layanan`
--

CREATE TABLE `unit-layanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit-layanan`
--

INSERT INTO `unit-layanan` (`id`, `nama`) VALUES
(1, 'Kecamatan Sekupang');

-- --------------------------------------------------------

--
-- Table structure for table `user-opd`
--

CREATE TABLE `user-opd` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `api-key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) UNSIGNED NOT NULL,
  `domain` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `domain`) VALUES
(1, 'kecsekupang.batam.go.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domain-survei`
--
ALTER TABLE `domain-survei`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain-survei_website_id_foreign` (`website_id`),
  ADD KEY `domain-survei_layanan_id_foreign` (`layanan_id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawaban_pertanyaan_id_foreign` (`pertanyaan_id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_ref_id_foreign` (`ref_id`);

--
-- Indexes for table `ref-unsur`
--
ALTER TABLE `ref-unsur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respon_jawaban_id_foreign` (`jawaban_id`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survei_layanan_id_foreign` (`layanan_id`);

--
-- Indexes for table `survei-unsur`
--
ALTER TABLE `survei-unsur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survei-unsur_ref_id_foreign` (`ref_id`),
  ADD KEY `survei-unsur_survei_id_foreign` (`survei_id`);

--
-- Indexes for table `unit-layanan`
--
ALTER TABLE `unit-layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user-opd`
--
ALTER TABLE `user-opd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `api-key` (`api-key`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `domain` (`domain`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domain-survei`
--
ALTER TABLE `domain-survei`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref-unsur`
--
ALTER TABLE `ref-unsur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `respon`
--
ALTER TABLE `respon`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survei-unsur`
--
ALTER TABLE `survei-unsur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unit-layanan`
--
ALTER TABLE `unit-layanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user-opd`
--
ALTER TABLE `user-opd`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domain-survei`
--
ALTER TABLE `domain-survei`
  ADD CONSTRAINT `domain-survei_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain-survei_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `ref-unsur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit-layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ref_id_foreign` FOREIGN KEY (`ref_id`) REFERENCES `ref-unsur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `respon`
--
ALTER TABLE `respon`
  ADD CONSTRAINT `respon_jawaban_id_foreign` FOREIGN KEY (`jawaban_id`) REFERENCES `jawaban` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survei`
--
ALTER TABLE `survei`
  ADD CONSTRAINT `survei_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survei-unsur`
--
ALTER TABLE `survei-unsur`
  ADD CONSTRAINT `survei-unsur_ref_id_foreign` FOREIGN KEY (`ref_id`) REFERENCES `ref-unsur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survei-unsur_survei_id_foreign` FOREIGN KEY (`survei_id`) REFERENCES `survei` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
