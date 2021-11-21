-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2021 at 06:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `briks`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id` int(11) NOT NULL,
  `maintenance_id` int(11) NOT NULL,
  `kode_berita_acara` varchar(255) NOT NULL,
  `id_peralatan` int(11) DEFAULT NULL,
  `nama_berita_acara` varchar(50) NOT NULL,
  `kronologi` varchar(100) NOT NULL,
  `kode_dokumentasi` varchar(50) NOT NULL,
  `analisa_masalah` varchar(100) NOT NULL,
  `rekomendasi` varchar(100) NOT NULL,
  `tanggal_berita_acara` date NOT NULL,
  `waktu_berita_acara` time NOT NULL DEFAULT current_timestamp(),
  `status_berita_acara` int(2) DEFAULT 1 COMMENT '1:diajukan,2:disetujui, 99:tolak',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `berita_acara`
--

INSERT INTO `berita_acara` (`id`, `maintenance_id`, `kode_berita_acara`, `id_peralatan`, `nama_berita_acara`, `kronologi`, `kode_dokumentasi`, `analisa_masalah`, `rekomendasi`, `tanggal_berita_acara`, `waktu_berita_acara`, `status_berita_acara`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(13, 8, 'BR-6194fbf9e57da', NULL, 'dd', 'asd', 'asd', 'dasd', 'eqwe', '2021-11-17', '19:56:25', 2, '2021-11-17', '2021-11-17', NULL, NULL),
(16, 15, 'BR-61953c8fa4cfe', NULL, 'a;skd', 'asd', 'eer', 'dasee', 'eer', '2021-11-17', '00:31:59', 2, '2021-11-17', '2021-11-17', NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `garansi`
--

CREATE TABLE `garansi` (
  `id` int(11) NOT NULL,
  `nama_pt` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_hangus` date NOT NULL,
  `status_garansi` int(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `kode_maintenance` varchar(255) NOT NULL,
  `id_peralatan` int(11) NOT NULL,
  `tanggal_maintenance` date NOT NULL,
  `pelaksana_maintenance` varchar(50) NOT NULL,
  `hasil_maintenance` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1:Masih diperbaiki , 0:Telah diperbaiki,\r\n99:dibatalkan',
  `status_form` int(2) NOT NULL DEFAULT 0 COMMENT '0:Belum lanjuta, 1:req_perbaikan, 2:berita acara',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `judul`, `kode_maintenance`, `id_peralatan`, `tanggal_maintenance`, `pelaksana_maintenance`, `hasil_maintenance`, `status`, `status_form`, `created_at`, `updated_at`, `created_by`, `deleted_at`) VALUES
(1, 'Perbaikan Alat Test a', 'MAIN-617275968bb96', 1, '2022-03-09', 'bram', 'hahahahahha', 0, 1, '2021-10-22', '2021-10-23', NULL, NULL),
(6, 'Perbaikan Test C', 'MAIN-617d03f99f54c', 3, '2021-09-10', 'bram , anggit , dimas', 'dderqwe', 0, 1, '2021-10-30', '2021-10-31', NULL, NULL),
(8, 'Perbaikan Test B untuk tes22', 'MAIN-617ea070efcfe', 5, '2021-10-31', 'bram , anggit, stevanus', 'jjgasdhuheqwnemkkikdf', 1, 2, '2021-10-31', '2021-11-17', NULL, NULL),
(10, 'Perbaikan Test B untuk tes23', 'MAIN-618619a3b8a46', 1, '2021-11-06', 'bram , anggit, stevanus', 'haskdhueq', 0, 1, '2021-11-06', '2021-11-10', NULL, NULL),
(12, 'tes', 'MAIN-6194ff2574f0b', 4, '2021-11-17', 'dasdddas', 'dasd', 1, 1, '2021-11-17', '2021-11-17', NULL, NULL),
(13, 'Perbaikan Test B untuk tes22', 'MAIN-61950632c623a', 6, '2021-11-17', 'bram , anggit, jaskldkl', 'deerqw', 1, 0, '2021-11-17', '2021-11-17', NULL, '2021-11-17'),
(14, 'Perbaikan Test B untuk tes23', 'MAIN-61953955d8b40', 6, '2021-11-17', 'bram , anggit', 'dfdsf', 1, 2, '2021-11-17', '2021-11-17', NULL, '2021-11-17'),
(15, 'Perbaikan Test B untuk tes2', 'MAIN-61953c774ac2e', 3, '2021-11-17', 'eqwe', 'eqewe', 1, 2, '2021-11-17', '2021-11-17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id` int(11) NOT NULL,
  `kode_peralatan` varchar(255) NOT NULL,
  `nama_peralatan` varchar(50) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `status` int(1) DEFAULT 0 COMMENT '0:nganggur , 1:due gawe',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id`, `kode_peralatan`, `nama_peralatan`, `lokasi`, `merk`, `detail`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(1, 'PR-61701b7004d0e', 'test a', NULL, NULL, NULL, 0, '2021-10-20', '2021-11-06', NULL, 13),
(3, 'PR-61701b77a9014', 'tes c', NULL, NULL, NULL, 1, '2021-10-20', '2021-11-17', NULL, 13),
(4, 'PR-61701b7a4bc46', 'tes d', NULL, NULL, NULL, 0, '2021-10-20', '2021-11-17', NULL, 13),
(5, 'PR-6170242d326ea', 'asdasd', NULL, NULL, NULL, 1, '2021-10-20', '2021-11-10', NULL, 13),
(6, 'PR-617024378da16', 'eqwe', NULL, NULL, NULL, 0, '2021-10-20', '2021-11-17', NULL, 13),
(7, 'PR-61715da60b9bb', 'dd', NULL, NULL, NULL, 0, '2021-10-21', '2021-10-21', NULL, 13),
(8, 'PR-6184e79f80a87', '333', 'dde', NULL, NULL, 0, '2021-11-05', '2021-11-05', NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `request_material`
--

CREATE TABLE `request_material` (
  `id` int(11) NOT NULL,
  `id_request_perbaikan` int(11) NOT NULL,
  `nama_material` varchar(255) NOT NULL,
  `status_material` int(1) NOT NULL DEFAULT 1,
  `jumlah` int(11) DEFAULT 0,
  `harga` bigint(20) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `request_material`
--

INSERT INTO `request_material` (`id`, `id_request_perbaikan`, `nama_material`, `status_material`, `jumlah`, `harga`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(17, 8, 'dasd', 1, 0, 5000000, '2021-10-22', '2021-10-23', NULL, NULL),
(18, 8, 'palu', 1, 0, 0, '2021-10-22', '2021-10-23', NULL, NULL),
(19, 8, 'geraji', 1, 0, 0, '2021-10-22', '2021-10-23', NULL, NULL),
(20, 8, 'pal', 1, 0, 0, '2021-10-22', '2021-10-23', NULL, NULL),
(33, 12, 'ddeqwe', 0, 10, 400000000000, '2021-10-30', '2021-10-31', NULL, NULL),
(34, 12, 'geraji', 0, 334, 30000000, '2021-10-30', '2021-10-31', NULL, NULL),
(35, 13, 'dasd', 1, 200, 0, '2021-10-31', '2021-10-31', NULL, NULL),
(36, 13, 'ooeii', 1, 30, 0, '2021-10-31', '2021-10-31', NULL, NULL),
(37, 14, 'palu', 0, 23, 230000000000, '2021-11-06', '2021-11-06', NULL, NULL),
(38, 14, 'palu', 0, 2, 0, '2021-11-06', '2021-11-06', NULL, NULL),
(41, 17, 'palu556', 1, 2344, 0, '2021-11-17', '2021-11-17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_perbaikan`
--

CREATE TABLE `request_perbaikan` (
  `id` int(11) NOT NULL,
  `id_maintenance` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tanggal_request_perbaikan` date NOT NULL,
  `detail_request_perbaikan` varchar(100) NOT NULL,
  `status_request_perbaikan` int(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `ce_by` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `request_perbaikan`
--

INSERT INTO `request_perbaikan` (`id`, `id_maintenance`, `kode`, `department`, `judul`, `tanggal_request_perbaikan`, `detail_request_perbaikan`, `status_request_perbaikan`, `created_at`, `updated_at`, `created_by`, `ce_by`, `deleted_at`) VALUES
(8, 1, 'REQ-ENG-6172e54152a82', 'ddasde', 'Perbaikan', '2021-10-22', 'bocah ngantuk wesan aku wkwkkw', 0, '2021-10-22', '2021-10-23', 13, NULL, NULL),
(12, 6, 'REQ-ENG-617d0721e78ec', 'fferwtwer', 'Segera diperbaiki', '2021-10-30', 'dqwe', 0, '2021-10-30', '2021-10-31', 13, NULL, NULL),
(13, 8, 'REQ-ENG-617ea0a4f2e42', 'wwerrqwer', 'Segera diperbaiki', '2021-10-31', 'daseqwe', 1, '2021-10-31', '2021-10-31', 13, NULL, NULL),
(14, 10, 'REQ-ENG-61862e406f61e', 'enginering', 'Segera diperbaiki', '2021-11-06', 'ddeerq', 0, '2021-11-06', '2021-11-06', 13, NULL, NULL),
(17, 12, 'REQ-ENG-61950bae25b23', 'ddawe', 'Segera diperbaiki', '2021-11-17', 'qweeqwe', 1, '2021-11-17', '2021-11-17', 17, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `craeted_by` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `deskripsi`, `created_at`, `updated_at`, `craeted_by`, `deleted_at`) VALUES
(1, 'Manager', '', '2021-10-19', '2021-10-19', NULL, NULL),
(3, 'Supervisor', '', '2021-10-19', '2021-10-19', NULL, NULL),
(4, 'CHIEF ENGINEERING', '', '2021-10-19', '2021-10-19', NULL, NULL),
(5, 'PURCHASING', '', '2021-10-19', '2021-10-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_requisition`
--

CREATE TABLE `service_requisition` (
  `id` int(11) NOT NULL,
  `kode_service` int(11) NOT NULL,
  `id_berita_acara` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `id_garansi` int(11) NOT NULL,
  `status_service` int(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `file_ttd` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip_user`, `nama_user`, `username`, `password`, `id_role`, `file_ttd`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `deleted_by`) VALUES
(1, 62055, 'stefanus aldi', 'aldi', '$2y$10$UNcd1ibjOL4MOJtHvms1auKJDq/hlH7LVzzHFxfRYq/RvIL9bS2/G', 1, NULL, '2021-10-19', '2021-10-19', NULL, NULL, NULL),
(3, 399, 'bramantya', 'bram', '$2y$10$UNcd1ibjOL4MOJtHvms1auKJDq/hlH7LVzzHFxfRYq/RvIL9bS2/G', 3, NULL, '2021-10-19', '2021-10-19', NULL, 1, NULL),
(11, 442, 'dimas', 'bramantyaadi_', '$2y$10$OCI.X.YSW0wWWBqh1gCgc.8fkYceUlGje1rb.VG7lEmrVTD.QECOS', 5, NULL, '2021-10-19', '2021-10-20', '2021-10-20', NULL, 1),
(13, 88764, 'bram_sp', 'bram_spdewe', '$2y$10$R8Of7QJzLbGvspEpEP6.4O2mkWOoolqscXVjxJiuxwG6nTSlB/qYa', 3, '1636469800ttd150.jpg', '2021-10-20', '2021-11-09', NULL, NULL, NULL),
(14, 77467, 'bram_pc', 'bram_pc', '$2y$10$B3Xk2za0aAVgEgQ14CyC.uKhKAU.BNwv9xKfktz3d9u5.IaZgt2Vi', 5, NULL, '2021-10-20', '2021-10-20', NULL, NULL, NULL),
(15, 66478, 'bram_ce', 'bram_ce', '$2y$10$QtGiE2ji4moaQVdkq756iuo17CGOktDB0sQt7RmEip8DYnZ9ZRkUS', 4, '1637160714ttd150.jpg', '2021-10-20', '2021-11-17', NULL, NULL, NULL),
(16, 77647, 'bram_m', 'bram_m', '$2y$10$VIOoRjBbuijImCnO/T5djex7kVGn0hHASDHUFOuYPXOL4DbjSoYjO', 1, NULL, '2021-10-20', '2021-10-20', NULL, NULL, NULL),
(17, 88899, 'bramantyaad', 'bram_sp', '$2y$10$ILKuZOvbcp6TnoEbcRFDLeYS0Xad64raZYwyFMEJvsLjnPgehTtiO', 3, '1637156918ttd150.jpg', '2021-11-09', '2021-11-17', NULL, 16, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_peralatan` (`id_peralatan`),
  ADD KEY `maintenance_id` (`maintenance_id`);

--
-- Indexes for table `garansi`
--
ALTER TABLE `garansi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`) USING BTREE;

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_peralatan` (`id_peralatan`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `request_material`
--
ALTER TABLE `request_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_request_perbaikan` (`id_request_perbaikan`);

--
-- Indexes for table `request_perbaikan`
--
ALTER TABLE `request_perbaikan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_maintenance` (`id_maintenance`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `service_requisition`
--
ALTER TABLE `service_requisition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_berita_acara` (`id_berita_acara`),
  ADD KEY `id_garansi` (`id_garansi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `garansi`
--
ALTER TABLE `garansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request_material`
--
ALTER TABLE `request_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `request_perbaikan`
--
ALTER TABLE `request_perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_requisition`
--
ALTER TABLE `service_requisition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD CONSTRAINT `berita_acara_ibfk_1` FOREIGN KEY (`id_peralatan`) REFERENCES `peralatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_ibfk_2` FOREIGN KEY (`maintenance_id`) REFERENCES `maintenance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`id_peralatan`) REFERENCES `peralatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_material`
--
ALTER TABLE `request_material`
  ADD CONSTRAINT `request_material_ibfk_1` FOREIGN KEY (`id_request_perbaikan`) REFERENCES `request_perbaikan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_perbaikan`
--
ALTER TABLE `request_perbaikan`
  ADD CONSTRAINT `request_perbaikan_ibfk_1` FOREIGN KEY (`id_maintenance`) REFERENCES `maintenance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_requisition`
--
ALTER TABLE `service_requisition`
  ADD CONSTRAINT `service_requisition_ibfk_1` FOREIGN KEY (`id_berita_acara`) REFERENCES `berita_acara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_requisition_ibfk_2` FOREIGN KEY (`id_garansi`) REFERENCES `garansi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
