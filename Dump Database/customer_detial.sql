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
-- Table structure for table `customer_detial`
--

CREATE TABLE `customer_detial` (
  `ID` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `FIRST_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LAST_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BIRTH_DATE` date NOT NULL,
  `ADDRESS` text COLLATE utf8_unicode_ci NOT NULL,
  `TEL_NUMBER` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_detial`
--

INSERT INTO `customer_detial` (`ID`, `FIRST_NAME`, `LAST_NAME`, `BIRTH_DATE`, `ADDRESS`, `TEL_NUMBER`, `EMAIL`) VALUES
('1000100010001', 'nattapat', 'pakakul', '0000-00-00', 'weq', '0785968395', 'lop@gmail.com'),
('1334333245656', 'aofza', 'jeerad', '0000-00-00', '1233', '4434567667', 'act@live.com'),
('1571100122358', 'Jeeradech', 'Sonkosa', '0000-00-00', '187 M.4', '0806718628', 'active228@live.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_detial`
--
ALTER TABLE `customer_detial`
  ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
