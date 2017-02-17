-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2017 at 07:21 AM
-- Server version: 5.5.53-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `alap`
--

CREATE TABLE `alap` (
  `idalap` int(11) NOT NULL,
  `user` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `type` enum('kecske','bojler','heli') NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT '1',
  `faj` int(2) NOT NULL DEFAULT '1',
  `gender` enum('him','nosteny') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alap`
--

INSERT INTO `alap` (`idalap`, `user`, `email`, `pass`, `type`, `lvl`, `faj`, `gender`) VALUES
(9, '809da5f0e559c6925004e9b1862e2d608473b6103a10d7432ccbd37449658cfa', 'bela@valq.hu', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'kecske', 1, 1, 'nosteny'),
(8, '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'asd@asd.com', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'kecske', 1, 1, 'him'),
(10, '2ea96b9d9f2ba2ff85e5e9d281cdf6d0a4b020731d839be3b0e8747c76c30d80', 'szabojulia97@gmail.com', 'e676f8491f5719aacc6da3630fb872c19b7b6c54c3b31f087e60b45ffc0e5449', 'bojler', 1, 1, 'nosteny'),
(11, '29c924b8abe1b52da8e71fc097aa30d95223cf1bec69be97c84a0d3f10f4d8c9', 'Kovacs.eszti97@gmail.com', '11b065a018151bc2d04f21d16f873b58869e98dce3dd3c00b37bbb9af1ab530f', 'bojler', 1, 1, 'nosteny'),
(12, '43b075625fbcf094e6a976a9ea3c322a7ca42436f51d42a7e91ec6d073fb0999', 'Noraszabo10@hotmail.com', 'f00ea69d49d5ed68bdfe099731e4d25b36e31736c1eee20a786e0ff4d45db726', 'bojler', 1, 1, 'him');

-- --------------------------------------------------------

--
-- Table structure for table `extended`
--

CREATE TABLE `extended` (
  `user` varchar(64) NOT NULL,
  `xp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `money` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `premium` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `szomj` tinyint(100) UNSIGNED NOT NULL DEFAULT '100',
  `hunger` tinyint(100) UNSIGNED NOT NULL DEFAULT '100',
  `lastkaja` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `lastpia` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extended`
--

INSERT INTO `extended` (`user`, `xp`, `money`, `premium`, `szomj`, `hunger`, `lastkaja`, `lastpia`) VALUES
('688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 0, 0, 0, 100, 100, 1486908818, 1486908819),
('809da5f0e559c6925004e9b1862e2d608473b6103a10d7432ccbd37449658cfa', 0, 0, 0, 0, 0, 0, 0),
('2ea96b9d9f2ba2ff85e5e9d281cdf6d0a4b020731d839be3b0e8747c76c30d80', 0, 0, 0, 100, 100, 1486667249, 1486667251),
('29c924b8abe1b52da8e71fc097aa30d95223cf1bec69be97c84a0d3f10f4d8c9', 0, 0, 0, 100, 100, 1486557616, 1486557620),
('43b075625fbcf094e6a976a9ea3c322a7ca42436f51d42a7e91ec6d073fb0999', 0, 0, 0, 100, 100, 1486724265, 1486724268);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alap`
--
ALTER TABLE `alap`
  ADD PRIMARY KEY (`idalap`),
  ADD UNIQUE KEY `user_UNIQUE` (`user`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `extended`
--
ALTER TABLE `extended`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `user_UNIQUE` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alap`
--
ALTER TABLE `alap`
  MODIFY `idalap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
