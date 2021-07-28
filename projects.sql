-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 06:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminlte`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `ClientCompany` varchar(25) NOT NULL,
  `ProjectLeader` varchar(20) NOT NULL,
  `Files` text NOT NULL,
  `FileSize` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Id`, `Name`, `Description`, `Status`, `ClientCompany`, `ProjectLeader`, `Files`, `FileSize`) VALUES
(6, 'Project 3', 'Project Descriptions', 'Success', 'adkajsdoa', 'adadads', 'a:3:{i:0;s:6:\"1.webp\";i:1;s:21:\"ascii-cheat-sheet.png\";i:2;s:14:\"bookmarks.html\";}', 'a:3:{i:0;i:769224;i:1;i:40700;i:2;i:97021;}'),
(7, 'Project 4', 'Description', 'Success', 'Infostride', 'Sarthak Sharma', 'a:3:{i:0;s:6:\"1.webp\";i:1;s:21:\"ascii-cheat-sheet.png\";i:2;s:14:\"bookmarks.html\";}', 'a:3:{i:0;i:769224;i:1;i:40700;i:2;i:97021;}'),
(11, 'Project 5', 'Projects 5', 'On Hold', 'ABC', 'XYZ', '', ''),
(12, 'Project 6', 'Project 5', 'On Hold', 'ada', 'asda', 'a:4:{i:0;s:18:\"Screenshot (8).png\";i:1;s:18:\"Screenshot (9).png\";i:2;s:19:\"Screenshot (30).png\";i:3;s:19:\"Screenshot (31).png\";}', 'a:4:{i:0;i:279307;i:1;i:143856;i:2;i:1007135;i:3;i:1003581;}'),
(14, 'Project 7', 'Project 7 description is added here in detail', 'On Hold', 'ABC', 'XYZABC', 'a:4:{i:0;s:10:\"badboy.jpg\";i:1;s:9:\"groot.jpg\";i:2;s:10:\"random.jpg\";i:3;s:11:\"random2.jpg\";}', 'a:4:{i:0;i:260032;i:1;i:60575;i:2;i:14352;i:3;i:53978;}'),
(15, 'Project f', 'asda', 'Cancelled', 'ABC', 'KHS', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
