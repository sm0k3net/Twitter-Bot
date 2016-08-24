-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2016 at 09:54 AM
-- Server version: 5.5.49-0+deb8u1
-- PHP Version: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sentryward`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
`id` int(12) NOT NULL,
  `query` text NOT NULL,
  `type` text NOT NULL,
  `count` int(3) NOT NULL,
  `listing` int(11) NOT NULL,
  `email` int(2) NOT NULL,
  `email_addresses` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `query`, `type`, `count`, `listing`, `email`, `email_addresses`) VALUES
(1, '@ScienceSoft OR ScienceSoft OR #ScienceSoft OR scnsoft OR #scnsoft OR Sciencesoft', 'mixed', 100, 5, 1, 'someemail@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `scnsoft`
--

CREATE TABLE IF NOT EXISTS `scnsoft` (
`id` int(12) NOT NULL,
  `user` text NOT NULL,
  `message` text NOT NULL,
  `status_id` text NOT NULL,
  `urls` text NOT NULL,
  `keywords` text NOT NULL,
  `twitter_date` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scnsoft`
--
ALTER TABLE `scnsoft`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `scnsoft`
--
ALTER TABLE `scnsoft`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
