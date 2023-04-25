-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 03:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beartube`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test` ()   SELECT MAX(id+1) AS Id FROM user$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `HashedPassword` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserName`, `HashedPassword`, `Email`) VALUES
(12, 'Bearium', '$2y$10$0sIbVHWnjf36XJG.aajQUuHotn1FiFB6nBuaPCtfIlAxRV3JW5O8y', 'brett200410@gmail.com'),
(15, 'bob', '$2y$10$VabZNxomfjm3OFq/XWJ83.zA4yNQ0rPNHkKiWOVYRIp0mpOTrVKLG', ''),
(16, 'brett', '$2y$10$DW1o0DSsPQ8wYvnlQPHo9ea/5q8OgIqdZG6TywRc5KGZsA8bLktW6', 'brett2004100@gmail.com'),
(17, 'ROCKFLAME210', '$2y$10$GanFPA9XslzrtJMlJq0OdOp9CsgIZRK72p98dtEpxsUk/vZQcnrLq', 'rockflame210@gmail.com'),
(18, 'mooniebeam', '$2y$10$zlItk0lFNd5QL6lil0JyfeqA/Ffzbjum7VMkae6XVorB.g60Qi1fO', 'wookie.cookies@shaw.ca');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `Id` int(255) NOT NULL,
  `NameForTheVideo` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `UserId` int(255) DEFAULT NULL,
  `ImageType` varchar(255) NOT NULL,
  `VideoType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`Id`, `NameForTheVideo`, `Description`, `UserId`, `ImageType`, `VideoType`) VALUES
(49, 'minions the rise groot ', 'From the biggest global animated franchise in history, comes the origin story of how the world\'s greatest supervillain first met his iconic Minions, forged cinema\'s most despicable crew and faced off against the most unstoppable criminal force ever assemb', 12, 'png', 'mp4'),
(50, 'Testing', '', 12, 'png', 'mp4'),
(52, 'Rick And Morty ', 'S1 E1', NULL, 'jpg', 'mp4'),
(54, 'Rick And Morty ', 'S1 E2', 12, 'jpg', 'mp4'),
(55, 'Transformers G1 Episode 1 - More Than Meets the Eye (Part 1)', 'Episode 1 of the original Transformers cartoon', 17, 'jpg', 'mp4'),
(56, 'Why Aliens Might Already Be On Their Way To Us', 'Be a part of our first Limited Drop, which honors our Cosmic Pioneers and their noble expeditions: https://kgs.link/limited-drop. Stocks are limited – so grab yours before they’re gone for good!', 16, 'webp', 'mp4'),
(57, 'Rick And Morty ', 'S1 E3', 16, 'jpg', 'mp4'),
(59, 'Rick And Morty ', 'S1 E4', 16, 'jpg', 'mp4'),
(62, 'The Kirito is Always Right Foundation', 'no', 16, 'png', 'mp4'),
(63, 'Rick And Morty ', 'S1 E5', 16, 'jpg', 'mp4'),
(64, 'Cocaine Bear', 'Bearsssssssssssssssssssssssssssssssssssssss', 16, 'jpg', 'mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
