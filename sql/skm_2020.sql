-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 07:29 AM
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
-- Database: `skm_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `akunopd`
--

CREATE TABLE `akunopd` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode` varchar(100) NOT NULL,
  `unitlayanan_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akunopd`
--

INSERT INTO `akunopd` (`id`, `kode`, `unitlayanan_id`) VALUES
(4, '8as7dagukjh6', 3),
(5, '9sjhgliuaoR6', 1),
(6, '123456789012', 4),
(7, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `domainsurvei`
--

CREATE TABLE `domainsurvei` (
  `id` int(11) UNSIGNED NOT NULL,
  `website_id` int(11) UNSIGNED NOT NULL,
  `layanan_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domainsurvei`
--

INSERT INTO `domainsurvei` (`id`, `website_id`, `layanan_id`) VALUES
(1, 1, 1),
(3, 7, 10),
(4, 8, 10);

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
(46, 4, 'Sangat Baik', 4),
(47, 4, 'Baik', 3),
(48, 4, 'Cukup Baik', 2),
(49, 4, 'Kurang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `unitlayanan_id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `unitlayanan_id`, `nama`) VALUES
(1, 1, 'Pengesahan SPPT'),
(3, 1, 'Layanan Pemberdayaan UMKM'),
(10, 3, 'Layanan IT Support');

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
  `id_survei` int(11) UNSIGNED NOT NULL,
  `referensiunsur_id` int(11) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `id_survei`, `referensiunsur_id`, `pertanyaan`) VALUES
(4, 3, 6, 'Apakah Pelaksana Kualitas Layanan baik?'),
(5, 3, 4, 'Apakah Tarif terjangkau?'),
(6, 3, 9, 'Apakah sarana baik?'),
(7, 6, 9, 'Sarana internet baik?');

-- --------------------------------------------------------

--
-- Table structure for table `referensiunsur`
--

CREATE TABLE `referensiunsur` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `referensiunsur`
--

INSERT INTO `referensiunsur` (`id`, `nama`) VALUES
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
  `responden_id` int(11) UNSIGNED NOT NULL,
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
  `slug` varchar(255) NOT NULL,
  `opd` varchar(100) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`id`, `layanan_id`, `nama`, `slug`, `opd`, `start`, `end`) VALUES
(1, 1, 'Survei Pengesahan SPPT di Kecamatan Sekupang', 'survei-pengesahan-sppt-di-kecamatan-sekupang', 'Kecamatan', '2020-12-10 23:59:00', '2021-02-18 23:59:00'),
(3, 10, 'Survei Kualitas Layanan IT Support', 'survei-kualitas-layanan-it-support', 'Komunikasi', '2021-02-01 13:00:00', '2021-02-23 23:59:00'),
(5, 10, 'Survei Layanan Komunikasi', 'survei-layanan-komunikasi', 'Komunikasi', '2021-02-15 13:29:08', '2021-02-25 13:29:08'),
(6, 10, 'Survei Internet', 'survei-internet', 'Komunikasi', '2021-02-04 14:57:00', '2021-02-22 14:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `surveiunsur`
--

CREATE TABLE `surveiunsur` (
  `id` int(11) UNSIGNED NOT NULL,
  `referensiunsur_id` int(11) UNSIGNED NOT NULL,
  `survei_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surveiunsur`
--

INSERT INTO `surveiunsur` (`id`, `referensiunsur_id`, `survei_id`) VALUES
(1, 1, 1),
(8, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `unitlayanan`
--

CREATE TABLE `unitlayanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unitlayanan`
--

INSERT INTO `unitlayanan` (`id`, `nama`) VALUES
(1, 'Kecamatan Sekupang'),
(3, 'Dinas Komunikasi dan Informatika'),
(4, 'Dinas Pendidikan'),
(5, 'Dinas UMKM');

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
(9, 'dishub.batam.go.id'),
(8, 'diskominfo.batam.go.id'),
(7, 'diskominfo@batam.go.id'),
(1, 'kecsekupang.batam.go.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akunopd`
--
ALTER TABLE `akunopd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unitlayanan_id`) USING BTREE;

--
-- Indexes for table `domainsurvei`
--
ALTER TABLE `domainsurvei`
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
  ADD KEY `layanan_unit_id_foreign` (`unitlayanan_id`);

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
  ADD KEY `pertanyaan_ref_id_foreign` (`referensiunsur_id`),
  ADD KEY `id_survei` (`id_survei`);

--
-- Indexes for table `referensiunsur`
--
ALTER TABLE `referensiunsur`
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
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `survei_layanan_id_foreign` (`layanan_id`);

--
-- Indexes for table `surveiunsur`
--
ALTER TABLE `surveiunsur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survei-unsur_ref_id_foreign` (`referensiunsur_id`),
  ADD KEY `survei-unsur_survei_id_foreign` (`survei_id`);

--
-- Indexes for table `unitlayanan`
--
ALTER TABLE `unitlayanan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `akunopd`
--
ALTER TABLE `akunopd`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `domainsurvei`
--
ALTER TABLE `domainsurvei`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `referensiunsur`
--
ALTER TABLE `referensiunsur`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surveiunsur`
--
ALTER TABLE `surveiunsur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `unitlayanan`
--
ALTER TABLE `unitlayanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akunopd`
--
ALTER TABLE `akunopd`
  ADD CONSTRAINT `akun_opd_unit_id_foreign` FOREIGN KEY (`unitlayanan_id`) REFERENCES `unitlayanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `domainsurvei`
--
ALTER TABLE `domainsurvei`
  ADD CONSTRAINT `domain-survei_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain-survei_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_unit_id_foreign` FOREIGN KEY (`unitlayanan_id`) REFERENCES `unitlayanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_survei`) REFERENCES `survei` (`id`),
  ADD CONSTRAINT `pertanyaan_ref_id_foreign` FOREIGN KEY (`referensiunsur_id`) REFERENCES `referensiunsur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `surveiunsur`
--
ALTER TABLE `surveiunsur`
  ADD CONSTRAINT `survei-unsur_ref_id_foreign` FOREIGN KEY (`referensiunsur_id`) REFERENCES `referensiunsur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survei-unsur_survei_id_foreign` FOREIGN KEY (`survei_id`) REFERENCES `survei` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
