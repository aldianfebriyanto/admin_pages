-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 05:30 AM
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
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata_it`
--

CREATE TABLE `biodata_it` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `position` text NOT NULL,
  `division` text NOT NULL,
  `nik` int(11) NOT NULL,
  `username` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata_it`
--

INSERT INTO `biodata_it` (`id`, `fname`, `lname`, `email`, `phone`, `position`, `division`, `nik`, `username`) VALUES
(1, 'Azhari', 'Marzan', 'azhari@marzan.com', '2147483647', 'Manager', 'IT Electronic Data Processing', 1000, 'nimda'),
(2, 'Pevita', 'Pearce', 'pevpearce@gmail.com', '2147483647', 'Staff', 'IT Electronic Data Processing', 1001, ''),
(3, 'Rangsang', 'Kumuda', 'sangkumuda@gmail.com', '2147483647', 'Manager', 'IT Support', 1002, ''),
(4, 'Raden', 'Kudamerta', 'kudamerta@gmail.com', '2147483647', 'Staff', 'IT Support', 1003, ''),
(5, 'Raden', 'Cakradara', 'cakradara@gmail.com', '2147483647', 'Manager', 'IT Solution', 1004, ''),
(6, 'Monkey D', 'Luffy', 'luffy@mugiwara.com', '2147483647', 'Staff', 'IT Solution', 1005, ''),
(7, 'Lembu', 'Anabrang', 'lembuanabrang@gmail.com', '2147483647', 'Manager ', 'IT Infrastruktur', 1006, ''),
(8, 'Wirota', 'Wiragati', 'wirowira@gmail.com', '2147483647', 'Staff', 'IT Infrastruktur', 1007, ''),
(9, 'Wiro', 'Sableng', 'sableng@gmail.com', '2147483647', 'asd', 'IT Support', 1008, ''),
(10, 'Ebiet ', 'Kaka', 'ebiet@gmail.com', '2147483647', 'asd', 'IT Support', 1009, ''),
(11, 'God', 'Usopp', 'usop@gmail.com', '2147483647', 'asd', 'IT Support', 1010, ''),
(12, 'Tony', 'Chopper', 'chopper@gmail.com', '2147483647', 'asd', 'IT Support', 1011, ''),
(14, 'Nico', 'Robin', 'nirobin@mugiwara.com', '085674837465', 'asd', 'IT Support', 1012, ''),
(15, 'Vito', 'Raditya', 'fauzan@gmail.com', '1928378921', 'disebelah kanan saya', 'IT Electronic Data Processing', 1234, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_it`
--

CREATE TABLE `kategori_it` (
  `id_kategori` int(11) NOT NULL,
  `division` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_it`
--

INSERT INTO `kategori_it` (`id_kategori`, `division`) VALUES
(1, 'IT Support'),
(2, 'IT Infrastruktur'),
(3, 'IT Solution'),
(4, 'IT EDP');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `name_login` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `name_login`, `username`, `password`, `level`) VALUES
(1, 'Administrator_1', 'admin', '123', 'admin'),
(2, 'User', 'user', '123', 'user'),
(3, '', 'nimda', '$2y$10$5G6M9cvdorVovtHnk6Rb7eiFL7Cz4VQ7OSdip6y5xiXbfrxcu70Fa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata_it`
--
ALTER TABLE `biodata_it`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata_it`
--
ALTER TABLE `biodata_it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
