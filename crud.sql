-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 01, 2017 at 09:57 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `IGS_email`
--

CREATE TABLE `IGS_email` (
`id` int(11) NOT NULL,
  `protocol` varchar(50) NOT NULL,
  `smtp_host` varchar(50) NOT NULL,
  `smtp_port` varchar(50) NOT NULL,
  `smtp_user` varchar(50) NOT NULL,
  `smtp_pass` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IGS_email`
--

INSERT INTO `IGS_email` (`id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`) VALUES
(1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `IGS_permissions`
--

CREATE TABLE `IGS_permissions` (
`permissionID` int(11) NOT NULL,
  `permission` varchar(200) DEFAULT NULL,
  `order_position` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IGS_permissions`
--

INSERT INTO `IGS_permissions` (`permissionID`, `permission`, `order_position`) VALUES
(3, 'email', 6),
(5, 'permissions', 8),
(6, 'profile', 1),
(9, 'users', 9),
(22, 'mbl_reports', 22),
(21, 'mbl_dealers', 21),
(20, 'mbl_suppliers', 20),
(17, 'mbl_artwork', 17),
(18, 'mbl_enquiry', 18),
(19, 'mbl_purchase', 19);

-- --------------------------------------------------------

--
-- Table structure for table `IGS_permission_groups`
--

CREATE TABLE `IGS_permission_groups` (
`groupID` int(11) NOT NULL,
  `groupName` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IGS_permission_groups`
--

INSERT INTO `IGS_permission_groups` (`groupID`, `groupName`) VALUES
(1, 'Administrators'),
(46, 'Dealers'),
(45, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `IGS_permission_map`
--

CREATE TABLE `IGS_permission_map` (
  `groupID` int(11) NOT NULL DEFAULT '0',
  `permissionID` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IGS_permission_map`
--

INSERT INTO `IGS_permission_map` (`groupID`, `permissionID`) VALUES
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 9),
(1, 10),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(42, 5),
(43, 7),
(43, 10),
(43, 13),
(44, 10),
(45, 9),
(45, 17),
(45, 18),
(45, 19),
(45, 20),
(45, 22),
(46, 6),
(46, 21);

-- --------------------------------------------------------

--
-- Table structure for table `IGS_routes`
--

CREATE TABLE `IGS_routes` (
`id` int(11) NOT NULL,
  `route` varchar(200) NOT NULL,
  `controller` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IGS_routes`
--

INSERT INTO `IGS_routes` (`id`, `route`, `controller`) VALUES
(3, 'Test', 'admin/test_twig/display/3/3');

-- --------------------------------------------------------

--
-- Table structure for table `IGS_site`
--

CREATE TABLE `IGS_site` (
  `id` int(11) NOT NULL,
  `site` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `color` varchar(10) NOT NULL,
  `font` varchar(50) NOT NULL,
  `footercolor` varchar(50) NOT NULL,
  `footerfontcolor` varchar(50) NOT NULL,
  `footer1` varchar(5000) NOT NULL,
  `footer2` varchar(5000) NOT NULL,
  `footer3` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IGS_site`
--

INSERT INTO `IGS_site` (`id`, `site`, `logo`, `color`, `font`, `footercolor`, `footerfontcolor`, `footer1`, `footer2`, `footer3`) VALUES
(1, 'test', 'ig2.png', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `IGS_user`
--

CREATE TABLE `IGS_user` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `joindate` date NOT NULL,
  `logins` int(11) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `isadmin` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(15) NOT NULL,
  `activ_status` int(11) NOT NULL,
  `activ_key` varchar(1000) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `credits` int(11) NOT NULL,
  `permissiongroup` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IGS_user`
--

INSERT INTO `IGS_user` (`id`, `name`, `password`, `joindate`, `logins`, `is_logged_in`, `isadmin`, `companyid`, `company`, `email`, `number`, `activ_status`, `activ_key`, `logo`, `about`, `credits`, `permissiongroup`, `fullname`) VALUES
(4, 'admin', '$2y$10$BV.iHu7G6KytVcALTg2ad.9g5xq/4TEm02f/HBZGHQCVnUb/iHA.6', '2015-11-22', 168, 0, 1, 0, '', '', '', 0, '44c75aa4e65e3760d0c019c5ffcc0655', '', '', 0, 1, 'Ignited Crud Builder');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `IGS_email`
--
ALTER TABLE `IGS_email`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `IGS_permissions`
--
ALTER TABLE `IGS_permissions`
 ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `IGS_permission_groups`
--
ALTER TABLE `IGS_permission_groups`
 ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `IGS_permission_map`
--
ALTER TABLE `IGS_permission_map`
 ADD PRIMARY KEY (`groupID`,`permissionID`);

--
-- Indexes for table `IGS_routes`
--
ALTER TABLE `IGS_routes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `IGS_user`
--
ALTER TABLE `IGS_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `IGS_email`
--
ALTER TABLE `IGS_email`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `IGS_permissions`
--
ALTER TABLE `IGS_permissions`
MODIFY `permissionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `IGS_permission_groups`
--
ALTER TABLE `IGS_permission_groups`
MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `IGS_routes`
--
ALTER TABLE `IGS_routes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `IGS_user`
--
ALTER TABLE `IGS_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
