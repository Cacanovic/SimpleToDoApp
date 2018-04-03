-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 08:20 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `zadaci`
--

CREATE TABLE `zadaci` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zadaci`
--

INSERT INTO `zadaci` (`id`, `ime`) VALUES
(29, '33333'),
(30, '444444'),
(31, 'konj'),
(32, '6'),
(33, '7'),
(34, '8'),
(35, '9'),
(36, '0'),
(37, 'gd'),
(38, 'jf'),
(39, 'ghj'),
(40, 'fj'),
(41, 'jtyj'),
(42, 'tfj'),
(43, 'tyj'),
(44, 'fhj'),
(45, 'dyjf'),
(46, 'dfjyt'),
(47, 'dfjjy'),
(48, 'dtyj'),
(49, 'dtyj'),
(51, 'dtyj'),
(52, 'dtyj'),
(53, 'dtj'),
(54, 'dyt'),
(55, 'dytj'),
(56, 'dfhj'),
(57, 'dtyj'),
(58, 'fj'),
(59, 'fjm'),
(60, 'teyh'),
(61, 'ggfj'),
(63, 'gdg'),
(64, 'dhg'),
(65, 'fgh'),
(66, 'fghf'),
(67, 'fghfgh'),
(68, 'fghfgh'),
(69, 'fghfg'),
(70, 'fghfgh'),
(71, 'fghfhg'),
(72, 'fghfgh'),
(73, 'fsdf'),
(74, 'sdfsdf'),
(75, 'sdfsdf'),
(76, 'sdfsdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zadaci`
--
ALTER TABLE `zadaci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zadaci`
--
ALTER TABLE `zadaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
