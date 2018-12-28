-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2018 at 06:41 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `Author_ID` int(11) NOT NULL,
  `Author_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`Author_ID`, `Author_Name`) VALUES
(1, 'Shelley'),
(2, 'Elizabeth Gaskell '),
(3, 'Roald Dahl'),
(4, ' Douglas Adams'),
(5, 'Robert Louis Stevenson'),
(6, 'Arthur Conan Doyle'),
(7, 'Stephenie Meyer'),
(8, ' Thomas Frank'),
(9, ' Thomas Frank');

-- --------------------------------------------------------

--
-- Table structure for table `authors_has_item`
--

CREATE TABLE `authors_has_item` (
  `Author_ID` int(11) NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors_has_item`
--

INSERT INTO `authors_has_item` (`Author_ID`, `ID`) VALUES
(1, 1),
(2, 2),
(4, 4),
(5, 6),
(6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `edition`
--

CREATE TABLE `edition` (
  `EditionID` int(11) NOT NULL,
  `Edition_Num` int(11) NOT NULL,
  `Print_Date` date NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edition`
--

INSERT INTO `edition` (`EditionID`, `Edition_Num`, `Print_Date`, `ID`) VALUES
(1, 1, '2011-02-10', 1),
(2, 4, '2000-12-27', 2),
(3, 13, '1999-12-07', 4),
(4, 100, '1900-12-06', 6),
(5, 10, '2006-06-30', 7),
(8, 6, '0000-00-00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `Format_ID` int(11) NOT NULL,
  `Format_Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`Format_ID`, `Format_Type`) VALUES
(1, 'Printed Book'),
(2, 'E-Book'),
(3, 'CD'),
(4, 'DVD');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `Genre_ID` int(11) NOT NULL,
  `Genre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`Genre_ID`, `Genre`) VALUES
(1, 'Science fiction'),
(2, 'Romance'),
(3, 'Adventure'),
(4, 'Horror'),
(5, 'Comedy'),
(6, 'Action'),
(7, 'Drama'),
(8, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `genres_has_item`
--

CREATE TABLE `genres_has_item` (
  `Genre_ID` int(11) NOT NULL,
  `ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres_has_item`
--

INSERT INTO `genres_has_item` (`Genre_ID`, `ID`) VALUES
(1, 1),
(2, 2),
(3, 4),
(3, 6),
(3, 7),
(4, 1),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` bigint(20) NOT NULL,
  `Title` text NOT NULL,
  `No_Of_Pages` int(11) NOT NULL,
  `No_Of_Copies` int(11) NOT NULL,
  `Best_Of_Collection` text,
  `Rating` int(11) NOT NULL,
  `Publishing_Date` date NOT NULL,
  `ISBN` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `Title`, `No_Of_Pages`, `No_Of_Copies`, `Best_Of_Collection`, `Rating`, `Publishing_Date`, `ISBN`) VALUES
(1, 'Frankenstein ', 254, 20, 'Yes', 10, '2011-02-10', 9780440927174),
(2, 'Cranford', 256, 119, 'No', 5, '1853-05-21', 9781619492073),
(4, 'The Hitchhiker\'s Guide to the Galaxy', 193, 14, 'Yes', 9, '1979-10-12', 9780345418913),
(6, 'Treasure Island', 311, 25, 'No', 7, '1882-01-28', 753453800),
(7, 'A Study in Scarlet', 123, 30, 'No', 6, '2005-01-01', 1420925539),
(11, 'Alice in Wonderland', 30, 33, 'No', 3, '0000-00-00', 34567897567);

-- --------------------------------------------------------

--
-- Table structure for table `item_has_format`
--

CREATE TABLE `item_has_format` (
  `ID` bigint(20) NOT NULL,
  `Format_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_has_format`
--

INSERT INTO `item_has_format` (`ID`, `Format_ID`) VALUES
(1, 1),
(6, 1),
(7, 1),
(1, 2),
(2, 2),
(4, 2),
(4, 3),
(7, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `First_Name` text,
  `Surname` text NOT NULL,
  `Password` varchar(45) NOT NULL,
  `email` text,
  `Number` int(11) DEFAULT NULL,
  `Gender` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `RoleID`, `First_Name`, `Surname`, `Password`, `email`, `Number`, `Gender`) VALUES
(1, 'ayam', 1, 'Aya', 'Moustafa', '123', 'aya.moustafa097@gmail.com', 123456789, 'Female'),
(2, 'nourmah', 2, 'Nour', 'Mahmood', '789', 'nourmah@gmail.com', 987654321, 'female'),
(3, 'asmaaz', 1, 'Asmaa', 'Mohammed', 'asmaa123', 'asmaa@gmail.com', 876653256, 'female'),
(5, 'jsmith', 2, 'James', 'Smith', 'js6543', 'jsmith@yahoo.com', 567834543, 'male'),
(6, 'jwill', 2, 'Jack', 'Williams', 'jw908', 'jwill@yahoo.com', 2147483647, 'male'),
(7, 'ali-med', 2, 'Ali', 'Ahmed', 'ali852', 'ali@hotmail.com', 2147483647, 'male'),
(8, 'markj', 2, 'Mark', 'Jacob', 'mark456', 'mark@gmail.com', 657975368, NULL),
(10, 'zaynm', 1, 'Zayn', 'Moustafa', 'zaynzaynzayn', 'zayn@yahoo.com', 2147483647, 'male'),
(11, 'saramd', 1, 'Sara', 'Mohammed', 'sa123', 'sara@gmail.com', 2147483647, NULL),
(13, 'leenah', 2, 'Leen', 'Ahmad', 'lenahmad', 'lena@gmail.com', 2147483647, 'Female'),
(14, 'reeman', 1, 'Reema', 'Ali', 'Reemaaa', 'reeman@gmail.com', 2147483647, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `User_Type_ID` int(11) NOT NULL,
  `User_Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`User_Type_ID`, `User_Type`) VALUES
(1, 'Admin'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`Author_ID`);

--
-- Indexes for table `authors_has_item`
--
ALTER TABLE `authors_has_item`
  ADD PRIMARY KEY (`Author_ID`,`ID`),
  ADD KEY `fk_Authors_has_ITEM_ITEM1_idx` (`ID`),
  ADD KEY `fk_Authors_has_ITEM_Authors1_idx` (`Author_ID`);

--
-- Indexes for table `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`EditionID`),
  ADD KEY `fk_edition_item1_idx` (`ID`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`Format_ID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`Genre_ID`);

--
-- Indexes for table `genres_has_item`
--
ALTER TABLE `genres_has_item`
  ADD PRIMARY KEY (`Genre_ID`,`ID`),
  ADD KEY `fk_Genres_has_ITEM_ITEM1_idx` (`ID`),
  ADD KEY `fk_Genres_has_ITEM_Genres1_idx` (`Genre_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ISBN_UNIQUE` (`ISBN`);

--
-- Indexes for table `item_has_format`
--
ALTER TABLE `item_has_format`
  ADD PRIMARY KEY (`ID`,`Format_ID`),
  ADD KEY `fk_ITEM_has_Format_Format1_idx` (`Format_ID`),
  ADD KEY `fk_ITEM_has_Format_ITEM1_idx` (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD KEY `fk_User_User_Type_idx` (`RoleID`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`User_Type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `Author_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `edition`
--
ALTER TABLE `edition`
  MODIFY `EditionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `format`
--
ALTER TABLE `format`
  MODIFY `Format_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `Genre_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors_has_item`
--
ALTER TABLE `authors_has_item`
  ADD CONSTRAINT `fk_Authors_has_ITEM_Authors1` FOREIGN KEY (`Author_ID`) REFERENCES `authors` (`Author_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Authors_has_ITEM_ITEM1` FOREIGN KEY (`ID`) REFERENCES `item` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edition`
--
ALTER TABLE `edition`
  ADD CONSTRAINT `fk_edition_item1` FOREIGN KEY (`ID`) REFERENCES `item` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genres_has_item`
--
ALTER TABLE `genres_has_item`
  ADD CONSTRAINT `fk_Genres_has_ITEM_Genres1` FOREIGN KEY (`Genre_ID`) REFERENCES `genres` (`Genre_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Genres_has_ITEM_ITEM1` FOREIGN KEY (`ID`) REFERENCES `item` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_has_format`
--
ALTER TABLE `item_has_format`
  ADD CONSTRAINT `fk_ITEM_has_Format_Format1` FOREIGN KEY (`Format_ID`) REFERENCES `format` (`Format_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ITEM_has_Format_ITEM1` FOREIGN KEY (`ID`) REFERENCES `item` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_User_Type` FOREIGN KEY (`RoleID`) REFERENCES `user_type` (`User_Type_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
