-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2014 at 10:01 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esl`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Accounting', '2', NULL, 'N;'),
('Administrator', '1', NULL, 'N;'),
('Cashier', '6', NULL, 'N;'),
('Consultant', '5', NULL, 'N;'),
('Frontdesk', '9', NULL, 'N;'),
('Inventory', '3', NULL, 'N;'),
('Inventory', '8', NULL, 'N;'),
('Service and Treatment Manager', '4', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Accounting', 2, 'Accounting', NULL, 'N;'),
('Accounting.Default.*', 1, NULL, NULL, 'N;'),
('Accounting.Default.Index', 0, NULL, NULL, 'N;'),
('Accounting.Incoming.*', 1, NULL, NULL, 'N;'),
('Accounting.Incoming.Create', 0, NULL, NULL, 'N;'),
('Accounting.Incoming.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Incoming.Index', 0, NULL, NULL, 'N;'),
('Accounting.Incoming.Print', 0, NULL, NULL, 'N;'),
('Accounting.Incoming.Update', 0, NULL, NULL, 'N;'),
('Accounting.Incoming.View', 0, NULL, NULL, 'N;'),
('Accounting.Inventory.*', 1, NULL, NULL, 'N;'),
('Accounting.Inventory.Index', 0, NULL, NULL, 'N;'),
('Accounting.Inventory.View', 0, NULL, NULL, 'N;'),
('Accounting.Io.*', 1, NULL, NULL, 'N;'),
('Accounting.Io.Create', 0, NULL, NULL, 'N;'),
('Accounting.Io.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Io.Index', 0, NULL, NULL, 'N;'),
('Accounting.Io.Update', 0, NULL, NULL, 'N;'),
('Accounting.Io.View', 0, NULL, NULL, 'N;'),
('Accounting.Outgoing.*', 1, NULL, NULL, 'N;'),
('Accounting.Outgoing.Create', 0, NULL, NULL, 'N;'),
('Accounting.Outgoing.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Outgoing.Index', 0, NULL, NULL, 'N;'),
('Accounting.Outgoing.Print', 0, NULL, NULL, 'N;'),
('Accounting.Outgoing.Update', 0, NULL, NULL, 'N;'),
('Accounting.Outgoing.View', 0, NULL, NULL, 'N;'),
('Accounting.Product.*', 1, NULL, NULL, 'N;'),
('Accounting.Product.Create', 0, NULL, NULL, 'N;'),
('Accounting.Product.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Product.Index', 0, NULL, NULL, 'N;'),
('Accounting.Product.Update', 0, NULL, NULL, 'N;'),
('Accounting.Product.View', 0, NULL, NULL, 'N;'),
('Accounting.Productset.*', 1, NULL, NULL, 'N;'),
('Accounting.Product_cabin.*', 1, NULL, NULL, 'N;'),
('Accounting.Product_cabin.Create', 0, NULL, NULL, 'N;'),
('Accounting.Product_cabin.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Product_cabin.Index', 0, NULL, NULL, 'N;'),
('Accounting.Product_cabin.Update', 0, NULL, NULL, 'N;'),
('Accounting.Product_cabin.View', 0, NULL, NULL, 'N;'),
('Accounting.Product_korset.*', 1, NULL, NULL, 'N;'),
('Accounting.Product_korset.Create', 0, NULL, NULL, 'N;'),
('Accounting.Product_korset.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Product_korset.Index', 0, NULL, NULL, 'N;'),
('Accounting.Product_korset.Update', 0, NULL, NULL, 'N;'),
('Accounting.Product_korset.View', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product.*', 1, NULL, NULL, 'N;'),
('Accounting.Promo_product.Create', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product.Index', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product.Update', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product.View', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product_treatment.*', 1, NULL, NULL, 'N;'),
('Accounting.Promo_product_treatment.Create', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product_treatment.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product_treatment.Index', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product_treatment.Update', 0, NULL, NULL, 'N;'),
('Accounting.Promo_product_treatment.View', 0, NULL, NULL, 'N;'),
('Accounting.Promo_treatment.*', 1, NULL, NULL, 'N;'),
('Accounting.Promo_treatment.Create', 0, NULL, NULL, 'N;'),
('Accounting.Promo_treatment.Delete', 0, NULL, NULL, 'N;'),
('Accounting.Promo_treatment.Index', 0, NULL, NULL, 'N;'),
('Accounting.Promo_treatment.Update', 0, NULL, NULL, 'N;'),
('Accounting.Promo_treatment.View', 0, NULL, NULL, 'N;'),
('Admin.Branch.*', 1, NULL, NULL, 'N;'),
('Admin.Branch.Admin', 0, NULL, NULL, 'N;'),
('Admin.Branch.Create', 0, NULL, NULL, 'N;'),
('Admin.Branch.Delete', 0, NULL, NULL, 'N;'),
('Admin.Branch.Index', 0, NULL, NULL, 'N;'),
('Admin.Branch.Update', 0, NULL, NULL, 'N;'),
('Admin.Branch.View', 0, NULL, NULL, 'N;'),
('Admin.Default.*', 1, NULL, NULL, 'N;'),
('Admin.Default.Index', 0, NULL, NULL, 'N;'),
('Admin.Room.*', 1, NULL, NULL, 'N;'),
('Admin.Room.Admin', 0, NULL, NULL, 'N;'),
('Admin.Room.Create', 0, NULL, NULL, 'N;'),
('Admin.Room.Delete', 0, NULL, NULL, 'N;'),
('Admin.Room.Index', 0, NULL, NULL, 'N;'),
('Admin.Room.Update', 0, NULL, NULL, 'N;'),
('Admin.Room.View', 0, NULL, NULL, 'N;'),
('Admin.Treatment.*', 1, NULL, NULL, 'N;'),
('Admin.Treatment.Admin', 0, NULL, NULL, 'N;'),
('Admin.Treatment.Create', 0, NULL, NULL, 'N;'),
('Admin.Treatment.Delete', 0, NULL, NULL, 'N;'),
('Admin.Treatment.Index', 0, NULL, NULL, 'N;'),
('Admin.Treatment.Update', 0, NULL, NULL, 'N;'),
('Admin.Treatment.View', 0, NULL, NULL, 'N;'),
('Administrator', 2, NULL, NULL, 'N;'),
('Cashier', 2, 'Cashier', NULL, 'N;'),
('Consultant', 2, 'Consultant', NULL, 'N;'),
('Consultant.Client.*', 1, NULL, NULL, 'N;'),
('Consultant.Client.Admin', 0, NULL, NULL, 'N;'),
('Consultant.Client.Create', 0, NULL, NULL, 'N;'),
('Consultant.Client.Delete', 0, NULL, NULL, 'N;'),
('Consultant.Client.Index', 0, NULL, NULL, 'N;'),
('Consultant.Client.Update', 0, NULL, NULL, 'N;'),
('Consultant.Client.View', 0, NULL, NULL, 'N;'),
('Consultant.Default.*', 1, NULL, NULL, 'N;'),
('Consultant.Default.Index', 0, NULL, NULL, 'N;'),
('Consultant.Order.*', 1, NULL, NULL, 'N;'),
('Consultant.Order.Admin', 0, NULL, NULL, 'N;'),
('Consultant.Order.Create', 0, NULL, NULL, 'N;'),
('Consultant.Order.Delete', 0, NULL, NULL, 'N;'),
('Consultant.Order.Index', 0, NULL, NULL, 'N;'),
('Consultant.Order.Update', 0, NULL, NULL, 'N;'),
('Consultant.Order.View', 0, NULL, NULL, 'N;'),
('Frontdesk', 2, 'Frontdesk', NULL, 'N;'),
('Frontdesk.Client.*', 1, NULL, NULL, 'N;'),
('Frontdesk.Client.Index', 0, NULL, NULL, 'N;'),
('Frontdesk.Client.View', 0, NULL, NULL, 'N;'),
('Frontdesk.Default.*', 1, NULL, NULL, 'N;'),
('Frontdesk.Default.Index', 0, NULL, NULL, 'N;'),
('Frontdesk.Product.*', 1, NULL, NULL, 'N;'),
('Frontdesk.Product.Index', 0, NULL, NULL, 'N;'),
('Frontdesk.Product.View', 0, NULL, NULL, 'N;'),
('Frontdesk.Room.*', 1, NULL, NULL, 'N;'),
('Frontdesk.Room.Admin', 0, NULL, NULL, 'N;'),
('Frontdesk.Room.Create', 0, NULL, NULL, 'N;'),
('Frontdesk.Room.Delete', 0, NULL, NULL, 'N;'),
('Frontdesk.Room.Index', 0, NULL, NULL, 'N;'),
('Frontdesk.Room.Update', 0, NULL, NULL, 'N;'),
('Frontdesk.Room.View', 0, NULL, NULL, 'N;'),
('Frontdesk.Schedule.*', 1, NULL, NULL, 'N;'),
('Frontdesk.Schedule.Index', 0, NULL, NULL, 'N;'),
('Frontdesk.Schedule.Update', 0, NULL, NULL, 'N;'),
('Inventory', 2, 'Inventory', NULL, 'N;'),
('Inventory.Default.*', 1, NULL, NULL, 'N;'),
('Inventory.Default.Index', 0, NULL, NULL, 'N;'),
('Inventory.Incoming.*', 1, NULL, NULL, 'N;'),
('Inventory.Incoming.Create', 0, NULL, NULL, 'N;'),
('Inventory.Incoming.Delete', 0, NULL, NULL, 'N;'),
('Inventory.Incoming.Index', 0, NULL, NULL, 'N;'),
('Inventory.Incoming.Print', 0, NULL, NULL, 'N;'),
('Inventory.Incoming.Update', 0, NULL, NULL, 'N;'),
('Inventory.Incoming.View', 0, NULL, NULL, 'N;'),
('Inventory.Outgoing.*', 1, NULL, NULL, 'N;'),
('Inventory.Outgoing.Create', 0, NULL, NULL, 'N;'),
('Inventory.Outgoing.Delete', 0, NULL, NULL, 'N;'),
('Inventory.Outgoing.Index', 0, NULL, NULL, 'N;'),
('Inventory.Outgoing.Print', 0, NULL, NULL, 'N;'),
('Inventory.Outgoing.Update', 0, NULL, NULL, 'N;'),
('Inventory.Outgoing.View', 0, NULL, NULL, 'N;'),
('Inventory.Product.*', 1, NULL, NULL, 'N;'),
('Inventory.Product.Index', 0, NULL, NULL, 'N;'),
('Inventory.Product.View', 0, NULL, NULL, 'N;'),
('Inventory.Product_cabin.*', 1, NULL, NULL, 'N;'),
('Inventory.Product_cabin.Index', 0, NULL, NULL, 'N;'),
('Inventory.Product_cabin.View', 0, NULL, NULL, 'N;'),
('Service and Treatment Manager', 2, 'Service and Treatment Manager', NULL, 'N;'),
('Service.Default.*', 1, NULL, NULL, 'N;'),
('Service.Default.Index', 0, NULL, NULL, 'N;'),
('Service.Machine.*', 1, NULL, NULL, 'N;'),
('Service.Machine.Admin', 0, NULL, NULL, 'N;'),
('Service.Machine.Create', 0, NULL, NULL, 'N;'),
('Service.Machine.Delete', 0, NULL, NULL, 'N;'),
('Service.Machine.Index', 0, NULL, NULL, 'N;'),
('Service.Machine.Update', 0, NULL, NULL, 'N;'),
('Service.Machine.View', 0, NULL, NULL, 'N;'),
('Service.Mesin.*', 1, NULL, NULL, 'N;'),
('Service.Mesin.Admin', 0, NULL, NULL, 'N;'),
('Service.Mesin.Create', 0, NULL, NULL, 'N;'),
('Service.Mesin.Delete', 0, NULL, NULL, 'N;'),
('Service.Mesin.Index', 0, NULL, NULL, 'N;'),
('Service.Mesin.Update', 0, NULL, NULL, 'N;'),
('Service.Mesin.View', 0, NULL, NULL, 'N;'),
('Service.Procedure.*', 1, NULL, NULL, 'N;'),
('Service.Procedure.Admin', 0, NULL, NULL, 'N;'),
('Service.Procedure.Create', 0, NULL, NULL, 'N;'),
('Service.Procedure.Delete', 0, NULL, NULL, 'N;'),
('Service.Procedure.Index', 0, NULL, NULL, 'N;'),
('Service.Procedure.Update', 0, NULL, NULL, 'N;'),
('Service.Procedure.View', 0, NULL, NULL, 'N;'),
('Service.Schedule.*', 1, NULL, NULL, 'N;'),
('Service.Schedule.Index', 0, NULL, NULL, 'N;'),
('Service.Treatment.*', 1, NULL, NULL, 'N;'),
('Service.Treatment.Admin', 0, NULL, NULL, 'N;'),
('Service.Treatment.Create', 0, NULL, NULL, 'N;'),
('Service.Treatment.Delete', 0, NULL, NULL, 'N;'),
('Service.Treatment.Index', 0, NULL, NULL, 'N;'),
('Service.Treatment.Machine', 0, NULL, NULL, 'N;'),
('Service.Treatment.Procedure', 0, NULL, NULL, 'N;'),
('Service.Treatment.Product', 0, NULL, NULL, 'N;'),
('Service.Treatment.Sort', 0, NULL, NULL, 'N;'),
('Service.Treatment.Update', 0, NULL, NULL, 'N;'),
('Service.Treatment.View', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Staff.*', 1, NULL, NULL, 'N;'),
('Staff.Admin', 0, NULL, NULL, 'N;'),
('Staff.Create', 0, NULL, NULL, 'N;'),
('Staff.Delete', 0, NULL, NULL, 'N;'),
('Staff.Index', 0, NULL, NULL, 'N;'),
('Staff.Update', 0, NULL, NULL, 'N;'),
('Staff.View', 0, NULL, NULL, 'N;'),
('Upload.*', 1, NULL, NULL, 'N;'),
('Upload.Index', 0, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Accounting', 'Accounting.Default.*'),
('Accounting', 'Accounting.Incoming.*'),
('Accounting', 'Accounting.Io.*'),
('Accounting', 'Accounting.Outgoing.*'),
('Accounting', 'Accounting.Product.*'),
('Accounting', 'Accounting.Product_cabin.*'),
('Accounting', 'Accounting.Promo_product.*'),
('Accounting', 'Accounting.Promo_product_treatment.*'),
('Accounting', 'Accounting.Promo_treatment.*'),
('Consultant', 'Consultant.Client.*'),
('Consultant', 'Consultant.Default.*'),
('Consultant', 'Consultant.Order.*'),
('Frontdesk', 'Frontdesk.Client.*'),
('Frontdesk', 'Frontdesk.Client.Index'),
('Frontdesk', 'Frontdesk.Client.View'),
('Frontdesk', 'Frontdesk.Default.*'),
('Frontdesk', 'Frontdesk.Default.Index'),
('Frontdesk', 'Frontdesk.Product.*'),
('Frontdesk', 'Frontdesk.Product.Index'),
('Frontdesk', 'Frontdesk.Room.Index'),
('Frontdesk', 'Frontdesk.Schedule.*'),
('Frontdesk', 'Frontdesk.Schedule.Index'),
('Frontdesk', 'Frontdesk.Schedule.Update'),
('Inventory', 'Inventory.Default.*'),
('Inventory', 'Inventory.Incoming.*'),
('Inventory', 'Inventory.Outgoing.*'),
('Inventory', 'Inventory.Product.*'),
('Inventory', 'Inventory.Product_cabin.*'),
('Service and Treatment Manager', 'Service.Default.*'),
('Service and Treatment Manager', 'Service.Mesin.*'),
('Service and Treatment Manager', 'Service.Procedure.*'),
('Service and Treatment Manager', 'Service.Treatment.*');

-- --------------------------------------------------------

--
-- Table structure for table `esc_branch`
--

CREATE TABLE IF NOT EXISTS `esc_branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_number` varchar(10) NOT NULL,
  `branch_name` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `ot_start` time NOT NULL,
  `ot_end` time NOT NULL,
  `description` text,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `esc_branch`
--

INSERT INTO `esc_branch` (`branch_id`, `branch_number`, `branch_name`, `address`, `phone`, `fax`, `ot_start`, `ot_end`, `description`, `user_id`, `created`, `changed`, `active`) VALUES
(1, 'PUSAT', 'Pusat', 'Iskandarsyah', '1234', '123', '08:30:00', '16:00:00', '', 1, 1374990309, 1374990309, 1),
(3, 'ESLKG', 'Kelapa Gading ESL', 'Kelapa Gading', '01213456', '0213567', '10:00:00', '18:00:00', 'adfsadsa', 1, 1379409090, 1379409090, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_client`
--

CREATE TABLE IF NOT EXISTS `esc_client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(30) NOT NULL,
  `sex_id` int(11) NOT NULL,
  `marital_status_id` int(11) DEFAULT '0',
  `nationality_id` int(11) DEFAULT NULL,
  `id_card_id` int(11) NOT NULL,
  `id_card_number` varchar(20) NOT NULL DEFAULT '0',
  `client_number` varchar(20) DEFAULT NULL,
  `dop` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `phone_kantor` varchar(15) NOT NULL,
  `hp1` varchar(15) NOT NULL,
  `hp2` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pict` varchar(100) NOT NULL,
  `source_info_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=281 ;

--
-- Dumping data for table `esc_client`
--

INSERT INTO `esc_client` (`client_id`, `client_name`, `sex_id`, `marital_status_id`, `nationality_id`, `id_card_id`, `id_card_number`, `client_number`, `dop`, `dob`, `address`, `city`, `zip_code`, `telephone`, `phone_kantor`, `hp1`, `hp2`, `email`, `pict`, `source_info_id`, `branch_id`, `user_id`, `created`, `changed`, `active`) VALUES
(3, 'Indawati', 1, NULL, NULL, 1, 'ESL00001', 'ESL00001', '', '0000-00-00', '', '', '', '', '0214552345', '0856854123456', '', 'hasanbasri2307@gmail.com', 'test2.jpg', 0, 1, 9, 1357171200, 0, 1),
(4, 'Mariana', 1, NULL, NULL, 1, 'ESL00002', 'ESL00002', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 9, 1357171200, 0, 1),
(5, 'Jehti', 1, NULL, NULL, 1, 'ESL00003', 'ESL00003', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 9, 1357171200, 0, 1),
(6, 'Stephanie', 1, NULL, NULL, 1, 'ESL00004', 'ESL00004', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 9, 1359849600, 0, 1),
(7, 'Sianti', 1, NULL, NULL, 1, 'ESL00005', 'ESL00005', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 9, 1364947200, 0, 1),
(8, 'Kartika Dewi', 1, NULL, NULL, 1, 'ESL00006', 'ESL00006', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 9, 1367539200, 0, 1),
(9, 'Donna', 1, NULL, NULL, 1, 'ESL00007', 'ESL00007', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367539200, 0, 1),
(10, 'Alexander', 2, NULL, NULL, 1, 'ESL00008', 'ESL00008', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1370217600, 0, 1),
(11, 'Chintya', 1, NULL, NULL, 1, 'ESL00009', 'ESL00009', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1370217600, 0, 1),
(12, 'Yuswanti', 1, NULL, NULL, 1, 'ESL00010', 'ESL00010', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1370217600, 0, 1),
(13, 'Mrs. Erni', 1, NULL, NULL, 1, 'ESL00011', 'ESL00011', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372809600, 0, 1),
(14, 'Mrs. Hidayati', 1, NULL, NULL, 1, 'ESL00012', 'ESL00012', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372809600, 0, 1),
(15, 'Mr. Irwan', 2, NULL, NULL, 1, 'ESL00013', 'ESL00013', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372809600, 0, 1),
(16, 'Mrs. Lena', 1, NULL, NULL, 1, 'ESL00014', 'ESL00014', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375488000, 0, 1),
(17, 'Mrs. Windy', 1, NULL, NULL, 1, 'ESL00015', 'ESL00015', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1378166400, 0, 1),
(18, 'Mr. Rudi', 2, NULL, NULL, 1, 'ESL00016', 'ESL00016', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1378166400, 0, 1),
(19, 'Mrs. Cindy', 1, NULL, NULL, 1, 'ESL00017', 'ESL00017', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1383436800, 0, 1),
(20, 'Mrs. Elvia', 1, NULL, NULL, 1, 'ESL00018', 'ESL00018', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1383436800, 0, 1),
(21, 'Wellyantina', 1, NULL, NULL, 1, 'ESL00019', 'ESL00019', '', '0000-00-00', 'kebon kacang ix no.52', '', '', '*08128128970', '', '', '', '', '', 0, 1, 5, 1328832000, 0, 1),
(22, 'Mrs. Nia', 1, NULL, NULL, 1, 'ESL00020', 'ESL00020', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363219200, 0, 1),
(23, 'Mrs. Mimi', 1, NULL, NULL, 1, 'ESL00021', 'ESL00021', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363305600, 0, 1),
(24, 'Mrs. Nurwiah', 1, NULL, NULL, 1, 'ESL00022', 'ESL00022', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363392000, 0, 1),
(25, 'Mr. Jackson', 2, NULL, NULL, 1, 'ESL00023', 'ESL00023', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363392000, 0, 1),
(26, 'Mrs. Vimala', 1, NULL, NULL, 1, 'ESL00024', 'ESL00024', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363564800, 0, 1),
(27, 'Mrs. Anna', 1, NULL, NULL, 1, 'ESL00025', 'ESL00025', '', '0000-00-00', 'cempaka wangi III', '', '', '*081280992666', '', '', '', '', '', 0, 1, 5, 1363564800, 0, 1),
(28, 'Mrs. Erna', 1, NULL, NULL, 1, 'ESL00026', 'ESL00026', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363651200, 0, 1),
(29, 'Mrs. Lie Wan Yung', 1, NULL, NULL, 1, 'ESL00027', 'ESL00027', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363737600, 0, 1),
(30, 'Mrs. Dewi', 1, NULL, NULL, 1, 'ESL00028', 'ESL00028', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363737600, 0, 1),
(31, 'Mrs. Analia', 1, NULL, NULL, 1, 'ESL00029', 'ESL00029', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363737600, 0, 1),
(32, 'Mrs. Liana', 1, NULL, NULL, 1, 'ESL00030', 'ESL00030', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363824000, 0, 1),
(33, 'Mr. Subandono', 2, NULL, NULL, 1, 'ESL00031', 'ESL00031', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363910400, 0, 1),
(34, 'Mrs. Leni M', 1, NULL, NULL, 1, 'ESL00032', 'ESL00032', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363910400, 0, 1),
(35, 'Mrs. Linda', 1, NULL, NULL, 1, 'ESL00033', 'ESL00033', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363910400, 0, 1),
(36, 'Mrs. Leni K', 1, NULL, NULL, 1, 'ESL00034', 'ESL00034', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363996800, 0, 1),
(37, 'Mrs. Rahma', 1, NULL, NULL, 1, 'ESL00035', 'ESL00035', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363996800, 0, 1),
(38, 'Mr. Ardi', 2, NULL, NULL, 1, 'ESL00036', 'ESL00036', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363996800, 0, 1),
(39, 'Mrs. Lim Dolly', 1, NULL, NULL, 1, 'ESL00037', 'ESL00037', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1363996800, 0, 1),
(40, 'Mrs. Farida', 1, NULL, NULL, 1, 'ESL00038', 'ESL00038', '', '0000-00-00', 'jl.ultra violet a4/31 kelapa gading komp. Walikota jakut', '', '', '99999611', '', '', '', '', '', 0, 1, 5, 1013299200, 0, 1),
(41, 'Mrs. Sila', 1, NULL, NULL, 1, 'ESL00039', 'ESL00039', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364256000, 0, 1),
(42, 'Mrs.  Maselva', 1, NULL, NULL, 1, 'ESL00040', 'ESL00040', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364256000, 0, 1),
(43, 'Ms. Mirna', 1, NULL, NULL, 1, 'ESL00041', 'ESL00041', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364256000, 0, 1),
(44, 'Mrs. Julie', 1, NULL, NULL, 1, 'ESL00042', 'ESL00042', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364342400, 0, 1),
(45, 'Ms. Angeline Jaya', 1, NULL, NULL, 1, 'ESL00043', 'ESL00043', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364342400, 0, 1),
(46, 'Mrs. Dwi Maryani', 1, NULL, NULL, 1, 'ESL00044', 'ESL00044', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364342400, 0, 1),
(47, 'Mrs. Saraswati', 1, NULL, NULL, 1, 'ESL00045', 'ESL00045', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364342400, 0, 1),
(48, 'Mrs. Liana Lim', 1, NULL, NULL, 1, 'ESL00046', 'ESL00046', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364428800, 0, 1),
(49, 'Mrs. Jenny al Gozali', 1, NULL, NULL, 1, 'ESL00047', 'ESL00047', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364601600, 0, 1),
(50, 'Mr. Jupri', 2, NULL, NULL, 1, 'ESL00048', 'ESL00048', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364601600, 0, 1),
(51, 'Mrs. Martha', 1, NULL, NULL, 1, 'ESL00049', 'ESL00049', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1364601600, 0, 1),
(52, 'Djuwita', 1, NULL, NULL, 1, 'ESL00050', 'ESL00050', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1357257600, 0, 1),
(53, 'Mrs. Willy', 1, NULL, NULL, 1, 'ESL00051', 'ESL00051', '', '0000-00-00', '', '', '', '*08161908539', '', '', '', '', '', 0, 1, 5, 1337904000, 0, 1),
(54, 'Mr. Johanes', 2, NULL, NULL, 1, 'ESL00052', 'ESL00052', '', '0000-00-00', 'bali', '', '', '*0811387792', '', '', '', '', '', 0, 1, 5, 1359936000, 0, 1),
(55, 'Elvia Ateng', 1, NULL, NULL, 1, 'ESL00053', 'ESL00053', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1359936000, 0, 1),
(56, 'Lany', 1, NULL, NULL, 1, 'ESL00054', 'ESL00054', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1362355200, 0, 1),
(57, 'Lina Widjaya', 1, NULL, NULL, 1, 'ESL00055', 'ESL00055', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1362355200, 0, 1),
(58, 'Olivia', 1, NULL, NULL, 1, 'ESL00056', 'ESL00056', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1365033600, 0, 1),
(59, 'Hendra', 2, NULL, NULL, 1, 'ESL00057', 'ESL00057', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1365033600, 0, 1),
(60, 'Veronica', 1, NULL, NULL, 1, 'ESL00058', 'ESL00058', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367625600, 0, 1),
(61, 'Silvi', 1, NULL, NULL, 1, 'ESL00059', 'ESL00059', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367625600, 0, 1),
(62, 'Yulina', 1, NULL, NULL, 1, 'ESL00060', 'ESL00060', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1370304000, 0, 1),
(63, 'Fonny', 1, NULL, NULL, 1, 'ESL00061', 'ESL00061', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1370304000, 0, 1),
(64, 'Irwan', 2, NULL, NULL, 1, 'ESL00062', 'ESL00062', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375574400, 0, 1),
(65, 'Elen', 1, NULL, NULL, 1, 'ESL00063', 'ESL00063', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1378252800, 0, 1),
(66, 'Ludwina', 1, NULL, NULL, 1, 'ESL00064', 'ESL00064', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1378252800, 0, 1),
(67, 'Yeni', 1, NULL, NULL, 1, 'ESL00065', 'ESL00065', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1386115200, 0, 1),
(68, 'Siani ', 1, NULL, NULL, 1, 'ESL00066', 'ESL00066', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1365811200, 0, 1),
(69, 'Emma', 1, NULL, NULL, 1, 'ESL00067', 'ESL00067', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1365984000, 0, 1),
(70, 'Agnes', 1, NULL, NULL, 1, 'ESL00068', 'ESL00068', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1365984000, 0, 1),
(71, 'Sisca', 1, NULL, NULL, 1, 'ESL00069', 'ESL00069', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366070400, 0, 1),
(72, 'Elsye', 1, NULL, NULL, 1, 'ESL00070', 'ESL00070', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366070400, 0, 1),
(73, 'Erma', 1, NULL, NULL, 1, 'ESL00071', 'ESL00071', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366070400, 0, 1),
(74, 'Meta', 1, NULL, NULL, 1, 'ESL00072', 'ESL00072', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366070400, 0, 1),
(75, 'Jenny Novita', 1, NULL, NULL, 1, 'ESL00073', 'ESL00073', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366156800, 0, 1),
(76, 'Jaelani', 1, NULL, NULL, 1, 'ESL00074', 'ESL00074', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366156800, 0, 1),
(77, 'Rusnilamwati', 1, NULL, NULL, 1, 'ESL00075', 'ESL00075', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366156800, 0, 1),
(78, 'Carol Kwok', 1, NULL, NULL, 1, 'ESL00076', 'ESL00076', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366243200, 0, 1),
(79, 'Aida Ria ', 1, NULL, NULL, 1, 'ESL00077', 'ESL00077', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366243200, 0, 1),
(80, 'Lidia Suhardi', 1, NULL, NULL, 1, 'ESL00078', 'ESL00078', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366329600, 0, 1),
(81, 'Nia', 1, NULL, NULL, 1, 'ESL00079', 'ESL00079', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366329600, 0, 1),
(82, 'Stella', 1, NULL, NULL, 1, 'ESL00080', 'ESL00080', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366416000, 0, 1),
(83, 'Lenny Kurnia', 1, NULL, NULL, 1, 'ESL00081', 'ESL00081', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366416000, 0, 1),
(84, 'Ratna', 1, NULL, NULL, 1, 'ESL00082', 'ESL00082', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366416000, 0, 1),
(85, 'Meiny', 1, NULL, NULL, 1, 'ESL00083', 'ESL00083', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366588800, 0, 1),
(86, 'Rudy Wijaya', 1, NULL, NULL, 1, 'ESL00084', 'ESL00084', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366588800, 0, 1),
(87, 'Taufik', 2, NULL, NULL, 1, 'ESL00085', 'ESL00085', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366675200, 0, 1),
(88, 'Eda The', 1, NULL, NULL, 1, 'ESL00086', 'ESL00086', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366675200, 0, 1),
(89, 'iNtihawah', 1, NULL, NULL, 1, 'ESL00087', 'ESL00087', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366761600, 0, 1),
(90, 'Dian', 1, NULL, NULL, 1, 'ESL00088', 'ESL00088', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366761600, 0, 1),
(91, 'Lea', 1, NULL, NULL, 1, 'ESL00089', 'ESL00089', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(92, 'Rosmiati', 1, NULL, NULL, 1, 'ESL00090', 'ESL00090', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(93, 'olivia natalia', 1, NULL, NULL, 1, 'ESL00091', 'ESL00091', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(94, 'Susanti', 1, NULL, NULL, 1, 'ESL00092', 'ESL00092', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(95, 'Susilawati', 1, NULL, NULL, 1, 'ESL00093', 'ESL00093', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(96, 'Katrin', 1, NULL, NULL, 1, 'ESL00094', 'ESL00094', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(97, 'Edison', 1, NULL, NULL, 1, 'ESL00095', 'ESL00095', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(98, 'Atikah', 1, NULL, NULL, 1, 'ESL00096', 'ESL00096', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(99, 'Budiman', 2, NULL, NULL, 1, 'ESL00097', 'ESL00097', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(100, 'Djufri', 1, NULL, NULL, 1, 'ESL00098', 'ESL00098', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(101, 'Juniaty', 1, NULL, NULL, 1, 'ESL00099', 'ESL00099', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(102, 'juwita', 1, NULL, NULL, 1, 'ESL00100', 'ESL00100', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(103, 'Evelyn', 1, NULL, NULL, 1, 'ESL00101', 'ESL00101', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(104, 'Susana Tio', 1, NULL, NULL, 1, 'ESL00102', 'ESL00102', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(105, 'Linny Widjaja', 1, NULL, NULL, 1, 'ESL00103', 'ESL00103', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366848000, 0, 1),
(106, 'Liana Setyadi', 1, NULL, NULL, 1, 'ESL00104', 'ESL00104', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366934400, 0, 1),
(107, 'Ovi', 1, NULL, NULL, 1, 'ESL00105', 'ESL00105', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1366934400, 0, 1),
(108, 'Veronica', 1, NULL, NULL, 1, 'ESL00106', 'ESL00106', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367020800, 0, 1),
(109, 'Dewi', 1, NULL, NULL, 1, 'ESL00107', 'ESL00107', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367193600, 0, 1),
(110, 'Lena', 1, NULL, NULL, 1, 'ESL00108', 'ESL00108', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367193600, 0, 1),
(111, 'Jackson', 2, NULL, NULL, 1, 'ESL00109', 'ESL00109', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367193600, 0, 1),
(112, 'Henny Tumewu', 1, NULL, NULL, 1, 'ESL00110', 'ESL00110', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367280000, 0, 1),
(113, 'Maria Fong ', 1, NULL, NULL, 1, 'ESL00111', 'ESL00111', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367280000, 0, 1),
(114, 'Wiwit', 1, NULL, NULL, 1, 'ESL00112', 'ESL00112', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1357344000, 0, 1),
(115, 'Aline', 1, NULL, NULL, 1, 'ESL00113', 'ESL00113', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1360022400, 0, 1),
(116, 'Christine', 1, NULL, NULL, 1, 'ESL00114', 'ESL00114', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1360022400, 0, 1),
(117, 'Vinny', 1, NULL, NULL, 1, 'ESL00115', 'ESL00115', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1362441600, 0, 1),
(118, 'Linda', 1, NULL, NULL, 1, 'ESL00116', 'ESL00116', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1365120000, 0, 1),
(119, 'Yanti Gozali', 1, NULL, NULL, 1, 'ESL00117', 'ESL00117', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1365120000, 0, 1),
(120, 'Andriani', 1, NULL, NULL, 1, 'ESL00118', 'ESL00118', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372982400, 0, 1),
(121, 'Marini', 1, NULL, NULL, 1, 'ESL00119', 'ESL00119', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375660800, 0, 1),
(122, 'Stephanie', 1, NULL, NULL, 1, 'ESL00120', 'ESL00120', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375660800, 0, 1),
(123, 'Taufiq', 2, NULL, NULL, 1, 'ESL00121', 'ESL00121', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375660800, 0, 1),
(124, 'Lindawati', 1, NULL, NULL, 1, 'ESL00122', 'ESL00122', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380931200, 0, 1),
(125, 'Erna Yulianti', 1, NULL, NULL, 1, 'ESL00123', 'ESL00123', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1383609600, 0, 1),
(126, 'Juliana Karamoy', 1, NULL, NULL, 1, 'ESL00124', 'ESL00124', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1383609600, 0, 1),
(127, 'Margareth', 1, NULL, NULL, 1, 'ESL00125', 'ESL00125', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368403200, 0, 1),
(128, 'Miemy', 1, NULL, NULL, 1, 'ESL00126', 'ESL00126', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368403200, 0, 1),
(129, 'Puspita Dewi', 1, NULL, NULL, 1, 'ESL00127', 'ESL00127', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368576000, 0, 1),
(130, 'Lea Melya', 1, NULL, NULL, 1, 'ESL00128', 'ESL00128', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368662400, 0, 1),
(131, 'Katrin', 1, NULL, NULL, 1, 'ESL00129', 'ESL00129', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368662400, 0, 1),
(132, 'Elia', 1, NULL, NULL, 1, 'ESL00130', 'ESL00130', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368662400, 0, 1),
(133, 'Julius', 2, NULL, NULL, 1, 'ESL00131', 'ESL00131', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368662400, 0, 1),
(134, 'Deasy', 1, NULL, NULL, 1, 'ESL00132', 'ESL00132', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368748800, 0, 1),
(135, 'Fida', 1, NULL, NULL, 1, 'ESL00133', 'ESL00133', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368835200, 0, 1),
(136, 'Nina', 1, NULL, NULL, 1, 'ESL00134', 'ESL00134', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369008000, 0, 1),
(137, 'Linda Lin', 1, NULL, NULL, 1, 'ESL00135', 'ESL00135', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369008000, 0, 1),
(138, 'Santi Auke', 1, NULL, NULL, 1, 'ESL00136', 'ESL00136', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369094400, 0, 1),
(139, 'Evi Chandra', 1, NULL, NULL, 1, 'ESL00137', 'ESL00137', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369180800, 0, 1),
(140, 'Wanti', 1, NULL, NULL, 1, 'ESL00138', 'ESL00138', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369267200, 0, 1),
(141, 'Neneng', 1, NULL, NULL, 1, 'ESL00139', 'ESL00139', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369612800, 0, 1),
(142, 'Elsya Novawanty', 1, NULL, NULL, 1, 'ESL00140', 'ESL00140', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369785600, 0, 1),
(143, 'Katrina', 1, NULL, NULL, 1, 'ESL00141', 'ESL00141', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369872000, 0, 1),
(144, 'Inestia', 1, NULL, NULL, 1, 'ESL00142', 'ESL00142', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369872000, 0, 1),
(145, 'Shinta', 1, NULL, NULL, 1, 'ESL00143', 'ESL00143', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369958400, 0, 1),
(146, 'Lili Tanamas', 1, NULL, NULL, 1, 'ESL00144', 'ESL00144', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369958400, 0, 1),
(147, 'Susianty', 1, NULL, NULL, 1, 'ESL00145', 'ESL00145', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1369958400, 0, 1),
(148, 'Budi', 2, NULL, NULL, 1, 'ESL00146', 'ESL00146', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1357430400, 0, 1),
(149, 'Roseline ', 1, NULL, NULL, 1, 'ESL00147', 'ESL00147', '', '0000-00-00', 'gading nirwana 7 pf 6/2 kelapa gading', '', '', '4528158', '', '', '', '', '', 0, 1, 5, 1357430400, 0, 1),
(150, 'Merry Ham', 1, NULL, NULL, 1, 'ESL00148', 'ESL00148', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1362528000, 0, 1),
(151, 'Neneng Zakiah', 1, NULL, NULL, 1, 'ESL00149', 'ESL00149', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367798400, 0, 1),
(152, 'Meimei', 1, NULL, NULL, 1, 'ESL00150', 'ESL00150', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1373068800, 0, 1),
(153, 'Hany Taswinah', 1, NULL, NULL, 1, 'ESL00151', 'ESL00151', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1373068800, 0, 1),
(154, 'Helen', 1, NULL, NULL, 1, 'ESL00152', 'ESL00152', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1373068800, 0, 1),
(155, 'Herlina', 1, NULL, NULL, 1, 'ESL00153', 'ESL00153', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1373068800, 0, 1),
(156, 'Chynthia', 1, NULL, NULL, 1, 'ESL00154', 'ESL00154', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381017600, 0, 1),
(157, 'Joice Novita', 1, NULL, NULL, 1, 'ESL00155', 'ESL00155', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381017600, 0, 1),
(158, 'Stephanie', 1, NULL, NULL, 1, 'ESL00156', 'ESL00156', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381017600, 0, 1),
(159, 'Elena', 1, NULL, NULL, 1, 'ESL00157', 'ESL00157', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381017600, 0, 1),
(160, 'Dwita Ramesh', 1, NULL, NULL, 1, 'ESL00158', 'ESL00158', '', '0000-00-00', 'sunter paraadise thp 1 gg.5 blok f 10/30 sunter', '', '', '*08129120409', '', '', '', '', '', 0, 1, 5, 1383696000, 0, 1),
(161, 'Dwi Apriani', 1, NULL, NULL, 1, 'ESL00159', 'ESL00159', '', '0000-00-00', '', '', '', '*081252577404', '', '', '', '', '', 0, 1, 5, 1386288000, 0, 1),
(162, 'Julie To Siaw Yen', 1, NULL, NULL, 1, 'ESL00160', 'ESL00160', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1371081600, 0, 1),
(163, 'Vera Chindea', 1, NULL, NULL, 1, 'ESL00161', 'ESL00161', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1371168000, 0, 1),
(164, 'Etty', 1, NULL, NULL, 1, 'ESL00162', 'ESL00162', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1371254400, 0, 1),
(165, 'Dulhasim Kasim', 2, NULL, NULL, 1, 'ESL00163', 'ESL00163', '', '0000-00-00', 'gading nias residences timur chrysant lt.3', '', '', '*087887606777', '', '', '', '', '', 0, 1, 5, 1344729600, 0, 1),
(166, 'Silvi', 1, NULL, NULL, 1, 'ESL00164', 'ESL00164', '', '0000-00-00', 'royal gading mansion rg 5 no.3', '', '', '*08557891208', '', '', '', '', '', 0, 1, 5, 1323475200, 0, 1),
(167, 'Lina Paramitha', 1, NULL, NULL, 1, 'ESL00165', 'ESL00165', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1371859200, 0, 1),
(168, 'Lanny Engiarto', 1, NULL, NULL, 1, 'ESL00166', 'ESL00166', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372032000, 0, 1),
(169, 'Meta', 1, NULL, NULL, 1, 'ESL00167', 'ESL00167', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372291200, 0, 1),
(170, 'Monica', 1, NULL, NULL, 1, 'ESL00168', 'ESL00168', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372291200, 0, 1),
(171, 'Elisa Santi', 1, NULL, NULL, 1, 'ESL00169', 'ESL00169', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372291200, 0, 1),
(172, 'Nicole ', 1, NULL, NULL, 1, 'ESL00170', 'ESL00170', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372377600, 0, 1),
(173, 'Siani', 1, NULL, NULL, 1, 'ESL00171', 'ESL00171', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372464000, 0, 1),
(174, 'Olvy', 1, NULL, NULL, 1, 'ESL00172', 'ESL00172', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1372464000, 0, 1),
(175, 'Irwan', 2, NULL, NULL, 1, 'ESL00173', 'ESL00173', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1357516800, 0, 1),
(176, 'Maya', 1, NULL, NULL, 1, 'ESL00174', 'ESL00174', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1360195200, 0, 1),
(177, 'Juliet', 1, NULL, NULL, 1, 'ESL00175', 'ESL00175', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1362614400, 0, 1),
(178, 'Olivia', 1, NULL, NULL, 1, 'ESL00176', 'ESL00176', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1365292800, 0, 1),
(179, 'Lany Alex', 1, NULL, NULL, 1, 'ESL00177', 'ESL00177', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367884800, 0, 1),
(180, 'Dr.Shinta', 1, NULL, NULL, 1, 'ESL00178', 'ESL00178', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375833600, 0, 1),
(181, 'Susanty', 1, NULL, NULL, 1, 'ESL00179', 'ESL00179', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1378512000, 0, 1),
(182, 'Esti', 1, NULL, NULL, 1, 'ESL00180', 'ESL00180', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1383782400, 0, 1),
(183, 'Yola', 1, NULL, NULL, 1, 'ESL00181', 'ESL00181', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1386374400, 0, 1),
(184, 'Elia', 1, NULL, NULL, 1, 'ESL00182', 'ESL00182', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1373673600, 0, 1),
(185, 'neneng', 1, NULL, NULL, 1, 'ESL00183', 'ESL00183', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1373932800, 0, 1),
(186, 'Erna Yuliati', 1, NULL, NULL, 1, 'ESL00184', 'ESL00184', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374019200, 0, 1),
(187, 'Budi Widodo', 2, NULL, NULL, 1, 'ESL00185', 'ESL00185', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374019200, 0, 1),
(188, 'Wuriana Irawati', 1, NULL, NULL, 1, 'ESL00186', 'ESL00186', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374105600, 0, 1),
(189, 'Memey', 1, NULL, NULL, 1, 'ESL00187', 'ESL00187', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374192000, 0, 1),
(190, 'Veronica', 1, NULL, NULL, 1, 'ESL00188', 'ESL00188', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374278400, 0, 1),
(191, 'Herlinda Tedja', 1, NULL, NULL, 1, 'ESL00189', 'ESL00189', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374278400, 0, 1),
(192, 'Lina Wibowo', 1, NULL, NULL, 1, 'ESL00190', 'ESL00190', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374278400, 0, 1),
(193, 'Deasy', 1, NULL, NULL, 1, 'ESL00191', 'ESL00191', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374278400, 0, 1),
(194, 'Angelin', 1, NULL, NULL, 1, 'ESL00192', 'ESL00192', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374278400, 0, 1),
(195, 'Angelique', 1, NULL, NULL, 1, 'ESL00193', 'ESL00193', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374624000, 0, 1),
(196, 'Poppy Mudjaja', 1, NULL, NULL, 1, 'ESL00194', 'ESL00194', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374624000, 0, 1),
(197, 'Lenny Margaretha', 1, NULL, NULL, 1, 'ESL00195', 'ESL00195', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374624000, 0, 1),
(198, 'Rinda', 1, NULL, NULL, 1, 'ESL00196', 'ESL00196', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374624000, 0, 1),
(199, 'Eveline Thiang', 1, NULL, NULL, 1, 'ESL00197', 'ESL00197', '', '0000-00-00', 'elang 5/5 pik', '', '', '*08128710000', '', '', '', '', '', 0, 1, 5, 1367452800, 0, 1),
(200, 'Christilistiani', 1, NULL, NULL, 1, 'ESL00198', 'ESL00198', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374710400, 0, 1),
(201, 'susiana imawati imawan', 1, NULL, NULL, 1, 'ESL00199', 'ESL00199', '', '0000-00-00', 'jl.akasia dd 3 rw badak utara, koja', '', '', '', '', '', '', '', '', 0, 1, 5, 1374796800, 0, 1),
(202, 'Jane', 1, NULL, NULL, 1, 'ESL00200', 'ESL00200', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374796800, 0, 1),
(203, 'Ratna', 1, NULL, NULL, 1, 'ESL00201', 'ESL00201', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1374883200, 0, 1),
(204, 'Harlinda Jaya', 1, NULL, NULL, 1, 'ESL00202', 'ESL00202', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375056000, 0, 1),
(205, 'Soraya', 1, NULL, NULL, 1, 'ESL00203', 'ESL00203', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375056000, 0, 1),
(206, 'Alisah', 1, NULL, NULL, 1, 'ESL00204', 'ESL00204', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375142400, 0, 1),
(207, 'Liana Lim', 1, NULL, NULL, 1, 'ESL00205', 'ESL00205', '', '0000-00-00', 'sunter danau permai timur', '', '', '', '', '', '', '', '', 0, 1, 5, 1363824000, 0, 1),
(208, 'Suryati', 1, NULL, NULL, 1, 'ESL00206', 'ESL00206', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1375228800, 0, 1),
(209, 'Anna', 1, NULL, NULL, 1, 'ESL00207', 'ESL00207', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1357603200, 0, 1),
(210, 'Henny Pratiwi', 1, NULL, NULL, 1, 'ESL00208', 'ESL00208', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1357603200, 0, 1),
(211, 'Susanto', 2, NULL, NULL, 1, 'ESL00209', 'ESL00209', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1360281600, 0, 1),
(212, 'Lusi', 1, NULL, NULL, 1, 'ESL00210', 'ESL00210', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1360281600, 0, 1),
(213, 'Sukardi', 1, NULL, NULL, 1, 'ESL00211', 'ESL00211', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1360281600, 0, 1),
(214, 'Surjati', 1, NULL, NULL, 1, 'ESL00212', 'ESL00212', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1360281600, 0, 1),
(215, 'Rizky', 1, NULL, NULL, 1, 'ESL00213', 'ESL00213', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367971200, 0, 1),
(216, 'Marina ', 1, NULL, NULL, 1, 'ESL00214', 'ESL00214', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1367971200, 0, 1),
(217, 'Denny', 2, NULL, NULL, 1, 'ESL00215', 'ESL00215', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1376352000, 0, 1),
(218, 'Ayu Puspita sari', 1, NULL, NULL, 1, 'ESL00216', 'ESL00216', '', '0000-00-00', 'jl. Janur hijau ry kx/11 koja jakut', '', '', '', '', '', '', '', '', 0, 1, 5, 1376352000, 0, 1),
(219, 'Herlinda', 1, NULL, NULL, 1, 'ESL00217', 'ESL00217', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1376438400, 0, 1),
(220, 'Nurbiati', 1, NULL, NULL, 1, 'ESL00218', 'ESL00218', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1376438400, 0, 1),
(221, 'Nurbina', 1, NULL, NULL, 1, 'ESL00219', 'ESL00219', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1376524800, 0, 1),
(222, 'Irwan', 1, NULL, NULL, 1, 'ESL00220', 'ESL00220', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1376956800, 0, 1),
(223, 'Yossie', 1, NULL, NULL, 1, 'ESL00221', 'ESL00221', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1376956800, 0, 1),
(224, 'Nia', 1, NULL, NULL, 1, 'ESL00222', 'ESL00222', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1377043200, 0, 1),
(225, 'Tio', 2, NULL, NULL, 1, 'ESL00223', 'ESL00223', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1377043200, 0, 1),
(226, 'Neneng', 1, NULL, NULL, 1, 'ESL00224', 'ESL00224', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1377129600, 0, 1),
(227, 'Linda', 1, NULL, NULL, 1, 'ESL00225', 'ESL00225', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1377216000, 0, 1),
(228, 'Magdalena', 1, NULL, NULL, 1, 'ESL00226', 'ESL00226', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1377216000, 0, 1),
(229, 'Ira', 1, NULL, NULL, 1, 'ESL00227', 'ESL00227', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1377216000, 0, 1),
(230, 'Maria Magdalena', 1, NULL, NULL, 1, 'ESL00228', 'ESL00228', '', '0000-00-00', 'jl.manggis blok a gg.vi/1 koja', '', '', '*08158317653', '', '', '', '', '', 0, 1, 5, 1377734400, 0, 1),
(231, 'Yoke', 1, NULL, NULL, 1, 'ESL00229', 'ESL00229', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1377820800, 0, 1),
(232, 'Sukma Ningrum', 1, NULL, NULL, 1, 'ESL00230', 'ESL00230', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1377907200, 0, 1),
(233, 'Irwan', 2, NULL, NULL, 1, 'ESL00231', 'ESL00231', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1360368000, 0, 1),
(234, 'Julius', 1, NULL, NULL, 1, 'ESL00232', 'ESL00232', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1368057600, 0, 1),
(235, 'Rita', 1, NULL, NULL, 1, 'ESL00233', 'ESL00233', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1370736000, 0, 1),
(236, 'Deny Prasetya', 2, NULL, NULL, 1, 'ESL00234', 'ESL00234', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1370736000, 0, 1),
(237, 'Natal', 1, NULL, NULL, 1, 'ESL00235', 'ESL00235', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1373328000, 0, 1),
(238, 'Arie Hindriastiwi', 1, NULL, NULL, 1, 'ESL00236', 'ESL00236', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1378684800, 0, 1),
(239, 'Ganesh', 2, NULL, NULL, 1, 'ESL00237', 'ESL00237', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381276800, 0, 1),
(240, 'Novi', 1, NULL, NULL, 1, 'ESL00238', 'ESL00238', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381276800, 0, 1),
(241, 'Suzan ', 1, NULL, NULL, 1, 'ESL00239', 'ESL00239', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1383955200, 0, 1),
(242, 'Sri Astuti', 1, NULL, NULL, 1, 'ESL00240', 'ESL00240', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1383955200, 0, 1),
(243, 'Asnawati', 1, NULL, NULL, 1, 'ESL00241', 'ESL00241', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379289600, 0, 1),
(244, 'Jinny', 1, NULL, NULL, 1, 'ESL00242', 'ESL00242', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379462400, 0, 1),
(245, 'Ellen', 1, NULL, NULL, 1, 'ESL00243', 'ESL00243', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379462400, 0, 1),
(246, 'Siauw Eka Hartini', 1, NULL, NULL, 1, 'ESL00244', 'ESL00244', '', '0000-00-00', 'jl.taman sari x /28 jakbar', '', '', '', '', '', '', '', '', 0, 1, 5, 1379462400, 0, 1),
(247, 'Nina Silvia', 1, NULL, NULL, 1, 'ESL00245', 'ESL00245', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379462400, 0, 1),
(248, 'Katrina', 1, NULL, NULL, 1, 'ESL00246', 'ESL00246', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379462400, 0, 1),
(249, 'Monica', 1, NULL, NULL, 1, 'ESL00247', 'ESL00247', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379462400, 0, 1),
(250, 'Elin', 1, NULL, NULL, 1, 'ESL00248', 'ESL00248', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379548800, 0, 1),
(251, 'Donna', 1, NULL, NULL, 1, 'ESL00249', 'ESL00249', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379548800, 0, 1),
(252, 'Lita', 1, NULL, NULL, 1, 'ESL00250', 'ESL00250', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379635200, 0, 1),
(253, 'Jackson', 2, NULL, NULL, 1, 'ESL00251', 'ESL00251', '', '0000-00-00', 'jl. Ry boulevard BrT EVIn Grde 31 h apartemen moi', '', '', '*0859597211998', '', '', '', '', '', 0, 1, 5, 1326067200, 0, 1),
(254, 'Emi', 1, NULL, NULL, 1, 'ESL00252', 'ESL00252', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379721600, 0, 1),
(255, 'Prita', 1, NULL, NULL, 1, 'ESL00253', 'ESL00253', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379721600, 0, 1),
(256, 'Gaby', 1, NULL, NULL, 1, 'ESL00254', 'ESL00254', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379894400, 0, 1),
(257, 'Lasni', 1, NULL, NULL, 1, 'ESL00255', 'ESL00255', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379980800, 0, 1),
(258, 'Phang Shanny', 1, NULL, NULL, 1, 'ESL00256', 'ESL00256', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1379980800, 0, 1),
(259, 'Lina', 1, NULL, NULL, 1, 'ESL00257', 'ESL00257', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380067200, 0, 1),
(260, 'Yolana', 1, NULL, NULL, 1, 'ESL00258', 'ESL00258', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380067200, 0, 1),
(261, 'Happy', 1, NULL, NULL, 1, 'ESL00259', 'ESL00259', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380067200, 0, 1),
(262, 'Ellice surjana', 1, NULL, NULL, 1, 'ESL00260', 'ESL00260', '', '0000-00-00', 'jl. Mangga besar iv e / 26d taman sari', '', '', '*087877190028', '', '', '', '', '', 0, 1, 5, 1380067200, 0, 1),
(263, 'Sisca Widjaja', 1, NULL, NULL, 1, 'ESL00261', 'ESL00261', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380240000, 0, 1),
(264, 'Windy', 1, NULL, NULL, 1, 'ESL00262', 'ESL00262', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380326400, 0, 1),
(265, 'Lini Widjaja', 1, NULL, NULL, 1, 'ESL00263', 'ESL00263', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380326400, 0, 1),
(266, 'Ratna', 1, NULL, NULL, 1, 'ESL00264', 'ESL00264', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380326400, 0, 1),
(267, 'Santi', 1, NULL, NULL, 1, 'ESL00265', 'ESL00265', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380499200, 0, 1),
(268, 'Aneke', 1, NULL, NULL, 1, 'ESL00266', 'ESL00266', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380499200, 0, 1),
(269, 'Deliana', 1, NULL, NULL, 1, 'ESL00267', 'ESL00267', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1380499200, 0, 1),
(270, 'Gaby', 1, NULL, NULL, 1, 'ESL00268', 'ESL00268', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1357776000, 0, 1),
(271, 'Chyntia', 1, NULL, NULL, 1, 'ESL00269', 'ESL00269', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1362873600, 0, 1),
(272, 'YuliTA ', 1, NULL, NULL, 1, 'ESL00270', 'ESL00270', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1373414400, 0, 1),
(273, 'Lina Mulia', 1, NULL, NULL, 1, 'ESL00271', 'ESL00271', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1376092800, 0, 1),
(274, 'Susan Langer', 1, NULL, NULL, 1, 'ESL00272', 'ESL00272', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1378771200, 0, 1),
(275, 'KAtrina', 1, NULL, NULL, 1, 'ESL00273', 'ESL00273', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381363200, 0, 1),
(276, 'Ong Siat Wui', 1, NULL, NULL, 1, 'ESL00274', 'ESL00274', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1384041600, 0, 1),
(277, 'Echa', 1, NULL, NULL, 1, 'ESL00275', 'ESL00275', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381708800, 0, 1),
(278, 'Vitria ', 1, NULL, NULL, 1, 'ESL00276', 'ESL00276', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1381881600, 0, 1),
(279, 'Herlantini', 1, NULL, NULL, 1, 'ESL00277', 'ESL00277', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 1, 5, 1382054400, 0, 1),
(280, '', 0, 0, NULL, 0, 'ESL00278', 'ESL00278', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_id_card`
--

CREATE TABLE IF NOT EXISTS `esc_id_card` (
  `id_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_card` varchar(20) NOT NULL,
  PRIMARY KEY (`id_card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `esc_id_card`
--

INSERT INTO `esc_id_card` (`id_card_id`, `id_card`) VALUES
(1, 'Resident ID Card'),
(2, 'Passport');

-- --------------------------------------------------------

--
-- Table structure for table `esc_io`
--

CREATE TABLE IF NOT EXISTS `esc_io` (
  `io_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `from` int(11) NOT NULL DEFAULT '0',
  `to` int(11) NOT NULL DEFAULT '0',
  `suplier` int(11) NOT NULL DEFAULT '0',
  `note` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_deliver` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`io_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `esc_io`
--

INSERT INTO `esc_io` (`io_id`, `description`, `from`, `to`, `suplier`, `note`, `date`, `date_deliver`, `user_id`, `created`, `changed`, `status`) VALUES
(5, 'dsad', 0, 1, 1, '13-00001', '2013-11-25', NULL, 1, 1385365630, 1385365630, 1),
(6, 'dasdsad', 1, 3, 0, '13-00006', '2013-11-25', '0000-00-00', 1, 1385365659, 1385365671, 1),
(7, 'dsad', 3, 1, 0, '13-00007', '2013-11-25', '0000-00-00', 1, 1385365716, 1385365916, 1),
(8, 'fdaf', 0, 1, 2, '14-00008', '2014-02-17', NULL, 2, 1392622745, 1392622745, 1),
(9, 'dfa', 0, 1, 1, '14-00009', '2014-02-24', NULL, 2, 1392622793, 1392622793, 1),
(10, 'tes hasan', 0, 1, 2, '14-000010', '2014-02-18', NULL, 2, 1392738185, 1392738185, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_io_detail`
--

CREATE TABLE IF NOT EXISTS `esc_io_detail` (
  `io_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `io_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_deliver` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`io_detail_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `esc_io_detail`
--

INSERT INTO `esc_io_detail` (`io_detail_id`, `io_id`, `product_id`, `quantity`, `quantity_deliver`) VALUES
(6, 5, 410, 10, 0),
(7, 6, 410, 2, 2),
(8, 7, 410, 1, 1),
(9, 8, 425, 15, 0),
(10, 9, 406, 15, 0),
(11, 9, 409, 22, 0),
(12, 10, 406, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `esc_marital_status`
--

CREATE TABLE IF NOT EXISTS `esc_marital_status` (
  `marital_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `marital_status` varchar(10) NOT NULL,
  PRIMARY KEY (`marital_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `esc_marital_status`
--

INSERT INTO `esc_marital_status` (`marital_status_id`, `marital_status`) VALUES
(1, 'Married'),
(2, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `esc_mesin`
--

CREATE TABLE IF NOT EXISTS `esc_mesin` (
  `mesin_id` int(11) NOT NULL AUTO_INCREMENT,
  `mesin_number` varchar(10) NOT NULL,
  `mesin_name` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`mesin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `esc_mesin`
--

INSERT INTO `esc_mesin` (`mesin_id`, `mesin_number`, `mesin_name`, `description`, `image`, `user_id`, `created`, `changed`, `active`) VALUES
(1, 'KG-ULT', 'ULTRASOUND', 'ULTRASOUND', 'upload/Chrysanthemum46.jpg', 1, 1378097420, 1378097420, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_mesin_detail`
--

CREATE TABLE IF NOT EXISTS `esc_mesin_detail` (
  `mesin_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `mesin_code` varchar(10) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `date` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`mesin_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `esc_mesin_detail`
--

INSERT INTO `esc_mesin_detail` (`mesin_detail_id`, `mesin_code`, `branch_id`, `date`, `user_id`, `created`, `changed`, `active`) VALUES
(1, 'KG-ULT', 0, 'upload/Chrysanthemum46.jpg', 1, 1378097420, 1378097420, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_nationality`
--

CREATE TABLE IF NOT EXISTS `esc_nationality` (
  `nationality_id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality` varchar(20) NOT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `esc_nationality`
--

INSERT INTO `esc_nationality` (`nationality_id`, `nationality`) VALUES
(1, 'Indonesia'),
(2, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `esc_order`
--

CREATE TABLE IF NOT EXISTS `esc_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(10) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esc_procedure`
--

CREATE TABLE IF NOT EXISTS `esc_procedure` (
  `procedure_id` int(11) NOT NULL AUTO_INCREMENT,
  `procedure_number` varchar(20) NOT NULL,
  `procedure_name` varchar(100) NOT NULL,
  PRIMARY KEY (`procedure_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `esc_procedure`
--

INSERT INTO `esc_procedure` (`procedure_id`, `procedure_number`, `procedure_name`) VALUES
(1, 'procedur01', 'injection ');

-- --------------------------------------------------------

--
-- Table structure for table `esc_product`
--

CREATE TABLE IF NOT EXISTS `esc_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_number` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` text,
  `price` int(11) NOT NULL,
  `price_net` int(11) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `unit_homecare` int(11) NOT NULL,
  `unit_cabin` int(11) DEFAULT NULL,
  `netto` decimal(6,2) DEFAULT '0.00',
  `treatment` tinyint(4) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `discount` int(4) DEFAULT NULL,
  `discount_rp` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=612 ;

--
-- Dumping data for table `esc_product`
--

INSERT INTO `esc_product` (`product_id`, `product_number`, `product_name`, `description`, `price`, `price_net`, `image`, `unit_homecare`, `unit_cabin`, `netto`, `treatment`, `date_start`, `date_end`, `discount`, `discount_rp`, `user_id`, `created`, `changed`, `active`) VALUES
(406, 'RET 0007', 'Reticon T2', NULL, 890000, 890000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(407, 'RET 0009', 'Reticon T5', NULL, 890000, 890000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(408, 'RET 0010', 'Super Reticon', NULL, 1500000, 1500000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(409, 'RET 0011', 'FLOXIA', NULL, 590000, 590000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(410, 'ACT 0026', 'ACT G3 ', '', 3000000, 3000000, 'upload/1601563_625038454211703_2100336117_n.jpg', 6, NULL, '50.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 2, 1, 1392622699, 1),
(411, 'CBON 001', 'C''bon DR Cleansing Oil (DR01)', NULL, 490000, 490000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(412, 'CBON 002', 'C''bon DR Mild Foam (DR02)', NULL, 490000, 490000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(413, 'CBON 003', 'C''bon DR Mild Lotion (DR03)', NULL, 490000, 490000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(414, 'CBON 004', 'C''bon DR Moisturizer (DR04)', NULL, 690000, 690000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(415, 'CBON 005', 'C''bon DR Serum HA (DR51)', NULL, 690000, 690000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(416, 'ESL0002', 'ESL Bio Firming Eye Essense', NULL, 590000, 590000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(417, 'ESL0003', 'Bio Hydro Gel', NULL, 590000, 590000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(418, 'ESL0004', 'Bio Exfoliating Acne Complex', NULL, 390000, 390000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(419, 'ESL0005', 'ESL Bio Rejuvenating Aqua', NULL, 690000, 690000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(420, 'ESL0006', 'ESL Bio Botullite Collagen Cream', NULL, 790000, 790000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(421, 'ESL0007', 'ESL Bio Perform Cleanser 2', NULL, 290000, 290000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(422, 'ESL0008', 'ESL Bio Balance T3 Toner', NULL, 290000, 290000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(423, 'ESL0009', 'ESL Bio Renewal Mild Peel', NULL, 590000, 590000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(424, 'ESL0010', 'ESL Bio Perform Cleanser 1', NULL, 290000, 290000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(425, 'ESL0011', 'ESL Bio Nutrient Night Cream', NULL, 890000, 890000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(426, 'ESL0012', 'ESL Bio Perform Acne Cleanser', NULL, 390000, 390000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(427, 'ESL0013', 'ESL Bio Defense UV Foundation (6B) Normal to Dry', NULL, 590000, 590000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(428, 'ESL0014', 'ESL Bio Balance Toner (Normal)', NULL, 290000, 290000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(429, 'ESL0015', 'ESL Bio Defense Sunscreen  SPF 60(6W) ', NULL, 590000, 590000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(430, 'ESL0016', 'Bio Pimple Lotion 2%', NULL, 290000, 290000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(431, 'ESL0017', 'ESL Bio Defense Sunscreen  SPF 60(6N) Normal to Oi', NULL, 590000, 590000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(432, 'ESL0018', 'ESL Botol Serum (ESL) / X Lift Serum', NULL, 790000, 790000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(433, 'ESL0023', 'Anti Acne 1, 15 ml', NULL, 500000, 500000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(434, 'ESL0024', 'Anti Acne 1, 1.5 ml', NULL, 500000, 500000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(435, 'ESL0025', 'Anti Acne 2, 15 ml', NULL, 500000, 500000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(436, 'ESL0026', 'Wrinkle Eraser, 15 ml', NULL, 700000, 700000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(437, 'ESL0027', 'Clear Flex (AM), 15 ml', NULL, 900000, 900000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(438, 'ESL0028', 'Clear Flex (PM), 15 ml', NULL, 900000, 900000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(439, 'ESL0029', 'Anti Acne Oral (Pills)', NULL, 100000, 100000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(440, 'ESL0030', 'Anti Acne Cream 1', NULL, 175000, 175000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(441, 'ESL0031', 'Anti Acne Cream 2', NULL, 175000, 175000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(442, 'MSR0006', 'Pure Hyaluronic Moisturizer (Putih Kecil)', NULL, 2500000, 2500000, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(443, 'MSR0010', 'Trepeptide-3 Collagen', NULL, 2500000, 2500000, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(444, 'MSR0011', 'Anti Dark Circle Eye Serum 2050''S', NULL, 1500000, 1500000, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(445, 'MSR0012', 'Steam Cell Serum', NULL, 2500000, 2500000, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(446, 'FCR0010', 'Fresh Caviar Moisturazing Cream (E.746)', NULL, 2500000, 2500000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(447, 'FCR0011', 'Fresh Caviar Nourishing Cream (E.747)', NULL, 2500000, 2500000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(448, 'FCR0012', 'Fresh Caviar Lifthing Cream (E.748)', NULL, 2500000, 2500000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(449, 'DNAV001', 'Cryo Hydration,30 ml (E.573)', NULL, 3000000, 3000000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(450, 'DNAV002', 'Cryo Lifting, 30 ml (E.574)', NULL, 3000000, 3000000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(451, 'DNAV005', 'Cryo Nutrition (E572)', NULL, 3000000, 3000000, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(452, 'OTR0029', 'Amino Collagen (Minuman)', NULL, 650000, 650000, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(453, 'OTR0031', 'Latise /Bulu mata', NULL, 2500000, 2500000, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(454, 'ACT 0024', 'ACT G5', NULL, 10800000, 10800000, '', 12, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(455, 'ACT 0025', 'ACT Whitening', NULL, 6000000, 6000000, '', 12, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(456, 'INJ 0001', 'Tationil', NULL, 5000000, 5000000, '', 4, NULL, NULL, 10, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(457, 'INJ 0002', 'Lascorbic Vit. C', NULL, 5000000, 5000000, '', 5, NULL, NULL, 10, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(458, 'INJ 0023', 'Genyal Polyvalent', NULL, 8000000, 8000000, '', 6, NULL, NULL, 1, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(459, 'INJ 0024', 'Genyal Volumae', NULL, 8000000, 8000000, '', 6, NULL, NULL, 1, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(460, 'INJ 0025', 'Genyalift (HA)', NULL, 8000000, 8000000, '', 6, NULL, NULL, 1, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(461, 'INJ 0026', 'Melsom Placenta (human)', NULL, 20000000, 20000000, '', 6, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(462, 'DML0001', 'ZTGS Roller 0,5 mm', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(463, 'DML0005', 'C.20 ', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(464, 'DML0007', 'Eutrosis', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(465, 'DML0009', 'Perasafe', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(466, 'DML0010', 'Collaform', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(467, 'DML0011', 'Mesologica Skin , 5ml', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(468, 'DML0012', 'Mesolift', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(469, 'DML0013', 'ZTGS Roller 1 mm (NEW)', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(470, 'DML0015', 'ZTGS Roller 1.5mm (NEW)', NULL, 7500000, 7500000, '', 8, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(471, 'MSR0001', 'Anti Darkcircles Treat (Hijau Pastel)', NULL, 4900000, 4900000, '', 6, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(472, 'MSR0002', 'Phoenix Mask With Vit. C (Ungu)', NULL, 4900000, 4900000, '', 6, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(473, 'MSR0003', 'Golden Mask Masque D''or 2050''s (Putih)', NULL, 10000000, 10000000, '', 6, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(474, 'MSR0004', 'Caviar Ginseng Treatment (Biru)', NULL, 10000000, 10000000, '', 6, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(475, 'MSR0005', 'Hydrating & Whitening Mask (Abu-Abu)', NULL, 4900000, 4900000, '', 6, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(476, 'MSR0007', 'Diamond Mask (Hitam)', NULL, 15000000, 15000000, '', 6, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(477, 'MSR0008', 'Super Whitening Mask 2050 (Hijau)', NULL, 4900000, 4900000, '', 6, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(478, 'CSM001', 'Rgenerin Mask/Tratamiento Rgnerin Inhibitor Contra', NULL, 12000000, 12000000, '', 12, NULL, NULL, 4, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(479, 'CSM002', 'Gold Mask/Skin Sensations Treatment (@10ampoule + ', NULL, 12000000, 12000000, '', 12, NULL, NULL, 4, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(480, 'FCR0008', 'Caviar Fresh Cells Treatment (E.520)', NULL, 10000000, 10000000, '', 12, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(481, 'FCR0009', 'Fresh Caviar Black Mask, 300 gram (E.523)', NULL, 10000000, 10000000, '', 10, NULL, NULL, 6, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(482, 'OTR0037', 'Beyond White Tooth Spa', NULL, 7500000, 7500000, '', 6, NULL, NULL, 5, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(483, 'ACT 0001', 'Bio Collagen for ACT', NULL, 0, 0, '', 8, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(484, 'ACT 0002', 'Anti Acne Gel  (AA Gel)', NULL, 0, 0, '', 7, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(485, 'ACT 0003', 'Face Mesolift (FM) Gel', NULL, 0, 0, '', 7, 4, '1.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(486, 'ACT 0004', 'Skin Lightening (SL)Gel', NULL, 0, 0, '', 7, 4, '1.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(487, 'ACT 0005', 'Anti Aging Facia  (FAA) Gel', NULL, 0, 0, '', 7, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(488, 'ACT 0006', 'Targeted Fat Reduction  (TFR) Gel', NULL, 0, 0, '', 7, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(489, 'ACT 0007', 'Rejuvanating Facial (FR) Gel', NULL, 0, 0, '', 7, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(490, 'ACT 0008', 'Hyaluronic Acid (HA)', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(491, 'ACT 0009', 'Ascorbic Acid Solution (AA)=Vit C', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(492, 'ACT 0010', 'Skin Brightening  (SB Gel)', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(493, 'ACT 0011', 'Lipolytic Solution(LS/LL)-Dermaheal', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(494, 'ACT 0012', 'Steam C''rum SR Powder', NULL, 0, 0, '', 4, 4, '1.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(495, 'ACT 0013', 'Steam C''rum SR Solution', NULL, 0, 0, '', 4, 4, '1.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(496, 'ACT 0014', 'Anti Aging Complex Type 1(AAC1)', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(497, 'ACT 0015', 'Skin Rejuvanating Solution(SR)', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(498, 'ACT 0016', 'Ginko Biloba Solution(GB)', NULL, 0, 0, '', 4, 4, '1.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(499, 'ACT 0017', 'CG-TGP2 Solution (Vit C Solution)', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(500, 'ACT 0018', 'Vit. C Powder', NULL, 0, 0, '', 4, 4, '6.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(501, 'ACT 0019', 'D-Biotin Solution(DB)', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(502, 'ACT 0020', 'Glycolic Acid Solution(GAS)', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(503, 'ACT 0021', 'Vitamin A Solution', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(504, 'ACT 0022', 'DC Dark Circle   (DC Gel)', NULL, 0, 0, '', 7, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(505, 'INJ 0003', 'Bio White or Bio G10', NULL, 0, 0, '', 4, 4, '2.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(506, 'INJ 0004', 'NaCl (Sodium Chloride), 500 ml', NULL, 0, 0, '', 7, 4, '500.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(507, 'INJ 0005', 'Bio A', NULL, 0, 0, '', 4, 4, '2.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(508, 'INJ 0006', 'Lipofit', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(509, 'INJ 0007 E', 'G7-Injex Powder Eye Bag', NULL, 0, 0, '', 4, 4, '2.60', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(510, 'INJ 0007 S', 'G7-Injex Powder Smiling Line', NULL, 0, 0, '', 4, 4, '2.30', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(511, 'INJ 0008', 'Bio Growth (BG) 3 ml', NULL, 0, 0, '', 4, 4, '3.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(512, 'INJ 0009', 'Bio Growth Powder', NULL, 0, 0, '', 4, 4, '3.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(513, 'INJ 0010', 'Bio Youth', NULL, 0, 0, '', 4, 4, '7.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(514, 'INJ 0011', 'Flamicort(Injex Acne)=Kenacort-1 Vial 5 ml', NULL, 0, 0, '', 4, 4, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(515, 'INJ 0013', 'Bio Face Lift (BFL) Powder', NULL, 0, 0, '', 4, 4, '2.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(516, 'INJ 0015', 'Lidocain HCL, 20 mg', NULL, 0, 0, '', 5, 4, '2.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(517, 'INJ 0018', 'Otsu D5 (G7 Solution)', NULL, 0, 0, '', 7, 4, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(518, 'INJ 0020', 'Water for Injection, 10 ml', NULL, 0, 0, '', 4, 4, '10.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(519, 'INJ 0021', 'Hydrocortisone', NULL, 0, 0, '', 13, 1, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(520, 'INJ 0027', 'Dexametasone Ampoule  (@ 5 Ampoule/Box )', NULL, 0, 0, '', 5, 4, '1.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(521, 'INJ 0028', 'Epinephrine Ampoule', NULL, 0, 0, '', 5, 4, '1.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(522, 'PHIL001', 'Philaroma Foaming Face Gel', NULL, 0, 0, '', 8, 4, '200.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(523, 'PHIL002', 'Philaroma Oxygenating Mask', NULL, 0, 0, '', 8, 4, '200.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(524, 'PHIL003', 'Philaroma Complex R-Firming ', NULL, 0, 0, '', 5, 4, '2.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(525, 'PHIL004', 'Philaroma Complex N-Nourishing ', NULL, 0, 0, '', 5, 4, '2.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(526, 'PHIL005', 'Philaroma Complex P-Purifying ', NULL, 0, 0, '', 5, 4, '2.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(527, 'PHIL006', 'Philaroma Doux Gentle Peeling/Soft Peeling', NULL, 0, 0, '', 8, 4, '250.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(528, 'PHIL008', 'Philaroma Whitening Mask', NULL, 0, 0, '', 8, 1, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(529, 'PHIL009', 'Philaroma Cranberry Mask(Sensitive Skin)', NULL, 0, 0, '', 8, 1, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(530, 'PHIL011', 'Philaroma Purifiying Cream', NULL, 0, 0, '', 8, 4, '250.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(531, 'PHIL012', 'Philaroma Calming Soothing Gel', NULL, 0, 0, '', 8, 4, '250.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(532, 'PHIL013', 'Philaroma Eye Gel (Gel Yeux)', NULL, 0, 0, '', 8, 4, '50.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(533, 'PHIL014', 'Philaroma Phase Mask', NULL, 0, 0, '', 8, 4, '250.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(534, 'PHIL015', 'Philaroma Eye Cream', NULL, 0, 0, '', 8, 4, '15.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(535, 'PHIL016', 'Philaroma Eye Mask', NULL, 0, 0, '', 8, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(536, 'PHIL018', 'Philaroma Energizing Mask (Masque Energie)', NULL, 0, 0, '', 8, 4, '250.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(537, 'PHIL019', 'Philaroma Hydra-Mat Cream', NULL, 0, 0, '', 8, 4, '250.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(538, 'PHIL020', 'Philaroma Hydra-Vitale Cream', NULL, 0, 0, '', 8, 4, '250.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(539, 'PHIL022', 'Philaroma Tea Tree Oil Anti Acne Mask', NULL, 0, 0, '', 8, 1, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(540, 'PHIL023', 'Philaroma Cleansing Milk (New)', NULL, 0, 0, '', 8, 4, '500.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(541, 'ESL0007', 'ESL Bio Perform Cleanser 2', NULL, 0, 0, '', 7, 4, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(542, 'ESL0010', 'ESL Bio Perform Cleanser 1', NULL, 0, 0, '', 7, 4, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(543, 'ESL0013', 'ESL Bio Defense UV Foundation (6B) Normal to Dry', NULL, 0, 0, '', 7, 4, '35.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(544, 'ESL0015', 'ESL Bio Defense Sunscreen  SPF 60(6W) ', NULL, 0, 0, '', 7, 4, '35.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(545, 'ESL0017', 'ESL Bio Defense Sunscreen  SPF 60(6N) Normal to Oi', NULL, 0, 0, '', 7, 4, '35.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(546, 'LING001', 'Sunblock u/ Chemical Peeling/SPF (pcs)', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(547, 'LING002', 'Soothing Balm u/ Chemical Peeling (pcs)', NULL, 0, 0, '', 8, 4, '59.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(548, 'LING003', 'ESL Peel Forte for Doctor Only', NULL, 0, 0, '', 7, 4, '59.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(549, 'LING004', 'PCA Peel with Hydroquinone & Recorcinol', NULL, 0, 0, '', 7, 4, '59.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(550, 'LING005', 'Ultra Peel I', NULL, 0, 0, '', 7, 4, '472.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(551, 'LING006', 'PCA Skin Smoothing Toner', NULL, 0, 0, '', 7, 4, '500.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(552, 'STY0003', 'Sothy''s Toner Oily (Purifying Lotion)', NULL, 0, 0, '', 7, 4, '500.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(553, 'STY0005', 'Sothy''s Normalizing Lotion ', NULL, 0, 0, '', 7, 4, '500.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(554, 'STY0006', 'Sothy''s Soothing Lotion ', NULL, 0, 0, '', 7, 1, '200.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(555, 'LTP0001', 'Latulipe Massage', NULL, 0, 0, '', 8, 1, '200.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(556, 'LTP0002', 'Latulipe Peeling', NULL, 0, 0, '', 8, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(557, 'LTP0003', 'Eye Make Up Remover', NULL, 0, 0, '', 8, 4, '2.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(558, 'FX001', 'Firming for RF fractional (2ml)', NULL, 0, 0, '', 4, 1, '250.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(559, 'FX002', 'Glycerine Gel for RF fractional', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(560, 'FX003', 'Brera Golden Crown Tips /Needle Tip for RF fractio', NULL, 0, 0, '', 8, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(561, 'OTR0001', 'Syringe with Needle 5 ml 22G x 1 1/2 mm', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(562, 'OTR0002', 'Meso-Relle 32 G Needle 4 mm ', NULL, 0, 0, '', 6, 2, '50.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(563, 'OTR0003', 'Face Mask (Masker Wajah)', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(564, 'OTR0004', 'Alkhol Pad / Alkohol Swab', NULL, 0, 0, '', 6, 3, '12.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(565, 'OTR0005', 'Kain Kassa', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(566, 'OTR0006', 'Terumo Syringe wiith Needle 10 ml 21Gx1 1/2 mm', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(567, 'OTR0007', 'Terumo Winged Infusion Set 27Gx1/2 mm', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(568, 'OTR0008', 'Sensi Gloves(M)', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(569, 'OTR0009', 'Sensi Gloves(S)', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(570, 'OTR0010', 'Meso-Relle 32 G Needle 12 mm ', NULL, 0, 0, '', 6, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(571, 'OTR0012', 'Medi Facial Botox Like', NULL, 0, 0, '', 8, 4, '30.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(572, 'OTR0014', 'Medi Facial Hyaluronic Acid', NULL, 0, 0, '', 8, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(573, 'OTR0015', 'Syringe with Needle 1 ml 26G x 1 1/2 mm', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(574, 'OTR0016', 'Syringe with Needle 3 ml 23G x 1 1/4 mm', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(575, 'OTR0019', 'Needle 20G x 1 1/2" (0.90 x 38 mm)', NULL, 0, 0, '', 6, 2, '7.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(576, 'OTR0027', 'Panty Line', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(577, 'OTR0028', 'Terumo Needle 25G x 1 mm', NULL, 0, 0, '', 6, 4, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(578, 'OTR0034', 'Alkohol 1 Lt', NULL, 0, 0, '', 7, 4, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(579, 'OTR0035', 'Aquades', NULL, 0, 0, '', 7, 4, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(580, 'OTR0036', 'Bethadine 1 Lt', NULL, 0, 0, '', 7, 1, '15.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(581, 'OTR0038', 'Bioplacenton 15gr', NULL, 0, 0, '', 13, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(582, 'OTR0040', 'Dispoface', NULL, 0, 0, '', 12, 1, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(583, 'OTR0044', 'Emla', NULL, 0, 0, '', 13, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(584, 'OTR0045', 'Finger Gloves', NULL, 0, 0, '', 12, 1, '15.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(585, 'OTR0046', 'Garamycin Cream 15 gr', NULL, 0, 0, '', 13, 1, '5.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(586, 'OTR0047', 'Garamycin Cream 5 gr', NULL, 0, 0, '', 13, 4, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(587, 'OTR0048', 'Glyserin 1 Lt', NULL, 0, 0, '', 7, 2, '50.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(588, 'OTR0049', 'Hand Scoon Steril', NULL, 0, 0, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(589, 'OTR0050', 'Kuas Body', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(590, 'OTR0051', 'Kuas Masker', NULL, 0, 0, '', 8, 2, '12.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(591, 'OTR0053', 'Micropore 1 inchi', NULL, 0, 0, '', 6, 2, '24.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(592, 'OTR0054', 'Micropore 1/2 inchi', NULL, 0, 0, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(593, 'OTR0055', 'Pencetan Jerawat', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(594, 'OTR0056', 'Pinset', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(595, 'OTR0057', 'Pisau Cukur', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(596, 'OTR0058', 'Pisau Cukur Alis', NULL, 0, 0, '', 8, 4, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(597, 'OTR0059', 'Rose Water', NULL, 0, 0, '', 7, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(598, 'OTR0060', 'Shower Cap', NULL, 0, 0, '', 6, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(599, 'OTR0061', 'Sikat Gigi', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(600, 'OTR0062', 'Sisir', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(601, 'OTR0063', 'Spatula', NULL, 0, 0, '', 8, 1, '400.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(602, 'OTR0064', 'Tabung Micro (Corondum Crystal)', NULL, 0, 0, '', 9, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(603, 'OTR0065', 'Terumo Needle 21G x 1 1/2"', NULL, 0, 0, '', 6, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(604, 'OTR0066', 'Terumo Needle 30G x 1/2"', NULL, 0, 0, '', 6, 1, '20.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(605, 'OTR0067', 'Trombopop Gel', NULL, 0, 0, '', 13, 4, '500.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(606, 'OTR0068', 'Ultrasound (Aquasonic) Gel 5 Lt', NULL, 0, 0, '', 11, 2, '144.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(607, 'OTR0077', 'Kapas', NULL, 0, 0, '', 8, 2, '100.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(608, 'OTR0078', 'Cotton Bud', NULL, 0, 0, '', 12, 4, '150.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(609, 'OTR0079', 'Phytomer Exfoliant Enzymatique', NULL, 0, 0, '', 13, 1, '20.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(610, 'OTR0081', 'Masker RF Face & Neck (20gr)', NULL, 0, 0, '', 8, 1, '10.00', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1),
(611, 'OTR0082', 'Masker RF Eye (10gr)', NULL, 0, 0, '', 8, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_product_detail`
--

CREATE TABLE IF NOT EXISTS `esc_product_detail` (
  `product_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `productset_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_detail_id`),
  KEY `productset` (`productset_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esc_product_stock`
--

CREATE TABLE IF NOT EXISTS `esc_product_stock` (
  `product__stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  PRIMARY KEY (`product__stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `esc_product_stock`
--

INSERT INTO `esc_product_stock` (`product__stock_id`, `product_id`, `branch_id`, `quantity`, `changed`) VALUES
(7, 410, 1, 9, 1385365916),
(8, 410, 3, 1, 1385365671),
(9, 425, 1, 15, 1392622745),
(10, 406, 1, 27, 1392738185),
(11, 409, 1, 22, 1392622793);

-- --------------------------------------------------------

--
-- Table structure for table `esc_profiles`
--

CREATE TABLE IF NOT EXISTS `esc_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `address` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `branch_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `esc_profiles`
--

INSERT INTO `esc_profiles` (`user_id`, `name`, `dob`, `address`, `phone`, `branch_id`) VALUES
(1, 'Administrator', '0000-00-00', '', '', 1),
(2, 'Accounting ', '0000-00-00', '', '', 1),
(3, 'Inventory', '0000-00-00', '', '', 2),
(4, 'Service', '0000-00-00', '', '', 0),
(5, 'Consultant', '0000-00-00', '', '', 1),
(6, 'Cashier', '0000-00-00', '', '', 0),
(7, 'Service Manager', '0000-00-00', '', '', 0),
(8, 'KG Inventory', '0000-00-00', '', '', 3),
(9, 'Frontdesk', '0000-00-00', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `esc_profiles_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` text,
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` text,
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `esc_profiles_fields`
--

INSERT INTO `esc_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'name', 'Name', 'VARCHAR', 255, 3, 2, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(3, 'dob', 'Birthdate', 'DATE', 0, 0, 3, '', '', '', '', '0000-00-00', '', '', 0, 0),
(4, 'address', 'Address', 'VARCHAR', 255, 0, 3, '', '', '', '', '', '', '', 0, 0),
(6, 'phone', 'Phone Number', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 0, 0),
(7, 'branch_id', 'Branch', 'INTEGER', 11, 0, 3, '', '', '', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `esc_promo`
--

CREATE TABLE IF NOT EXISTS `esc_promo` (
  `promo_id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_number` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `price` int(11) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `division` varchar(5) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `discount` int(4) DEFAULT NULL,
  `discount_rp` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`promo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `esc_promo`
--

INSERT INTO `esc_promo` (`promo_id`, `promo_number`, `name`, `description`, `price`, `image`, `division`, `date_start`, `date_end`, `discount`, `discount_rp`, `type`, `user_id`, `created`, `changed`, `active`) VALUES
(7, 'P01', 'Test', 'dfdsfdsf', 10000, NULL, 'esc', '2013-11-13', '2013-11-30', 10, 100, 'product', 1, 1384344895, 1384344895, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_promo_product`
--

CREATE TABLE IF NOT EXISTS `esc_promo_product` (
  `promo_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`promo_product_id`),
  KEY `productset` (`promo_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `esc_promo_product`
--

INSERT INTO `esc_promo_product` (`promo_product_id`, `promo_id`, `product_id`, `quantity`) VALUES
(1, 5, 5, 1),
(2, 5, 6, 1),
(3, 6, 8, 2),
(4, 7, 410, 10);

-- --------------------------------------------------------

--
-- Table structure for table `esc_promo_treatment`
--

CREATE TABLE IF NOT EXISTS `esc_promo_treatment` (
  `promo_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`promo_product_id`),
  KEY `productset` (`promo_id`),
  KEY `product` (`treatment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `esc_promo_treatment`
--

INSERT INTO `esc_promo_treatment` (`promo_product_id`, `promo_id`, `treatment_id`, `quantity`) VALUES
(3, 3, 2, 1),
(4, 3, 5, 1),
(5, 6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `esc_room`
--

CREATE TABLE IF NOT EXISTS `esc_room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `room_name` varchar(40) DEFAULT NULL,
  `description` text,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`room_id`),
  KEY `branch_id` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `esc_room`
--

INSERT INTO `esc_room` (`room_id`, `branch_id`, `room_number`, `room_name`, `description`, `user_id`, `created`, `changed`, `active`) VALUES
(1, 1, 'R01', 'Rooom', '', 1, 1375016245, 1375016245, 1),
(2, 1, 'R02', 'Test Room', 'fdafdsa', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_room_treatment`
--

CREATE TABLE IF NOT EXISTS `esc_room_treatment` (
  `room_treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  PRIMARY KEY (`room_treatment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `esc_room_treatment`
--

INSERT INTO `esc_room_treatment` (`room_treatment_id`, `room_id`, `treatment_id`) VALUES
(1, 1, 10),
(10, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `esc_schedule_room`
--

CREATE TABLE IF NOT EXISTS `esc_schedule_room` (
  `schedule_room_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date_t` date NOT NULL,
  `time_t` time NOT NULL,
  `duration` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `changed` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`schedule_room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `esc_schedule_room`
--

INSERT INTO `esc_schedule_room` (`schedule_room_id`, `branch_id`, `room_id`, `client_id`, `date_t`, `time_t`, `duration`, `end_time`, `user_id`, `status`, `changed`, `created`) VALUES
(1, 1, 1, 3, '2014-02-26', '08:00:00', '03:00:00', '11:00:00', 1, 2, 1, 1),
(3, 1, 1, 8, '2014-02-24', '11:00:00', '01:00:00', '12:00:00', 1, 3, 1, 1),
(4, 1, 1, 3, '2014-02-26', '12:00:00', '02:00:00', '14:00:00', 9, 1, 1393358676, 1393358676),
(7, 1, 1, 25, '2014-02-26', '15:00:00', '03:00:00', '18:00:00', 9, 1, 1393359709, 1393359709);

-- --------------------------------------------------------

--
-- Table structure for table `esc_sex`
--

CREATE TABLE IF NOT EXISTS `esc_sex` (
  `sex_id` int(11) NOT NULL AUTO_INCREMENT,
  `sex_code` varchar(6) NOT NULL,
  `sex` varchar(10) NOT NULL,
  PRIMARY KEY (`sex_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `esc_sex`
--

INSERT INTO `esc_sex` (`sex_id`, `sex_code`, `sex`) VALUES
(1, 'F', 'Female'),
(2, 'M', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `esc_source_info`
--

CREATE TABLE IF NOT EXISTS `esc_source_info` (
  `source_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `source_info` varchar(50) NOT NULL,
  PRIMARY KEY (`source_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `esc_source_info`
--

INSERT INTO `esc_source_info` (`source_info_id`, `source_info`) VALUES
(1, 'Magazine'),
(2, 'Newspaper'),
(3, 'Newspaper'),
(4, 'From event'),
(5, 'Just walk in');

-- --------------------------------------------------------

--
-- Table structure for table `esc_supplier`
--

CREATE TABLE IF NOT EXISTS `esc_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_number` varchar(10) NOT NULL,
  `supplier_name` varchar(40) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `ot_start` time NOT NULL,
  `description` text,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `esc_supplier`
--

INSERT INTO `esc_supplier` (`supplier_id`, `supplier_number`, `supplier_name`, `address`, `phone`, `fax`, `ot_start`, `description`, `user_id`, `created`, `changed`, `active`) VALUES
(1, 'S01', 'Supplier', 'Jakarta', '1234', '123', '08:30:00', '', 1, 1374990309, 1374990309, 1),
(2, 'S02', 'Supplier2', NULL, NULL, NULL, '00:00:00', NULL, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_treatment`
--

CREATE TABLE IF NOT EXISTS `esc_treatment` (
  `treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_number` varchar(10) NOT NULL,
  `treatment_name` varchar(40) NOT NULL,
  `description` text,
  `duration` time NOT NULL,
  `price` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`treatment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `esc_treatment`
--

INSERT INTO `esc_treatment` (`treatment_id`, `treatment_number`, `treatment_name`, `description`, `duration`, `price`, `point`, `user_id`, `created`, `changed`, `active`) VALUES
(10, 'RFT', 'RECOVERY FACIAL TREATMENT', 'Perawatan wajah untuk kulit  sensitive dan kulit yang sangat kering mudah iritasi dan kemerahan, yang berfungsi memperbaiki kelembapan pada kulit kering. Memperbaiki serabut kolagen dan dapat mencerahkan kulit serta mampu menenangkan dan mengembalikan kulit pada keadaan normal .', '01:30:00', 1000000, 10, 1, 1385422639, 1385422639, 1),
(11, 'RTT', 'Testing Treatment', 'dfaafs', '02:00:00', 100000, 500, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_treatmentpackage`
--

CREATE TABLE IF NOT EXISTS `esc_treatmentpackage` (
  `treatmentpackage_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatmentpackage_number` varchar(10) NOT NULL,
  `treatmentpackage_name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`treatmentpackage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `esc_treatmentpackage`
--

INSERT INTO `esc_treatmentpackage` (`treatmentpackage_id`, `treatmentpackage_number`, `treatmentpackage_name`, `price`, `division_id`, `user_id`, `created`, `changed`, `active`) VALUES
(1, 'TP01', 'Name', 10000000, 1, 2, 1375069630, 1375069630, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_treatmentpackage_detail`
--

CREATE TABLE IF NOT EXISTS `esc_treatmentpackage_detail` (
  `treatmentpackage_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatmentpackage_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`treatmentpackage_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `esc_treatmentpackage_detail`
--

INSERT INTO `esc_treatmentpackage_detail` (`treatmentpackage_detail_id`, `treatmentpackage_id`, `treatment_id`, `quantity`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `esc_treatment_detail`
--

CREATE TABLE IF NOT EXISTS `esc_treatment_detail` (
  `treatment_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_id` varchar(10) NOT NULL,
  PRIMARY KEY (`treatment_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esc_treatment_procedure`
--

CREATE TABLE IF NOT EXISTS `esc_treatment_procedure` (
  `treatment_procedure_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text,
  `sortOrder` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`treatment_procedure_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `esc_treatment_procedure`
--

INSERT INTO `esc_treatment_procedure` (`treatment_procedure_id`, `treatment_id`, `title`, `description`, `sortOrder`, `user_id`, `created`, `changed`, `active`) VALUES
(10, 0, 'RECOVERY FACIAL TREATMENT', 'Perawatan wajah untuk kulit  sensitive dan kulit yang sangat kering mudah iritasi dan kemerahan, yang berfungsi memperbaiki kelembapan pada kulit kering. Memperbaiki serabut kolagen dan dapat mencerahkan kulit serta mampu menenangkan dan mengembalikan kulit pada keadaan normal .', 0, 1, 1385422639, 1385422639, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_treatment_product`
--

CREATE TABLE IF NOT EXISTS `esc_treatment_product` (
  `treatment_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`treatment_product_id`),
  KEY `productset` (`treatment_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esc_unit`
--

CREATE TABLE IF NOT EXISTS `esc_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_code` varchar(10) NOT NULL,
  `unit_name` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `esc_unit`
--

INSERT INTO `esc_unit` (`unit_id`, `unit_code`, `unit_name`, `type`, `user_id`, `created`, `changed`, `active`) VALUES
(1, 'gram', 'gram', 'cabin', 1, 1, 0, 1),
(2, 'pcs', 'pcs', 'cabin', 1, 1, 0, 1),
(3, 'lembar', 'lembar', 'cabin', 1, 1, 0, 1),
(4, 'ml', 'ml', 'cabin', 1, 1, 0, 1),
(5, 'ampul', 'ampul', 'homecare', 1, 1, 0, 1),
(6, 'box', 'box', 'homecare', 1, 1, 0, 1),
(7, 'btl', 'btl', 'homecare', 1, 1, 0, 1),
(8, 'pcs', 'pcs', 'homecare', 1, 1, 0, 1),
(9, 'set', 'set', 'homecare', 1, 1, 0, 1),
(10, 'ball', 'ball', 'homecare', 1, 1, 0, 1),
(11, 'dirigen\r\n', 'dirigen\r\n', 'homecare', 1, 1, 0, 1),
(12, 'pack', 'pack', 'homecare', 1, 1, 0, 1),
(13, 'tube', 'tube', 'homecare', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esc_users`
--

CREATE TABLE IF NOT EXISTS `esc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username` (`username`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `esc_users`
--

INSERT INTO `esc_users` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`, `create_at`, `lastvisit_at`) VALUES
(1, 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '535bbe6d8aae83e33dbaa5fbb5b25f37', 1, 1, '2013-02-15 11:12:03', '2014-02-25 19:07:36'),
(2, 'accounting', 'fe01ce2a7fbac8fafaed7c982a04e229', 'accounting@esc.com', '0ee28cc79b8599683c6f8f0ba1702a98', 0, 1, '2013-02-17 23:03:10', '2014-02-25 14:39:11'),
(3, 'inventory', 'fe01ce2a7fbac8fafaed7c982a04e229', 'inventory@esc.com', '140d0b164358f904d5200314e6b8d535', 0, 1, '2013-04-28 23:21:32', '2014-02-19 19:38:57'),
(4, 'service', 'fe01ce2a7fbac8fafaed7c982a04e229', 'service@korrner.co.id', 'b75cbeb4bc50910143d5919ddfa96458', 0, 1, '2013-04-29 00:37:10', '2014-01-24 05:52:48'),
(5, 'consultant', 'fe01ce2a7fbac8fafaed7c982a04e229', 'consultant@korrner.co.id', 'ed10df6c66f569df2f595b9353e503ac', 0, 1, '2013-04-29 01:20:21', '2014-02-20 17:54:56'),
(6, 'cashier', 'fe01ce2a7fbac8fafaed7c982a04e229', 'cashier@korrner.co.id', '97053ac12963497b5a9b8f1b363affc0', 0, 1, '2013-05-13 00:06:19', '2014-01-24 05:47:43'),
(7, 'servicemanager', 'fe01ce2a7fbac8fafaed7c982a04e229', 'servicemanager@korrner.co.id', '013c6bacdcf5c7056fd70e51fd544ae5', 0, 1, '2013-05-20 03:14:09', '2014-01-24 05:48:22'),
(8, 'kg_inventory', 'fe01ce2a7fbac8fafaed7c982a04e229', 'kg_inventory@esl.com', '4a3fec52e582fa23e00f5990294e8db7', 0, 1, '2013-11-13 13:20:56', '2014-01-24 05:48:58'),
(9, 'frontdesk', 'fe01ce2a7fbac8fafaed7c982a04e229', 'frontdesk@korrner.co.id', 'bfaadd794f61c1db6429feab970db7c0', 0, 1, '2014-01-24 07:25:30', '2014-02-25 18:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `order_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`itemname`, `type`, `weight`) VALUES
('Accounting', 2, 0),
('Administrator', 2, 1),
('Cashier', 2, 2),
('Consultant', 2, 3),
('Frontdesk', 2, 6),
('Inventory', 2, 4),
('Service and Treatment Manager', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1360926703),
('m110805_153437_installYiiUser', 1360926723),
('m110810_162301_userTimestampFix', 1360926724);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_machine`
--

CREATE TABLE IF NOT EXISTS `treatment_machine` (
  `treatment_machine_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  PRIMARY KEY (`treatment_machine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `esc_profiles`
--
ALTER TABLE `esc_profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `esc_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `esc_room`
--
ALTER TABLE `esc_room`
  ADD CONSTRAINT `branch_id` FOREIGN KEY (`branch_id`) REFERENCES `esc_branch` (`branch_id`) ON DELETE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
