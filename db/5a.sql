-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 06:17 AM
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
  `CREATE_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `ID` int(11) NOT NULL,
  `TINGKAT` text NOT NULL,
  `JURUSAN` text NOT NULL,
  `AWAL_PENDIDIKAN` date NOT NULL,
  `AKHIR_PENDIDIKAN` date NOT NULL,
  `PELAMAR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_MENU_MENU1_idx` (`MENU_ID`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
