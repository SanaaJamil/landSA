-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 أبريل 2022 الساعة 00:47
-- إصدار الخادم: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
('5875', '4444444444', 'ee', 'ee', 'e', '0000000000', '1', '4444444444'),
('4088', '9999999999', 'ww', 'w', 'w', '7777777777', '33', '4444444444');

-- --------------------------------------------------------

--
-- بنية الجدول `inheritancerecord`
--

CREATE TABLE `inheritancerecord` (
  `ownerID` varchar(11) NOT NULL,
  `courtOrder` longblob NOT NULL,
  `REUN` varchar(64) NOT NULL,
  `requestID` varchar(11) NOT NULL,
  `UserID` varchar(64) NOT NULL,
  `reqStatus` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `inheritancerecord`
--

INSERT INTO `inheritancerecord` (`ownerID`, `courtOrder`, `REUN`, `requestID`, `UserID`, `reqStatus`) VALUES
('1234567890', 0x313338353537395f31303135333534303132333636383439325f383338353430383736363231383736363739365f6e2e6a7067, '33', '8697', '4444444444', 1);

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
(1, 1, '1', '11', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0x312d31302e6a7067, '1'),
(11, 1, '1', '11', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0x313336333230393931323631312e6a7067, '9'),
(2, 2, '2', '2', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0x333534352e6a7067, '7'),
(1, 1, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 4, 4, 4, 4, 4, 4, 4, 4, 1, 0x313336333230393931323631312e6a7067, '33'),
(1, 1, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0x32332d322d373830783437302e6a7067, '67');

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
  `UserID` varchar(64) DEFAULT NULL COMMENT 'we need to see if we need it or not after implementation ',
  `requestID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `landrecord`
--

INSERT INTO `landrecord` (`landState`, `name`, `nationality`, `share`, `address`, `IDType`, `IDNumber`, `pieceNumber`, `blockNumber`, `planNumber`, `neighborhoodName`, `city`, `REUN`, `unitType`, `deedNumber`, `deedDate`, `courtIssued`, `UserID`, `requestID`) VALUES
(b'0', '', 'Afganistan', '1', '1', 'card', '4444444444', '1', '1', '1', '1', '1', '1', '', '111111111111', '0001-01-01', '1', NULL, ''),
(b'0', 'ds', 'Bangladesh', '23', 'cd', 'passport', '4444444444', '39', '1', '1', '1', 'makkah', '33', 'commercial', '666666666666', '2022-02-01', 're', NULL, ''),
(b'0', 'aisha tameem ', 'Bolivia', '3', 'makkah', 'passport', '4444444444', '12', '3', '21', 'dcs', 'sw', '67', 'residential', '666666666666', '2022-02-21', 'tr', NULL, '9011'),
(b'0', '', 'Algeria', '43', 'makkah', 'card', '4444444444', '32', '1', '1', '1', 'makkah', '7', 'residential', '555555555555', '2022-02-03', 'tr', NULL, ''),
(b'0', '', 'Afganistan', '1', '11', '', '9999999999', '9', '1', '1', '11', '1', '9', '', '133333333333', '0004-11-01', '1', NULL, '');

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
  `price` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `landsonsale`
--

INSERT INTO `landsonsale` (`REUN`, `price`) VALUES
('1', '12'),
('33', '44'),
('67', '12345678'),
('7', '1234'),
('9', '1234');

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
  `requestID` varchar(64) NOT NULL,
  `offerStatus` varchar(64) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `offers`
--

INSERT INTO `offers` (`OfferID`, `landPrice`, `UserID`, `REUN`, `requestID`, `offerStatus`) VALUES
('4057', '1234', '9999999999', '1', '5127', '0'),
('8396', '4567', '9999999999', '9', '2131', '0');

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
('4444444444', 'مواطن', '', 'aa', 'aaa', 'Asmaa1234', '0000000000', 'ayoshtameem@gmail.com', '33', '2022-02-01', '0'),
('9999999999', 'مواطن', '', 'aa', 'AR', 'Asmaa1111', '7777777777', 'ayoshtameem@gmail.com', '44', '2022-02-06', '0');

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
  ADD PRIMARY KEY (`REUN`),
  ADD KEY `REUN` (`REUN`);

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `REUN` varchar(64) NOT NULL,
  `latitude` varchar(64) NOT NULL,
  `longitude` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`REUN`, `latitude`, `longitude`) VALUES
('1111', '24.69762175294001', '46.556510327148416');

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
  ADD UNIQUE KEY `requestID` (`requestID`),
  ADD KEY `offers_ID_fk` (`UserID`),
  ADD KEY `offers_REUN_fk` (`REUN`);

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
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD UNIQUE KEY `REUN` (`REUN`);
  
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
  ADD CONSTRAINT `offers_REUN_fk` FOREIGN KEY (`REUN`) REFERENCES `landsonsale` (`REUN`);

--
-- القيود للجدول `systemrequest`
--
ALTER TABLE `systemrequest`
  ADD CONSTRAINT `systemrequest_ibfk_1` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`OfferID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
