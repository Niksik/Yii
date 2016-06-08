-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2016 at 03:12 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(150) NOT NULL,
  `category` varchar(80) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`bookId`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `bookName`, `category`, `quantity`) VALUES
(2, 'CXC Information Technology', '200-300', 30),
(3, 'Young warriors', '100-200', 40),
(4, 'KL', '300-400', 89);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryType` varchar(80) NOT NULL,
  `category` varchar(180) NOT NULL,
  PRIMARY KEY (`categoryType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryType`, `category`) VALUES
('100-200', 'Literature'),
('200-300', 'Information Technology'),
('300-400', 'Religious'),
('99-100', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `issuedbooks`
--

CREATE TABLE IF NOT EXISTS `issuedbooks` (
  `issueId` int(11) NOT NULL AUTO_INCREMENT,
  `bookId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `dateIssued` date NOT NULL,
  `dateToReturn` date NOT NULL,
  `idNumber` int(11) NOT NULL,
  `status` varchar(3) NOT NULL,
  `sendEmail` varchar(2) NOT NULL,
  PRIMARY KEY (`issueId`),
  KEY `username` (`username`),
  KEY `book_return_fk` (`bookId`),
  KEY `idNumber` (`idNumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `issuedbooks`
--

INSERT INTO `issuedbooks` (`issueId`, `bookId`, `username`, `dateIssued`, `dateToReturn`, `idNumber`, `status`, `sendEmail`) VALUES
(1, 2, 'nik', '0000-00-00', '0000-00-00', 1400143100, 'I', 'D'),
(2, 2, 'nik', '0000-00-00', '0000-00-00', 1400143100, 'I', 'D'),
(3, 3, 'nik', '0000-00-00', '0000-00-00', 1400143100, 'I', 'D'),
(7, 2, 'nik', '2016-05-31', '2016-06-05', 1400143100, 'O', ''),
(8, 3, 'nik', '2016-05-31', '2016-06-02', 1400143100, 'O', ''),
(9, 3, 'Gangster', '2016-06-01', '2016-06-07', 1400143100, 'O', ''),
(10, 4, 'Gangster', '2016-06-01', '2016-06-23', 1400143100, 'O', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `idNumber` int(11) NOT NULL,
  `fullName` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(40) NOT NULL,
  PRIMARY KEY (`idNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idNumber`, `fullName`, `email`, `phoneNumber`) VALUES
(1400143100, 'Yanik Blake', 'yanikblake@gmail.com', '527-7128');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(120) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_2` (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('Gangster', 'cfcd208495d565ef66e7dff9f98764da'),
('nik', 'naruto'),
('Yanik', 'naruto');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`categoryType`);

--
-- Constraints for table `issuedbooks`
--
ALTER TABLE `issuedbooks`
  ADD CONSTRAINT `book_return_fk` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `students_fk` FOREIGN KEY (`idNumber`) REFERENCES `students` (`idNumber`),
  ADD CONSTRAINT `user_return_fk` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
