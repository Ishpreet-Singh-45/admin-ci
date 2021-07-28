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
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Id` int(20) NOT NULL,
  `Name` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Id`, `Name`, `Username`, `Password`) VALUES
(3, 'Fred', '47b842995aef8b89f50e6e6dfbe7b547', '3d9f9c01a5c15f56164680ceeafcbff2'),
(4, 'Brad', 'f08a1d939edf3df352fda99aab42f2a0', '25f9e794323b453885f5181f1b624d0b'),
(5, 'Admin Console', '64e1b8d34f425d19e1ee2ea7236d3028', 'a3175a452c7a8fea80c62a198a40f6c9'),
(6, 'Teaa', '4fca370eb4b1760912f87371ad7a0991', '781520030c4980ac00daec0c7cadbda3'),
(7, 'Teaa', '66c48db532ffaf9930fc006574f96274', '781520030c4980ac00daec0c7cadbda3'),
(8, 'Teaa', '66c48db532ffaf9930fc006574f96274', '781520030c4980ac00daec0c7cadbda3'),
(9, 'Brad Mail', 'f9906978120caa9334386260568f1453', '7d56c7a156675fc2c3c759e918cc3cc7'),
(10, 'Freddie', '01639681fb34d2fc441a80b7a643adf7', 'b0caa4fdff395a439c811677df4c2b88'),
(11, 'Johnny Simp', '9bb49c34ee75a74d3334f5776145d4a4', '1b77f4941eb42b3f469a42f57a1e4256'),
(12, 'Old Snack', 'c8a48727fc04448a7ede532c85e66cdf', '444d72898bc40d27f2e14cf644784a92'),
(13, 'Brandon', 'dd1a7cb9e65f8bb65fa8a5bae07425ea', '54bd05568f5307e72e96392eaa0e766d'),
(14, 'Travis Scott', '5c95805326ad626e15024db173a77912', '99d20ea1f22db85c7a6ad8ae64723d5c'),
(15, 'Harry Potter', '3500e0f331aee41e9e3bdbb5431a9b0d', 'c8bbe67803085b9e51b69b6d6cff821c'),
(16, 'Admin', '64e1b8d34f425d19e1ee2ea7236d3028', '6d371bff8be710af0d55a533ec1e7bc6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
