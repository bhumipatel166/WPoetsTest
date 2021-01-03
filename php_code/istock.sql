-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 06:46 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `istock`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`Id`, `CategoryId`, `Title`, `Description`) VALUES
(1, 4, 'Digital Learning Infrastructure', 'Usability enhancement and Training for Translatcion Portal for Customers.'),
(2, 4, 'ICAI Digital Learning Hub', 'Free learning hub website to help students by providing online free education.'),
(3, 4, 'Transforming Digital Learning', 'Explore the emerging, exciting field of Digital Learning practice.'),
(4, 5, 'Artificial Intelligence', 'Usability enhancement and Training for Translatcion Portal for Customers.'),
(5, 5, 'Virtual Reality Hub', 'Free learning hub website to help students by providing online free education.'),
(6, 5, 'Internet of Things', 'Explore the emerging, exciting field of Digital Learning practice.'),
(7, 6, 'Verbal communication', 'Usability enhancement and Training for Translatcion Portal for Customers.'),
(8, 6, 'Written communication', 'Free learning hub website to help students by providing online free education.'),
(9, 6, 'Visual communication', 'Explore the emerging, exciting field of Digital Learning practice.');

-- --------------------------------------------------------

--
-- Table structure for table `informationcategory`
--

CREATE TABLE `informationcategory` (
  `Id` int(11) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL,
  `Type` varchar(50) NOT NULL DEFAULT 'Category',
  `ImagePath` varchar(250) DEFAULT NULL,
  `ParentCategory` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `informationcategory`
--

INSERT INTO `informationcategory` (`Id`, `CategoryName`, `Type`, `ImagePath`, `ParentCategory`) VALUES
(1, 'Learning', 'Category', '../images/DL-learning.svg', NULL),
(2, 'Technology', 'Category', '../images/DL-technology.svg', NULL),
(3, 'Communication', 'Category', '../images/DL-communication.svg', NULL),
(4, 'insurance', 'Sub-Category', '../images/DL-Learning-1.jpg', 1),
(5, 'cloud computing', 'Sub-Category', '../images/DL-Technology.jpg', 2),
(6, 'Essential', 'Sub-Category', '../images/DL-Communication.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `informationcategory`
--
ALTER TABLE `informationcategory`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UniqueCategories` (`CategoryName`),
  ADD KEY `ParentCategory` (`ParentCategory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `informationcategory`
--
ALTER TABLE `informationcategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `informationcategory` (`Id`);

--
-- Constraints for table `informationcategory`
--
ALTER TABLE `informationcategory`
  ADD CONSTRAINT `informationcategory_ibfk_1` FOREIGN KEY (`ParentCategory`) REFERENCES `informationcategory` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
