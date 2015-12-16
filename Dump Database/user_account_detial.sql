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
-- Table structure for table `user_account_detial`
--

CREATE TABLE `user_account_detial` (
  `USERNAME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `BALANCE` double NOT NULL,
  `FUND` int(11) NOT NULL,
  `FUND_PROFIT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_account_detial`
--

INSERT INTO `user_account_detial` (`USERNAME`, `BALANCE`, `FUND`, `FUND_PROFIT`) VALUES
('poo', 5000, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_account_detial`
--
ALTER TABLE `user_account_detial`
  ADD PRIMARY KEY (`USERNAME`(13));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
