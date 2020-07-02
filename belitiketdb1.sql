-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 05:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belitiketdb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `riwayatpenumpang`
--

CREATE TABLE `riwayatpenumpang` (
  `logNumber` int(11) NOT NULL,
  `idPenumpang` bigint(17) NOT NULL,
  `username` varchar(30) NOT NULL,
  `stasiunAsal` varchar(30) NOT NULL,
  `stasiunTujuan` varchar(30) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `nokursi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayatpenumpang`
--

INSERT INTO `riwayatpenumpang` (`logNumber`, `idPenumpang`, `username`, `stasiunAsal`, `stasiunTujuan`, `tanggal`, `nokursi`) VALUES
(6, 1234567891000001, 'Gilang Sinawang', 'JKT', 'BDG', '2020-07-02', '2B'),
(7, 1234567891000002, 'Irene Tobing', 'JKT', 'BDG', '2020-07-02', '2A'),
(8, 1234567891000003, 'Agnes Christi', 'JKT', 'BDG', '2020-07-02', '2C'),
(9, 1234567891000004, 'Abdul Abdullah', 'JKT', 'JGJ', '2020-07-02', '1C'),
(10, 1234567891000005, 'Putri Sekar', 'JKT', 'BDG', '2020-07-03', '1C'),
(11, 1234567891000001, 'Gilang Sinawang', 'JKT', 'BDG', '2020-07-02', '1B'),
(12, 1234567891000002, 'Irene Tobing', 'JKT', 'BDG', '2020-07-02', '2B'),
(13, 1234567891000003, 'Agnes Christi', 'JKT', 'BDG', '2020-07-02', '2C'),
(14, 1234567891000004, 'Abdul Abdullah', 'JKT', 'JGJ', '2020-07-02', '7A'),
(15, 1234567891000005, 'Putri Sekar', 'JKT', 'JGJ', '2020-07-02', '7B');

-- --------------------------------------------------------

--
-- Table structure for table `tabeldaftarkartu`
--

CREATE TABLE `tabeldaftarkartu` (
  `UID` varchar(11) NOT NULL,
  `idPenumpang` bigint(17) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabeldaftarkartu`
--

INSERT INTO `tabeldaftarkartu` (`UID`, `idPenumpang`, `username`) VALUES
('1234500001', 1234567891000001, 'Gilang Sinawang'),
('1234500002', 1234567891000002, 'Irene Tobing'),
('1234500003', 1234567891000003, 'Agnes Christi'),
('1234500004', 1234567891000004, 'Abdul Abdullah'),
('1234500005', 1234567891000005, 'Putri Sekar'),
('1234500006', 1234567891000006, 'Sumiati'),
('1234500007', 1234567891000007, 'Mawar Fitri');

-- --------------------------------------------------------

--
-- Table structure for table `tabeldatapenumpang`
--

CREATE TABLE `tabeldatapenumpang` (
  `idPenumpang` bigint(17) NOT NULL,
  `username` varchar(30) NOT NULL,
  `stasiunAsal` varchar(30) NOT NULL,
  `stasiunTujuan` varchar(30) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `nokursi` varchar(3) NOT NULL,
  `CheckIn` timestamp NULL DEFAULT NULL,
  `CheckOut` timestamp NULL DEFAULT NULL,
  `StatusPenumpang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabeldatapenumpang`
--

INSERT INTO `tabeldatapenumpang` (`idPenumpang`, `username`, `stasiunAsal`, `stasiunTujuan`, `tanggal`, `nokursi`, `CheckIn`, `CheckOut`, `StatusPenumpang`) VALUES
(1234567891000001, 'Gilang Sinawang', 'JKT', 'BDG', '2020-07-02', '1B', NULL, NULL, 'Booked'),
(1234567891000002, 'Irene Tobing', 'JKT', 'BDG', '2020-07-02', '2B', NULL, NULL, 'Booked'),
(1234567891000003, 'Agnes Christi', 'JKT', 'BDG', '2020-07-02', '2C', NULL, NULL, 'Booked'),
(1234567891000004, 'Abdul Abdullah', 'JKT', 'JGJ', '2020-07-02', '7A', NULL, NULL, 'Booked'),
(1234567891000005, 'Putri Sekar', 'JKT', 'JGJ', '2020-07-02', '7B', NULL, NULL, 'Booked');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayatpenumpang`
--
ALTER TABLE `riwayatpenumpang`
  ADD PRIMARY KEY (`logNumber`);

--
-- Indexes for table `tabeldaftarkartu`
--
ALTER TABLE `tabeldaftarkartu`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `tabeldatapenumpang`
--
ALTER TABLE `tabeldatapenumpang`
  ADD PRIMARY KEY (`idPenumpang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayatpenumpang`
--
ALTER TABLE `riwayatpenumpang`
  MODIFY `logNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
