-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2015 at 08:22 AM
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
-- Table structure for table `account_detial`
--

CREATE TABLE `account_detial` (
  `ID` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `ACCOUNT_ID` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `BANK_COMPANY` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `CARD_NUMBER` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `CARD_EXPIRE_DATE` date NOT NULL,
  `SECURITY_CODE` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_account_detial`
--

CREATE TABLE `customer_account_detial` (
  `ACCOUNT_ID` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `BALANCE` double NOT NULL,
  `FUND` int(11) NOT NULL,
  `FUND_PROFIT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `deposit_history`
--

CREATE TABLE `deposit_history` (
  `USERNAME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `DEPOSIT_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DEPOSIT_AMOUNT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_detial`
--

CREATE TABLE `login_detial` (
  `ID` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `USERNAME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_detial`
--

INSERT INTO `login_detial` (`ID`, `USERNAME`, `PASSWORD`) VALUES
('1000100010001', 'poo', '1234'),
('1334333245656', '12340', '12340'),
('1571100122358', 'active', '123456');

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

-- --------------------------------------------------------

--
-- Table structure for table `transfer_history`
--

CREATE TABLE `transfer_history` (
  `USERNAME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `TRANSFER_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TRANSFER_TARGET` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `TRANFER_AMOUNT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_history`
--

CREATE TABLE `withdraw_history` (
  `USERNAME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `WITHDRAW_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `WITHDRAW_AMOUNT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_detial`
--
ALTER TABLE `account_detial`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer_account_detial`
--
ALTER TABLE `customer_account_detial`
  ADD PRIMARY KEY (`ACCOUNT_ID`);

--
-- Indexes for table `customer_detial`
--
ALTER TABLE `customer_detial`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `deposit_history`
--
ALTER TABLE `deposit_history`
  ADD PRIMARY KEY (`USERNAME`,`DEPOSIT_TIME`);

--
-- Indexes for table `login_detial`
--
ALTER TABLE `login_detial`
  ADD PRIMARY KEY (`ID`,`USERNAME`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `refilled_card`
--
ALTER TABLE `refilled_card`
  ADD PRIMARY KEY (`REFILLED_CARD_NUMBER`),
  ADD UNIQUE KEY `REFILLED_CARD_NUMBER` (`REFILLED_CARD_NUMBER`);

--
-- Indexes for table `transfer_history`
--
ALTER TABLE `transfer_history`
  ADD PRIMARY KEY (`TRANSFER_TIME`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `USERNAME_2` (`USERNAME`),
  ADD KEY `USERNAME_3` (`USERNAME`),
  ADD KEY `TRANSFER_TARGET` (`TRANSFER_TARGET`),
  ADD KEY `TRANSFER_TARGET_2` (`TRANSFER_TARGET`),
  ADD KEY `USERNAME_4` (`USERNAME`);

--
-- Indexes for table `user_account_detial`
--
ALTER TABLE `user_account_detial`
  ADD PRIMARY KEY (`USERNAME`(13));

--
-- Indexes for table `withdraw_history`
--
ALTER TABLE `withdraw_history`
  ADD PRIMARY KEY (`USERNAME`,`WITHDRAW_TIME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
