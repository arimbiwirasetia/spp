-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2023 at 11:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `editDataKelas` (IN `id` INT(11), IN `ed_nama` VARCHAR(10), IN `ed_kompetensi_keahlian` VARCHAR(50))   BEGIN
UPDATE kelas
set
nama = ed_nama, kompetensi_keahlian = ed_kompetensi_keahlian WHERE kelas_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusDataKelas` (IN `id` INT)   BEGIN
delete from kelas where kelas_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahDataKelas` (IN `nama` VARCHAR(10), IN `kompetensi_keahlian` VARCHAR(50))   BEGIN
insert into kelas VALUES (NULL, nama, kompetensi_keahlian);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int NOT NULL,
  `nama` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `nama`, `kompetensi_keahlian`) VALUES
(1, 'X - 1', 'RPL'),
(2, 'XI - 2', 'RPL'),
(3, 'XII - 3', 'RPL'),
(4, 'X - 1', 'MM'),
(5, 'XI - 2', 'MM'),
(6, 'XII - 3', 'MM'),
(7, 'X - 1', 'TKJ'),
(8, 'XII - 3', 'TKJ'),
(11, 'ts', 'pr'),
(12, 'ts', 'pr'),
(13, 'ts', 'pr'),
(14, 'tst', 'dere'),
(15, 'trs', 'ty'),
(16, 'trs', 'ty'),
(17, 'trs1111', 't123'),
(18, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nominal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `tahun_ajaran`, `nominal`) VALUES
(1, '2020/2021', 1000000),
(2, '2021/2022', 1000000),
(3, '2022/2023', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `username`, `password`, `role`) VALUES
(1, 'petugas', 'petugas', 1),
(2, 'admin', 'admin', 2),
(3, 'siswa', 'siswa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pengguna_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `nama`, `pengguna_id`) VALUES
(1, 'petugas 1 ', 1),
(2, 'petugas 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `kelas_id` int NOT NULL,
  `pengguna_id` int NOT NULL,
  `pembayaran_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `nisn`, `nis`, `nama`, `alamat`, `telepon`, `kelas_id`, `pengguna_id`, `pembayaran_id`) VALUES
(4, '0053272575', '28900', 'Siswa 1', 'ABC', '082145773643', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `bulan_dibayar` int NOT NULL,
  `tahun_dibayar` int NOT NULL,
  `siswa_id` int NOT NULL,
  `petugas_id` int NOT NULL,
  `pembayaran_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `tanggal_bayar`, `bulan_dibayar`, `tahun_dibayar`, `siswa_id`, `petugas_id`, `pembayaran_id`) VALUES
(9, '2023-02-27 04:23:19', 3, 2021, 4, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `kelas_id` (`kelas_id`,`pengguna_id`,`pembayaran_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `siswa_id` (`siswa_id`,`pembayaran_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`),
  ADD KEY `petugas_id` (`petugas_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`pengguna_id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`pembayaran_id`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`pengguna_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`petugas_id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`pembayaran_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
