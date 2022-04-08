-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 04:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(11) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `telepon`, `password`) VALUES
(1, 'admin@gmail.com', '0219876543', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `book_dokter`
--

CREATE TABLE `book_dokter` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tanggal_book` date NOT NULL,
  `jam_book` time NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `laporan` text NOT NULL,
  `status` text NOT NULL,
  `diagnosis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_dokter`
--

INSERT INTO `book_dokter` (`id`, `id_dokter`, `tanggal_book`, `jam_book`, `id_pasien`, `laporan`, `status`, `diagnosis`) VALUES
(1, 1, '2022-04-08', '03:32:00', 2, 'LaporanDokterResult/3685_Anna Gustav  Chris Jhon  08 April 2022 03_38_23 AM.pdf', 'Accepted', 'Lemas/Lelah');

-- --------------------------------------------------------

--
-- Table structure for table `book_pelayanan`
--

CREATE TABLE `book_pelayanan` (
  `id` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `jam_pelayanan` time NOT NULL,
  `tanggal_pelayanan` date NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `laporan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_pelayanan`
--

INSERT INTO `book_pelayanan` (`id`, `id_pelayanan`, `jam_pelayanan`, `tanggal_pelayanan`, `id_pasien`, `diagnosis`, `laporan`) VALUES
(1, 2, '03:50:00', '2022-04-08', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lahir` date NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `telepon` varchar(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `biaya` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `photo` text DEFAULT NULL,
  `ttd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `email`, `lahir`, `kelamin`, `alamat`, `telepon`, `password`, `biaya`, `kategori`, `photo`, `ttd`) VALUES
(1, 'Anna Gustav', 'annagstv@gmail.com', '1998-11-13', 'Perempuan', 'Jl.', '021', '123', 10000, 'PHD', 'PhotoDokter/5768_doctor_3.jpg', 'TTD/ttd_annagstv.png'),
(2, 'Phillip Williams', 'philpwils@gmail.com', '1998-11-13', 'Laki', 'Jl.', '021', '123', 10000, 'PHD', 'PhotoDokter/6787_team-3.jpg', 'TTD/ttd_philpwils.png');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lahir` date NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `telepon` varchar(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `email`, `lahir`, `kelamin`, `alamat`, `telepon`, `password`, `photo`) VALUES
(1, 'Pertama', 'prtm@gmail.com', '1998-11-13', 'Laki', 'Jl.', '021', 'abc', 'PhotoPasien/9169_user.jpg'),
(2, 'Chris Jhon', 'chrisjhon@gmail.com', '1998-11-13', 'Laki', 'Jl.', '021', '123', 'PhotoPasien/1263_user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` int(20) NOT NULL,
  `nama_pelayanan` varchar(50) NOT NULL,
  `biaya_pelayanan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id`, `nama_pelayanan`, `biaya_pelayanan`) VALUES
(1, ' Diabetes', 5000),
(2, 'Urine', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_dokter`
--
ALTER TABLE `book_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDokter` (`id_dokter`),
  ADD KEY `IPasien` (`id_pasien`);

--
-- Indexes for table `book_pelayanan`
--
ALTER TABLE `book_pelayanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDpelayanan` (`id_pelayanan`),
  ADD KEY `IDpasien` (`id_pasien`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_dokter`
--
ALTER TABLE `book_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_pelayanan`
--
ALTER TABLE `book_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_dokter`
--
ALTER TABLE `book_dokter`
  ADD CONSTRAINT `IDokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IPasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_pelayanan`
--
ALTER TABLE `book_pelayanan`
  ADD CONSTRAINT `IDpasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IDpelayanan` FOREIGN KEY (`id_pelayanan`) REFERENCES `pelayanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
