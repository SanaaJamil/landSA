-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 يناير 2022 الساعة 17:39
-- إصدار الخادم: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
  `NOwnerName` varchar(64) NOT NULL,
  `REUN` varchar(64) NOT NULL,
  `UserID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- بنية الجدول `landinfo`
--

CREATE TABLE `landinfo` (
  `spaceInNumbersLength` int(11) NOT NULL,
  `spaceInNumbersWidth` int(11) NOT NULL,
  `spaceInWritingLength` int(11) NOT NULL,
  `spaceInWritingWidth` int(11) NOT NULL,
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
  `ElectronicTitleDeed` int(11) NOT NULL,
  `REUN` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `landrecord`
--

CREATE TABLE `landrecord` (
  `landState` varchar(64) DEFAULT NULL,
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
  `Name` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `phoneNum` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `IBAN` varchar(64) NOT NULL,
  `BirthDate` date NOT NULL,
  `UserType` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giftrecord`
--
ALTER TABLE `giftrecord`
  ADD PRIMARY KEY (`NOwnerID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `inheritancerecord`
--
ALTER TABLE `inheritancerecord`
  ADD PRIMARY KEY (`ownerID`,`requestID`),
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
  ADD CONSTRAINT `giftrecord_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- القيود للجدول `inheritancerecord`
--
ALTER TABLE `inheritancerecord`
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
