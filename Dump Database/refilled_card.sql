-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2015 at 08:24 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfectbanking`
--

-- --------------------------------------------------------

--
-- Table structure for table `refilled_card`
--

CREATE TABLE `refilled_card` (
  `REFILLED_CARD_NUMBER` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(8) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `USERNAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `refilled_card`
--
ALTER TABLE `refilled_card`
  ADD PRIMARY KEY (`REFILLED_CARD_NUMBER`),
  ADD UNIQUE KEY `REFILLED_CARD_NUMBER` (`REFILLED_CARD_NUMBER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
