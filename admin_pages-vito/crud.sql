-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mar 2018 pada 04.59
-- Versi Server: 10.1.30-MariaDB
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `plus_key`
--

CREATE TABLE `plus_key` (
  `username` varchar(50) NOT NULL,
  `pkey` varchar(32) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `plus_key`
--

INSERT INTO `plus_key` (`username`, `pkey`, `time`, `status`) VALUES
('1001', '0b5a34676b137197924cdca8507a17cc', '1521443221', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `plus_login`
--

CREATE TABLE `plus_login` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tm` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(3) NOT NULL DEFAULT 'ON'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `plus_signup`
--

CREATE TABLE `plus_signup` (
  `mem_id` int(3) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `nama` varchar(160) NOT NULL DEFAULT '',
  `division` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `plus_signup`
--

INSERT INTO `plus_signup` (`mem_id`, `username`, `password`, `email`, `nama`, `division`, `phone`) VALUES
(3, 'kuanh', '6531401f9a6807306651b87e44c05751', 'kuanh@gmail.com', 'juahg', 'IT Support', '0'),
(4, 'lugor', 'a75d6a841eafd550b0a27293ee054614', 'juan@gmail.com', 'Juan Tharo', 'IT Support', '085697604336');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plus_signup`
--
ALTER TABLE `plus_signup`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userid` (`username`),
  ADD UNIQUE KEY `mem_id` (`mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plus_signup`
--
ALTER TABLE `plus_signup`
  MODIFY `mem_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
