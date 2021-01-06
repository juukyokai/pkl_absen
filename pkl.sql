-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2021 at 04:34 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip_dosen` bigint(20) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `email_dosen` varchar(255) NOT NULL,
  `status_dosen` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip_dosen`, `id_jurusan`, `nama_dosen`, `email_dosen`, `status_dosen`, `create_at`, `update_at`) VALUES
(1, 380090502051, 1, 'Faisal', 'Faisal@gmail.com', 1, '2020-12-22 02:22:31', '2020-12-22 02:22:31'),
(2, 284849561201, 1, 'Jefri', 'Jefri@gmail.com', 1, '2020-12-22 02:22:31', '2020-12-22 02:25:26'),
(3, 184623764592, 2, 'Fahmi', 'Fahmi@gmail.com', 1, '2020-12-22 02:25:03', '2020-12-22 02:25:03'),
(4, 284124712384, 1, 'Irsyad', 'BangSyad@gmail.com', 1, '2020-12-22 02:25:03', '2020-12-22 02:25:03'),
(5, 238490849384, 1, 'Wildany', 'Dany@gmail.com', 1, '2020-12-22 02:28:18', '2020-12-23 18:28:28'),
(6, 294823727184, 1, 'Alfareza', 'Reza@gmail.com', 1, '2020-12-22 02:28:18', '2020-12-23 18:28:36'),
(7, 243847567283, 1, 'Nurul', 'Nurul@gmail.com', 1, '2020-12-23 18:29:48', '2020-12-23 18:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `create_at`, `update_at`) VALUES
(1, 'Informatika', '2020-12-22 02:29:03', '2020-12-22 02:29:03'),
(2, 'Sistem Informasi', '2020-12-22 02:29:03', '2020-12-22 02:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `kbm`
--

CREATE TABLE `kbm` (
  `id_kbm` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `absen_awal` tinyint(4) NOT NULL,
  `absen_akhir` tinyint(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kbm`
--

INSERT INTO `kbm` (`id_kbm`, `id_mhs`, `id_kelas`, `absen_awal`, `absen_akhir`, `create_at`, `update_at`) VALUES
(1, 1, 1, 1, 1, '2020-12-23 18:42:29', '2020-12-23 18:42:29'),
(2, 2, 1, 1, 0, '2020-12-23 18:42:29', '2020-12-23 18:42:29'),
(3, 3, 2, 1, 1, '2020-12-23 18:42:29', '2020-12-23 18:42:29'),
(4, 4, 2, 1, 0, '2020-12-23 18:42:29', '2020-12-23 18:42:29'),
(5, 5, 1, 0, 1, '2020-12-23 18:42:29', '2020-12-23 18:53:28'),
(6, 6, 2, 1, 1, '2020-12-23 18:42:29', '2020-12-23 18:42:29'),
(7, 1, 2, 1, 0, '2020-12-28 12:31:46', '2020-12-28 12:31:46'),
(8, 1, 2, 1, 0, '2020-12-28 12:33:15', '2020-12-28 12:33:15'),
(9, 1, 2, 1, 1, '2020-12-28 12:33:34', '2020-12-28 12:33:34'),
(10, 5, 2, 1, 0, '2020-12-12 06:49:21', '2020-12-12 06:49:21'),
(11, 1, 8, 1, 1, '2020-12-27 06:49:21', '2020-12-27 06:49:21'),
(12, 6, 1, 1, 1, '2020-12-22 06:46:40', '2020-12-12 06:46:40'),
(13, 2, 8, 1, 1, '2020-12-31 06:46:40', '2020-12-24 06:46:40'),
(14, 9, 6, 1, 1, '2020-12-23 06:49:21', '2020-12-23 06:49:21'),
(15, 5, 2, 1, 0, '2020-12-12 06:49:21', '2020-12-12 06:49:21'),
(16, 1, 8, 1, 1, '2020-12-27 06:49:21', '2020-12-27 06:49:21'),
(17, 11, 1, 1, 1, '2020-11-30 17:30:00', '2020-12-01 08:01:42'),
(18, 2, 2, 1, 1, '2020-12-01 17:01:42', '2020-12-02 08:01:42'),
(19, 9, 3, 1, 0, '2020-12-02 17:04:29', '2020-12-03 08:04:29'),
(20, 5, 4, 1, 0, '2020-12-03 17:04:29', '2020-12-28 08:17:05'),
(21, 10, 5, 1, 1, '2020-12-04 17:04:29', '2020-12-05 08:04:29'),
(22, 12, 6, 1, 1, '2020-12-05 17:04:29', '2020-12-06 08:04:29'),
(23, 1, 7, 1, 0, '2020-12-06 17:04:29', '2020-12-07 08:04:29'),
(24, 13, 8, 1, 1, '2020-12-07 17:04:29', '2020-12-08 08:04:29'),
(25, 8, 9, 1, 1, '2020-12-09 17:04:29', '2020-12-10 08:04:29'),
(26, 3, 1, 1, 1, '2020-12-08 17:04:29', '2020-12-09 08:04:29'),
(27, 4, 2, 1, 0, '2020-12-10 17:04:29', '2020-12-11 08:04:29'),
(28, 6, 3, 1, 0, '2020-12-11 17:04:29', '2020-12-12 08:04:29'),
(29, 14, 4, 1, 1, '2020-12-12 17:04:29', '2020-12-13 08:04:29'),
(30, 7, 5, 1, 0, '2020-12-13 17:04:29', '2020-12-14 08:04:29'),
(31, 11, 1, 1, 1, '2020-11-30 17:30:00', '2020-12-01 08:01:42'),
(32, 2, 2, 1, 1, '2020-12-01 17:01:42', '2020-12-02 08:01:42'),
(33, 9, 3, 1, 0, '2020-12-02 17:04:29', '2020-12-03 08:04:29'),
(34, 5, 4, 1, 0, '2020-12-03 17:04:29', '2020-12-28 08:17:12'),
(35, 10, 5, 1, 1, '2020-12-04 17:04:29', '2020-12-05 08:04:29'),
(36, 12, 6, 1, 1, '2020-12-05 17:04:29', '2020-12-06 08:04:29'),
(37, 1, 7, 1, 0, '2020-12-06 17:04:29', '2020-12-07 08:04:29'),
(38, 13, 8, 1, 1, '2020-12-07 17:04:29', '2020-12-08 08:04:29'),
(39, 8, 9, 1, 1, '2020-12-09 17:04:29', '2020-12-10 08:04:29'),
(40, 3, 1, 1, 1, '2020-12-08 17:04:29', '2020-12-09 08:04:29'),
(41, 4, 2, 1, 0, '2020-12-10 17:04:29', '2020-12-11 08:04:29'),
(42, 6, 3, 1, 0, '2020-12-11 17:04:29', '2020-12-12 08:04:29'),
(43, 14, 4, 1, 1, '2020-12-12 17:04:29', '2020-12-13 08:04:29'),
(44, 7, 5, 1, 0, '2020-12-13 17:04:29', '2020-12-14 08:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `kode_nama_kelas` varchar(255) NOT NULL,
  `link_kelas` varchar(255) NOT NULL,
  `hari_kelas` varchar(255) NOT NULL,
  `jam_kelas` time NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_mk`, `id_dosen`, `kode_nama_kelas`, `link_kelas`, `hari_kelas`, `jam_kelas`, `create_at`, `update_at`) VALUES
(1, 1, 3, 'G001', 'www.g001.com', 'Senin', '07:00:00', '2020-12-22 03:01:11', '2020-12-22 03:01:11'),
(2, 2, 2, 'G002', 'www.g002.com', 'Selasa', '09:30:00', '2020-12-22 03:01:11', '2020-12-22 03:01:11'),
(3, 1, 6, 'G003', 'www.G003.com', 'Senin', '09:30:00', '2020-12-06 19:03:00', '2020-12-06 22:00:00'),
(4, 2, 3, 'G004', 'www.G005.com', 'Selasa', '07:00:00', '2020-12-07 17:00:00', '2020-12-07 19:30:00'),
(5, 3, 1, 'G005', 'www.G005.com', 'Rabu', '07:00:00', '2020-12-08 17:00:00', '2020-12-08 19:30:00'),
(6, 2, 4, 'G006', 'www.G006.com', 'Rabu', '09:30:00', '2020-12-08 19:30:00', '2020-12-08 22:00:00'),
(7, 1, 2, 'G007', 'www.G007.com', 'Rabu', '12:00:00', '2020-12-08 22:00:00', '2020-12-09 01:00:00'),
(8, 2, 7, 'G008', 'www.G008.com', 'Kamis', '07:00:00', '2020-12-09 17:00:00', '2020-12-09 19:30:00'),
(9, 3, 5, 'G009', 'www.G009.com', 'Kamis', '09:30:00', '2020-12-09 19:30:00', '2020-12-09 22:00:00'),
(10, 1, 6, 'G013', 'www.G013.com', 'Senin', '09:30:00', '2020-12-06 19:03:00', '2020-12-26 10:36:20'),
(11, 2, 3, 'G014', 'www.G014.com', 'Selasa', '07:00:00', '2020-12-07 17:00:00', '2020-12-26 10:36:28'),
(12, 3, 1, 'G015', 'www.G015.com', 'Rabu', '07:00:00', '2020-12-08 17:00:00', '2020-12-26 10:36:36'),
(13, 2, 4, 'G016', 'www.G016.com', 'Rabu', '09:30:00', '2020-12-08 19:30:00', '2020-12-26 10:36:44'),
(14, 1, 2, 'G017', 'www.G017.com', 'Rabu', '12:00:00', '2020-12-08 22:00:00', '2020-12-26 10:36:51'),
(15, 2, 7, 'G018', 'www.G018.com', 'Kamis', '07:00:00', '2020-12-09 17:00:00', '2020-12-26 10:36:57'),
(16, 3, 5, 'G019', 'www.G019.com', 'Kamis', '09:30:00', '2020-12-09 19:30:00', '2020-12-26 10:37:04'),
(17, 2, 2, 'G020', 'www.G020.com', 'jumat', '07:00:00', '2020-12-10 17:00:00', '2020-12-26 10:37:11'),
(18, 1, 5, 'G021', 'www.G021.com', 'Jumat', '13:30:00', '2020-12-10 23:30:00', '2020-12-26 10:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `npm_mhs` bigint(20) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `email_mhs` varchar(255) NOT NULL,
  `status_mhs` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `id_jurusan`, `npm_mhs`, `nama_mhs`, `email_mhs`, `status_mhs`, `create_at`, `update_at`) VALUES
(1, 1, 18081010001, 'Ela', 'Ela@gmail.com', 1, '2020-12-22 02:53:43', '2020-12-22 02:53:43'),
(2, 1, 18081010002, 'Angga', 'Angga@gmail.com', 1, '2020-12-22 02:53:43', '2020-12-22 02:53:43'),
(3, 2, 18081020001, 'Ikhsan', 'Ikhsan@gmail.com', 1, '2020-12-22 02:53:43', '2020-12-22 02:53:43'),
(4, 1, 18081010003, 'Ilham', 'Ilham@gmail.com', 1, '2020-12-22 02:53:43', '2020-12-22 02:53:43'),
(5, 2, 18081020002, 'Cahyo', 'Cahyo@gmail.com', 1, '2020-12-22 02:53:43', '2020-12-22 02:53:43'),
(6, 1, 18081010029, 'Juukyo', 'Juukyo@gmail.com', 1, '2020-12-22 02:53:43', '2020-12-22 02:53:43'),
(7, 2, 18081012031, 'Tiger Nixon', 'TNixon@gmail.com', 1, '2020-12-23 19:04:18', '2020-12-23 19:04:18'),
(8, 2, 18081012394, 'Garrett Winters', 'G_Win99@gmail.com', 1, '2020-12-23 19:04:18', '2020-12-23 19:04:18'),
(9, 1, 18081012304, 'Ashton Cox', 'Ash_cx@gmail.com', 1, '2020-12-23 19:04:18', '2020-12-23 19:04:18'),
(10, 1, 18081019384, 'Cedric Kelly', 'C_kell@gmail.com', 1, '2020-12-23 19:04:18', '2020-12-23 19:04:18'),
(11, 2, 18081012349, 'Airi Satou', 'ASatou@gmail.com', 1, '2020-12-23 19:04:18', '2020-12-23 19:04:18'),
(12, 1, 18081012234, 'Dimas Avtur', 'Dim_tur@gmail.com', 0, '2020-12-23 19:04:18', '2020-12-23 19:04:18'),
(13, 1, 18081012442, 'Fahmi Wibowo', 'FWib@gmail.com', 0, '2020-12-23 19:06:01', '2020-12-23 19:06:01'),
(14, 2, 18081021230, 'Osoreza Subekti', 'Reza_oso@gmail.com', 1, '2020-12-23 19:06:01', '2020-12-23 19:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_mk` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `status_mk` int(11) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_mk`, `id_jurusan`, `nama_mk`, `sks`, `status_mk`, `create_at`, `update_at`) VALUES
(1, 1, 'Pemrograman Web', 3, 1, '2020-12-23 03:34:32', '2020-12-23 18:32:04'),
(2, 2, 'Manajemen IT', 3, 1, '2020-12-23 03:34:32', '2020-12-23 18:32:11'),
(3, 1, 'Pemrograman API', 3, 1, '2020-12-23 03:34:32', '2020-12-23 18:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_komplemen` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipe_user` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_komplemen`, `username`, `password`, `tipe_user`, `create_at`, `update_at`) VALUES
(1, 0, 'admin', 'admin', 0, '2020-12-28 15:09:09', '2020-12-28 15:09:09'),
(2, 1, '18081010001', '0001', 2, '2020-12-28 15:15:07', '2020-12-28 15:15:07'),
(3, 2, '18081010002', '0002', 2, '2020-12-28 15:15:07', '2020-12-28 15:15:07'),
(4, 3, '18081010003', '0003', 2, '2020-12-28 15:15:07', '2020-12-28 15:15:07'),
(5, 4, '18081010004', '0004', 2, '2020-12-28 15:15:07', '2020-12-28 15:15:07'),
(6, 5, '18081010005', '0005', 2, '2020-12-28 15:15:07', '2020-12-28 15:15:07'),
(7, 1, 'juukyokai00@gmail.com', 'admin1', 1, '2021-01-06 14:55:34', '2021-01-06 14:55:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nip_dosen` (`nip_dosen`),
  ADD KEY `dosen_jurusan` (`id_jurusan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kbm`
--
ALTER TABLE `kbm`
  ADD PRIMARY KEY (`id_kbm`),
  ADD KEY `kbm_mhs` (`id_mhs`),
  ADD KEY `kbm_kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`kode_nama_kelas`),
  ADD KEY `kelas_mk` (`id_mk`),
  ADD KEY `kelas_dosen` (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `npm` (`npm_mhs`),
  ADD KEY `mhs_jurusan` (`id_jurusan`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_mk`),
  ADD KEY `mk_jurusan` (`id_jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kbm`
--
ALTER TABLE `kbm`
  MODIFY `id_kbm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kbm`
--
ALTER TABLE `kbm`
  ADD CONSTRAINT `kbm_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kbm_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_mk` FOREIGN KEY (`id_mk`) REFERENCES `mata_kuliah` (`id_mk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mhs_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mk_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
