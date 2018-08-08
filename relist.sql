-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2017 at 06:35 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbupload`
--

CREATE TABLE `tbupload` (
  `ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `private` tinyint(4) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbupload`
--

INSERT INTO `tbupload` (`ID`, `UID`, `NAME`, `URL`, `view`, `private`, `date`) VALUES
(2, 1, 'AKAME', '4474d119bf271baceb5c724a36766d02.mp4', 13, 1, '2016-10-10 11:52:01'),
(3, 47, '[MMD][åŠ‰ç§€]æ¥µæ¨‚æ·¨åœŸ - YouTube.MP4', 'e38d44a34261b31060d198844e313561.MP4', 3, 1, '2017-06-01 07:43:20'),
(4, 1, 'ã€Œï¼¡ï¼­ï¼¶ã€Anime mix- Alive.mp4', '5f478ba4d7faa7e86b70c663b8267118.mp4', 3, 1, '2017-06-01 18:27:54'),
(5, 1, 'éŽ®å‘½æ­Œ -ã—ãšã‚ã†ãŸ - YouTube.mp4', '1aad5a3e50b0c56794efbed3fc5bd9da.mp4', 3, 1, '2017-06-01 20:47:56'),
(6, 47, 'Ricerca - é’ã„ã‚«ãƒŠãƒªãƒ¤-Acoustic ver- - YouTube.mp4', 'dcaeb0f68b6697a08611a2b835f870ec.mp4', 2, 1, '2017-05-23 23:25:26'),
(7, 47, 'ã€ãƒ¬ãƒŽã‚¢CMã€‘å›ãŒå¥½ã _ è¥¿é‡Žã‚«ãƒŠ(ãƒ•ãƒ«æ­Œè©žä»˜)(ãƒ¬ãƒŽã‚¢ãƒãƒ”ãƒã‚¹ TV CM) ã‚«ãƒãƒ¼ é»’æœ¨ä½‘æ¨¹ã€€ãã‚ã¡ã‚ƒã‚“ã­ã‚‹ - YouTube.mp4', '1d8fef0c548a77c3757a5bd11672f9be.mp4', 2, 1, '2017-06-01 23:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `login_ID` int(11) NOT NULL,
  `login_Username` varchar(20) NOT NULL,
  `login_Password` varchar(100) NOT NULL,
  `login_Email` varchar(100) NOT NULL,
  `login_Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`login_ID`, `login_Username`, `login_Password`, `login_Email`, `login_Status`) VALUES
(1, 'admin', 'b250ae8ea1d84d79b84aa2689336299f', 'admin@admin.com', 1),
(47, 'kimi', 'b250ae8ea1d84d79b84aa2689336299f', 'kimi@kimi.com', 0),
(48, 'shimiken', 'b250ae8ea1d84d79b84aa2689336299f', 'shimiken@shimiken.com', 0),
(49, 'Waitaya', 'b250ae8ea1d84d79b84aa2689336299f', 'Waitaya@Waitaya.com', 1),
(50, 'z0123', '0122f53e90b7ed3956815becba08184e', 'z0123@admin.com', 0),
(51, 'pradit', '66e647847d72d8ced8368dfe545889af', 'pradsag@fdgk.com', 0),
(52, 'tra', 'bedf66806e9721533985d74fab967695', 'tra45678@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `viewlog`
--

CREATE TABLE `viewlog` (
  `tbupload_id` int(11) NOT NULL,
  `date_viewlog` datetime NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `viewlog`
--

INSERT INTO `viewlog` (`tbupload_id`, `date_viewlog`, `user_ID`) VALUES
(2, '2016-04-01 18:25:39', 1),
(2, '2017-06-01 18:29:41', 1),
(3, '2017-06-01 18:26:02', 1),
(4, '2017-06-01 18:29:49', 1),
(4, '2017-06-02 01:32:02', 1),
(5, '2017-06-01 23:32:15', 47),
(6, '2017-05-23 23:32:17', 47),
(7, '2017-06-01 23:32:20', 47);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbupload`
--
ALTER TABLE `tbupload`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`login_ID`),
  ADD UNIQUE KEY `login_Username` (`login_Username`),
  ADD UNIQUE KEY `login_Email` (`login_Email`);

--
-- Indexes for table `viewlog`
--
ALTER TABLE `viewlog`
  ADD PRIMARY KEY (`tbupload_id`,`date_viewlog`,`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbupload`
--
ALTER TABLE `tbupload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `login_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbupload`
--
ALTER TABLE `tbupload`
  ADD CONSTRAINT `tbupload_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `tb_login` (`login_ID`) ON DELETE NO ACTION;

--
-- Constraints for table `viewlog`
--
ALTER TABLE `viewlog`
  ADD CONSTRAINT `viewlog_ibfk_1` FOREIGN KEY (`tbupload_id`) REFERENCES `tbupload` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
