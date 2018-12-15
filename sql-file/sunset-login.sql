-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2018 at 11:16 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunset-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `ss_category`
--

CREATE TABLE `ss_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumbnail` varbinary(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ss_users`
--

CREATE TABLE `ss_users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `pwhash` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '0' COMMENT '1=admin, 0=not admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ss_users`
--

INSERT INTO `ss_users` (`id`, `username`, `pwhash`, `role`) VALUES
(1, 'ss_admin', '$2y$10$eT19Y3.IQjB0CBx8nAS/weMHAoLM4VSIg5Q.VftZqqNcrMw8E/EqG', 1),
(2, 'ss_user', '$2y$10$YKmyqOQ0oo39nlSlR0mP/.j2.9XfWL8sbDdO8BJIzRSAm3kStd61m', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ss_videos`
--

CREATE TABLE `ss_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ss_category`
--
ALTER TABLE `ss_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `ss_users`
--
ALTER TABLE `ss_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `ss_videos`
--
ALTER TABLE `ss_videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ss_category`
--
ALTER TABLE `ss_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `ss_users`
--
ALTER TABLE `ss_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ss_videos`
--
ALTER TABLE `ss_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
