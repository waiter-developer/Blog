-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2020 at 06:14 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` int NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `tag`) VALUES
(39, 'covid-19'),
(40, 'pakistan'),
(41, 'contry'),
(42, 'memphis'),
(43, 'orange'),
(44, 'black'),
(45, 'red'),
(46, '123'),
(47, '23'),
(48, '535'),
(49, 'max'),
(50, 'anatolii'),
(51, 'vadim'),
(52, 'cat'),
(53, 'dog'),
(54, 'otter'),
(55, 'ba'),
(56, 'ld'),
(57, 'we'),
(58, '92'),
(59, '93'),
(60, '95'),
(61, 'fkf;af'),
(62, 'sdfsdfa'),
(63, 'fdsfds'),
(64, 'mnb'),
(65, 'vcx'),
(66, 'sdfw'),
(67, 'sadfsdf'),
(68, 'sfdsdfsdfdfsfdsf'),
(69, 'sdfsfsdfds sdfs'),
(70, 'sdfsdfds'),
(71, 'sdsdfsdf'),
(72, 'rrrrrr'),
(73, 'qwerty'),
(74, 'poiuy'),
(75, 'rrrrrrr'),
(76, 'uuuuuu'),
(77, 'eeeeee'),
(78, 'oooooo'),
(79, 'member'),
(80, 'divorced'),
(81, 'family'),
(82, 'drive'),
(83, 'vaccinates');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
