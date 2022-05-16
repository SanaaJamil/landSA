-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 مايو 2022 الساعة 17:42
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
  `UserID` varchar(64) NOT NULL,
  `reqStatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `giftrecord`
--

INSERT INTO `giftrecord` (`requestID`, `NOwnerID`, `NOwnerFirstName`, `NOwnerMiddleName`, `NOwnerLastName`, `NOwnerPhone`, `REUN`, `UserID`, `reqStatus`) VALUES
('5875', '4444444444', 'ee', 'ee', 'e', '0000000000', '1', '4444444444', 1),
('4088', '9999999999', 'ww', 'w', 'w', '7777777777', '33', '4444444444', 1);

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
  `reqStatus` int(64) NOT NULL DEFAULT 1
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
  `REUN` varchar(64) NOT NULL,
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
  `LatitudeA` int(11) NOT NULL,
  `LatitudeB` int(11) NOT NULL,
  `LatitudeC` int(11) NOT NULL,
  `LatitudeD` int(11) NOT NULL,
  `LongitudeA` int(11) NOT NULL,
  `LongitudeB` int(11) NOT NULL,
  `LongitudeC` int(11) NOT NULL,
  `LongitudeD` int(11) NOT NULL,
  `angleA` int(11) NOT NULL,
  `angleB` int(11) NOT NULL,
  `angleC` int(11) NOT NULL,
  `angleD` int(11) NOT NULL,
  `ElectronicTitleDeed` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `landinfo`
--

INSERT INTO `landinfo` (`REUN`, `spaceInNumbersLength`, `spaceInNumbersWidth`, `spaceInWritingLength`, `spaceInWritingWidth`, `bordersNorth`, `bordersSouth`, `bordersEast`, `bordersWest`, `lengthNorth`, `lengthSouth`, `lengthEast`, `lengthWest`, `LatitudeA`, `LatitudeB`, `LatitudeC`, `LatitudeD`, `LongitudeA`, `LongitudeB`, `LongitudeC`, `LongitudeD`, `angleA`, `angleB`, `angleC`, `angleD`, `ElectronicTitleDeed`) VALUES
('1', 1, 1, '1', '11', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0x312d31302e6a7067),
('7', 2, 2, '2', '2', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0x333534352e6a7067),
('33', 1, 1, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 0, 0, 0x313336333230393931323631312e6a7067),
('67', 1, 1, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0x32332d322d373830783437302e6a7067),
('00000000000000000', 0, 0, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0x433a78616d7070096d70706870453139372e746d70),
('87686', 877, 87, '878', '676', 5675, 876, 56, 876, 877, 867, 5765, 7676, 6575, 5648, 786, 8787, 6757, 6575, 9879, 789, 90, 50, 90, 10, 0x433a78616d7070096d70706870453736462e746d70);

-- --------------------------------------------------------

--
-- بنية الجدول `landrecord`
--

CREATE TABLE `landrecord` (
  `REUN` varchar(64) NOT NULL,
  `landState` bit(1) NOT NULL DEFAULT b'0',
  `firstName` varchar(64) DEFAULT NULL,
  `middleName` varchar(64) DEFAULT NULL,
  `lastName` varchar(64) DEFAULT NULL,
  `share` decimal(10,0) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `IDType` varchar(64) DEFAULT NULL,
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
-- إرجاع أو استيراد بيانات الجدول `landrecord`
--

INSERT INTO `landrecord` (`REUN`, `landState`, `firstName`, `middleName`, `lastName`, `share`, `address`, `IDType`, `IDNumber`, `pieceNumber`, `blockNumber`, `planNumber`, `neighborhoodName`, `city`, `unitType`, `deedNumber`, `deedDate`, `courtIssued`, `requestID`) VALUES
('00000000000000000', b'0', 'طيف', 'محمد', 'الغامدي', '43434', NULL, 'card', '4444444444', '0', '0', '0', '0', '0', '', '000000000000', '0001-01-01', '0', ''),
('1', b'0', 'طيف', 'محمد', 'الغامدي', '1', NULL, 'card', '4444444444', '1', '1', '1', '1', '1', '', '111111111111', '0001-01-01', '1', ''),
('33', b'0', 'طيف', 'محمد', 'الغامدي', '23', NULL, 'passport', '4444444444', '39', '1', '1', '1', 'مكة المكرمة', 'commercial', '666666666666', '2022-02-01', 're', ''),
('67', b'0', 'طيف', 'محمد', 'الغامدي', '3', NULL, 'passport', '4444444444', '12', '3', '21', 'dcs', 'sw', 'residential', '666666666666', '2022-02-21', 'tr', '9011'),
('7', b'0', 'طيف', 'محمد', 'الغامدي', '43', NULL, 'card', '4444444444', '32', '1', '1', '1', 'makkah', 'residential', '555555555555', '2022-02-03', 'tr', ''),
('87686', b'0', 'عبدالله', 'محمد', 'الغامدي', '878', NULL, 'card', '2222222222', '7878', '786', '787', '6876', '876876', 'سكني', '444455555555', '2022-05-19', 'الاببا', '');

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
('0', '100000000'),
('1', '100000000'),
('33', '44'),
('7', '6666'),
('87686', '6565656'),
('9', '1234');

-- --------------------------------------------------------

--
-- بنية الجدول `map`
--

CREATE TABLE `map` (
  `REUN` varchar(64) NOT NULL,
  `latitude` varchar(64) NOT NULL,
  `longitude` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `map`
--

INSERT INTO `map` (`REUN`, `latitude`, `longitude`) VALUES
('00000000000000000', '21.37101886212143', '39.827362766041965'),
('1', '46.60743652865959', '24.69169517979055'),
('33', '24.69762175294001', '46.556510327148416'),
('67', '24.69169517979055', '46.60743652865959'),
('7', '24.69169517979055', '24.69169517979055'),
('87686', '24.722201888127547', '46.68918891222014');

-- --------------------------------------------------------

--
-- بنية الجدول `offers`
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

--
-- إرجاع أو استيراد بيانات الجدول `offers`
--

INSERT INTO `offers` (`OfferID`, `landPrice`, `OwnerID`, `BuyerID`, `REUN`, `requestID`, `offerStatus`) VALUES
('1511', '10000000', '4444444444', '2222222222', '7', '8273', '2'),
('4093', '50', '4444444444', '2222222222', '33', '9158', '2'),
('4628', '3000000000', '2222222222', '4444444444', '87686', '7728', '1'),
('9961', '3000000000', '4444444444', '2222222222', '1', '8625', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `searchengine`
-- (See below for the actual view)
--
CREATE TABLE `searchengine` (
`REUN` varchar(64)
,`address` varchar(150)
,`city` varchar(64)
,`neighborhoodName` varchar(64)
,`unitType` varchar(64)
,`deedDate` date
,`price` varchar(64)
);

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
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`ID`, `IDType`, `IDdate`, `firstName`, `middleName`, `lastName`, `nationality`, `Password`, `phoneNum`, `Email`, `IBAN`, `BirthDate`, `address`, `UserType`) VALUES
('1010101010', 'مواطن', '2022-05-01', 'خلود', 'محمد', 'العميري', 'المملكة العربية السعودية', '123456789aA', '0550393666', 't@gmail.com', '1234567890', '2022-05-26', 'Makkah, Alhamrah', '0'),
('2222222222', 'مواطن', '0000-00-00', 'عبدالله', 'محمد', 'الغامدي', '', '123456789tT', '0598765432', 't@gmail.com', '7888888888888888', '2022-04-13', 'saudi arabia, makkah', '0'),
('4444444444', 'مواطن', '0000-00-00', 'طيف', 'محمد', 'الغامدي', '', 'Asmaa1234', '0550393666', 'fatom@gmail.com', '1234567890', '2022-02-01', 'saudi arabia, makkah', '0'),
('9999999999', 'مواطن', '0000-00-00', 'اسماء', 'عبدالرحمن', 'عظيم الدين', '', 'Asmaa1111', '7777777777', 'ayoshtameem@gmail.com', '44', '2022-02-06', 'saudi arabia, makkah', '0');

-- --------------------------------------------------------

--
-- بنية الجدول `userslands`
--

CREATE TABLE `userslands` (
  `UserID` varchar(64) NOT NULL,
  `REUN` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `searchengine`  AS SELECT `landrecord`.`REUN` AS `REUN`, `landrecord`.`address` AS `address`, `landrecord`.`city` AS `city`, `landrecord`.`neighborhoodName` AS `neighborhoodName`, `landrecord`.`unitType` AS `unitType`, `landrecord`.`deedDate` AS `deedDate`, `landsonsale`.`price` AS `price` FROM (`landrecord` join `landsonsale`) WHERE `landrecord`.`REUN` = `landsonsale`.`REUN` ;

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
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `userslands`
--
ALTER TABLE `userslands`
  ADD PRIMARY KEY (`REUN`),
  ADD UNIQUE KEY `UserID` (`UserID`);

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
-- القيود للجدول `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ID_fk` FOREIGN KEY (`OwnerID`) REFERENCES `users` (`ID`),
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
