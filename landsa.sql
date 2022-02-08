-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 فبراير 2022 الساعة 00:01
-- إصدار الخادم: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landsa`
--

-- --------------------------------------------------------

--
-- بنية الجدول `giftrecord`
--

CREATE TABLE `giftrecord` (
  `requestID` varchar(64) NOT NULL,
  `NOwnerID` varchar(64) NOT NULL,
  `NOwnerFirstName` varchar(64) NOT NULL,
  `NOwnerMiddleName` varchar(64) NOT NULL,
  `NOwnerLastName` varchar(64) NOT NULL,
  `NOwnerPhone` varchar(64) NOT NULL,
  `REUN` varchar(64) NOT NULL,
  `UserID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `giftrecord`
--

INSERT INTO `giftrecord` (`requestID`, `NOwnerID`, `NOwnerFirstName`, `NOwnerMiddleName`, `NOwnerLastName`, `NOwnerPhone`, `REUN`, `UserID`) VALUES
('8927', '2222', 'فاطمه محمد', 'سعيد', 'بايونس', '1234567890', '02', '1111111111'),
('Array', '2222', 'فاطمه محمد', 'سعيد', 'بايونس', '1234567890', '1', '1111111111');

-- --------------------------------------------------------

--
-- بنية الجدول `inheritancerecord`
--

CREATE TABLE `inheritancerecord` (
  `ownerID` varchar(11) NOT NULL,
  `courtOrder` longblob NOT NULL,
  `REUN` varchar(64) NOT NULL,
  `requestID` varchar(11) NOT NULL,
  `UserID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `inheritancerecord`
--

INSERT INTO `inheritancerecord` (`ownerID`, `courtOrder`, `REUN`, `requestID`, `UserID`) VALUES
('2222', 0x353636372e6a7067, '0555', '8243', '0000');

-- --------------------------------------------------------

--
-- بنية الجدول `landinfo`
--

CREATE TABLE `landinfo` (
  `spaceInNumbersLength` int(11) NOT NULL,
  `spaceInNumbersWidth` int(11) NOT NULL,
  `spaceInWritingLength` varchar(64) NOT NULL,
  `spaceInWritingWidth` varchar(64) NOT NULL,
  `bordersNorth` int(11) NOT NULL,
  `bordersSouth` int(11) NOT NULL,
  `bordersEast` int(11) NOT NULL,
  `bordersWest` int(11) NOT NULL,
  `lengthNorth` int(11) NOT NULL,
  `lengthSouth` int(11) NOT NULL,
  `lengthEast` int(11) NOT NULL,
  `lengthWest` int(11) NOT NULL,
  `LongitudeA` int(11) NOT NULL,
  `LongitudeB` int(11) NOT NULL,
  `LongitudeC` int(11) NOT NULL,
  `LongitudeD` int(11) NOT NULL,
  `LatitudeA` int(11) NOT NULL,
  `LatitudeB` int(11) NOT NULL,
  `LatitudeC` int(11) NOT NULL,
  `LatitudeD` int(11) NOT NULL,
  `locationMap` int(11) NOT NULL,
  `ElectronicTitleDeed` blob NOT NULL,
  `REUN` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `landinfo`
--

INSERT INTO `landinfo` (`spaceInNumbersLength`, `spaceInNumbersWidth`, `spaceInWritingLength`, `spaceInWritingWidth`, `bordersNorth`, `bordersSouth`, `bordersEast`, `bordersWest`, `lengthNorth`, `lengthSouth`, `lengthEast`, `lengthWest`, `LongitudeA`, `LongitudeB`, `LongitudeC`, `LongitudeD`, `LatitudeA`, `LatitudeB`, `LatitudeC`, `LatitudeD`, `locationMap`, `ElectronicTitleDeed`, `REUN`) VALUES
(50, 50, '50', '50', 1, 2, 3, 4, 50, 50, 50, 50, 1, 2, 3, 4, 0, 0, 0, 0, 0, 0x30, '0111'),
(40, 40, '40', '40', 1, 2, 3, 4, 40, 40, 40, 40, 1, 2, 3, 4, 0, 0, 0, 0, 0, 0x30, '0222'),
(50, 50, '50', '50', 1, 2, 3, 4, 50, 50, 50, 50, 1, 2, 3, 4, 0, 0, 0, 0, 0, 0x30, '0333'),
(80, 80, '80', '80', 1, 2, 3, 4, 80, 80, 80, 80, 1, 2, 3, 4, 0, 0, 0, 0, 0, 0x30, '0555'),
(1, 1, '1', '1', 1, 1, 1, 1, 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 123, 0x353636372e6a7067, '1'),
(1, 1, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0x3331323332332e6a7067, '02');

-- --------------------------------------------------------

--
-- بنية الجدول `landrecord`
--

CREATE TABLE `landrecord` (
  `landState` bit(1) NOT NULL DEFAULT b'0',
  `name` varchar(64) DEFAULT NULL,
  `nationality` varchar(64) DEFAULT NULL,
  `share` decimal(10,0) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `IDType` varchar(64) DEFAULT NULL,
  `IDNumber` varchar(64) NOT NULL,
  `pieceNumber` varchar(64) DEFAULT NULL,
  `blockNumber` varchar(64) DEFAULT NULL,
  `planNumber` varchar(64) DEFAULT NULL,
  `neighborhoodName` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `REUN` varchar(64) NOT NULL,
  `unitType` varchar(64) DEFAULT NULL,
  `deedNumber` varchar(64) DEFAULT NULL,
  `deedDate` date DEFAULT NULL,
  `courtIssued` varchar(64) DEFAULT NULL,
  `UserID` varchar(64) DEFAULT NULL COMMENT 'we need to see if we need it or not after implementation '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `landrecord`
--

INSERT INTO `landrecord` (`landState`, `name`, `nationality`, `share`, `address`, `IDType`, `IDNumber`, `pieceNumber`, `blockNumber`, `planNumber`, `neighborhoodName`, `city`, `REUN`, `unitType`, `deedNumber`, `deedDate`, `courtIssued`, `UserID`) VALUES
(b'0', 'فاطمه محمد بايونس', 'سعودي', '10', 'مكه المكرمه، الرصيفه', 'هوية وطنيه', '0000', '1', '1', '1', 'الرصيفه', 'مكة المكرمة', '0111', 'ارض', '1', '2022-02-02', 'محكمة مكه', NULL),
(b'0', '', 'Saudi Arabia', '10', '1', 'card', '1111111111', '2', '2', '2', '2', '2', '02', 'residential', '222222222222', '2022-01-05', '1', NULL),
(b'1', 'فاطمه محمد بايونس', 'سعودي', '10', 'مكه المكرمه، الرصيفه', 'هوية وطنيه', '0000', '2', '2', '2', 'الرصيفه', 'مكة المكرمة', '0222', 'ارض', '1', '2022-01-02', 'محكمة مكه', NULL),
(b'0', 'فاطمه محمد بايونس', 'سعودي', '10', 'مكه المكرمه، الرصيفه', 'هوية وطنيه', '0000', '3', '3', '3', 'الخالدية', 'مكة المكرمة', '0333', 'ارض', '1', '2022-02-02', 'محكمة مكه', NULL),
(b'0', 'فاطمه محمد بايونس', 'سعودي', '10', 'مكه المكرمه، الرصيفه', 'هوية وطنيه', '0000', '4', '4', '4', 'العوالي', 'مكة المكرمة', '0444', 'ارض', '1', '2021-06-02', 'محكمة مكه', NULL),
(b'0', 'فاطمه محمد بايونس', 'سعودي', '10', 'مكه المكرمه، الرصيفه', 'هوية وطنيه', '2222', '4', '4', '4', 'العوالي', 'مكة المكرمة', '0555', 'ارض', '1', '2021-06-02', 'محكمة مكه', NULL),
(b'0', '', 'Saudi Arabia', '10', '1', 'card', '1111111111', '1', '1', '11', '1', '1', '1', 'residential', '111111111111', '2022-02-24', '1', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `landsandoffers`
--

CREATE TABLE `landsandoffers` (
  `REUN` varchar(64) NOT NULL,
  `offerID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `landsonsale`
--

CREATE TABLE `landsonsale` (
  `REUN` varchar(64) NOT NULL,
  `sellerPhoneNum` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `multir`
--

CREATE TABLE `multir` (
  `ID` varchar(64) NOT NULL,
  `IDType` varchar(64) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `phoneNum` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `IBAN` varchar(64) NOT NULL,
  `BirthDate` varchar(64) NOT NULL,
  `REUN` varchar(64) NOT NULL,
  `sellerPhoneNum` varchar(64) NOT NULL,
  `offerID` varchar(64) NOT NULL,
  `landPrice` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `offers`
--

CREATE TABLE `offers` (
  `OfferID` varchar(64) NOT NULL,
  `landPrice` varchar(64) NOT NULL,
  `UserID` varchar(64) NOT NULL,
  `REUN` varchar(64) NOT NULL,
  `requestID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `systemrequest`
--

CREATE TABLE `systemrequest` (
  `requestID` varchar(64) NOT NULL,
  `referenceID` varchar(64) NOT NULL,
  `OfferID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `ID` varchar(64) NOT NULL,
  `IDType` varchar(64) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `middleName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `phoneNum` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `IBAN` varchar(64) NOT NULL,
  `BirthDate` date NOT NULL,
  `UserType` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`ID`, `IDType`, `firstName`, `middleName`, `lastName`, `Password`, `phoneNum`, `Email`, `IBAN`, `BirthDate`, `UserType`) VALUES
('0000', 'مواطن', 'فاطمه', 'محمد', 'بايونس', '0000', '1234567890', 'abcdef123@gmail.com', '1234567890', '1999-02-25', ''),
('1111', 'مواطن', 'فاطمه', 'محمد', 'بايونس', '1111', '1234567890', 'abcdef123@gmail.com', '1234567890', '1999-02-25', ''),
('1111111111', 'مواطن', '', 'محمد', 'بايونس', '1234567890qQ', '0555555555', 'bsbosh1209@hotmail.com', '1234567890', '1999-02-25', '0'),
('2222', 'مواطن', 'فاطمه', 'محمد', 'بايونس', '2222', '1234567890', 'abcdef123@gmail.com', '1234567890', '1999-02-25', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giftrecord`
--
ALTER TABLE `giftrecord`
  ADD PRIMARY KEY (`REUN`,`requestID`) USING BTREE,
  ADD UNIQUE KEY `REUN` (`REUN`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `inheritancerecord`
--
ALTER TABLE `inheritancerecord`
  ADD PRIMARY KEY (`ownerID`,`requestID`),
  ADD UNIQUE KEY `REUN` (`REUN`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `landinfo`
--
ALTER TABLE `landinfo`
  ADD KEY `connectLandInfo` (`REUN`);

--
-- Indexes for table `landrecord`
--
ALTER TABLE `landrecord`
  ADD PRIMARY KEY (`REUN`,`IDNumber`) USING BTREE,
  ADD UNIQUE KEY `REUN` (`REUN`),
  ADD KEY `IDNumber` (`IDNumber`);

--
-- Indexes for table `landsandoffers`
--
ALTER TABLE `landsandoffers`
  ADD PRIMARY KEY (`REUN`,`offerID`),
  ADD KEY `landsandoffers_offerID_fk` (`offerID`);

--
-- Indexes for table `landsonsale`
--
ALTER TABLE `landsonsale`
  ADD PRIMARY KEY (`REUN`);

--
-- Indexes for table `multir`
--
ALTER TABLE `multir`
  ADD PRIMARY KEY (`ID`,`REUN`,`offerID`),
  ADD KEY `multir_REUN_fk` (`REUN`),
  ADD KEY `multir_offerID_fk` (`offerID`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`OfferID`,`UserID`,`REUN`),
  ADD KEY `offers_ID_fk` (`UserID`),
  ADD KEY `offers_REUN_fk` (`REUN`),
  ADD KEY `offers_requestID_fk` (`requestID`);

--
-- Indexes for table `systemrequest`
--
ALTER TABLE `systemrequest`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `OfferID` (`OfferID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `giftrecord`
--
ALTER TABLE `giftrecord`
  ADD CONSTRAINT `giftrecord_ID_fk` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- القيود للجدول `inheritancerecord`
--
ALTER TABLE `inheritancerecord`
  ADD CONSTRAINT `inheritancerecord_REUN_fk` FOREIGN KEY (`REUN`) REFERENCES `landrecord` (`REUN`),
  ADD CONSTRAINT `inheritancerecord_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- القيود للجدول `landinfo`
--
ALTER TABLE `landinfo`
  ADD CONSTRAINT `landinfo_ibfk_1` FOREIGN KEY (`REUN`) REFERENCES `landrecord` (`REUN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `landrecord`
--
ALTER TABLE `landrecord`
  ADD CONSTRAINT `landrecord_ibfk_1` FOREIGN KEY (`IDNumber`) REFERENCES `users` (`ID`);

--
-- القيود للجدول `landsandoffers`
--
ALTER TABLE `landsandoffers`
  ADD CONSTRAINT `landsandoffers_REUN_fk` FOREIGN KEY (`REUN`) REFERENCES `landsonsale` (`REUN`),
  ADD CONSTRAINT `landsandoffers_offerID_fk` FOREIGN KEY (`offerID`) REFERENCES `offers` (`OfferID`);

--
-- القيود للجدول `multir`
--
ALTER TABLE `multir`
  ADD CONSTRAINT `multir_ID_fk` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `multir_REUN_fk` FOREIGN KEY (`REUN`) REFERENCES `landsonsale` (`REUN`),
  ADD CONSTRAINT `multir_offerID_fk` FOREIGN KEY (`offerID`) REFERENCES `offers` (`OfferID`);

--
-- القيود للجدول `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ID_fk` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `offers_REUN_fk` FOREIGN KEY (`REUN`) REFERENCES `landsonsale` (`REUN`),
  ADD CONSTRAINT `offers_requestID_fk` FOREIGN KEY (`requestID`) REFERENCES `systemrequest` (`requestID`);

--
-- القيود للجدول `systemrequest`
--
ALTER TABLE `systemrequest`
  ADD CONSTRAINT `systemrequest_ibfk_1` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`OfferID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
