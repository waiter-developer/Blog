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
-- Table structure for table `blog_article_tag`
--

CREATE TABLE `blog_article_tag` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_article_tag`
--

INSERT INTO `blog_article_tag` (`id`, `article_id`, `tag_id`) VALUES
(23, 30, 57),
(24, 30, 57),
(25, 31, 41),
(41, 29, 44),
(42, 32, 75),
(43, 32, 72),
(44, 32, 69),
(45, 32, 66),
(46, 32, 63),
(47, 32, 60),
(48, 32, 57),
(49, 32, 55),
(50, 32, 53),
(51, 32, 51),
(52, 32, 49),
(53, 33, 79),
(54, 33, 80),
(55, 33, 81),
(56, 34, 82),
(57, 34, 83);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_article_tag`
--
ALTER TABLE `blog_article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_article_tag`
--
ALTER TABLE `blog_article_tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_article_tag`
--
ALTER TABLE `blog_article_tag`
  ADD CONSTRAINT `blog_article_tag_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `blog_article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_article_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `blog_tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
