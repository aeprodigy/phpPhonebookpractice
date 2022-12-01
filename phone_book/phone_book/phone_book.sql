-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 10:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salt` varchar(3) DEFAULT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `email`, `salt`, `password`) VALUES
(62, 'ngandu', 'mwiiya', 'ngandumwiiya@gmail.com', '20b', '25181b6e0951b0feddc59d49de9ca3cdded4897e3dc8ac51b949ef8ea50bf374'),
(64, 'weluzani', 'banda', 'welub@gmail.com', NULL, '12345678'),
(82, 'admin', 'admin', 'test@test.com', '915', '00bc5769e3cbd657dcc88f7562c7eddb0c263f2b9df88432367e58797464c941'),
(84, 'admin', 'ad', 'test_@test.com', NULL, '12345678'),
(85, 'admin', 'admin', 'test_@gmail.com', '03d', '5ea75f571fceb6547a5d023f4efea91bcdd34724d0112c801035b2ba27910518');

-- --------------------------------------------------------

--
-- Table structure for table `new_record`
--

CREATE TABLE `new_record` (
  `id` int(50) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `phone3` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_record`
--

INSERT INTO `new_record` (`id`, `fname`, `lname`, `phone1`, `phone2`, `phone3`, `email`, `whatsapp`) VALUES
(41, 'wilson', 'mutazu', '096678324', '096678324', '096678324', 'test@test.com', '096678324'),
(45, 'temwani', 'zulu', '9999999999', '097623456', '097623456', 'temwa@hotmail.com', '097623456'),
(52, 'chungu', 'kaunda', '987654', '9876543', '98765432', 'fellow@kaunda.com', '94444'),
(53, 'gerald', 'inambao', '0978674523', '0978674523', '0978674523', 'gerald@kabanga.com', '0978674523'),
(59, 'halubanza', 'cletus', '0978122353', '0978122353', '0978122353', 'hachi@ymail.com', '0978122353');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `new_record`
--
ALTER TABLE `new_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `new_record`
--
ALTER TABLE `new_record`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
