-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 04:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk_pgri11`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(15) NOT NULL,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `password` char(15) DEFAULT NULL,
  `level_admin` enum('Super Admin','Admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_depan`, `nama_belakang`, `tempat`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `password`, `level_admin`) VALUES
('SA01', 'Fikri Wahyudi', 'Rahmat', 'Garut', '0000-00-00', 'L', 'Jl. Cipinang Kebembem Rt. 06 / Rw. 12 No. 48 Jakarta Timur', '$2y$10$r6sIzFJr', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai`
--

CREATE TABLE `detail_nilai` (
  `id_nilai` char(50) DEFAULT NULL,
  `nis` char(15) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` char(3) NOT NULL,
  `nuptk` char(30) DEFAULT NULL,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `password` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nuptk`, `nama_depan`, `nama_belakang`, `tempat`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `password`) VALUES
('1', '1', 'Fikri Wahyudi', 'Rahmat', 'Garut', '2000-09-24', 'L', 'Jl. Cipinang Kebembem', '$2y$10$3hIBnwtY');

-- --------------------------------------------------------

--
-- Table structure for table `header_nilai`
--

CREATE TABLE `header_nilai` (
  `id_nilai` char(50) NOT NULL,
  `kode_kelas` char(8) DEFAULT NULL,
  `kode_jurusan` char(15) DEFAULT NULL,
  `kode_guru` char(3) DEFAULT NULL,
  `kode_pelajaran` char(5) DEFAULT NULL,
  `keterangan_nilai` char(15) DEFAULT NULL,
  `semester` char(1) DEFAULT NULL,
  `tahun_ajaran` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` char(15) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `jurusan`) VALUES
('JRS01TKR', 'Teknik Kendaraan Ringan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` char(8) NOT NULL,
  `tingkat` char(3) DEFAULT NULL,
  `kelas` char(7) DEFAULT NULL,
  `kode_guru` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `tingkat`, `kelas`, `kode_guru`) VALUES
('T1KTITLA', 'X', 'TITL-A', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `kode_pelajaran` char(5) NOT NULL,
  `pelajaran` varchar(50) DEFAULT NULL,
  `kkm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`kode_pelajaran`, `pelajaran`, `kkm`) VALUES
('PLJ01', 'Bahasa Indonesia', 75),
('PLJ02', 'Bahasa Inggris', 75);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(15) NOT NULL,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nama_ortu` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Budha') DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `password` char(15) DEFAULT NULL,
  `kode_kelas` char(8) DEFAULT NULL,
  `kode_jurusan` char(15) DEFAULT NULL,
  `tahun_ajaran` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_depan`, `nama_belakang`, `tempat`, `tgl_lahir`, `nama_ortu`, `jenis_kelamin`, `agama`, `alamat`, `password`, `kode_kelas`, `kode_jurusan`, `tahun_ajaran`) VALUES
('11368', 'Fikri Wahyudi', 'Rahmat', 'Garut', '0000-00-00', '', 'L', 'Islam', '', '$2y$10$8KNpI.jd', 'T1KTITLA', 'JRS01TKR', '2021 / 2022'),
('11369', 'Abdola', 'Fakaubun, S.Pd.I', '', '0000-00-00', '', 'L', 'Islam', '', '$2y$10$ZZLNSki5', 'T1KTITLA', 'JRS01TKR', '2021 / 2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `header_nilai`
--
ALTER TABLE `header_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_jurusan` (`kode_jurusan`),
  ADD KEY `kode_guru` (`kode_guru`),
  ADD KEY `kode_pelajaran` (`kode_pelajaran`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`kode_pelajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD CONSTRAINT `detail_nilai_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `header_nilai` (`id_nilai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_nilai_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `header_nilai`
--
ALTER TABLE `header_nilai`
  ADD CONSTRAINT `header_nilai_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `header_nilai_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `header_nilai_ibfk_3` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `header_nilai_ibfk_4` FOREIGN KEY (`kode_pelajaran`) REFERENCES `pelajaran` (`kode_pelajaran`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
