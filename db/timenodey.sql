-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2018 at 04:45 PM
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
-- Database: `timenodey`
--

-- --------------------------------------------------------

--
-- Table structure for table `timenodey`
--

CREATE TABLE `timenodey` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` varchar(10000) NOT NULL,
  `audio` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timenodey`
--

INSERT INTO `timenodey` (`id`, `title`, `body`, `audio`) VALUES
(4, 'The Lord Is My Shepherd', 'sdagfshgdxcbvzxcv', ''),
(5, 'wafe', 'iooo', ''),
(6, 'dgfd', 'iooo', ''),
(7, 'fdgmhiooo', 'iooo', ''),
(8, 'iooo', 'iooo', ''),
(9, 'iooo', 'iooo', ''),
(10, 'iooo', 'iooo', ''),
(11, 'iooo', 'iooo', ''),
(12, 'iooo', 'iooo', ''),
(13, 'iooo', 'iooo', ''),
(14, 'iooo', 'iooo', ''),
(15, 'iooo', 'iooo', ''),
(16, 'iooo', 'iooo', ''),
(17, 'iooo', 'iooo', ''),
(18, 'iooo', 'iooo', ''),
(19, 'iooo', 'iooo', ''),
(20, 'iooo', 'iooo', ''),
(21, 'iooo', 'iooo', ''),
(22, 'iooo', 'iooo', ''),
(23, 'iooo', 'iooo', ''),
(24, 'iooo', 'iooo', ''),
(25, 'iooo', 'iooo', ''),
(26, 'iooo', 'iooo', ''),
(27, 'iooo', 'iooo\r\n', ''),
(28, 'iooo', 'iooo', ''),
(29, 'iooo', 'iooo', ''),
(30, 'iooo', 'iooo', ''),
(31, 'iooo', 'iooo', ''),
(32, 'iooo', 'iooo', ''),
(34, 'cvxn', 'casdbvxvbzcxv ', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timenodey`
--
ALTER TABLE `timenodey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timenodey`
--
ALTER TABLE `timenodey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
