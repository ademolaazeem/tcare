-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.26-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for tcaredb
CREATE DATABASE IF NOT EXISTS `tcaredb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tcaredb`;


-- Dumping structure for table tcaredb.tbladmin
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT '0',
  `Password` varchar(150) DEFAULT '0',
  `Salt` varchar(150) DEFAULT '0',
  `FirstName` varchar(50) DEFAULT '0',
  `LastName` varchar(50) DEFAULT '0',
  `SecurityLevel` smallint(6) DEFAULT '10',
  `DateOfBirth` varchar(50) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table tcaredb.tbladmin: ~2 rows (approximately)
DELETE FROM `tbladmin`;
/*!40000 ALTER TABLE `tbladmin` DISABLE KEYS */;
INSERT INTO `tbladmin` (`AdminID`, `Username`, `Password`, `Salt`, `FirstName`, `LastName`, `SecurityLevel`, `DateOfBirth`, `EmailAddress`) VALUES
	(1, 'bikerman', 'ffc75bb11f1bbf732c4e0e43afb09ac736b1f034f222c94c75d67248e3967bd4', '27d44626251a82ad', 'Bright', 'Monday', 10, '1981-09-11', 'bikey.comt@t'),
	(2, 'tbaby', '03209753609321de65362d6dd63d911463f892b1126354799bc4bee824471fee', '793062342fb164ff', 'Tosin ', 'Jimoh', 10, NULL, 'tplux4real@yahoo.com');
/*!40000 ALTER TABLE `tbladmin` ENABLE KEYS */;


-- Dumping structure for table tcaredb.tblcarer
CREATE TABLE IF NOT EXISTS `tblcarer` (
  `CarerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL DEFAULT '0',
  `LastName` varchar(50) NOT NULL DEFAULT '0',
  `Sex` varchar(50) NOT NULL DEFAULT '0',
  `Address` varchar(150) NOT NULL DEFAULT '0',
  `County` varchar(50) NOT NULL DEFAULT '0',
  `Phone` varchar(50) NOT NULL DEFAULT '0',
  `UserName` varchar(50) NOT NULL DEFAULT '0',
  `Password` varchar(255) NOT NULL DEFAULT '0',
  `Salt` varchar(255) NOT NULL DEFAULT '0',
  `AuthID` mediumint(9) NOT NULL DEFAULT '0',
  `PPSNumber` varchar(50) NOT NULL DEFAULT '0',
  `AdminNote` varchar(255) DEFAULT '0',
  `AdminNoteRead` bit(1) NOT NULL DEFAULT b'0',
  `Active` varchar(50) NOT NULL DEFAULT 'No',
  `EmailAddress` varchar(50) DEFAULT NULL,
  `DateOfBirth` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CarerID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table tcaredb.tblcarer: ~5 rows (approximately)
DELETE FROM `tblcarer`;
/*!40000 ALTER TABLE `tblcarer` DISABLE KEYS */;
INSERT INTO `tblcarer` (`CarerID`, `FirstName`, `LastName`, `Sex`, `Address`, `County`, `Phone`, `UserName`, `Password`, `Salt`, `AuthID`, `PPSNumber`, `AdminNote`, `AdminNoteRead`, `Active`, `EmailAddress`, `DateOfBirth`) VALUES
	(1, 'tim', 'jim', 'Male', '13 Moore Street', 'Dublin 15', '0830192383', 'bikerman', 'ffc75bb11f1bbf732c4e0e43afb09ac736b1f034f222c94c75d67248e3967bd4', '27d44626251a82ad', 0, '183093804D', 'ok', b'0', 'Yes', 'bike@mm.com', '04/03/1975'),
	(2, 'Benny', 'Hill', 'Male', '132 Moore Lane', 'Dublin 1', '0877864321', 'bennyk', '2ebfd5e287a54eb37cdbf586108aa095389dd2bc229b534c156d5ac11b33c4ca', '2d71691dd10daf', 13928, '1434391839J', '9', b'0', 'No', 'benny@bankiland.com', '05/06/1989'),
	(3, 'Tosin', 'Jimoh', 'Female', '16 castle grange', 'Dublin 22', '0899645721', 'Tosin', 'f2a43e584c58250235f291b010670e64463cc4a126203f7ef4f5886d24957704', '326185877adcdbb7', 30115, '0994968S', ' 2', b'0', 'Yes', 'tplux4real@yahoo.com', '02/05/2015'),
	(4, 'Busayo', 'Jimoh', 'Female', 'Hansted Park Newcasyle road', 'Dublin', '0877798136', 'Busayo', '03209753609321de65362d6dd63d911463f892b1126354799bc4bee824471fee', '793062342fb164ff', 40888, '0896547W', '0', b'0', 'No', 'bussycares@yahoo.com', '09/08/1990'),
	(5, 'Lisa', 'judith', 'Female', 'Ifsc road. dublin', 'Dublin', '0899875645', 'lisa', 'eebf65d9edac992328226a621b1a3de0e4bf504b3372c948fa4c3fcc430818e9', '42d98a6c11a24519', 30116, '09867455W', '0', b'0', 'yes', 'lisajudith@gmail.com', '09/07/1988');
/*!40000 ALTER TABLE `tblcarer` ENABLE KEYS */;


-- Dumping structure for table tcaredb.tblcarerholiday
CREATE TABLE IF NOT EXISTS `tblcarerholiday` (
  `CarerHolidayID` int(11) NOT NULL AUTO_INCREMENT,
  `CarerID` int(11) NOT NULL DEFAULT '0',
  `DateFrom` date DEFAULT NULL,
  `DateTo` date DEFAULT NULL,
  `NoOfDays` int(11) NOT NULL DEFAULT '0',
  `ApprovedOn` datetime DEFAULT NULL,
  `ApprovedByAdminID` int(11) DEFAULT '0',
  PRIMARY KEY (`CarerHolidayID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table tcaredb.tblcarerholiday: ~9 rows (approximately)
DELETE FROM `tblcarerholiday`;
/*!40000 ALTER TABLE `tblcarerholiday` DISABLE KEYS */;
INSERT INTO `tblcarerholiday` (`CarerHolidayID`, `CarerID`, `DateFrom`, `DateTo`, `NoOfDays`, `ApprovedOn`, `ApprovedByAdminID`) VALUES
	(1, 1, '2015-09-24', '2015-09-24', 1, '2015-09-14 17:53:20', 1),
	(2, 1, '2015-01-12', '2015-01-15', 4, '2015-09-12 13:54:16', 1),
	(3, 1, '2014-10-12', '2014-10-13', 2, '2015-09-12 13:54:16', 1),
	(4, 1, '2015-09-16', '2015-09-23', 8, '2015-09-12 13:54:16', 1),
	(5, 1, '2015-10-16', '2015-10-18', 3, '2015-09-15 17:39:08', 1),
	(6, 4, '2015-09-25', '2015-09-30', 6, '2015-09-15 17:43:22', 1),
	(7, 5, '2015-10-01', '2015-10-30', 30, '2015-09-17 23:17:32', 1),
	(8, 1, '2016-01-01', '2016-01-01', 1, '2015-09-18 11:15:02', 2),
	(9, 1, '2016-02-01', '2016-02-22', 22, '2015-09-18 11:14:58', 2);
/*!40000 ALTER TABLE `tblcarerholiday` ENABLE KEYS */;


-- Dumping structure for table tcaredb.tblcarerroster
CREATE TABLE IF NOT EXISTS `tblcarerroster` (
  `CarerRosterID` int(11) NOT NULL AUTO_INCREMENT,
  `CarerID` int(11) DEFAULT '0',
  `PatientID` int(11) DEFAULT '0',
  `DateFrom` datetime DEFAULT NULL,
  `DateTo` datetime DEFAULT NULL,
  `NoOfHours` float DEFAULT '0',
  `TimeSheetSubmitted` bit(1) DEFAULT b'0',
  `SubmittedOn` datetime DEFAULT NULL,
  `CancelledOn` datetime DEFAULT NULL,
  `Cancelled` bit(1) DEFAULT b'0',
  PRIMARY KEY (`CarerRosterID`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- Dumping data for table tcaredb.tblcarerroster: ~54 rows (approximately)
DELETE FROM `tblcarerroster`;
/*!40000 ALTER TABLE `tblcarerroster` DISABLE KEYS */;
INSERT INTO `tblcarerroster` (`CarerRosterID`, `CarerID`, `PatientID`, `DateFrom`, `DateTo`, `NoOfHours`, `TimeSheetSubmitted`, `SubmittedOn`, `CancelledOn`, `Cancelled`) VALUES
	(1, 1, 3, '2015-09-11 15:00:00', '2015-09-11 18:00:00', 3, b'1', '2015-09-16 14:23:09', NULL, b'0'),
	(2, 1, 3, '2015-09-12 15:00:00', '2015-09-12 18:00:00', 3, b'1', '2015-09-16 17:24:47', NULL, b'0'),
	(3, 1, 3, '2015-09-13 13:00:00', '2015-09-13 19:00:00', 6, b'1', '2015-09-16 17:25:09', NULL, b'0'),
	(4, 1, 3, '2015-09-14 14:00:00', '2015-09-14 20:00:00', 6, b'1', '2015-09-16 17:59:36', NULL, b'0'),
	(5, 1, 3, '2015-09-15 13:00:00', '2015-09-15 19:00:00', 6, b'1', '2015-09-17 23:27:50', NULL, b'0'),
	(6, 1, 3, '2015-09-16 11:00:00', '2015-09-16 19:00:00', 8, b'0', NULL, '2015-09-16 17:26:41', b'1'),
	(7, 1, 3, '2015-09-17 11:00:00', '2015-09-17 18:00:00', 7, b'0', NULL, '2015-09-16 17:26:43', b'1'),
	(8, 1, 3, '2015-09-18 14:00:00', '2015-09-18 19:00:00', 5, b'0', NULL, '2015-09-18 11:12:07', b'1'),
	(9, 1, 3, '2015-09-19 15:00:00', '2015-09-19 18:00:00', 3, b'0', NULL, '2015-09-17 09:05:37', b'1'),
	(10, 2, 4, '2015-09-11 15:00:00', '2015-09-11 18:00:00', 3, b'0', NULL, NULL, b'0'),
	(11, 2, 4, '2015-09-12 15:00:00', '2015-09-12 18:00:00', 3, b'0', NULL, NULL, b'0'),
	(12, 2, 4, '2015-09-13 13:00:00', '2015-09-13 19:00:00', 6, b'0', NULL, NULL, b'0'),
	(13, 2, 4, '2015-09-14 14:00:00', '2015-09-14 20:00:00', 6, b'0', NULL, NULL, b'0'),
	(14, 2, 4, '2015-09-15 13:00:00', '2015-09-15 19:00:00', 6, b'0', NULL, NULL, b'0'),
	(15, 2, 4, '2015-09-16 11:00:00', '2015-09-16 19:00:00', 8, b'0', NULL, NULL, b'0'),
	(16, 2, 4, '2015-09-17 11:00:00', '2015-09-17 18:00:00', 7, b'0', NULL, NULL, b'0'),
	(17, 2, 4, '2015-09-18 14:00:00', '2015-09-18 19:00:00', 5, b'0', NULL, NULL, b'0'),
	(18, 2, 4, '2015-09-19 15:00:00', '2015-09-19 18:00:00', 3, b'0', NULL, NULL, b'0'),
	(25, 3, 5, '2015-08-11 15:00:00', '2015-08-11 18:00:00', 3, b'1', '2015-09-16 17:59:36', NULL, b'0'),
	(26, 3, 5, '2015-08-12 15:00:00', '2015-08-12 18:00:00', 3, b'1', '2015-09-17 10:45:30', NULL, b'0'),
	(27, 3, 5, '2015-08-13 13:00:00', '2015-08-13 19:00:00', 6, b'0', NULL, NULL, b'0'),
	(28, 3, 6, '2015-08-14 14:00:00', '2015-08-14 20:00:00', 6, b'0', NULL, NULL, b'0'),
	(29, 3, 5, '2015-08-15 13:00:00', '2015-08-15 19:00:00', 6, b'0', NULL, NULL, b'0'),
	(30, 3, 5, '2015-08-16 11:00:00', '2015-08-16 19:00:00', 8, b'0', NULL, NULL, b'0'),
	(31, 3, 6, '2015-08-17 14:00:00', '2015-08-17 18:00:00', 4, b'0', NULL, NULL, b'0'),
	(32, 3, 5, '2015-08-18 14:00:00', '2015-08-18 19:00:00', 5, b'0', NULL, NULL, b'0'),
	(33, 3, 5, '2015-08-19 15:00:00', '2015-08-19 18:00:00', 3, b'0', NULL, NULL, b'0'),
	(34, 3, 6, '2015-09-11 15:00:00', '2015-09-11 18:00:00', 3, b'0', NULL, NULL, b'0'),
	(35, 3, 5, '2015-09-12 15:00:00', '2015-09-12 18:00:00', 3, b'0', NULL, NULL, b'0'),
	(36, 3, 6, '2015-09-13 13:00:00', '2015-09-13 19:00:00', 6, b'1', '2015-09-17 10:45:46', NULL, b'0'),
	(37, 3, 5, '2015-09-14 14:00:00', '2015-09-14 20:00:00', 6, b'1', '2015-09-17 10:45:53', NULL, b'0'),
	(38, 3, 6, '2015-09-15 13:00:00', '2015-09-15 19:00:00', 6, b'0', NULL, NULL, b'0'),
	(39, 3, 5, '2015-09-16 11:00:00', '2015-09-16 19:00:00', 8, b'0', NULL, NULL, b'0'),
	(40, 2, 9, '2015-09-17 14:00:00', '2015-09-17 18:00:00', 4, b'0', NULL, NULL, b'0'),
	(41, 3, 6, '2015-09-18 14:00:00', '2015-09-18 19:00:00', 5, b'0', NULL, NULL, b'0'),
	(42, 4, 5, '2015-09-19 15:00:00', '2015-09-19 18:00:00', 3, b'0', NULL, '2015-09-17 21:54:14', b'1'),
	(56, 4, 8, '2015-09-27 12:00:00', '2015-09-27 18:00:00', 6, b'0', NULL, NULL, b'0'),
	(57, 2, 9, '2015-09-28 11:00:00', '2015-09-28 18:00:00', 7, b'0', NULL, NULL, b'0'),
	(58, 1, 1, '2015-09-17 20:00:00', '2015-09-17 20:00:00', 0, b'0', NULL, '2015-09-17 21:52:31', b'1'),
	(59, 1, 1, '2015-09-17 20:00:00', '2015-09-17 20:00:00', 0, b'1', '2015-09-18 11:09:21', NULL, b'0'),
	(60, 3, 6, '2015-09-17 20:00:00', '2015-09-17 20:00:00', 1, b'0', NULL, NULL, b'0'),
	(61, 1, 9, '2015-09-17 20:00:00', '2015-09-17 20:00:00', 2, b'1', '2015-09-18 00:54:32', NULL, b'0'),
	(62, 3, 8, '2015-09-18 20:00:00', '2015-09-18 20:00:00', 12, b'0', NULL, NULL, b'0'),
	(63, 1, 1, '2015-09-19 20:00:00', '2015-09-19 20:00:00', 10, b'0', NULL, '2015-09-18 07:49:06', b'1'),
	(64, 5, 8, '2015-09-17 21:00:00', '2015-09-17 21:00:00', 1, b'0', NULL, '2015-09-17 22:16:53', b'1'),
	(65, 5, 9, '2015-09-19 06:00:00', '2015-09-19 11:00:00', 5, b'0', NULL, NULL, b'0'),
	(66, 5, 9, '2015-09-18 22:00:00', '2015-09-18 22:00:00', 4, b'0', NULL, '2015-09-17 23:09:27', b'1'),
	(67, 5, 9, '2015-09-19 04:00:00', '2015-09-19 06:00:00', 2, b'0', NULL, NULL, b'0'),
	(68, 5, 7, '2015-09-17 22:00:00', '2015-09-17 23:00:00', 1, b'1', '2015-09-18 00:12:01', NULL, b'0'),
	(69, 1, 2, '2015-09-22 06:00:00', '2015-09-22 09:00:00', 3, b'0', NULL, '2015-09-18 07:45:46', b'1'),
	(70, 1, 1, '2015-09-18 07:00:00', '2015-09-18 11:00:00', 4, b'0', NULL, NULL, b'0'),
	(71, 1, 9, '2015-09-18 07:00:00', '2015-09-18 08:00:00', 1, b'0', NULL, NULL, b'0'),
	(72, 1, 4, '2015-09-19 07:00:00', '2015-09-19 09:00:00', 2, b'0', NULL, NULL, b'0'),
	(73, 1, 2, '2015-09-19 10:00:00', '2015-09-19 10:00:00', 1, b'0', NULL, NULL, b'0');
/*!40000 ALTER TABLE `tblcarerroster` ENABLE KEYS */;


-- Dumping structure for table tcaredb.tblpatient
CREATE TABLE IF NOT EXISTS `tblpatient` (
  `PatientID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL DEFAULT '0',
  `LastName` varchar(50) NOT NULL DEFAULT '0',
  `Sex` varchar(50) NOT NULL DEFAULT '0',
  `Address` varchar(150) DEFAULT NULL,
  `EmailAddress` varchar(150) DEFAULT NULL,
  `County` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `DateOfBirth` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PatientID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table tcaredb.tblpatient: ~10 rows (approximately)
DELETE FROM `tblpatient`;
/*!40000 ALTER TABLE `tblpatient` DISABLE KEYS */;
INSERT INTO `tblpatient` (`PatientID`, `FirstName`, `LastName`, `Sex`, `Address`, `EmailAddress`, `County`, `Phone`, `Comments`, `DateOfBirth`) VALUES
	(1, 'Mark', 'Sinfield', 'Male', '87 paulson avenue, Finglas', 'sinfield@gmail.com', 'Dublin 9', '0895451209', 'Acute Downs Syndrome', '21/03/49'),
	(2, 'Laura', 'Ferrari', 'Female', '12 Kimnte lane, Clonsilla', 'jferrari13@gmail.com', 'Dublin 15', '0831436578', 'Dementia', '13/01/56'),
	(3, 'Sinead', 'O\'Connell', 'Female', '31 Lintell park, Drumcondra', 'sinead01@hotmail.com', 'Dublin 13', '0871245876', 'Slight Memory Loss, put to bed before leaving', '15/12/62'),
	(4, 'Paddy', 'Lawlor', 'Male', '7 Rye lake road, Pearse', 'paddylawlor@gmail.com', 'Dublin 2', '0865439878', 'Downs Syndrome\r\nFever\r\nKidney Disorder\r\nDementia', '03/11/34'),
	(5, 'Jake', 'Tyler', 'Male', '41 Oak Lane, Oak Street, Inchicore', 'tylerg14@marron.com', 'Dublin 8', '0891093839', 'Acute Downs Syndrome\r\nKidney Disorder\r\nDementia', '05/06/42'),
	(6, 'Grainne', 'Twainfield', 'Female', '7 Linchfield Avenue, Lucan', 'gtwainfield@grannies.com', 'Dublin 22', '0859281938', 'Respriatory disorder\r\nLegionnaire disease\r\nUnclear speech\r\nRequires medication before going to bed', '04/01/61'),
	(7, 'Rossi', 'McCarthy', 'Male', '15 Myles lane, Clondalkin', 'rossmc@carthy13.com', 'Dublin 22', '0871983928', 'Downs Syndrome\r\nMay be aggressive', '31/08/49'),
	(8, 'Bridget ', 'Purcell', 'Female', 'Ailey height Lucan', 'bridgetpurcell@yahoo.com', 'Dublin', '012969114', 'Knee  Amputation,Dementia, Diabetes.', '02/05/20'),
	(9, 'Maura', 'Cano', 'Female', 'ArdGath newcastleroad', 'mauracano@gmail.com', 'Co.Dublin', '012879345', 'sickle cell', '05/09/89'),
	(10, 'Tosin', 'Jimoh', 'Female', '12 castle  grange court', 'tplux4real@yahoo.com', 'Dublin', '8888888888888', '..add Medical history', 'DD/MM/YY');
/*!40000 ALTER TABLE `tblpatient` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
