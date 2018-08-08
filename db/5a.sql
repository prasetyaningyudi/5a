-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 05:28 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `5a`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `ID` int(11) NOT NULL,
  `FILE_DATA` longblob NOT NULL,
  `FILE_TYPE` text NOT NULL,
  `FILE_EXT` varchar(45) NOT NULL,
  `FILE_SIZE` varchar(255) NOT NULL,
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_tes`
--

CREATE TABLE `lokasi_tes` (
  `ID` int(11) NOT NULL,
  `NAMA_LOKASI` text NOT NULL,
  `STATUS_LOKASI` varchar(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_tes`
--

INSERT INTO `lokasi_tes` (`ID`, `NAMA_LOKASI`, `STATUS_LOKASI`, `CREATE_DATE`) VALUES
(1, 'Tangerang', '0', '2018-08-08 09:14:03'),
(2, 'Jakarta', '1', '2018-08-08 09:14:26'),
(3, 'Surabaya', '1', '2018-08-08 09:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `ID` int(11) NOT NULL,
  `POSISI_LOWONGAN` text NOT NULL,
  `STATUS_POSISI` varchar(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`ID`, `POSISI_LOWONGAN`, `STATUS_POSISI`, `CREATE_DATE`) VALUES
(1, 'HRD', '0', '2018-08-08 09:32:38'),
(2, 'Sekretaris', '1', '2018-08-08 09:32:48'),
(3, 'Direktur', '1', '2018-08-08 09:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `MENU_NAME` varchar(255) NOT NULL,
  `PERMALINK` text NOT NULL,
  `MENU_ICON` varchar(255) NOT NULL DEFAULT 'minus',
  `MENU_ORDER` varchar(45) NOT NULL,
  `STATUS` varchar(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MENU_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `ID` int(11) NOT NULL,
  `NAMA` text NOT NULL,
  `TELEPON` varchar(255) NOT NULL,
  `EMAIL` text NOT NULL,
  `ALAMAT` text NOT NULL,
  `JENIS_KELAMIN` varchar(50) NOT NULL,
  `TEMPAT_LAHIR` text NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `STATUS_PERNIKAHAN` varchar(50) NOT NULL,
  `CEK_1` varchar(50) NOT NULL,
  `CEK_2` varchar(50) NOT NULL,
  `CEK_3` varchar(50) NOT NULL,
  `CEK_4` varchar(50) NOT NULL,
  `LINK_CV` text NOT NULL,
  `LINK_PHOTO` text NOT NULL,
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LOWONGAN_ID` int(11) NOT NULL,
  `LOKASI_TES_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`ID`, `NAMA`, `TELEPON`, `EMAIL`, `ALAMAT`, `JENIS_KELAMIN`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `STATUS_PERNIKAHAN`, `CEK_1`, `CEK_2`, `CEK_3`, `CEK_4`, `LINK_CV`, `LINK_PHOTO`, `CREATE_DATE`, `LOWONGAN_ID`, `LOKASI_TES_ID`) VALUES
(2, 'Yudi Prasetyo', '081329680342', 'prasetyaningyudi@gmail.com', 'klaten', 'Pria', 'Klaten', '1984-10-26', 'Kawin', 'on', 'off', 'off', 'on', 'http://localhost/5a/assets/files/2018-08-08-09-43-43am_Pidi Baiq - Dilan 1991 (Bagian #2).pdf', 'http://localhost/5a/assets/images/2018-08-08-09-43-43am_1-avatar.png', '2018-08-08 09:43:43', 2, 3),
(3, 'IMAS MASKANAH', '085762443544', 'badog.kingers@gmail.com', 'dddd', 'Wanita', 'klaten', '2018-08-13', 'Belum Kawin', 'on', 'on', 'on', 'on', 'http://localhost/5a/assets/files/2018-08-08-10-18-08am_Data Produksi.pdf', 'http://localhost/5a/assets/images/2018-08-08-10-18-08am_hand.png', '2018-08-08 10:18:08', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `ID` int(11) NOT NULL,
  `TINGKAT` text NOT NULL,
  `UNIVERSITAS` text NOT NULL,
  `FAKULTAS` text NOT NULL,
  `JURUSAN` text NOT NULL,
  `IPK` text NOT NULL,
  `AWAL_PENDIDIKAN` date NOT NULL,
  `AKHIR_PENDIDIKAN` date NOT NULL,
  `PELAMAR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`ID`, `TINGKAT`, `UNIVERSITAS`, `FAKULTAS`, `JURUSAN`, `IPK`, `AWAL_PENDIDIKAN`, `AKHIR_PENDIDIKAN`, `PELAMAR_ID`) VALUES
(1, 'S1', 'ITS', 'SI', 'Sistem Informasi', '3.56', '2018-08-05', '2018-08-17', 2),
(2, 'S1', 'ITS', 'SI', 'Sistem Informasi', '3.56', '2018-08-06', '2018-08-22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE `pengalaman_kerja` (
  `ID` int(11) NOT NULL,
  `NAMA_PERUSAHAAN` text NOT NULL,
  `POSISI` text,
  `AWAL_KERJA` date DEFAULT NULL,
  `AKHIR_KERJA` date DEFAULT NULL,
  `PELAMAR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengalaman_kerja`
--

INSERT INTO `pengalaman_kerja` (`ID`, `NAMA_PERUSAHAAN`, `POSISI`, `AWAL_KERJA`, `AKHIR_KERJA`, `PELAMAR_ID`) VALUES
(1, 'PT A', 'sekre', '0000-00-00', '0000-00-00', 2),
(2, 'PT ABC', 'DIREKTUR', '2018-08-07', '2018-08-29', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ref_type`
--

CREATE TABLE `ref_type` (
  `ID` int(11) NOT NULL,
  `TYPE` text NOT NULL,
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_value`
--

CREATE TABLE `ref_value` (
  `ID` int(11) NOT NULL,
  `VALUE1` text,
  `VALUE2` text,
  `VALUE3` text,
  `STATUS` varchar(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `REF_TYPE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(255) NOT NULL,
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_menu`
--

CREATE TABLE `role_menu` (
  `ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `MENU_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ALIAS` varchar(255) NOT NULL,
  `STATUS` varchar(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ROLE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL,
  `APP_NAME` varchar(255) DEFAULT NULL,
  `OFFICE_NAME` varchar(255) DEFAULT NULL,
  `THEME` varchar(255) NOT NULL DEFAULT 'default',
  `ICON` varchar(255) NOT NULL DEFAULT 'home',
  `FRONT_PAGE` varchar(255) NOT NULL,
  `LANGUAGE` varchar(4) NOT NULL DEFAULT 'ID',
  `GMT` varchar(4) NOT NULL DEFAULT '+7',
  `CREATE_DATE` varchar(45) NOT NULL DEFAULT 'NOW()',
  `UPDATE_DATE` varchar(45) NOT NULL DEFAULT 'NOW() ON UPDATE NOW()',
  `USER_ID` int(11) NOT NULL,
  `FILE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lokasi_tes`
--
ALTER TABLE `lokasi_tes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_MENU_MENU1_idx` (`MENU_ID`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_PELAMAR_LOWONGAN1_idx` (`LOWONGAN_ID`),
  ADD KEY `fk_PELAMAR_LOKASI_TES1_idx` (`LOKASI_TES_ID`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_PENDIDIKAN_PELAMAR1_idx` (`PELAMAR_ID`);

--
-- Indexes for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_PENGALAMAN_KERJA_PELAMAR1_idx` (`PELAMAR_ID`);

--
-- Indexes for table `ref_type`
--
ALTER TABLE `ref_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ref_value`
--
ALTER TABLE `ref_value`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_REF_VALUE_REF_TYPE1_idx` (`REF_TYPE_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ROLE_has_MENU_MENU1_idx` (`MENU_ID`),
  ADD KEY `fk_ROLE_has_MENU_ROLE1_idx` (`ROLE_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME_UNIQUE` (`USERNAME`),
  ADD KEY `fk_USER_ROLE_idx` (`ROLE_ID`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_USER_DATA_USER1_idx` (`USER_ID`),
  ADD KEY `fk_USER_DATA_FILE1_idx` (`FILE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi_tes`
--
ALTER TABLE `lokasi_tes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_type`
--
ALTER TABLE `ref_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_value`
--
ALTER TABLE `ref_value`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_MENU_MENU1` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `fk_PELAMAR_LOKASI_TES1` FOREIGN KEY (`LOKASI_TES_ID`) REFERENCES `lokasi_tes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PELAMAR_LOWONGAN1` FOREIGN KEY (`LOWONGAN_ID`) REFERENCES `lowongan` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `fk_PENDIDIKAN_PELAMAR1` FOREIGN KEY (`PELAMAR_ID`) REFERENCES `pelamar` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD CONSTRAINT `fk_PENGALAMAN_KERJA_PELAMAR1` FOREIGN KEY (`PELAMAR_ID`) REFERENCES `pelamar` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ref_value`
--
ALTER TABLE `ref_value`
  ADD CONSTRAINT `fk_REF_VALUE_REF_TYPE1` FOREIGN KEY (`REF_TYPE_ID`) REFERENCES `ref_type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD CONSTRAINT `fk_ROLE_has_MENU_MENU1` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ROLE_has_MENU_ROLE1` FOREIGN KEY (`ROLE_ID`) REFERENCES `role` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_USER_ROLE` FOREIGN KEY (`ROLE_ID`) REFERENCES `role` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `fk_USER_DATA_FILE1` FOREIGN KEY (`FILE_ID`) REFERENCES `file` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_DATA_USER1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
