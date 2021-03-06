-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 05:28 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kajian_sunnah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `alamat`, `email`, `username`, `password`) VALUES
(1, 'Fadel', 'btp', 'fadel@gmail.com', 'fadelm', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_kajian`
--

CREATE TABLE `artikel_kajian` (
  `id` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `pembicara` varchar(250) NOT NULL,
  `deskripsi` text CHARACTER SET utf8 NOT NULL,
  `kategori` enum('aqidah','tauhid','fikih','tematik') NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel_kajian`
--

INSERT INTO `artikel_kajian` (`id`, `judul`, `pembicara`, `deskripsi`, `kategori`, `tanggal`, `jam`) VALUES
(1, 'Syarat sah salat', 'Ustads inia', '\'(Syarat dalam bab shalat ialah) hal-hal yang menjadi penentu keabsahan shalat, namun bukan bagian dari shalat. Berbeda dengan rukun yang merupakan bagian shalat.\'', 'fikih', '2018-07-01', '12:00:00'),
(2, 'Makhrijal Huruf', 'Yusu Mansyur', 'Pengucapan huruf hijaiyah', 'tauhid', '2018-07-01', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `wa` enum('0','1') NOT NULL,
  `telfon` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id`, `gambar`, `kontak`, `wa`, `telfon`) VALUES
(1, 'donasi-buka.jpg', '82291760763', '0', '1'),
(4, '1530417198-121.jpg', '82291760763', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `Senin` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `Selasa` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `Rabu` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `Kamis` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `Jumat` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `Sabtu` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `Minggu` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kajian`
--

CREATE TABLE `jadwal_kajian` (
  `id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `ustadz` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  `tempat` varchar(500) NOT NULL,
  `rutin` enum('Ya','Tidak') NOT NULL,
  `gambar` text,
  `panitia` varchar(50) NOT NULL,
  `kontak` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `jadwal_kajian`
--
DELIMITER $$
CREATE TRIGGER `deleteHari` BEFORE DELETE ON `jadwal_kajian` FOR EACH ROW DELETE FROM `hari` WHERE `hari`.`id_jadwal` = OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_artikel`, `nama`, `komentar`, `status`, `tanggal`, `jam`) VALUES
(1, 1, 'Ahmad', 'Sangat bermanfaat, syukran.', '1', '2018-07-01', '06:00:00'),
(2, 2, 'Ahmad', 'asdfasdfadsf', '0', '2018-07-02', '16:00:00'),
(3, 2, 'Fadel', 'MasyaAllah', '1', '2018-07-04', '11:25:00'),
(4, 2, 'Fadel', 'Subhanallah', '0', '2018-07-03', '20:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `rekaman_kajian`
--

CREATE TABLE `rekaman_kajian` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `rekaman` text NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekaman_kajian`
--

INSERT INTO `rekaman_kajian` (`id`, `judul`, `rekaman`, `deskripsi`, `tanggal`, `jam`) VALUES
(6, 'asdasd', '1530361760-01_c.wav', 'asdfasdf', '2018-07-02', '13:00:00'),
(7, 'Debat', '1530901256-Debat Islam & Kristen(03).mp3', 'debat', '2018-07-01', '05:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `artikel_kajian`
--
ALTER TABLE `artikel_kajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_jadwal` (`id_jadwal`);

--
-- Indexes for table `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `rekaman_kajian`
--
ALTER TABLE `rekaman_kajian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel_kajian`
--
ALTER TABLE `artikel_kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekaman_kajian`
--
ALTER TABLE `rekaman_kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hari`
--
ALTER TABLE `hari`
  ADD CONSTRAINT `hari_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_kajian` (`id`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel_kajian` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `deleteRecord` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-09-18 00:00:00' ENDS '2018-12-31 00:00:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Delete records' DO DELETE FROM `kajian_sunnah`.`jadwal_kajian` WHERE `tanggal` <= NOW() AND waktu < NOW() AND `rutin` = 'Tidak'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
