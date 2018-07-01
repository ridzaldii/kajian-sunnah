-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2018 at 11:21 AM
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
(1, 'aksan', 'btp', 'aksan@gmail.com', 'aksanji', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_kajian`
--

CREATE TABLE `artikel_kajian` (
  `id` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `pembicara` varchar(250) NOT NULL,
  `deskripsi` text CHARACTER SET utf8 NOT NULL,
  `kategori` enum('aqidah','tauhid','fikih','tematik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel_kajian`
--

INSERT INTO `artikel_kajian` (`id`, `judul`, `pembicara`, `deskripsi`, `kategori`) VALUES
(1, 'Syarat sah salat', 'Ustads inia', '\"(Syarat dalam bab shalat ialah) hal-hal yang menjadi penentu keabsahan shalat, namun bukan bagian dari shalat. Berbeda dengan rukun yang merupakan bagian shalat.\"', 'fikih'),
(2, 'Makhrijal Huruf', 'Yusu Mansyur', 'Pengucapan huruf hijaiyah', 'tauhid');

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
-- Table structure for table `jadwal_kajian`
--

CREATE TABLE `jadwal_kajian` (
  `id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `ustadz` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `tempat` varchar(500) NOT NULL,
  `gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kajian`
--

INSERT INTO `jadwal_kajian` (`id`, `judul`, `ustadz`, `deskripsi`, `tanggal`, `waktu`, `hari`, `tempat`, `gambar`) VALUES
(1, 'Syarat sah salat', 'Yusuf Mansyur', '\"(Syarat dalam bab shalat ialah) hal-hal yang menjadi penentu keabsahan shalat, namun bukan bagian dari shalat. Berbeda dengan rukun yang merupakan bagian shalat.\"', '2018-07-31', '15:00:00', 'Selasa', 'Masjid baiturahman', NULL),
(2, 'Ceramah ramadhan 2', 'yusuf', 'ceramah ramadhan 2', '2018-06-28', '13:00:00', 'Kamis', 'Masjid nurul hijrah', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_artikel`, `nama`, `komentar`) VALUES
(1, 1, 'Ahmad', 'Sangat bermanfaat, syukran.'),
(2, 2, 'Ahmad', 'asdfasdfadsf');

-- --------------------------------------------------------

--
-- Table structure for table `rekaman_kajian`
--

CREATE TABLE `rekaman_kajian` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `rekaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekaman_kajian`
--

INSERT INTO `rekaman_kajian` (`id`, `judul`, `rekaman`) VALUES
(6, 'asdasd', '1530361760-01_c.wav');

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
-- AUTO_INCREMENT for table `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekaman_kajian`
--
ALTER TABLE `rekaman_kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel_kajian` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `deleteRecord` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-06-24 00:00:00' ENDS '2018-09-28 00:00:00' ON COMPLETION NOT PRESERVE DISABLE COMMENT 'Delete records' DO DELETE FROM `kajian_sunnah`.`jadwal_kajian` WHERE `tanggal` < NOW() AND `waktu` < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
