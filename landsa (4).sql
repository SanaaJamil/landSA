-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 09:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Stand-in structure for view `bill`
-- (See below for the actual view)
--
CREATE TABLE `bill` (
`OwnerID` varchar(64)
,`BuyerID` varchar(64)
,`REUN` varchar(64)
,`SellerFName` varchar(64)
,`SellerMName` varchar(64)
,`SellerLName` varchar(64)
,`BuyerFName` varchar(64)
,`BuyerMName` varchar(64)
,`BuyerLName` varchar(64)
,`SellerIBAN` varchar(64)
,`BuyerIBAN` varchar(64)
,`offerID` varchar(64)
,`landPrice` varchar(64)
,`address` varchar(64)
,`city` varchar(64)
,`deedNumber` varchar(64)
,`deedDate` date
);

-- --------------------------------------------------------

--
-- Table structure for table `giftrecord`
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

-- --------------------------------------------------------

--
-- Table structure for table `inheritancerecord`
--

CREATE TABLE `inheritancerecord` (
  `ownerID` varchar(64) NOT NULL,
  `courtOrder` longblob NOT NULL,
  `REUN` varchar(64) NOT NULL,
  `requestID` varchar(64) NOT NULL,
  `UserID` varchar(64) NOT NULL,
  `reqStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `landinfo`
--

CREATE TABLE `landinfo` (
  `REUN` varchar(64) NOT NULL,
  `spaceInNumbersLength` varchar(64) NOT NULL,
  `spaceInWritingLength` varchar(64) NOT NULL,
  `bordersNorth` varchar(64) NOT NULL,
  `bordersSouth` varchar(64) NOT NULL,
  `bordersEast` varchar(64) NOT NULL,
  `bordersWest` varchar(64) NOT NULL,
  `lengthNorth` varchar(64) NOT NULL,
  `lengthSouth` varchar(64) NOT NULL,
  `lengthEast` varchar(64) NOT NULL,
  `lengthWest` varchar(64) NOT NULL,
  `LatitudeA` varchar(64) NOT NULL,
  `LatitudeB` varchar(64) NOT NULL,
  `LatitudeC` varchar(64) NOT NULL,
  `LatitudeD` varchar(64) NOT NULL,
  `LongitudeA` varchar(64) NOT NULL,
  `LongitudeB` varchar(64) NOT NULL,
  `LongitudeC` varchar(64) NOT NULL,
  `LongitudeD` varchar(64) NOT NULL,
  `angleA` varchar(64) NOT NULL,
  `angleB` varchar(64) NOT NULL,
  `angleC` varchar(64) NOT NULL,
  `angleD` varchar(64) NOT NULL,
  `ElectronicTitleDeed` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landinfo`
--

INSERT INTO `landinfo` (`REUN`, `spaceInNumbersLength`, `spaceInWritingLength`, `bordersNorth`, `bordersSouth`, `bordersEast`, `bordersWest`, `lengthNorth`, `lengthSouth`, `lengthEast`, `lengthWest`, `LatitudeA`, `LatitudeB`, `LatitudeC`, `LatitudeD`, `LongitudeA`, `LongitudeB`, `LongitudeC`, `LongitudeD`, `angleA`, `angleB`, `angleC`, `angleD`, `ElectronicTitleDeed`) VALUES
('12', '810', 'ثمانمئة وعشرة متر مربع', '15', '1602', '1604', '1600', '35', '12', '33', '30', '26', '27', '27', '26', '22', '22', '21', '21', '90', '125', '85', '60', 0x433a78616d7070096d70706870444632442e746d70),
('1603', '810', 'ثمانمئة وعشرة متر مربع', '15', '1602', '1604', '1600', '35', '12', '33', '30', '26', '26', '26', '26', '21', '21', '21', '21', '90', '125', '85', '60', 0x433a78616d7070096d70706870373836422e746d70),
('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 0x433a78616d7070096d70706870444631302e746d70),
('1891', '681', 'ستمائة وواحد وثمانون متر مربعا فقط', '450', '21', '21', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 0x433a78616d7070096d70706870383141332e746d70);

-- --------------------------------------------------------

--
-- Table structure for table `landrecord`
--

CREATE TABLE `landrecord` (
  `REUN` varchar(64) NOT NULL,
  `landState` bit(1) NOT NULL DEFAULT b'0',
  `firstName` varchar(64) DEFAULT NULL,
  `middleName` varchar(64) DEFAULT NULL,
  `lastName` varchar(64) DEFAULT NULL,
  `share` varchar(64) DEFAULT NULL,
  `IDNumber` varchar(64) NOT NULL,
  `pieceNumber` varchar(64) DEFAULT NULL,
  `blockNumber` varchar(64) DEFAULT NULL,
  `planNumber` varchar(64) DEFAULT NULL,
  `neighborhoodName` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `unitType` varchar(64) DEFAULT NULL,
  `deedNumber` varchar(64) DEFAULT NULL,
  `deedDate` date DEFAULT NULL,
  `courtIssued` varchar(64) DEFAULT NULL,
  `requestID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landrecord`
--

INSERT INTO `landrecord` (`REUN`, `landState`, `firstName`, `middleName`, `lastName`, `share`, `IDNumber`, `pieceNumber`, `blockNumber`, `planNumber`, `neighborhoodName`, `city`, `unitType`, `deedNumber`, `deedDate`, `courtIssued`, `requestID`) VALUES
('1', b'0', 'طيف', 'محمد', 'الغامدي', '1', '1108047638', '1', '1', '1', '1', '1', '', '111111111111', '0001-01-01', '1', ''),
('12', b'0', 'طيف', 'محمد', 'الغامدي', '100', '1108047638', '1603', '29', '1', 'حي الهدى التجميعي', 'مكة المكرمة', 'سكني', '730801013745', '2013-05-01', 'مكتب الدوسري للمحاماة والقضايا ', ''),
('1603', b'0', 'طيف', 'محمد', 'الغامدي', '100', '1108047638', '12', '29', '1', 'حي الهدى التجميعي', 'مكة المكرمة', 'سكني', '730801013745', '2013-05-01', 'مكتب الدوسري للمحاماة والقضايا', ''),
('1891', b'0', 'أسماء ', 'عبدالرحمن', 'عظيم الدين', '100', '2145518821', '7', '107', '1', 'ولي العهد', 'مكة المكرمة', 'سكني', '220121016478', '2021-02-20', 'المحكمة الكبرى', '');

-- --------------------------------------------------------

--
-- Table structure for table `landsonsale`
--

CREATE TABLE `landsonsale` (
  `REUN` varchar(64) NOT NULL,
  `price` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

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
('1', '21.24837855885264', '40.419271426130535'),
('12', '', ''),
('1603', '21.405516036129672', '39.75173913796386'),
('1891', '21.378838565867056', '39.81305885964267');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `OfferID` varchar(64) NOT NULL,
  `landPrice` varchar(64) NOT NULL,
  `OwnerID` varchar(64) NOT NULL,
  `BuyerID` varchar(64) NOT NULL,
  `REUN` varchar(64) NOT NULL,
  `requestID` varchar(64) NOT NULL,
  `offerStatus` varchar(64) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `searchengine`
-- (See below for the actual view)
--
CREATE TABLE `searchengine` (
`REUN` varchar(64)
,`city` varchar(64)
,`neighborhoodName` varchar(64)
,`unitType` varchar(64)
,`deedDate` date
,`price` decimal(20,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `systemrequest`
--

CREATE TABLE `systemrequest` (
  `requestID` varchar(64) NOT NULL,
  `referenceID` varchar(64) NOT NULL,
  `OfferID` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` varchar(64) NOT NULL,
  `IDType` varchar(64) NOT NULL,
  `IDdate` date NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `middleName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `nationality` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `phoneNum` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `IBAN` varchar(64) NOT NULL,
  `BirthDate` date NOT NULL,
  `address` varchar(64) NOT NULL,
  `UserType` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `IDType`, `IDdate`, `firstName`, `middleName`, `lastName`, `nationality`, `Password`, `phoneNum`, `Email`, `IBAN`, `BirthDate`, `address`, `UserType`) VALUES
('1108047638', 'مواطن', '2022-11-12', 'طيف', 'محمد', 'الغامدي', 'المملكة العربية السعودية', '123456789Tt', '0550393666', 'tofagmd.hp@gmail.com', 'ٍِ0945000000251140737001', '1999-11-21', 'مكة المكرمة, الحمرا وام الجود', '0'),
('2145518821', 'مقيم', '2024-12-19', 'أسماء ', 'عبدالرحمن', 'عظيم الدين', 'المملكة العربية السعودية', 'Asmaa1234', '0554976011', 'assmaish@gmail.com', '435262846768986858984', '1996-06-09', 'مكة المكرمة- الكعكية', '0');

-- --------------------------------------------------------

--
-- Structure for view `bill`
--
DROP TABLE IF EXISTS `bill`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bill`  AS SELECT `offers`.`OwnerID` AS `OwnerID`, `offers`.`BuyerID` AS `BuyerID`, `offers`.`REUN` AS `REUN`, `s`.`firstName` AS `SellerFName`, `s`.`middleName` AS `SellerMName`, `s`.`lastName` AS `SellerLName`, `b`.`firstName` AS `BuyerFName`, `b`.`middleName` AS `BuyerMName`, `b`.`lastName` AS `BuyerLName`, `s`.`IBAN` AS `SellerIBAN`, `b`.`IBAN` AS `BuyerIBAN`, `offers`.`OfferID` AS `offerID`, `offers`.`landPrice` AS `landPrice`, `b`.`address` AS `address`, `l`.`city` AS `city`, `l`.`deedNumber` AS `deedNumber`, `l`.`deedDate` AS `deedDate` FROM (((`offers` join `users` `b`) join `users` `s`) join `landrecord` `l`) WHERE `s`.`ID` = `offers`.`OwnerID` AND `b`.`ID` = `offers`.`BuyerID` AND `offers`.`offerStatus` = '1' AND `offers`.`REUN` = `l`.`REUN` ;

-- --------------------------------------------------------

--
-- Structure for view `searchengine`
--
DROP TABLE IF EXISTS `searchengine`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `searchengine`  AS SELECT `landrecord`.`REUN` AS `REUN`, `landrecord`.`city` AS `city`, `landrecord`.`neighborhoodName` AS `neighborhoodName`, `landrecord`.`unitType` AS `unitType`, `landrecord`.`deedDate` AS `deedDate`, `landsonsale`.`price` AS `price` FROM (`landrecord` join `landsonsale`) WHERE `landrecord`.`REUN` = `landsonsale`.`REUN` ;

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
-- Indexes for table `landsonsale`
--
ALTER TABLE `landsonsale`
  ADD PRIMARY KEY (`REUN`),
  ADD KEY `REUN` (`REUN`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD UNIQUE KEY `REUN` (`REUN`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`OfferID`,`OwnerID`,`REUN`),
  ADD UNIQUE KEY `requestID` (`requestID`),
  ADD KEY `offers_ID_fk` (`OwnerID`),
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
-- Constraints for dumped tables
--

--
-- Constraints for table `giftrecord`
--
ALTER TABLE `giftrecord`
  ADD CONSTRAINT `giftrecord_ID_fk` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `inheritancerecord`
--
ALTER TABLE `inheritancerecord`
  ADD CONSTRAINT `inheritancerecord_REUN_fk` FOREIGN KEY (`REUN`) REFERENCES `landrecord` (`REUN`),
  ADD CONSTRAINT `inheritancerecord_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `landinfo`
--
ALTER TABLE `landinfo`
  ADD CONSTRAINT `landinfo_ibfk_1` FOREIGN KEY (`REUN`) REFERENCES `landrecord` (`REUN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `landrecord`
--
ALTER TABLE `landrecord`
  ADD CONSTRAINT `landrecord_ibfk_1` FOREIGN KEY (`IDNumber`) REFERENCES `users` (`ID`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ID_fk` FOREIGN KEY (`OwnerID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `offers_REUN_fk` FOREIGN KEY (`REUN`) REFERENCES `landsonsale` (`REUN`);

--
-- Constraints for table `systemrequest`
--
ALTER TABLE `systemrequest`
  ADD CONSTRAINT `systemrequest_ibfk_1` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`OfferID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
