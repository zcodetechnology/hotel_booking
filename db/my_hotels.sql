-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 02:36 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_hotels`
--

CREATE TABLE `my_hotels` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `approve` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_hotels`
--

INSERT INTO `my_hotels` (`id`, `name`, `address`, `city`, `status`, `created_at`, `updated_at`, `approve`) VALUES
(1, 'abc', 'bhopal 123', '', 'avalable', '2017-10-28 11:56:40', '0000-00-00 00:00:00', '1'),
(2, '', '', 'bhopal', '', '2017-10-28 11:56:45', '0000-00-00 00:00:00', '1'),
(3, 'xyz', 'jhgfj', 'jhfgj', 'hgfjhgfj', '2017-10-28 11:56:47', '2017-10-24 04:36:12', '0'),
(4, 'hghryhrh', 'hty', 'htry', 'htrytr', '2017-10-28 11:56:50', '2017-10-10 02:12:10', '0'),
(5, 'avinashganeshe', '', '', '', '2017-10-28 11:56:53', '2017-10-28 12:54:54', '0'),
(6, ' avinashganeshe', '', '', '', '2017-10-28 11:56:56', '2017-10-28 12:55:55', '1'),
(7, ' avinashganeshe', '', '', '', '2017-10-28 11:56:59', '2017-10-28 12:56:25', '1'),
(8, ' ', '', '', '', '2017-10-28 11:57:01', '2017-10-28 12:56:48', '1'),
(9, ' ', '', '', '', '2017-10-28 11:57:06', '2017-10-28 12:57:09', '1'),
(10, ' ', '', '', '', '2017-10-28 11:57:09', '2017-10-28 12:57:11', '0'),
(11, ' as ewa', 'es', 'se', 'se', '2017-10-28 11:57:11', '2017-10-28 14:52:24', '0'),
(12, ' wswsws', 'esesseseses', 'seseese', 'sesesesesesee', '2017-10-28 11:57:15', '2017-10-28 14:57:02', '0'),
(13, ' asee', 'eses', 'ses', 'essesse', '2017-10-28 09:36:51', '2017-10-28 15:06:51', ''),
(14, ' avinash', 'bhopal 444', 'bhopal', 'ava', '2017-10-28 09:55:44', '2017-10-28 15:25:44', ''),
(15, ' avinash', 'bhopal 444', 'bhopal', 'ava', '2017-10-28 09:55:46', '2017-10-28 15:25:46', ''),
(16, ' avinash', 'bhopal 444', 'bhopal', 'ava', '2017-10-28 09:55:48', '2017-10-28 15:25:48', ''),
(17, ' avinash', 'bhopal 444', 'bhopal', 'ava', '2017-10-28 09:55:49', '2017-10-28 15:25:49', ''),
(18, ' wwwww', 'qqq', 'ww', 'qq', '2017-10-28 10:12:52', '2017-10-28 15:42:52', ''),
(19, ' hcgfh', 'hdgf', 'hdgfhdgf', 'hdgfh', '2017-10-28 10:28:36', '2017-10-28 15:58:36', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_hotels`
--
ALTER TABLE `my_hotels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_hotels`
--
ALTER TABLE `my_hotels`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
