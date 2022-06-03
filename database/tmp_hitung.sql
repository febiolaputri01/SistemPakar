-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 06:21 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tmp_hitung`
--

CREATE TABLE `tmp_hitung` (
  `hitung_id` int(11) NOT NULL,
  `hitung_id_pertanyaan` int(11) NOT NULL,
  `hitung_id_gejala` int(11) NOT NULL,
  `hitung_nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp_hitung`
--

INSERT INTO `tmp_hitung` (`hitung_id`, `hitung_id_pertanyaan`, `hitung_id_gejala`, `hitung_nilai`) VALUES
(1, 1, 12, 1),
(2, 4, 15, 0.6),
(3, 3, 14, 0.6),
(4, 5, 16, 0.8),
(5, 2, 13, 0.4),
(6, 6, 17, 0.2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmp_hitung`
--
ALTER TABLE `tmp_hitung`
  ADD PRIMARY KEY (`hitung_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmp_hitung`
--
ALTER TABLE `tmp_hitung`
  MODIFY `hitung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
