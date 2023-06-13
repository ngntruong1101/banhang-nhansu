-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 05:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhansu`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhansu`
--

CREATE TABLE `nhansu` (
  `id` varchar(32) NOT NULL,
  `phongban_id` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `trinhdo_id` int(11) NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nhansu`
--

INSERT INTO `nhansu` (`id`, `phongban_id`, `trangthai`, `trinhdo_id`, `hovaten`, `dienthoai`, `email`) VALUES
('1', 1, 1, 1, 'ho va ten 1', '123', '123'),
('2', 2, 2, 2, 'ho va ten 2', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `diachi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`id`, `ten`, `dienthoai`, `diachi`) VALUES
(1, 'phong ban 1', '123', 123),
(2, 'phong ban 2', '123', 123);

-- --------------------------------------------------------

--
-- Table structure for table `quatrinhdaotao`
--

CREATE TABLE `quatrinhdaotao` (
  `id` varchar(32) NOT NULL,
  `nhansu_id` varchar(32) NOT NULL,
  `tungay` datetime NOT NULL,
  `denngay` datetime NOT NULL,
  `loaihinhdaotao` varchar(100) NOT NULL,
  `bangcap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thannhan`
--

CREATE TABLE `thannhan` (
  `id` int(11) NOT NULL,
  `nhansu_id` varchar(32) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `quanhe` varchar(50) NOT NULL,
  `dienthoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `thannhan`
--

INSERT INTO `thannhan` (`id`, `nhansu_id`, `ten`, `quanhe`, `dienthoai`) VALUES
(1, '1', '1', '1', '1'),
(2, '1', '2', '2', '2'),
(3, '1', '3', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `trinhdohocvan`
--

CREATE TABLE `trinhdohocvan` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trinhdohocvan`
--

INSERT INTO `trinhdohocvan` (`id`, `ten`, `mota`) VALUES
(1, 'trinh do 1', '123'),
(2, 'trinh do 2', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `tendaydu` varchar(255) NOT NULL,
  `quyenhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `matkhau`, `tendaydu`, `quyenhan`) VALUES
(0, 'admin', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhansu`
--
ALTER TABLE `nhansu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phongban_id` (`phongban_id`),
  ADD KEY `trinhdo_id` (`trinhdo_id`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quatrinhdaotao`
--
ALTER TABLE `quatrinhdaotao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhansu_id` (`nhansu_id`);

--
-- Indexes for table `thannhan`
--
ALTER TABLE `thannhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhansu_id` (`nhansu_id`);

--
-- Indexes for table `trinhdohocvan`
--
ALTER TABLE `trinhdohocvan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhansu`
--
ALTER TABLE `nhansu`
  ADD CONSTRAINT `nhansu_ibfk_1` FOREIGN KEY (`phongban_id`) REFERENCES `phongban` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nhansu_ibfk_2` FOREIGN KEY (`trinhdo_id`) REFERENCES `trinhdohocvan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quatrinhdaotao`
--
ALTER TABLE `quatrinhdaotao`
  ADD CONSTRAINT `quatrinhdaotao_ibfk_1` FOREIGN KEY (`nhansu_id`) REFERENCES `nhansu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thannhan`
--
ALTER TABLE `thannhan`
  ADD CONSTRAINT `thannhan_ibfk_1` FOREIGN KEY (`nhansu_id`) REFERENCES `nhansu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
