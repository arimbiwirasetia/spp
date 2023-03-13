-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2023 at 01:17 PM
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
-- Database: `spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteKelas` (IN `dr_id` INT)   BEGIN
delete from kelas where id_kelas = dr_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePembayaran` (IN `dr_id` INT)   BEGIN
	DELETE FROM pembayaran WHERE id_pembayaran = dr_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePengguna` (IN `dr_id` INT)   BEGIN 
	DELETE FROM pengguna WHERE id_pengguna = dr_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteSiswa` (IN `dr_id` INT)   BEGIN
DELETE FROM siswa WHERE id_siswa = dr_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTransaksi` (IN `dr_id` INT)   BEGIN
	DELETE FROM transaksi WHERE id_transaksi = dr_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editKelas` (IN `up_id` INT(11), IN `up_nama` VARCHAR(10), IN `up_kompetensi_keahlian` VARCHAR(50))   BEGIN
	UPDATE kelas set 
		nama = up_nama, 
		kompetensi_keahlian = up_kompetensi_keahlian 
	WHERE id_kelas = up_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editPembayaran` (IN `up_id` INT, IN `up_ta` VARCHAR(9), IN `up_nominal` INT)   BEGIN 
	UPDATE pembayaran SET 
    	tahun_ajaran = up_ta,
        nominal = up_nominal
    WHERE id_pembayaran = up_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editPengguna` (IN `up_id` INT, IN `up_username` VARCHAR(25), IN `up_password` VARCHAR(128), IN `up_role` INT)   BEGIN
	UPDATE pengguna SET
    	username = up_username,
        password = up_password,
        role = up_role
    WHERE id_pengguna = up_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editSiswa` (IN `up_id` INT, IN `up_nisn` VARCHAR(10), IN `up_nis` VARCHAR(5), IN `up_nama` VARCHAR(50), IN `up_alamat` TEXT, IN `up_telepon` VARCHAR(14), IN `up_kelas_id` INT, IN `up_pengguna_id` INT, IN `up_pembayaran_id` INT)   BEGIN
	UPDATE siswa 
    SET 
    	nisn = up_nisn,
        nis = up_nis,
        nama = up_nama,
        alamat = up_alamat,
        telepon = up_telepon,
        kelas_id = up_kelas_id,
        pengguna_id = up_pengguna_id,
        pembayaran_id = up_pembayaran_id
    WHERE id_siswa = up_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editTransaksi` (IN `up_id` INT, IN `up_tgl` DATETIME, IN `up_bln` INT, IN `up_thn` INT, IN `siswa` INT, IN `ptgs` INT, IN `pmbyrn` INT)   BEGIN
	UPDATE transaksi SET
    tanggal_dibayar = up_tgl,
    bulan_dibayar = up_bln,
    tahun_dibayar = up_thn,
    siswa_id = siswa,
    petugas_id = ptgs,
    pembayaran_id = pmbyrn
    WHERE id_transaksi = up_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertKelas` (IN `nama` VARCHAR(10), IN `kompetensi_keahlian` VARCHAR(50))   BEGIN
insert into kelas VALUES (NULL, nama, kompetensi_keahlian);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPembayaran` (IN `tahun_ajaran` VARCHAR(9), IN `nominal` INT)   BEGIN
	INSERT INTO pembayaran VALUES (null, tahun_ajaran, nominal);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPengguna` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(128), IN `in_role` INT)   BEGIN
	INSERT INTO pengguna VALUES (null, in_username, in_password, in_role);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSiswa` (IN `nisn` VARCHAR(10), IN `nis` VARCHAR(5), IN `nama` VARCHAR(50), IN `alamat` TEXT, IN `telepon` VARCHAR(14), IN `kelas_id` INT, IN `pengguna_id` INT, IN `pembayaran_id` INT)   BEGIN
INSERT INTO siswa VALUES (null, 
                          nisn, 
                          nis,
                          nama,
                          alamat,
                          telepon,
                          kelas_id,
                          pengguna_id,
                          pembayaran_id
                         );
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `nama` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `kompetensi_keahlian`) VALUES
(1, 'X-1', 'Rekayasa Perangkat Lunak'),
(2, 'X-2', 'Rekayasa Perangkat Lunak'),
(3, 'X-3', 'Rekayasa Perangkat Lunak'),
(4, 'XI-1', 'Multimedia'),
(5, 'XI-2', 'Multimedia'),
(6, 'XI-3', 'Multimedia'),
(7, 'XII-1', 'Teknik Komputer dan Jaringan'),
(8, 'XII-2', 'Teknik Komputer dan Jaringan'),
(9, 'XII-3', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nominal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tahun_ajaran`, `nominal`) VALUES
(1, '2020/2021', 1000000),
(2, '2021/2022', 1000000),
(3, '2022/2023', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1),
(2, 'ptgs1', 'ptgs1', 2),
(3, '28905', '28905', 3),
(8, '28906', '28906', 3);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pengguna_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `pengguna_id`) VALUES
(1, 'admin', 1),
(2, 'petugas1', 2),
(3, 'petugas2', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `selectpetugas`
-- (See below for the actual view)
--
CREATE TABLE `selectpetugas` (
`id_pengguna` int
,`id_petugas` int
,`password` varchar(128)
,`role` int
,`username` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `selectsiswa`
-- (See below for the actual view)
--
CREATE TABLE `selectsiswa` (
`alamat` text
,`id_siswa` int
,`kelas_id` int
,`kompetensi_keahlian` varchar(50)
,`nama` varchar(50)
,`nama_kelas` varchar(10)
,`nis` varchar(5)
,`nisn` varchar(10)
,`nominal` int
,`password` varchar(128)
,`pembayaran_id` int
,`pengguna_id` int
,`role` int
,`tahun_ajaran` varchar(9)
,`telepon` varchar(14)
,`username` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `selecttransaksi`
-- (See below for the actual view)
--
CREATE TABLE `selecttransaksi` (
`alamat` text
,`bulan_dibayar` varchar(9)
,`id_transaksi` int
,`nama` varchar(50)
,`nis` varchar(5)
,`nisn` varchar(10)
,`nominal` int
,`pembayaran_id` int
,`petugas_id` int
,`siswa_id` int
,`tahun_ajaran` varchar(9)
,`tahun_dibayar` varchar(4)
,`tanggal_dibayar` date
,`telepon` varchar(14)
);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
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

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nis`, `nama`, `alamat`, `telepon`, `kelas_id`, `pengguna_id`, `pembayaran_id`) VALUES
(1, '0051450336', '28903', 'Arimbi', 'Jl. Satu', '087781537172', 1, 3, 1),
(2, '0062561447', '28904', 'Arishna', 'Jl. Dua', '089987654321', 5, 3, 2),
(3, '0051450337', '28905', 'Eggy2', 'Jl. Pertama', '087781537173', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `siswa_id` int NOT NULL,
  `pembayaran_id` int NOT NULL,
  `tanggal_dibayar` date NOT NULL,
  `bulan_dibayar` varchar(9) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `petugas_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `siswa_id`, `pembayaran_id`, `tanggal_dibayar`, `bulan_dibayar`, `tahun_dibayar`, `petugas_id`) VALUES
(14, 1, 2, '2019-03-10', 'maret', '2019', 2),
(15, 2, 2, '2023-03-10', 'agustus', '2023', 3),
(16, 2, 2, '2023-03-10', 'desember', '2023', 3),
(17, 2, 2, '2023-03-10', 'maret', '2023', 3),
(18, 3, 1, '2023-03-10', 'agustus', '2023', 3),
(19, 3, 1, '2023-03-10', 'september', '2023', 3),
(20, 1, 1, '2023-03-10', 'juli', '2023', 3),
(21, 1, 1, '2023-03-10', 'agustus', '2023', 3);

-- --------------------------------------------------------

--
-- Structure for view `selectpetugas`
--
DROP TABLE IF EXISTS `selectpetugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectpetugas`  AS SELECT `petugas`.`id_petugas` AS `id_petugas`, `pengguna`.`username` AS `username`, `pengguna`.`password` AS `password`, `pengguna`.`role` AS `role`, `pengguna`.`id_pengguna` AS `id_pengguna` FROM (`petugas` join `pengguna` on((`petugas`.`pengguna_id` = `pengguna`.`id_pengguna`))) ;

-- --------------------------------------------------------

--
-- Structure for view `selectsiswa`
--
DROP TABLE IF EXISTS `selectsiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectsiswa`  AS SELECT `siswa`.`id_siswa` AS `id_siswa`, `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `siswa`.`alamat` AS `alamat`, `siswa`.`telepon` AS `telepon`, `siswa`.`kelas_id` AS `kelas_id`, `siswa`.`pengguna_id` AS `pengguna_id`, `siswa`.`pembayaran_id` AS `pembayaran_id`, `pengguna`.`username` AS `username`, `pengguna`.`password` AS `password`, `pengguna`.`role` AS `role`, `pembayaran`.`tahun_ajaran` AS `tahun_ajaran`, `pembayaran`.`nominal` AS `nominal`, `kelas`.`nama` AS `nama_kelas`, `kelas`.`kompetensi_keahlian` AS `kompetensi_keahlian` FROM (((`siswa` join `pengguna` on((`siswa`.`pengguna_id` = `pengguna`.`id_pengguna`))) join `pembayaran` on((`siswa`.`pembayaran_id` = `pembayaran`.`id_pembayaran`))) join `kelas` on((`siswa`.`kelas_id` = `kelas`.`id_kelas`))) ;

-- --------------------------------------------------------

--
-- Structure for view `selecttransaksi`
--
DROP TABLE IF EXISTS `selecttransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selecttransaksi`  AS SELECT `transaksi`.`id_transaksi` AS `id_transaksi`, `transaksi`.`siswa_id` AS `siswa_id`, `transaksi`.`pembayaran_id` AS `pembayaran_id`, `transaksi`.`tanggal_dibayar` AS `tanggal_dibayar`, `transaksi`.`bulan_dibayar` AS `bulan_dibayar`, `transaksi`.`tahun_dibayar` AS `tahun_dibayar`, `transaksi`.`petugas_id` AS `petugas_id`, `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `siswa`.`alamat` AS `alamat`, `siswa`.`telepon` AS `telepon`, `pembayaran`.`tahun_ajaran` AS `tahun_ajaran`, `pembayaran`.`nominal` AS `nominal` FROM ((`transaksi` join `siswa` on((`transaksi`.`siswa_id` = `siswa`.`id_siswa`))) join `pembayaran` on((`transaksi`.`pembayaran_id` = `pembayaran`.`id_pembayaran`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `kelas_id` (`kelas_id`,`pengguna_id`,`pembayaran_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
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
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
