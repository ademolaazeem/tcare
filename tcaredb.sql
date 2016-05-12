-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 08:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_log_tbl`
--

CREATE TABLE IF NOT EXISTS `audit_log_tbl` (
  `comp_name` varchar(30) NOT NULL,
  `userFullname` varchar(255) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `datelog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_addr` varchar(20) NOT NULL,
  `operation` longtext NOT NULL,
  `host` varchar(200) NOT NULL,
  `referer` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_log_tbl`
--

INSERT INTO `audit_log_tbl` (`comp_name`, `userFullname`, `user_id`, `datelog`, `ip_addr`, `operation`, `host`, `referer`) VALUES
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-07 17:18:25', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFj'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-07 17:19:28', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFj'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-07 17:20:11', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFz'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-07 17:43:09', '::1', 'User busayo Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFz'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-07 17:43:40', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-07 17:52:07', '::1', 'User busayo Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-07 18:03:18', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-07 19:13:39', '::1', 'new Carer added', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_carer_to_client.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-07 19:19:19', '::1', 'User busayo Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFz'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 12:16:47', '::1', 'new holiday booked', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_book_holiday.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 12:17:26', '::1', 'new holiday booked', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_book_holiday.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 12:33:11', '::1', 'new holiday booked', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_book_holiday.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-08 12:38:24', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-08 15:21:39', '::1', 'User bikerman updated holiday of holiday id: 12', 'localhost:8089', 'http://localhost:8089/tcare/admin/manage_existing_holiday.php?holidayid=12'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 15:55:37', '::1', 'User busayo Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 15:57:03', '::1', 'new holiday booked', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_book_holiday.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-08 18:00:40', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-08 18:01:28', '::1', 'User bikerman updated holiday of holiday id: 13', 'localhost:8089', 'http://localhost:8089/tcare/admin/manage_existing_holiday.php?holidayid=13'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 18:02:06', '::1', 'User busayo Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 18:26:11', '::1', 'new holiday booked', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_book_holiday.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 19:56:01', '::1', 'User busayo uploaded timesheet for carer id: busayo', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_upload_timesheet.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 20:44:23', '::1', 'User busayo uploaded timesheet for carer id: busayo', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_upload_timesheet.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 20:45:57', '::1', 'User busayo uploaded timesheet for carer id: busayo', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_upload_timesheet.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 20:48:56', '::1', 'User busayo uploaded timesheet for carer id: busayo', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_upload_timesheet.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 20:49:50', '::1', 'User busayo uploaded timesheet for carer id: busayo', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_upload_timesheet.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-08 20:52:56', '::1', 'User busayo uploaded timesheet for carer id: busayo', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_upload_timesheet.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-08 21:18:51', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-10 12:31:16', '::1', 'new Carer added', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_carer_to_client.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-10 12:39:51', '::1', 'new Carer added', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_carer_to_client.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-10 12:54:00', '::1', 'new Carer added', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_carer_to_client.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-10 12:55:07', '::1', 'new Carer added', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_carer_to_client.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-10 12:56:08', '::1', 'new Carer added', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_carer_to_client.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-10 12:57:53', '::1', 'new Carer added', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_carer_to_client.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-11 03:28:47', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFz'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 10:47:41', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFz'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 11:43:23', '::1', 'Admin tbaby Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 15:36:26', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:03:13', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:07:29', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:09:16', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:11:17', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:11:44', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:12:21', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:13:06', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:13:29', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:16:01', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:18:25', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Tosin  Jimoh', 'tbaby', '2016-05-12 16:28:38', '::1', 'Admin Tosin  Jimoh sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-12 16:51:47', '::1', 'User busayo Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 17:11:03', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 17:12:37', '::1', 'Admin Bright Monday sent a new new mail for cover.', 'localhost:8089', 'http://localhost:8089/tcare/admin/ask_for_cover.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-12 17:13:11', '::1', 'User busayo Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-12 17:13:20', '::1', 'User busayo signifies interest in covering', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_can_cover.php'),
('FORBESDIAMOND', 'Johnson Galvin', 'saleef.johnson', '2016-05-12 17:14:48', '::1', 'User saleef.johnson Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Johnson Galvin', 'saleef.johnson', '2016-05-12 17:14:54', '::1', 'User saleef.johnson signifies interest in covering', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_can_cover.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 17:15:12', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 17:41:22', '::1', 'New Cover Assigned', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_cover.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 17:41:36', '::1', 'New Cover Assigned', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_cover.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 17:47:05', '::1', 'New Cover Assigned', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_cover.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 17:47:48', '::1', 'New Cover Assigned', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_cover.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 17:50:25', '::1', 'New Cover Assigned', 'localhost:8089', 'http://localhost:8089/tcare/admin/assign_cover.php'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-12 18:08:35', '::1', 'User busayo Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Busayo Jimoh', 'busayo', '2016-05-12 18:46:46', '::1', 'User busayo uploaded photos for carer: busayo', 'localhost:8089', 'http://localhost:8089/tcare/admin/carer_upload_photo.php'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 18:47:48', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 18:50:04', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFz'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 18:50:14', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFz'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 18:52:38', '::1', 'Admin bikerman Successfully logged in', 'localhost:8089', 'http://localhost:8089/tcare/admin/login.php?r=dWFz'),
('FORBESDIAMOND', 'Bright Monday', 'bikerman', '2016-05-12 18:56:07', '::1', 'User bikerman uploaded photos for carer: bikerman', 'localhost:8089', 'http://localhost:8089/tcare/admin/upload_photo.php');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_tbl`
--

CREATE TABLE IF NOT EXISTS `permissions_tbl` (
  `perm_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page_name` text NOT NULL,
  `page_url` text NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `logo_name` text NOT NULL,
  `created_date` timestamp NOT NULL,
  `maker` varchar(200) NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions_tbl`
--

CREATE TABLE IF NOT EXISTS `role_permissions_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL,
  `maker` varchar(200) NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles_tbl`
--

CREATE TABLE IF NOT EXISTS `roles_tbl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL,
  `maker` varchar(200) NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles_tbl`
--

INSERT INTO `roles_tbl` (`id`, `name`, `created_date`, `maker`, `updated_date`) VALUES
(1, 'Administrator', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 'Carer', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

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
  `imagepath` text NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AdminID`, `Username`, `Password`, `Salt`, `FirstName`, `LastName`, `SecurityLevel`, `DateOfBirth`, `EmailAddress`, `imagepath`) VALUES
(1, 'bikerman', 'eaa52924db0a109ad170c7edd6073e35d9dbbf01', '27d44626251a82ad', 'Bright', 'Monday', 10, '1981-09-11', 'bikey.comt@t', '../uploads/photos/bikerman_1_images (1).jpg'),
(2, 'tbaby', '776de03ca99ad4ef82f14532cb5bf004af996a34', '793062342fb164ff', 'Tosin ', 'Jimoh', 10, NULL, 'tplux4real@yahoo.com', 'images/avatars/img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcarer`
--

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
  `imagepath` text NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`CarerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblcarer`
--

INSERT INTO `tblcarer` (`CarerID`, `FirstName`, `LastName`, `Sex`, `Address`, `County`, `Phone`, `UserName`, `Password`, `Salt`, `AuthID`, `PPSNumber`, `AdminNote`, `AdminNoteRead`, `Active`, `EmailAddress`, `DateOfBirth`, `imagepath`, `updated_date`) VALUES
(1, 'Johnson', 'Galvin', 'Male', '13 Moore Street', 'Dublin 15', '0830192383', 'saleef.johnson', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '27d44626251a82ad', 0, '183093804D', 'ok to assign work to today', b'0', 'Yes', 'bike@mm.com', '04/03/1975', '', '2016-05-01 20:31:04'),
(2, 'Benny', 'Hill', 'Male', '132 Moore Lane', 'Dublin 1', '0877864321', 'bennyk', '2ebfd5e287a54eb37cdbf586108aa095389dd2bc229b534c156d5ac11b33c4ca', '2d71691dd10daf', 13928, '1434391839J', '9', b'0', 'No', 'benny@bankiland.com', '05/06/1989', '', '0000-00-00 00:00:00'),
(3, 'Tosin', 'Jimoh', 'Female', '16 castle grange', 'Dublin 22', '0899645721', 'Tosin', 'f2a43e584c58250235f291b010670e64463cc4a126203f7ef4f5886d24957704', '326185877adcdbb7', 30115, '0994968S', ' 2', b'0', 'Yes', 'tplux4real@yahoo.com', '02/05/2015', '', '0000-00-00 00:00:00'),
(4, 'Busayo', 'Jimoh', 'Female', 'Hansted Park Newcasyle road', 'Dublin', '0877798136', 'busayo', 'ad5eec4f7f38bd79dba8408965e43e1819efecbe', '793062342fb164ff', 40888, '0896547W', '0', b'0', 'No', 'bussycares@yahoo.com', '09/08/1990', '../uploads/photos/busayo_4_download.jpg', '0000-00-00 00:00:00'),
(5, 'Lisa', 'judith', 'Female', 'Ifsc road. dublin', 'Dublin', '0899875645', 'lisa', 'c4ed14e2020dd45edb57b5fba2f40dd93952505e', '42d98a6c11a24519', 30116, '09867455W', '0', b'0', 'yes', 'lisajudith@gmail.com', '09/07/1988', '', '0000-00-00 00:00:00'),
(6, 'Adeola', 'Johnson', 'Male', 'No 5689, London Crescent, Dundalk, Ireland', 'Nigeria', '08037567888', 'adeola.johnson', '8f72c29b9ef926d7490a5e63bcb24e93fe279c518115aef865482d82f83d95b0', '76c6c75534eade20', 85498, '34343344', 'Its ok', b'0', 'Yes', 'adeola.johnson@yahoo.co.uk', '05/06/95', '', '2016-04-10 21:05:32'),
(7, 'Jackson', 'Cooker', 'Male', '64, Hansted Pecham, London', 'State', '90459044', 'cookie', '7c222fb2927d828af22f592134e8932480637c0d', '0', 0, 'sadfad', '0', b'0', 'No', 'cc@dd.com', '06/12/1995', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcarerholiday`
--

CREATE TABLE IF NOT EXISTS `tblcarerholiday` (
  `CarerHolidayID` int(11) NOT NULL AUTO_INCREMENT,
  `CarerID` int(11) NOT NULL DEFAULT '0',
  `DateFrom` date DEFAULT NULL,
  `DateTo` date DEFAULT NULL,
  `NoOfDays` int(11) NOT NULL DEFAULT '0',
  `ApprovedOn` datetime DEFAULT NULL,
  `ApprovedByAdminID` int(11) DEFAULT '0',
  `status` varchar(30) NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`CarerHolidayID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tblcarerholiday`
--

INSERT INTO `tblcarerholiday` (`CarerHolidayID`, `CarerID`, `DateFrom`, `DateTo`, `NoOfDays`, `ApprovedOn`, `ApprovedByAdminID`, `status`, `reason`) VALUES
(9, 1, '2016-02-01', '2016-02-22', 22, '2015-09-18 11:14:58', 2, 'APPROVED', ''),
(13, 4, '2016-01-25', '2016-02-05', 11, '2016-05-08 19:01:28', 1, 'APPROVED', 'You are free to go on holiday. Thanks for the hardwork.\r\n                                                                '),
(14, 4, '2016-05-16', '2016-05-26', 10, NULL, 0, 'BOOKED', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcarerroster`
--

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
  `cancelreason` text,
  PRIMARY KEY (`CarerRosterID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `tblcarerroster`
--

INSERT INTO `tblcarerroster` (`CarerRosterID`, `CarerID`, `PatientID`, `DateFrom`, `DateTo`, `NoOfHours`, `TimeSheetSubmitted`, `SubmittedOn`, `CancelledOn`, `Cancelled`, `cancelreason`) VALUES
(1, 1, 3, '2015-09-11 15:00:00', '2015-09-11 18:00:00', 3, b'1', '2015-09-16 14:23:09', NULL, b'0', NULL),
(2, 1, 3, '2015-09-12 15:00:00', '2015-09-12 18:00:00', 3, b'1', '2015-09-16 17:24:47', NULL, b'0', NULL),
(3, 1, 3, '2015-09-13 13:00:00', '2015-09-13 19:00:00', 6, b'1', '2015-09-16 17:25:09', NULL, b'0', NULL),
(4, 1, 3, '2015-09-14 14:00:00', '2015-09-14 20:00:00', 6, b'1', '2015-09-16 17:59:36', NULL, b'0', NULL),
(5, 1, 3, '2015-09-15 13:00:00', '2015-09-15 19:00:00', 6, b'1', '2015-09-17 23:27:50', NULL, b'0', NULL),
(6, 1, 3, '2015-09-16 11:00:00', '2015-09-16 19:00:00', 8, b'0', NULL, '2015-09-16 17:26:41', b'1', NULL),
(7, 1, 3, '2015-09-17 11:00:00', '2015-09-17 18:00:00', 7, b'0', NULL, '2015-09-16 17:26:43', b'1', NULL),
(8, 1, 3, '2015-09-18 14:00:00', '2015-09-18 19:00:00', 5, b'0', NULL, '2015-09-18 11:12:07', b'1', NULL),
(9, 1, 3, '2015-09-19 15:00:00', '2015-09-19 18:00:00', 3, b'0', NULL, '2015-09-17 09:05:37', b'1', NULL),
(10, 2, 4, '2015-09-11 15:00:00', '2015-09-11 18:00:00', 3, b'0', NULL, NULL, b'0', NULL),
(11, 2, 4, '2015-09-12 15:00:00', '2015-09-12 18:00:00', 3, b'0', NULL, NULL, b'0', NULL),
(12, 2, 4, '2015-09-13 13:00:00', '2015-09-13 19:00:00', 6, b'0', NULL, NULL, b'0', NULL),
(13, 2, 4, '2015-09-14 14:00:00', '2015-09-14 20:00:00', 6, b'0', NULL, NULL, b'0', NULL),
(14, 2, 4, '2015-09-15 13:00:00', '2015-09-15 19:00:00', 6, b'0', NULL, NULL, b'0', NULL),
(15, 2, 4, '2015-09-16 11:00:00', '2015-09-16 19:00:00', 8, b'0', NULL, NULL, b'0', NULL),
(16, 2, 4, '2015-09-17 11:00:00', '2015-09-17 18:00:00', 7, b'0', NULL, NULL, b'0', NULL),
(17, 2, 4, '2015-09-18 14:00:00', '2015-09-18 19:00:00', 5, b'0', NULL, NULL, b'0', NULL),
(18, 2, 4, '2015-09-19 15:00:00', '2015-09-19 18:00:00', 3, b'0', NULL, NULL, b'0', NULL),
(25, 3, 5, '2015-08-11 15:00:00', '2015-08-11 18:00:00', 3, b'1', '2015-09-16 17:59:36', NULL, b'0', NULL),
(26, 3, 5, '2015-08-12 15:00:00', '2015-08-12 18:00:00', 3, b'1', '2015-09-17 10:45:30', NULL, b'0', NULL),
(27, 3, 5, '2015-08-13 13:00:00', '2015-08-13 19:00:00', 6, b'0', NULL, NULL, b'0', NULL),
(28, 3, 6, '2015-08-14 14:00:00', '2015-08-14 20:00:00', 6, b'0', NULL, NULL, b'0', NULL),
(29, 3, 5, '2015-08-15 13:00:00', '2015-08-15 19:00:00', 6, b'0', NULL, NULL, b'0', NULL),
(30, 3, 5, '2015-08-16 11:00:00', '2015-08-16 19:00:00', 8, b'0', NULL, NULL, b'0', NULL),
(31, 3, 6, '2015-08-17 14:00:00', '2015-08-17 18:00:00', 4, b'0', NULL, NULL, b'0', NULL),
(32, 3, 5, '2015-08-18 14:00:00', '2015-08-18 19:00:00', 5, b'0', NULL, NULL, b'0', NULL),
(33, 3, 5, '2015-08-19 15:00:00', '2015-08-19 18:00:00', 3, b'0', NULL, NULL, b'0', NULL),
(34, 3, 6, '2015-09-11 15:00:00', '2015-09-11 18:00:00', 3, b'0', NULL, NULL, b'0', NULL),
(35, 3, 5, '2015-09-12 15:00:00', '2015-09-12 18:00:00', 3, b'0', NULL, NULL, b'0', NULL),
(36, 3, 6, '2015-09-13 13:00:00', '2015-09-13 19:00:00', 6, b'1', '2015-09-17 10:45:46', NULL, b'0', NULL),
(37, 3, 5, '2015-09-14 14:00:00', '2015-09-14 20:00:00', 6, b'1', '2015-09-17 10:45:53', NULL, b'0', NULL),
(38, 3, 6, '2015-09-15 13:00:00', '2015-09-15 19:00:00', 6, b'0', NULL, NULL, b'0', NULL),
(39, 3, 5, '2015-09-16 11:00:00', '2015-09-16 19:00:00', 8, b'0', NULL, NULL, b'0', NULL),
(40, 2, 9, '2015-09-17 14:00:00', '2015-09-17 18:00:00', 4, b'0', NULL, NULL, b'0', NULL),
(41, 3, 6, '2015-09-18 14:00:00', '2015-09-18 19:00:00', 5, b'0', NULL, NULL, b'0', NULL),
(42, 4, 5, '2015-09-19 15:00:00', '2015-09-19 18:00:00', 3, b'0', NULL, '2015-09-17 21:54:14', b'1', NULL),
(56, 4, 8, '2015-09-27 12:00:00', '2015-09-27 18:00:00', 6, b'0', NULL, NULL, b'0', NULL),
(57, 2, 9, '2015-09-28 11:00:00', '2015-09-28 18:00:00', 7, b'0', NULL, NULL, b'0', NULL),
(58, 1, 1, '2015-09-17 20:00:00', '2015-09-17 20:00:00', 0, b'0', NULL, '2015-09-17 21:52:31', b'1', NULL),
(59, 1, 1, '2015-09-17 20:00:00', '2015-09-17 20:00:00', 0, b'1', '2015-09-18 11:09:21', NULL, b'0', NULL),
(60, 3, 6, '2015-09-17 20:00:00', '2015-09-17 20:00:00', 1, b'0', NULL, NULL, b'0', NULL),
(61, 1, 9, '2015-09-17 20:00:00', '2015-09-17 20:00:00', 2, b'1', '2015-09-18 00:54:32', NULL, b'0', NULL),
(62, 3, 8, '2015-09-18 20:00:00', '2015-09-18 20:00:00', 12, b'0', NULL, NULL, b'0', NULL),
(63, 1, 1, '2015-09-19 20:00:00', '2015-09-19 20:00:00', 10, b'0', NULL, '2015-09-18 07:49:06', b'1', NULL),
(64, 5, 8, '2015-09-17 21:00:00', '2015-09-17 21:00:00', 1, b'0', NULL, '2016-04-24 10:23:54', b'1', 'The place is far'),
(65, 5, 9, '2015-09-19 06:00:00', '2015-09-19 11:00:00', 5, b'0', NULL, '2016-04-24 10:23:55', b'1', 'The place is far'),
(66, 5, 9, '2015-09-18 22:00:00', '2015-09-18 22:00:00', 4, b'0', NULL, '2016-04-24 10:23:55', b'1', 'The place is far'),
(67, 5, 9, '2015-09-19 04:00:00', '2015-09-19 06:00:00', 2, b'0', NULL, '2016-04-24 10:23:55', b'1', 'The place is far'),
(68, 5, 7, '2015-09-17 22:00:00', '2015-09-17 23:00:00', 1, b'1', '2015-09-18 00:12:01', '2016-04-23 22:11:15', b'1', 'Busy'),
(69, 1, 2, '2015-09-22 06:00:00', '2015-09-22 09:00:00', 3, b'0', NULL, '2015-09-18 07:45:46', b'1', NULL),
(70, 1, 1, '2015-09-18 07:00:00', '2015-09-18 11:00:00', 4, b'0', NULL, NULL, b'0', NULL),
(71, 1, 9, '2015-09-18 07:00:00', '2015-09-18 08:00:00', 1, b'0', NULL, NULL, b'0', NULL),
(72, 1, 4, '2015-09-19 07:00:00', '2015-09-19 09:00:00', 2, b'0', NULL, NULL, b'0', NULL),
(80, 4, 7, '2016-05-10 15:55:00', '2016-05-10 16:55:00', 1, b'0', NULL, NULL, b'0', NULL),
(81, 4, 9, '2016-05-10 15:57:00', '2016-05-10 16:57:00', 4, b'0', NULL, NULL, b'0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcover`
--

CREATE TABLE IF NOT EXISTS `tblcover` (
  `covercoverId` int(11) NOT NULL AUTO_INCREMENT,
  `coverid` int(11) DEFAULT NULL,
  `carerrosterid` int(11) NOT NULL,
  `reason` text NOT NULL,
  `availability` varchar(20) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  PRIMARY KEY (`covercoverId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblcover`
--

INSERT INTO `tblcover` (`covercoverId`, `coverid`, `carerrosterid`, `reason`, `availability`, `createddate`, `updated_date`, `createdby`) VALUES
(5, 4, 10, 'He is on leave', '', '2016-05-12 17:50:25', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblemail`
--

CREATE TABLE IF NOT EXISTS `tblemail` (
  `emailId` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `CarerRosterID` int(11) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replieddate` datetime DEFAULT NULL,
  `CarerID` int(11) NOT NULL,
  PRIMARY KEY (`emailId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tblemail`
--

INSERT INTO `tblemail` (`emailId`, `sender`, `CarerRosterID`, `receiver`, `message`, `status`, `sentdate`, `replieddate`, `CarerID`) VALUES
(17, 'ccomputingpractical@gmail.com', 10, 'bike@mm.com', 'We are looking for Cover for [ Benny Hill ] Assigned to [ Paddy Lawlor ] between [ 2015-09-11 15:00:00 ] and [ 2015-09-11 18:00:00 ], Please logon to your profile and show interest only if you are not occupied  at this time. We will assign to the first person that replies. Thanks.', 'ICAN', '2016-05-12 17:12:36', '2016-05-12 18:14:54', 1),
(18, 'ccomputingpractical@gmail.com', 10, 'tplux4real@yahoo.com', 'We are looking for Cover for [ Benny Hill ] Assigned to [ Paddy Lawlor ] between [ 2015-09-11 15:00:00 ] and [ 2015-09-11 18:00:00 ], Please logon to your profile and show interest only if you are not occupied  at this time. We will assign to the first person that replies. Thanks.', NULL, '2016-05-12 17:12:36', NULL, 3),
(19, 'ccomputingpractical@gmail.com', 10, 'bussycares@yahoo.com', 'We are looking for Cover for [ Benny Hill ] Assigned to [ Paddy Lawlor ] between [ 2015-09-11 15:00:00 ] and [ 2015-09-11 18:00:00 ], Please logon to your profile and show interest only if you are not occupied  at this time. We will assign to the first person that replies. Thanks.', 'ICAN', '2016-05-12 17:12:36', '2016-05-12 18:13:19', 4),
(20, 'ccomputingpractical@gmail.com', 10, 'lisajudith@gmail.com', 'We are looking for Cover for [ Benny Hill ] Assigned to [ Paddy Lawlor ] between [ 2015-09-11 15:00:00 ] and [ 2015-09-11 18:00:00 ], Please logon to your profile and show interest only if you are not occupied  at this time. We will assign to the first person that replies. Thanks.', NULL, '2016-05-12 17:12:36', NULL, 5),
(21, 'ccomputingpractical@gmail.com', 10, 'adeola.johnson@yahoo.co.uk', 'We are looking for Cover for [ Benny Hill ] Assigned to [ Paddy Lawlor ] between [ 2015-09-11 15:00:00 ] and [ 2015-09-11 18:00:00 ], Please logon to your profile and show interest only if you are not occupied  at this time. We will assign to the first person that replies. Thanks.', NULL, '2016-05-12 17:12:36', NULL, 6),
(22, 'ccomputingpractical@gmail.com', 10, 'cc@dd.com', 'We are looking for Cover for [ Benny Hill ] Assigned to [ Paddy Lawlor ] between [ 2015-09-11 15:00:00 ] and [ 2015-09-11 18:00:00 ], Please logon to your profile and show interest only if you are not occupied  at this time. We will assign to the first person that replies. Thanks.', NULL, '2016-05-12 17:12:37', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`PatientID`, `FirstName`, `LastName`, `Sex`, `Address`, `EmailAddress`, `County`, `Phone`, `Comments`, `DateOfBirth`) VALUES
(1, 'Mark', 'Sinfield', 'Male', '87 paulson avenue, Finglas', 'sinfield@gmail.com', 'Dublin 9', '0895451209', 'Acute Downs Syndrome', '21/03/49'),
(2, 'Laura', 'Ferrari', 'Female', '12 Kimnte lane, Clonsilla', 'jferrari13@gmail.com', 'Dublin 15', '0831436578', 'Dementia', '13/01/56'),
(3, 'Sinead', 'O''Connell', 'Female', '31 Lintell park, Drumcondra', 'sinead01@hotmail.com', 'Dublin 13', '0871245876', 'Slight Memory Loss, put to bed before leaving', '15/12/62'),
(4, 'Paddy', 'Lawlor', 'Male', '7 Rye lake road, Pearse', 'paddylawlor@gmail.com', 'Dublin 2', '0865439878', 'Downs Syndrome\r\nFever\r\nKidney Disorder\r\nDementia', '03/11/34'),
(5, 'Jake', 'Tyler', 'Male', '41 Oak Lane, Oak Street, Inchicore', 'tylerg14@marron.com', 'Dublin 8', '0891093839', 'Acute Downs Syndrome\r\nKidney Disorder\r\nDementia', '05/06/42'),
(6, 'Grainne', 'Twainfield', 'Female', '7 Linchfield Avenue, Lucan', 'gtwainfield@grannies.com', 'Dublin 22', '0859281938', 'Respriatory disorder\r\nLegionnaire disease\r\nUnclear speech\r\nRequires medication before going to bed', '04/01/61'),
(7, 'Rossi', 'McCarthy', 'Male', '15 Myles lane, Clondalkin', 'rossmc@carthy13.com', 'Dublin 22', '0871983928', 'Downs Syndrome\r\nMay be aggressive', '31/08/49'),
(8, 'Bridget ', 'Purcell', 'Female', 'Ailey height Lucan', 'bridgetpurcell@yahoo.com', 'Dublin', '012969114', 'Knee  Amputation,Dementia, Diabetes.', '02/05/20'),
(9, 'Maura', 'Cano', 'Female', 'ArdGath newcastleroad', 'mauracano@gmail.com', 'Co.Dublin', '012879345', 'sickle cell', '05/09/89'),
(10, 'Tosin', 'Jimoh', 'Female', '12 castle  grange court', 'tplux4real@yahoo.com', 'Dublin', '8888888888888', 'add Medical history, yeah                                       ', '01/09/1950'),
(11, 'Gabriela', 'Azaelaw', 'Female', 'No 409, Yola Street, Dundalk', 'g.azaela1@gmail.com', 'Co Dundalk', '0866789087', 'Now you are there! Yeah right                                        ', '01/12/1961');

-- --------------------------------------------------------

--
-- Table structure for table `tbltimesheet`
--

CREATE TABLE IF NOT EXISTS `tbltimesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carerid` int(11) NOT NULL,
  `sheetdate` date NOT NULL,
  `document` text NOT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbltimesheet`
--

INSERT INTO `tbltimesheet` (`id`, `carerid`, `sheetdate`, `document`, `title`) VALUES
(1, 4, '2016-05-02', '../uploads/documents/busayo_4_jsf-core_java_server_faces.pdf', 'busayo_4_jsf-core_java_server_faces.pdf'),
(2, 4, '2016-05-04', '../uploads/documents/busayo_4_06-primefaces.pdf', 'busayo_4_06-primefaces.pdf'),
(3, 4, '2016-05-09', '../uploads/documents/busayo_4_beginning-jsp-jsf-and-tomcat-w.pdf', 'busayo_4_beginning-jsp-jsf-and-tomcat-w.pdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
