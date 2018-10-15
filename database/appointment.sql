-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2018 at 02:04 PM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
`id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `time`, `description`) VALUES
(27, '2018-10-16 17:45:00', 'afternoon'),
(26, '2018-10-15 10:15:00', 'yahoo'),
(25, '2018-10-30 10:30:00', 'q'),
(24, '2018-10-30 10:00:00', 'some things'),
(23, '2018-10-20 10:30:00', 'oioi'),
(22, '2018-10-17 11:00:00', 'party'),
(21, '2018-10-15 10:30:00', 'what'),
(20, '2018-10-31 10:00:00', 'content'),
(19, '2018-10-19 10:45:00', 'sample'),
(18, '2018-10-16 10:45:00', 'demo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
