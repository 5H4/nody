-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 12:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nody`
--

-- --------------------------------------------------------

--
-- Table structure for table `nodies`
--

CREATE TABLE `nodies` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `nody_like` int(11) DEFAULT 0,
  `nody_dislike` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nodies`
--

INSERT INTO `nodies` (`id`, `text`, `nody_like`, `nody_dislike`) VALUES
(1, 'bla BLA BLA', 6, 0),
(2, 'omajgad hahaha', 4, 0),
(3, 'novi text bbaa', 4, 3),
(4, 'test etsd dsdd dsd', 4, 1),
(5, 'sd ad asd asdas dasd a', 6, 1),
(6, 'Ovo je novi post', 4, 7),
(7, 'Hej cao kako se osjecas', 6, 1),
(8, 'koji kurac', 12, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nodies`
--
ALTER TABLE `nodies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nodies`
--
ALTER TABLE `nodies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
