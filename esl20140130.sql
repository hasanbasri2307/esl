/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : esl

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-01-30 08:19:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authassignment`
-- ----------------------------
DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of authassignment
-- ----------------------------
INSERT INTO `authassignment` VALUES ('Accounting', '2', null, 'N;');
INSERT INTO `authassignment` VALUES ('Administrator', '1', null, 'N;');
INSERT INTO `authassignment` VALUES ('Cashier', '6', null, 'N;');
INSERT INTO `authassignment` VALUES ('Consultant', '5', null, 'N;');
INSERT INTO `authassignment` VALUES ('Frontdesk', '9', null, 'N;');
INSERT INTO `authassignment` VALUES ('Inventory', '3', null, 'N;');
INSERT INTO `authassignment` VALUES ('Inventory', '8', null, 'N;');
INSERT INTO `authassignment` VALUES ('Service and Treatment Manager', '4', null, 'N;');

-- ----------------------------
-- Table structure for `authitem`
-- ----------------------------
DROP TABLE IF EXISTS `authitem`;
CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of authitem
-- ----------------------------
INSERT INTO `authitem` VALUES ('Accounting', '2', 'Accounting', null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Default.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Default.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Incoming.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Incoming.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Incoming.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Incoming.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Incoming.Print', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Incoming.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Incoming.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Inventory.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Inventory.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Inventory.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Io.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Io.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Io.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Io.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Io.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Io.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Outgoing.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Outgoing.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Outgoing.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Outgoing.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Outgoing.Print', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Outgoing.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Outgoing.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Productset.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_cabin.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_cabin.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_cabin.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_cabin.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_cabin.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_cabin.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_korset.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_korset.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_korset.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_korset.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_korset.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Product_korset.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product_treatment.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product_treatment.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product_treatment.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product_treatment.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product_treatment.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_product_treatment.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_treatment.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_treatment.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_treatment.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_treatment.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_treatment.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Accounting.Promo_treatment.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Branch.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Branch.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Branch.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Branch.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Branch.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Branch.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Branch.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Default.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Default.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Room.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Room.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Room.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Room.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Room.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Room.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Room.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Treatment.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Treatment.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Treatment.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Treatment.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Treatment.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Treatment.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Admin.Treatment.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Administrator', '2', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Cashier', '2', 'Cashier', null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant', '2', 'Consultant', null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Client.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Client.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Client.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Client.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Client.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Client.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Client.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Default.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Default.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Order.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Order.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Order.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Order.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Order.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Order.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Consultant.Order.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk', '2', 'Frontdesk', null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Client.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Client.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Client.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Default.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Default.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Product.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Product.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Product.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Schedule.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Frontdesk.Schedule.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory', '2', 'Inventory', null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Default.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Default.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Incoming.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Incoming.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Incoming.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Incoming.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Incoming.Print', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Incoming.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Incoming.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Outgoing.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Outgoing.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Outgoing.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Outgoing.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Outgoing.Print', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Outgoing.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Outgoing.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Product.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Product.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Product.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Product_cabin.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Product_cabin.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Inventory.Product_cabin.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service and Treatment Manager', '2', 'Service and Treatment Manager', null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Default.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Default.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Machine.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Machine.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Machine.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Machine.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Machine.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Machine.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Machine.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Mesin.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Mesin.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Mesin.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Mesin.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Mesin.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Mesin.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Mesin.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Procedure.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Procedure.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Procedure.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Procedure.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Procedure.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Procedure.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Procedure.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Schedule.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Schedule.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Machine', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Procedure', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Product', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Sort', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Service.Treatment.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Contact', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Error', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Login', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Logout', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Staff.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Staff.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Staff.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Staff.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Staff.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Staff.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Staff.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Upload.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Upload.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Activation.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Activation.Activation', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Default.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Default.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Login.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Login.Login', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Logout.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Logout.Logout', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Profile.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Profile.Changepassword', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Profile.Edit', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Profile.Profile', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Recovery.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Recovery.Recovery', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Registration.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Registration.Registration', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.User.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.User.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.User.View', '0', null, null, 'N;');

-- ----------------------------
-- Table structure for `authitemchild`
-- ----------------------------
DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of authitemchild
-- ----------------------------
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Default.*');
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Incoming.*');
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Io.*');
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Outgoing.*');
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Product.*');
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Product_cabin.*');
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Promo_product.*');
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Promo_product_treatment.*');
INSERT INTO `authitemchild` VALUES ('Accounting', 'Accounting.Promo_treatment.*');
INSERT INTO `authitemchild` VALUES ('Consultant', 'Consultant.Client.*');
INSERT INTO `authitemchild` VALUES ('Consultant', 'Consultant.Default.*');
INSERT INTO `authitemchild` VALUES ('Frontdesk', 'Frontdesk.Client.*');
INSERT INTO `authitemchild` VALUES ('Frontdesk', 'Frontdesk.Default.*');
INSERT INTO `authitemchild` VALUES ('Frontdesk', 'Frontdesk.Product.*');
INSERT INTO `authitemchild` VALUES ('Frontdesk', 'Frontdesk.Schedule.*');
INSERT INTO `authitemchild` VALUES ('Inventory', 'Inventory.Default.*');
INSERT INTO `authitemchild` VALUES ('Inventory', 'Inventory.Incoming.*');
INSERT INTO `authitemchild` VALUES ('Inventory', 'Inventory.Outgoing.*');
INSERT INTO `authitemchild` VALUES ('Inventory', 'Inventory.Product.*');
INSERT INTO `authitemchild` VALUES ('Inventory', 'Inventory.Product_cabin.*');
INSERT INTO `authitemchild` VALUES ('Service and Treatment Manager', 'Service.Default.*');
INSERT INTO `authitemchild` VALUES ('Service and Treatment Manager', 'Service.Mesin.*');
INSERT INTO `authitemchild` VALUES ('Service and Treatment Manager', 'Service.Procedure.*');
INSERT INTO `authitemchild` VALUES ('Service and Treatment Manager', 'Service.Treatment.*');

-- ----------------------------
-- Table structure for `esc_branch`
-- ----------------------------
DROP TABLE IF EXISTS `esc_branch`;
CREATE TABLE `esc_branch` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_branch
-- ----------------------------
INSERT INTO `esc_branch` VALUES ('1', 'PUSAT', 'Pusat', 'Iskandarsyah', '1234', '123', '08:30:00', '16:00:00', '', '1', '1374990309', '1374990309', '1');
INSERT INTO `esc_branch` VALUES ('3', 'ESLKG', 'Kelapa Gading ESL', 'Kelapa Gading', '01213456', '0213567', '10:00:00', '18:00:00', 'adfsadsa', '1', '1379409090', '1379409090', '1');

-- ----------------------------
-- Table structure for `esc_client`
-- ----------------------------
DROP TABLE IF EXISTS `esc_client`;
CREATE TABLE `esc_client` (
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
  `source_info_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_client
-- ----------------------------
INSERT INTO `esc_client` VALUES ('3', 'Indawati', '1', null, null, '1', 'ESL00001', 'ESL00001', '', '0000-00-00', '', '', '', '', '0', '1', '9', '1357171200', '0', '1');
INSERT INTO `esc_client` VALUES ('4', 'Mariana', '1', null, null, '1', 'ESL00002', 'ESL00002', '', '0000-00-00', '', '', '', '', '0', '1', '9', '1357171200', '0', '1');
INSERT INTO `esc_client` VALUES ('5', 'Jehti', '1', null, null, '1', 'ESL00003', 'ESL00003', '', '0000-00-00', '', '', '', '', '0', '1', '9', '1357171200', '0', '1');
INSERT INTO `esc_client` VALUES ('6', 'Stephanie', '1', null, null, '1', 'ESL00004', 'ESL00004', '', '0000-00-00', '', '', '', '', '0', '1', '9', '1359849600', '0', '1');
INSERT INTO `esc_client` VALUES ('7', 'Sianti', '1', null, null, '1', 'ESL00005', 'ESL00005', '', '0000-00-00', '', '', '', '', '0', '1', '9', '1364947200', '0', '1');
INSERT INTO `esc_client` VALUES ('8', 'Kartika Dewi', '1', null, null, '1', 'ESL00006', 'ESL00006', '', '0000-00-00', '', '', '', '', '0', '1', '9', '1367539200', '0', '1');
INSERT INTO `esc_client` VALUES ('9', 'Donna', '1', null, null, '1', 'ESL00007', 'ESL00007', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367539200', '0', '1');
INSERT INTO `esc_client` VALUES ('10', 'Alexander', '2', null, null, '1', 'ESL00008', 'ESL00008', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1370217600', '0', '1');
INSERT INTO `esc_client` VALUES ('11', 'Chintya', '1', null, null, '1', 'ESL00009', 'ESL00009', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1370217600', '0', '1');
INSERT INTO `esc_client` VALUES ('12', 'Yuswanti', '1', null, null, '1', 'ESL00010', 'ESL00010', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1370217600', '0', '1');
INSERT INTO `esc_client` VALUES ('13', 'Mrs. Erni', '1', null, null, '1', 'ESL00011', 'ESL00011', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372809600', '0', '1');
INSERT INTO `esc_client` VALUES ('14', 'Mrs. Hidayati', '1', null, null, '1', 'ESL00012', 'ESL00012', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372809600', '0', '1');
INSERT INTO `esc_client` VALUES ('15', 'Mr. Irwan', '2', null, null, '1', 'ESL00013', 'ESL00013', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372809600', '0', '1');
INSERT INTO `esc_client` VALUES ('16', 'Mrs. Lena', '1', null, null, '1', 'ESL00014', 'ESL00014', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375488000', '0', '1');
INSERT INTO `esc_client` VALUES ('17', 'Mrs. Windy', '1', null, null, '1', 'ESL00015', 'ESL00015', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1378166400', '0', '1');
INSERT INTO `esc_client` VALUES ('18', 'Mr. Rudi', '2', null, null, '1', 'ESL00016', 'ESL00016', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1378166400', '0', '1');
INSERT INTO `esc_client` VALUES ('19', 'Mrs. Cindy', '1', null, null, '1', 'ESL00017', 'ESL00017', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1383436800', '0', '1');
INSERT INTO `esc_client` VALUES ('20', 'Mrs. Elvia', '1', null, null, '1', 'ESL00018', 'ESL00018', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1383436800', '0', '1');
INSERT INTO `esc_client` VALUES ('21', 'Wellyantina', '1', null, null, '1', 'ESL00019', 'ESL00019', '', '0000-00-00', 'kebon kacang ix no.52', '', '', '*08128128970', '0', '1', '5', '1328832000', '0', '1');
INSERT INTO `esc_client` VALUES ('22', 'Mrs. Nia', '1', null, null, '1', 'ESL00020', 'ESL00020', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363219200', '0', '1');
INSERT INTO `esc_client` VALUES ('23', 'Mrs. Mimi', '1', null, null, '1', 'ESL00021', 'ESL00021', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363305600', '0', '1');
INSERT INTO `esc_client` VALUES ('24', 'Mrs. Nurwiah', '1', null, null, '1', 'ESL00022', 'ESL00022', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363392000', '0', '1');
INSERT INTO `esc_client` VALUES ('25', 'Mr. Jackson', '2', null, null, '1', 'ESL00023', 'ESL00023', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363392000', '0', '1');
INSERT INTO `esc_client` VALUES ('26', 'Mrs. Vimala', '1', null, null, '1', 'ESL00024', 'ESL00024', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363564800', '0', '1');
INSERT INTO `esc_client` VALUES ('27', 'Mrs. Anna', '1', null, null, '1', 'ESL00025', 'ESL00025', '', '0000-00-00', 'cempaka wangi III', '', '', '*081280992666', '0', '1', '5', '1363564800', '0', '1');
INSERT INTO `esc_client` VALUES ('28', 'Mrs. Erna', '1', null, null, '1', 'ESL00026', 'ESL00026', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363651200', '0', '1');
INSERT INTO `esc_client` VALUES ('29', 'Mrs. Lie Wan Yung', '1', null, null, '1', 'ESL00027', 'ESL00027', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363737600', '0', '1');
INSERT INTO `esc_client` VALUES ('30', 'Mrs. Dewi', '1', null, null, '1', 'ESL00028', 'ESL00028', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363737600', '0', '1');
INSERT INTO `esc_client` VALUES ('31', 'Mrs. Analia', '1', null, null, '1', 'ESL00029', 'ESL00029', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363737600', '0', '1');
INSERT INTO `esc_client` VALUES ('32', 'Mrs. Liana', '1', null, null, '1', 'ESL00030', 'ESL00030', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363824000', '0', '1');
INSERT INTO `esc_client` VALUES ('33', 'Mr. Subandono', '2', null, null, '1', 'ESL00031', 'ESL00031', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363910400', '0', '1');
INSERT INTO `esc_client` VALUES ('34', 'Mrs. Leni M', '1', null, null, '1', 'ESL00032', 'ESL00032', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363910400', '0', '1');
INSERT INTO `esc_client` VALUES ('35', 'Mrs. Linda', '1', null, null, '1', 'ESL00033', 'ESL00033', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363910400', '0', '1');
INSERT INTO `esc_client` VALUES ('36', 'Mrs. Leni K', '1', null, null, '1', 'ESL00034', 'ESL00034', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363996800', '0', '1');
INSERT INTO `esc_client` VALUES ('37', 'Mrs. Rahma', '1', null, null, '1', 'ESL00035', 'ESL00035', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363996800', '0', '1');
INSERT INTO `esc_client` VALUES ('38', 'Mr. Ardi', '2', null, null, '1', 'ESL00036', 'ESL00036', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363996800', '0', '1');
INSERT INTO `esc_client` VALUES ('39', 'Mrs. Lim Dolly', '1', null, null, '1', 'ESL00037', 'ESL00037', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1363996800', '0', '1');
INSERT INTO `esc_client` VALUES ('40', 'Mrs. Farida', '1', null, null, '1', 'ESL00038', 'ESL00038', '', '0000-00-00', 'jl.ultra violet a4/31 kelapa gading komp. Walikota jakut', '', '', '99999611', '0', '1', '5', '1013299200', '0', '1');
INSERT INTO `esc_client` VALUES ('41', 'Mrs. Sila', '1', null, null, '1', 'ESL00039', 'ESL00039', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364256000', '0', '1');
INSERT INTO `esc_client` VALUES ('42', 'Mrs.  Maselva', '1', null, null, '1', 'ESL00040', 'ESL00040', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364256000', '0', '1');
INSERT INTO `esc_client` VALUES ('43', 'Ms. Mirna', '1', null, null, '1', 'ESL00041', 'ESL00041', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364256000', '0', '1');
INSERT INTO `esc_client` VALUES ('44', 'Mrs. Julie', '1', null, null, '1', 'ESL00042', 'ESL00042', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364342400', '0', '1');
INSERT INTO `esc_client` VALUES ('45', 'Ms. Angeline Jaya', '1', null, null, '1', 'ESL00043', 'ESL00043', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364342400', '0', '1');
INSERT INTO `esc_client` VALUES ('46', 'Mrs. Dwi Maryani', '1', null, null, '1', 'ESL00044', 'ESL00044', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364342400', '0', '1');
INSERT INTO `esc_client` VALUES ('47', 'Mrs. Saraswati', '1', null, null, '1', 'ESL00045', 'ESL00045', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364342400', '0', '1');
INSERT INTO `esc_client` VALUES ('48', 'Mrs. Liana Lim', '1', null, null, '1', 'ESL00046', 'ESL00046', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364428800', '0', '1');
INSERT INTO `esc_client` VALUES ('49', 'Mrs. Jenny al Gozali', '1', null, null, '1', 'ESL00047', 'ESL00047', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364601600', '0', '1');
INSERT INTO `esc_client` VALUES ('50', 'Mr. Jupri', '2', null, null, '1', 'ESL00048', 'ESL00048', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364601600', '0', '1');
INSERT INTO `esc_client` VALUES ('51', 'Mrs. Martha', '1', null, null, '1', 'ESL00049', 'ESL00049', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1364601600', '0', '1');
INSERT INTO `esc_client` VALUES ('52', 'Djuwita', '1', null, null, '1', 'ESL00050', 'ESL00050', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1357257600', '0', '1');
INSERT INTO `esc_client` VALUES ('53', 'Mrs. Willy', '1', null, null, '1', 'ESL00051', 'ESL00051', '', '0000-00-00', '', '', '', '*08161908539', '0', '1', '5', '1337904000', '0', '1');
INSERT INTO `esc_client` VALUES ('54', 'Mr. Johanes', '2', null, null, '1', 'ESL00052', 'ESL00052', '', '0000-00-00', 'bali', '', '', '*0811387792', '0', '1', '5', '1359936000', '0', '1');
INSERT INTO `esc_client` VALUES ('55', 'Elvia Ateng', '1', null, null, '1', 'ESL00053', 'ESL00053', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1359936000', '0', '1');
INSERT INTO `esc_client` VALUES ('56', 'Lany', '1', null, null, '1', 'ESL00054', 'ESL00054', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1362355200', '0', '1');
INSERT INTO `esc_client` VALUES ('57', 'Lina Widjaya', '1', null, null, '1', 'ESL00055', 'ESL00055', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1362355200', '0', '1');
INSERT INTO `esc_client` VALUES ('58', 'Olivia', '1', null, null, '1', 'ESL00056', 'ESL00056', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1365033600', '0', '1');
INSERT INTO `esc_client` VALUES ('59', 'Hendra', '2', null, null, '1', 'ESL00057', 'ESL00057', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1365033600', '0', '1');
INSERT INTO `esc_client` VALUES ('60', 'Veronica', '1', null, null, '1', 'ESL00058', 'ESL00058', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367625600', '0', '1');
INSERT INTO `esc_client` VALUES ('61', 'Silvi', '1', null, null, '1', 'ESL00059', 'ESL00059', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367625600', '0', '1');
INSERT INTO `esc_client` VALUES ('62', 'Yulina', '1', null, null, '1', 'ESL00060', 'ESL00060', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1370304000', '0', '1');
INSERT INTO `esc_client` VALUES ('63', 'Fonny', '1', null, null, '1', 'ESL00061', 'ESL00061', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1370304000', '0', '1');
INSERT INTO `esc_client` VALUES ('64', 'Irwan', '2', null, null, '1', 'ESL00062', 'ESL00062', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375574400', '0', '1');
INSERT INTO `esc_client` VALUES ('65', 'Elen', '1', null, null, '1', 'ESL00063', 'ESL00063', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1378252800', '0', '1');
INSERT INTO `esc_client` VALUES ('66', 'Ludwina', '1', null, null, '1', 'ESL00064', 'ESL00064', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1378252800', '0', '1');
INSERT INTO `esc_client` VALUES ('67', 'Yeni', '1', null, null, '1', 'ESL00065', 'ESL00065', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1386115200', '0', '1');
INSERT INTO `esc_client` VALUES ('68', 'Siani ', '1', null, null, '1', 'ESL00066', 'ESL00066', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1365811200', '0', '1');
INSERT INTO `esc_client` VALUES ('69', 'Emma', '1', null, null, '1', 'ESL00067', 'ESL00067', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1365984000', '0', '1');
INSERT INTO `esc_client` VALUES ('70', 'Agnes', '1', null, null, '1', 'ESL00068', 'ESL00068', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1365984000', '0', '1');
INSERT INTO `esc_client` VALUES ('71', 'Sisca', '1', null, null, '1', 'ESL00069', 'ESL00069', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366070400', '0', '1');
INSERT INTO `esc_client` VALUES ('72', 'Elsye', '1', null, null, '1', 'ESL00070', 'ESL00070', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366070400', '0', '1');
INSERT INTO `esc_client` VALUES ('73', 'Erma', '1', null, null, '1', 'ESL00071', 'ESL00071', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366070400', '0', '1');
INSERT INTO `esc_client` VALUES ('74', 'Meta', '1', null, null, '1', 'ESL00072', 'ESL00072', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366070400', '0', '1');
INSERT INTO `esc_client` VALUES ('75', 'Jenny Novita', '1', null, null, '1', 'ESL00073', 'ESL00073', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366156800', '0', '1');
INSERT INTO `esc_client` VALUES ('76', 'Jaelani', '1', null, null, '1', 'ESL00074', 'ESL00074', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366156800', '0', '1');
INSERT INTO `esc_client` VALUES ('77', 'Rusnilamwati', '1', null, null, '1', 'ESL00075', 'ESL00075', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366156800', '0', '1');
INSERT INTO `esc_client` VALUES ('78', 'Carol Kwok', '1', null, null, '1', 'ESL00076', 'ESL00076', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366243200', '0', '1');
INSERT INTO `esc_client` VALUES ('79', 'Aida Ria ', '1', null, null, '1', 'ESL00077', 'ESL00077', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366243200', '0', '1');
INSERT INTO `esc_client` VALUES ('80', 'Lidia Suhardi', '1', null, null, '1', 'ESL00078', 'ESL00078', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366329600', '0', '1');
INSERT INTO `esc_client` VALUES ('81', 'Nia', '1', null, null, '1', 'ESL00079', 'ESL00079', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366329600', '0', '1');
INSERT INTO `esc_client` VALUES ('82', 'Stella', '1', null, null, '1', 'ESL00080', 'ESL00080', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366416000', '0', '1');
INSERT INTO `esc_client` VALUES ('83', 'Lenny Kurnia', '1', null, null, '1', 'ESL00081', 'ESL00081', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366416000', '0', '1');
INSERT INTO `esc_client` VALUES ('84', 'Ratna', '1', null, null, '1', 'ESL00082', 'ESL00082', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366416000', '0', '1');
INSERT INTO `esc_client` VALUES ('85', 'Meiny', '1', null, null, '1', 'ESL00083', 'ESL00083', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366588800', '0', '1');
INSERT INTO `esc_client` VALUES ('86', 'Rudy Wijaya', '1', null, null, '1', 'ESL00084', 'ESL00084', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366588800', '0', '1');
INSERT INTO `esc_client` VALUES ('87', 'Taufik', '2', null, null, '1', 'ESL00085', 'ESL00085', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366675200', '0', '1');
INSERT INTO `esc_client` VALUES ('88', 'Eda The', '1', null, null, '1', 'ESL00086', 'ESL00086', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366675200', '0', '1');
INSERT INTO `esc_client` VALUES ('89', 'iNtihawah', '1', null, null, '1', 'ESL00087', 'ESL00087', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366761600', '0', '1');
INSERT INTO `esc_client` VALUES ('90', 'Dian', '1', null, null, '1', 'ESL00088', 'ESL00088', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366761600', '0', '1');
INSERT INTO `esc_client` VALUES ('91', 'Lea', '1', null, null, '1', 'ESL00089', 'ESL00089', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('92', 'Rosmiati', '1', null, null, '1', 'ESL00090', 'ESL00090', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('93', 'olivia natalia', '1', null, null, '1', 'ESL00091', 'ESL00091', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('94', 'Susanti', '1', null, null, '1', 'ESL00092', 'ESL00092', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('95', 'Susilawati', '1', null, null, '1', 'ESL00093', 'ESL00093', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('96', 'Katrin', '1', null, null, '1', 'ESL00094', 'ESL00094', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('97', 'Edison', '1', null, null, '1', 'ESL00095', 'ESL00095', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('98', 'Atikah', '1', null, null, '1', 'ESL00096', 'ESL00096', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('99', 'Budiman', '2', null, null, '1', 'ESL00097', 'ESL00097', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('100', 'Djufri', '1', null, null, '1', 'ESL00098', 'ESL00098', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('101', 'Juniaty', '1', null, null, '1', 'ESL00099', 'ESL00099', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('102', 'juwita', '1', null, null, '1', 'ESL00100', 'ESL00100', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('103', 'Evelyn', '1', null, null, '1', 'ESL00101', 'ESL00101', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('104', 'Susana Tio', '1', null, null, '1', 'ESL00102', 'ESL00102', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('105', 'Linny Widjaja', '1', null, null, '1', 'ESL00103', 'ESL00103', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366848000', '0', '1');
INSERT INTO `esc_client` VALUES ('106', 'Liana Setyadi', '1', null, null, '1', 'ESL00104', 'ESL00104', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366934400', '0', '1');
INSERT INTO `esc_client` VALUES ('107', 'Ovi', '1', null, null, '1', 'ESL00105', 'ESL00105', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1366934400', '0', '1');
INSERT INTO `esc_client` VALUES ('108', 'Veronica', '1', null, null, '1', 'ESL00106', 'ESL00106', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367020800', '0', '1');
INSERT INTO `esc_client` VALUES ('109', 'Dewi', '1', null, null, '1', 'ESL00107', 'ESL00107', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367193600', '0', '1');
INSERT INTO `esc_client` VALUES ('110', 'Lena', '1', null, null, '1', 'ESL00108', 'ESL00108', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367193600', '0', '1');
INSERT INTO `esc_client` VALUES ('111', 'Jackson', '2', null, null, '1', 'ESL00109', 'ESL00109', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367193600', '0', '1');
INSERT INTO `esc_client` VALUES ('112', 'Henny Tumewu', '1', null, null, '1', 'ESL00110', 'ESL00110', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367280000', '0', '1');
INSERT INTO `esc_client` VALUES ('113', 'Maria Fong ', '1', null, null, '1', 'ESL00111', 'ESL00111', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367280000', '0', '1');
INSERT INTO `esc_client` VALUES ('114', 'Wiwit', '1', null, null, '1', 'ESL00112', 'ESL00112', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1357344000', '0', '1');
INSERT INTO `esc_client` VALUES ('115', 'Aline', '1', null, null, '1', 'ESL00113', 'ESL00113', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1360022400', '0', '1');
INSERT INTO `esc_client` VALUES ('116', 'Christine', '1', null, null, '1', 'ESL00114', 'ESL00114', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1360022400', '0', '1');
INSERT INTO `esc_client` VALUES ('117', 'Vinny', '1', null, null, '1', 'ESL00115', 'ESL00115', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1362441600', '0', '1');
INSERT INTO `esc_client` VALUES ('118', 'Linda', '1', null, null, '1', 'ESL00116', 'ESL00116', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1365120000', '0', '1');
INSERT INTO `esc_client` VALUES ('119', 'Yanti Gozali', '1', null, null, '1', 'ESL00117', 'ESL00117', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1365120000', '0', '1');
INSERT INTO `esc_client` VALUES ('120', 'Andriani', '1', null, null, '1', 'ESL00118', 'ESL00118', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372982400', '0', '1');
INSERT INTO `esc_client` VALUES ('121', 'Marini', '1', null, null, '1', 'ESL00119', 'ESL00119', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375660800', '0', '1');
INSERT INTO `esc_client` VALUES ('122', 'Stephanie', '1', null, null, '1', 'ESL00120', 'ESL00120', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375660800', '0', '1');
INSERT INTO `esc_client` VALUES ('123', 'Taufiq', '2', null, null, '1', 'ESL00121', 'ESL00121', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375660800', '0', '1');
INSERT INTO `esc_client` VALUES ('124', 'Lindawati', '1', null, null, '1', 'ESL00122', 'ESL00122', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380931200', '0', '1');
INSERT INTO `esc_client` VALUES ('125', 'Erna Yulianti', '1', null, null, '1', 'ESL00123', 'ESL00123', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1383609600', '0', '1');
INSERT INTO `esc_client` VALUES ('126', 'Juliana Karamoy', '1', null, null, '1', 'ESL00124', 'ESL00124', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1383609600', '0', '1');
INSERT INTO `esc_client` VALUES ('127', 'Margareth', '1', null, null, '1', 'ESL00125', 'ESL00125', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368403200', '0', '1');
INSERT INTO `esc_client` VALUES ('128', 'Miemy', '1', null, null, '1', 'ESL00126', 'ESL00126', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368403200', '0', '1');
INSERT INTO `esc_client` VALUES ('129', 'Puspita Dewi', '1', null, null, '1', 'ESL00127', 'ESL00127', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368576000', '0', '1');
INSERT INTO `esc_client` VALUES ('130', 'Lea Melya', '1', null, null, '1', 'ESL00128', 'ESL00128', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368662400', '0', '1');
INSERT INTO `esc_client` VALUES ('131', 'Katrin', '1', null, null, '1', 'ESL00129', 'ESL00129', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368662400', '0', '1');
INSERT INTO `esc_client` VALUES ('132', 'Elia', '1', null, null, '1', 'ESL00130', 'ESL00130', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368662400', '0', '1');
INSERT INTO `esc_client` VALUES ('133', 'Julius', '2', null, null, '1', 'ESL00131', 'ESL00131', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368662400', '0', '1');
INSERT INTO `esc_client` VALUES ('134', 'Deasy', '1', null, null, '1', 'ESL00132', 'ESL00132', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368748800', '0', '1');
INSERT INTO `esc_client` VALUES ('135', 'Fida', '1', null, null, '1', 'ESL00133', 'ESL00133', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368835200', '0', '1');
INSERT INTO `esc_client` VALUES ('136', 'Nina', '1', null, null, '1', 'ESL00134', 'ESL00134', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369008000', '0', '1');
INSERT INTO `esc_client` VALUES ('137', 'Linda Lin', '1', null, null, '1', 'ESL00135', 'ESL00135', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369008000', '0', '1');
INSERT INTO `esc_client` VALUES ('138', 'Santi Auke', '1', null, null, '1', 'ESL00136', 'ESL00136', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369094400', '0', '1');
INSERT INTO `esc_client` VALUES ('139', 'Evi Chandra', '1', null, null, '1', 'ESL00137', 'ESL00137', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369180800', '0', '1');
INSERT INTO `esc_client` VALUES ('140', 'Wanti', '1', null, null, '1', 'ESL00138', 'ESL00138', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369267200', '0', '1');
INSERT INTO `esc_client` VALUES ('141', 'Neneng', '1', null, null, '1', 'ESL00139', 'ESL00139', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369612800', '0', '1');
INSERT INTO `esc_client` VALUES ('142', 'Elsya Novawanty', '1', null, null, '1', 'ESL00140', 'ESL00140', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369785600', '0', '1');
INSERT INTO `esc_client` VALUES ('143', 'Katrina', '1', null, null, '1', 'ESL00141', 'ESL00141', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369872000', '0', '1');
INSERT INTO `esc_client` VALUES ('144', 'Inestia', '1', null, null, '1', 'ESL00142', 'ESL00142', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369872000', '0', '1');
INSERT INTO `esc_client` VALUES ('145', 'Shinta', '1', null, null, '1', 'ESL00143', 'ESL00143', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369958400', '0', '1');
INSERT INTO `esc_client` VALUES ('146', 'Lili Tanamas', '1', null, null, '1', 'ESL00144', 'ESL00144', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369958400', '0', '1');
INSERT INTO `esc_client` VALUES ('147', 'Susianty', '1', null, null, '1', 'ESL00145', 'ESL00145', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1369958400', '0', '1');
INSERT INTO `esc_client` VALUES ('148', 'Budi', '2', null, null, '1', 'ESL00146', 'ESL00146', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1357430400', '0', '1');
INSERT INTO `esc_client` VALUES ('149', 'Roseline ', '1', null, null, '1', 'ESL00147', 'ESL00147', '', '0000-00-00', 'gading nirwana 7 pf 6/2 kelapa gading', '', '', '4528158', '0', '1', '5', '1357430400', '0', '1');
INSERT INTO `esc_client` VALUES ('150', 'Merry Ham', '1', null, null, '1', 'ESL00148', 'ESL00148', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1362528000', '0', '1');
INSERT INTO `esc_client` VALUES ('151', 'Neneng Zakiah', '1', null, null, '1', 'ESL00149', 'ESL00149', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367798400', '0', '1');
INSERT INTO `esc_client` VALUES ('152', 'Meimei', '1', null, null, '1', 'ESL00150', 'ESL00150', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1373068800', '0', '1');
INSERT INTO `esc_client` VALUES ('153', 'Hany Taswinah', '1', null, null, '1', 'ESL00151', 'ESL00151', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1373068800', '0', '1');
INSERT INTO `esc_client` VALUES ('154', 'Helen', '1', null, null, '1', 'ESL00152', 'ESL00152', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1373068800', '0', '1');
INSERT INTO `esc_client` VALUES ('155', 'Herlina', '1', null, null, '1', 'ESL00153', 'ESL00153', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1373068800', '0', '1');
INSERT INTO `esc_client` VALUES ('156', 'Chynthia', '1', null, null, '1', 'ESL00154', 'ESL00154', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381017600', '0', '1');
INSERT INTO `esc_client` VALUES ('157', 'Joice Novita', '1', null, null, '1', 'ESL00155', 'ESL00155', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381017600', '0', '1');
INSERT INTO `esc_client` VALUES ('158', 'Stephanie', '1', null, null, '1', 'ESL00156', 'ESL00156', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381017600', '0', '1');
INSERT INTO `esc_client` VALUES ('159', 'Elena', '1', null, null, '1', 'ESL00157', 'ESL00157', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381017600', '0', '1');
INSERT INTO `esc_client` VALUES ('160', 'Dwita Ramesh', '1', null, null, '1', 'ESL00158', 'ESL00158', '', '0000-00-00', 'sunter paraadise thp 1 gg.5 blok f 10/30 sunter', '', '', '*08129120409', '0', '1', '5', '1383696000', '0', '1');
INSERT INTO `esc_client` VALUES ('161', 'Dwi Apriani', '1', null, null, '1', 'ESL00159', 'ESL00159', '', '0000-00-00', '', '', '', '*081252577404', '0', '1', '5', '1386288000', '0', '1');
INSERT INTO `esc_client` VALUES ('162', 'Julie To Siaw Yen', '1', null, null, '1', 'ESL00160', 'ESL00160', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1371081600', '0', '1');
INSERT INTO `esc_client` VALUES ('163', 'Vera Chindea', '1', null, null, '1', 'ESL00161', 'ESL00161', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1371168000', '0', '1');
INSERT INTO `esc_client` VALUES ('164', 'Etty', '1', null, null, '1', 'ESL00162', 'ESL00162', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1371254400', '0', '1');
INSERT INTO `esc_client` VALUES ('165', 'Dulhasim Kasim', '2', null, null, '1', 'ESL00163', 'ESL00163', '', '0000-00-00', 'gading nias residences timur chrysant lt.3', '', '', '*087887606777', '0', '1', '5', '1344729600', '0', '1');
INSERT INTO `esc_client` VALUES ('166', 'Silvi', '1', null, null, '1', 'ESL00164', 'ESL00164', '', '0000-00-00', 'royal gading mansion rg 5 no.3', '', '', '*08557891208', '0', '1', '5', '1323475200', '0', '1');
INSERT INTO `esc_client` VALUES ('167', 'Lina Paramitha', '1', null, null, '1', 'ESL00165', 'ESL00165', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1371859200', '0', '1');
INSERT INTO `esc_client` VALUES ('168', 'Lanny Engiarto', '1', null, null, '1', 'ESL00166', 'ESL00166', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372032000', '0', '1');
INSERT INTO `esc_client` VALUES ('169', 'Meta', '1', null, null, '1', 'ESL00167', 'ESL00167', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372291200', '0', '1');
INSERT INTO `esc_client` VALUES ('170', 'Monica', '1', null, null, '1', 'ESL00168', 'ESL00168', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372291200', '0', '1');
INSERT INTO `esc_client` VALUES ('171', 'Elisa Santi', '1', null, null, '1', 'ESL00169', 'ESL00169', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372291200', '0', '1');
INSERT INTO `esc_client` VALUES ('172', 'Nicole ', '1', null, null, '1', 'ESL00170', 'ESL00170', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372377600', '0', '1');
INSERT INTO `esc_client` VALUES ('173', 'Siani', '1', null, null, '1', 'ESL00171', 'ESL00171', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372464000', '0', '1');
INSERT INTO `esc_client` VALUES ('174', 'Olvy', '1', null, null, '1', 'ESL00172', 'ESL00172', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1372464000', '0', '1');
INSERT INTO `esc_client` VALUES ('175', 'Irwan', '2', null, null, '1', 'ESL00173', 'ESL00173', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1357516800', '0', '1');
INSERT INTO `esc_client` VALUES ('176', 'Maya', '1', null, null, '1', 'ESL00174', 'ESL00174', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1360195200', '0', '1');
INSERT INTO `esc_client` VALUES ('177', 'Juliet', '1', null, null, '1', 'ESL00175', 'ESL00175', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1362614400', '0', '1');
INSERT INTO `esc_client` VALUES ('178', 'Olivia', '1', null, null, '1', 'ESL00176', 'ESL00176', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1365292800', '0', '1');
INSERT INTO `esc_client` VALUES ('179', 'Lany Alex', '1', null, null, '1', 'ESL00177', 'ESL00177', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367884800', '0', '1');
INSERT INTO `esc_client` VALUES ('180', 'Dr.Shinta', '1', null, null, '1', 'ESL00178', 'ESL00178', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375833600', '0', '1');
INSERT INTO `esc_client` VALUES ('181', 'Susanty', '1', null, null, '1', 'ESL00179', 'ESL00179', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1378512000', '0', '1');
INSERT INTO `esc_client` VALUES ('182', 'Esti', '1', null, null, '1', 'ESL00180', 'ESL00180', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1383782400', '0', '1');
INSERT INTO `esc_client` VALUES ('183', 'Yola', '1', null, null, '1', 'ESL00181', 'ESL00181', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1386374400', '0', '1');
INSERT INTO `esc_client` VALUES ('184', 'Elia', '1', null, null, '1', 'ESL00182', 'ESL00182', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1373673600', '0', '1');
INSERT INTO `esc_client` VALUES ('185', 'neneng', '1', null, null, '1', 'ESL00183', 'ESL00183', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1373932800', '0', '1');
INSERT INTO `esc_client` VALUES ('186', 'Erna Yuliati', '1', null, null, '1', 'ESL00184', 'ESL00184', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374019200', '0', '1');
INSERT INTO `esc_client` VALUES ('187', 'Budi Widodo', '2', null, null, '1', 'ESL00185', 'ESL00185', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374019200', '0', '1');
INSERT INTO `esc_client` VALUES ('188', 'Wuriana Irawati', '1', null, null, '1', 'ESL00186', 'ESL00186', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374105600', '0', '1');
INSERT INTO `esc_client` VALUES ('189', 'Memey', '1', null, null, '1', 'ESL00187', 'ESL00187', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374192000', '0', '1');
INSERT INTO `esc_client` VALUES ('190', 'Veronica', '1', null, null, '1', 'ESL00188', 'ESL00188', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374278400', '0', '1');
INSERT INTO `esc_client` VALUES ('191', 'Herlinda Tedja', '1', null, null, '1', 'ESL00189', 'ESL00189', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374278400', '0', '1');
INSERT INTO `esc_client` VALUES ('192', 'Lina Wibowo', '1', null, null, '1', 'ESL00190', 'ESL00190', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374278400', '0', '1');
INSERT INTO `esc_client` VALUES ('193', 'Deasy', '1', null, null, '1', 'ESL00191', 'ESL00191', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374278400', '0', '1');
INSERT INTO `esc_client` VALUES ('194', 'Angelin', '1', null, null, '1', 'ESL00192', 'ESL00192', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374278400', '0', '1');
INSERT INTO `esc_client` VALUES ('195', 'Angelique', '1', null, null, '1', 'ESL00193', 'ESL00193', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374624000', '0', '1');
INSERT INTO `esc_client` VALUES ('196', 'Poppy Mudjaja', '1', null, null, '1', 'ESL00194', 'ESL00194', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374624000', '0', '1');
INSERT INTO `esc_client` VALUES ('197', 'Lenny Margaretha', '1', null, null, '1', 'ESL00195', 'ESL00195', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374624000', '0', '1');
INSERT INTO `esc_client` VALUES ('198', 'Rinda', '1', null, null, '1', 'ESL00196', 'ESL00196', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374624000', '0', '1');
INSERT INTO `esc_client` VALUES ('199', 'Eveline Thiang', '1', null, null, '1', 'ESL00197', 'ESL00197', '', '0000-00-00', 'elang 5/5 pik', '', '', '*08128710000', '0', '1', '5', '1367452800', '0', '1');
INSERT INTO `esc_client` VALUES ('200', 'Christilistiani', '1', null, null, '1', 'ESL00198', 'ESL00198', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374710400', '0', '1');
INSERT INTO `esc_client` VALUES ('201', 'susiana imawati imawan', '1', null, null, '1', 'ESL00199', 'ESL00199', '', '0000-00-00', 'jl.akasia dd 3 rw badak utara, koja', '', '', '', '0', '1', '5', '1374796800', '0', '1');
INSERT INTO `esc_client` VALUES ('202', 'Jane', '1', null, null, '1', 'ESL00200', 'ESL00200', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374796800', '0', '1');
INSERT INTO `esc_client` VALUES ('203', 'Ratna', '1', null, null, '1', 'ESL00201', 'ESL00201', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1374883200', '0', '1');
INSERT INTO `esc_client` VALUES ('204', 'Harlinda Jaya', '1', null, null, '1', 'ESL00202', 'ESL00202', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375056000', '0', '1');
INSERT INTO `esc_client` VALUES ('205', 'Soraya', '1', null, null, '1', 'ESL00203', 'ESL00203', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375056000', '0', '1');
INSERT INTO `esc_client` VALUES ('206', 'Alisah', '1', null, null, '1', 'ESL00204', 'ESL00204', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375142400', '0', '1');
INSERT INTO `esc_client` VALUES ('207', 'Liana Lim', '1', null, null, '1', 'ESL00205', 'ESL00205', '', '0000-00-00', 'sunter danau permai timur', '', '', '', '0', '1', '5', '1363824000', '0', '1');
INSERT INTO `esc_client` VALUES ('208', 'Suryati', '1', null, null, '1', 'ESL00206', 'ESL00206', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1375228800', '0', '1');
INSERT INTO `esc_client` VALUES ('209', 'Anna', '1', null, null, '1', 'ESL00207', 'ESL00207', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1357603200', '0', '1');
INSERT INTO `esc_client` VALUES ('210', 'Henny Pratiwi', '1', null, null, '1', 'ESL00208', 'ESL00208', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1357603200', '0', '1');
INSERT INTO `esc_client` VALUES ('211', 'Susanto', '2', null, null, '1', 'ESL00209', 'ESL00209', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1360281600', '0', '1');
INSERT INTO `esc_client` VALUES ('212', 'Lusi', '1', null, null, '1', 'ESL00210', 'ESL00210', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1360281600', '0', '1');
INSERT INTO `esc_client` VALUES ('213', 'Sukardi', '1', null, null, '1', 'ESL00211', 'ESL00211', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1360281600', '0', '1');
INSERT INTO `esc_client` VALUES ('214', 'Surjati', '1', null, null, '1', 'ESL00212', 'ESL00212', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1360281600', '0', '1');
INSERT INTO `esc_client` VALUES ('215', 'Rizky', '1', null, null, '1', 'ESL00213', 'ESL00213', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367971200', '0', '1');
INSERT INTO `esc_client` VALUES ('216', 'Marina ', '1', null, null, '1', 'ESL00214', 'ESL00214', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1367971200', '0', '1');
INSERT INTO `esc_client` VALUES ('217', 'Denny', '2', null, null, '1', 'ESL00215', 'ESL00215', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1376352000', '0', '1');
INSERT INTO `esc_client` VALUES ('218', 'Ayu Puspita sari', '1', null, null, '1', 'ESL00216', 'ESL00216', '', '0000-00-00', 'jl. Janur hijau ry kx/11 koja jakut', '', '', '', '0', '1', '5', '1376352000', '0', '1');
INSERT INTO `esc_client` VALUES ('219', 'Herlinda', '1', null, null, '1', 'ESL00217', 'ESL00217', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1376438400', '0', '1');
INSERT INTO `esc_client` VALUES ('220', 'Nurbiati', '1', null, null, '1', 'ESL00218', 'ESL00218', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1376438400', '0', '1');
INSERT INTO `esc_client` VALUES ('221', 'Nurbina', '1', null, null, '1', 'ESL00219', 'ESL00219', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1376524800', '0', '1');
INSERT INTO `esc_client` VALUES ('222', 'Irwan', '1', null, null, '1', 'ESL00220', 'ESL00220', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1376956800', '0', '1');
INSERT INTO `esc_client` VALUES ('223', 'Yossie', '1', null, null, '1', 'ESL00221', 'ESL00221', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1376956800', '0', '1');
INSERT INTO `esc_client` VALUES ('224', 'Nia', '1', null, null, '1', 'ESL00222', 'ESL00222', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1377043200', '0', '1');
INSERT INTO `esc_client` VALUES ('225', 'Tio', '2', null, null, '1', 'ESL00223', 'ESL00223', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1377043200', '0', '1');
INSERT INTO `esc_client` VALUES ('226', 'Neneng', '1', null, null, '1', 'ESL00224', 'ESL00224', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1377129600', '0', '1');
INSERT INTO `esc_client` VALUES ('227', 'Linda', '1', null, null, '1', 'ESL00225', 'ESL00225', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1377216000', '0', '1');
INSERT INTO `esc_client` VALUES ('228', 'Magdalena', '1', null, null, '1', 'ESL00226', 'ESL00226', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1377216000', '0', '1');
INSERT INTO `esc_client` VALUES ('229', 'Ira', '1', null, null, '1', 'ESL00227', 'ESL00227', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1377216000', '0', '1');
INSERT INTO `esc_client` VALUES ('230', 'Maria Magdalena', '1', null, null, '1', 'ESL00228', 'ESL00228', '', '0000-00-00', 'jl.manggis blok a gg.vi/1 koja', '', '', '*08158317653', '0', '1', '5', '1377734400', '0', '1');
INSERT INTO `esc_client` VALUES ('231', 'Yoke', '1', null, null, '1', 'ESL00229', 'ESL00229', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1377820800', '0', '1');
INSERT INTO `esc_client` VALUES ('232', 'Sukma Ningrum', '1', null, null, '1', 'ESL00230', 'ESL00230', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1377907200', '0', '1');
INSERT INTO `esc_client` VALUES ('233', 'Irwan', '2', null, null, '1', 'ESL00231', 'ESL00231', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1360368000', '0', '1');
INSERT INTO `esc_client` VALUES ('234', 'Julius', '1', null, null, '1', 'ESL00232', 'ESL00232', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1368057600', '0', '1');
INSERT INTO `esc_client` VALUES ('235', 'Rita', '1', null, null, '1', 'ESL00233', 'ESL00233', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1370736000', '0', '1');
INSERT INTO `esc_client` VALUES ('236', 'Deny Prasetya', '2', null, null, '1', 'ESL00234', 'ESL00234', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1370736000', '0', '1');
INSERT INTO `esc_client` VALUES ('237', 'Natal', '1', null, null, '1', 'ESL00235', 'ESL00235', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1373328000', '0', '1');
INSERT INTO `esc_client` VALUES ('238', 'Arie Hindriastiwi', '1', null, null, '1', 'ESL00236', 'ESL00236', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1378684800', '0', '1');
INSERT INTO `esc_client` VALUES ('239', 'Ganesh', '2', null, null, '1', 'ESL00237', 'ESL00237', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381276800', '0', '1');
INSERT INTO `esc_client` VALUES ('240', 'Novi', '1', null, null, '1', 'ESL00238', 'ESL00238', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381276800', '0', '1');
INSERT INTO `esc_client` VALUES ('241', 'Suzan ', '1', null, null, '1', 'ESL00239', 'ESL00239', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1383955200', '0', '1');
INSERT INTO `esc_client` VALUES ('242', 'Sri Astuti', '1', null, null, '1', 'ESL00240', 'ESL00240', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1383955200', '0', '1');
INSERT INTO `esc_client` VALUES ('243', 'Asnawati', '1', null, null, '1', 'ESL00241', 'ESL00241', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379289600', '0', '1');
INSERT INTO `esc_client` VALUES ('244', 'Jinny', '1', null, null, '1', 'ESL00242', 'ESL00242', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379462400', '0', '1');
INSERT INTO `esc_client` VALUES ('245', 'Ellen', '1', null, null, '1', 'ESL00243', 'ESL00243', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379462400', '0', '1');
INSERT INTO `esc_client` VALUES ('246', 'Siauw Eka Hartini', '1', null, null, '1', 'ESL00244', 'ESL00244', '', '0000-00-00', 'jl.taman sari x /28 jakbar', '', '', '', '0', '1', '5', '1379462400', '0', '1');
INSERT INTO `esc_client` VALUES ('247', 'Nina Silvia', '1', null, null, '1', 'ESL00245', 'ESL00245', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379462400', '0', '1');
INSERT INTO `esc_client` VALUES ('248', 'Katrina', '1', null, null, '1', 'ESL00246', 'ESL00246', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379462400', '0', '1');
INSERT INTO `esc_client` VALUES ('249', 'Monica', '1', null, null, '1', 'ESL00247', 'ESL00247', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379462400', '0', '1');
INSERT INTO `esc_client` VALUES ('250', 'Elin', '1', null, null, '1', 'ESL00248', 'ESL00248', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379548800', '0', '1');
INSERT INTO `esc_client` VALUES ('251', 'Donna', '1', null, null, '1', 'ESL00249', 'ESL00249', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379548800', '0', '1');
INSERT INTO `esc_client` VALUES ('252', 'Lita', '1', null, null, '1', 'ESL00250', 'ESL00250', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379635200', '0', '1');
INSERT INTO `esc_client` VALUES ('253', 'Jackson', '2', null, null, '1', 'ESL00251', 'ESL00251', '', '0000-00-00', 'jl. Ry boulevard BrT EVIn Grde 31 h apartemen moi', '', '', '*0859597211998', '0', '1', '5', '1326067200', '0', '1');
INSERT INTO `esc_client` VALUES ('254', 'Emi', '1', null, null, '1', 'ESL00252', 'ESL00252', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379721600', '0', '1');
INSERT INTO `esc_client` VALUES ('255', 'Prita', '1', null, null, '1', 'ESL00253', 'ESL00253', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379721600', '0', '1');
INSERT INTO `esc_client` VALUES ('256', 'Gaby', '1', null, null, '1', 'ESL00254', 'ESL00254', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379894400', '0', '1');
INSERT INTO `esc_client` VALUES ('257', 'Lasni', '1', null, null, '1', 'ESL00255', 'ESL00255', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379980800', '0', '1');
INSERT INTO `esc_client` VALUES ('258', 'Phang Shanny', '1', null, null, '1', 'ESL00256', 'ESL00256', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1379980800', '0', '1');
INSERT INTO `esc_client` VALUES ('259', 'Lina', '1', null, null, '1', 'ESL00257', 'ESL00257', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380067200', '0', '1');
INSERT INTO `esc_client` VALUES ('260', 'Yolana', '1', null, null, '1', 'ESL00258', 'ESL00258', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380067200', '0', '1');
INSERT INTO `esc_client` VALUES ('261', 'Happy', '1', null, null, '1', 'ESL00259', 'ESL00259', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380067200', '0', '1');
INSERT INTO `esc_client` VALUES ('262', 'Ellice surjana', '1', null, null, '1', 'ESL00260', 'ESL00260', '', '0000-00-00', 'jl. Mangga besar iv e / 26d taman sari', '', '', '*087877190028', '0', '1', '5', '1380067200', '0', '1');
INSERT INTO `esc_client` VALUES ('263', 'Sisca Widjaja', '1', null, null, '1', 'ESL00261', 'ESL00261', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380240000', '0', '1');
INSERT INTO `esc_client` VALUES ('264', 'Windy', '1', null, null, '1', 'ESL00262', 'ESL00262', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380326400', '0', '1');
INSERT INTO `esc_client` VALUES ('265', 'Lini Widjaja', '1', null, null, '1', 'ESL00263', 'ESL00263', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380326400', '0', '1');
INSERT INTO `esc_client` VALUES ('266', 'Ratna', '1', null, null, '1', 'ESL00264', 'ESL00264', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380326400', '0', '1');
INSERT INTO `esc_client` VALUES ('267', 'Santi', '1', null, null, '1', 'ESL00265', 'ESL00265', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380499200', '0', '1');
INSERT INTO `esc_client` VALUES ('268', 'Aneke', '1', null, null, '1', 'ESL00266', 'ESL00266', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380499200', '0', '1');
INSERT INTO `esc_client` VALUES ('269', 'Deliana', '1', null, null, '1', 'ESL00267', 'ESL00267', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1380499200', '0', '1');
INSERT INTO `esc_client` VALUES ('270', 'Gaby', '1', null, null, '1', 'ESL00268', 'ESL00268', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1357776000', '0', '1');
INSERT INTO `esc_client` VALUES ('271', 'Chyntia', '1', null, null, '1', 'ESL00269', 'ESL00269', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1362873600', '0', '1');
INSERT INTO `esc_client` VALUES ('272', 'YuliTA ', '1', null, null, '1', 'ESL00270', 'ESL00270', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1373414400', '0', '1');
INSERT INTO `esc_client` VALUES ('273', 'Lina Mulia', '1', null, null, '1', 'ESL00271', 'ESL00271', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1376092800', '0', '1');
INSERT INTO `esc_client` VALUES ('274', 'Susan Langer', '1', null, null, '1', 'ESL00272', 'ESL00272', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1378771200', '0', '1');
INSERT INTO `esc_client` VALUES ('275', 'KAtrina', '1', null, null, '1', 'ESL00273', 'ESL00273', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381363200', '0', '1');
INSERT INTO `esc_client` VALUES ('276', 'Ong Siat Wui', '1', null, null, '1', 'ESL00274', 'ESL00274', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1384041600', '0', '1');
INSERT INTO `esc_client` VALUES ('277', 'Echa', '1', null, null, '1', 'ESL00275', 'ESL00275', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381708800', '0', '1');
INSERT INTO `esc_client` VALUES ('278', 'Vitria ', '1', null, null, '1', 'ESL00276', 'ESL00276', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1381881600', '0', '1');
INSERT INTO `esc_client` VALUES ('279', 'Herlantini', '1', null, null, '1', 'ESL00277', 'ESL00277', '', '0000-00-00', '', '', '', '', '0', '1', '5', '1382054400', '0', '1');
INSERT INTO `esc_client` VALUES ('280', '', '0', '0', null, '0', 'ESL00278', 'ESL00278', '', '0000-00-00', '', '', '', '', '0', '0', '0', '0', '0', '1');

-- ----------------------------
-- Table structure for `esc_id_card`
-- ----------------------------
DROP TABLE IF EXISTS `esc_id_card`;
CREATE TABLE `esc_id_card` (
  `id_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_card` varchar(20) NOT NULL,
  PRIMARY KEY (`id_card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_id_card
-- ----------------------------
INSERT INTO `esc_id_card` VALUES ('1', 'Resident ID Card');
INSERT INTO `esc_id_card` VALUES ('2', 'Passport');

-- ----------------------------
-- Table structure for `esc_io`
-- ----------------------------
DROP TABLE IF EXISTS `esc_io`;
CREATE TABLE `esc_io` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_io
-- ----------------------------
INSERT INTO `esc_io` VALUES ('5', 'dsad', '0', '1', '1', '13-00001', '2013-11-25', null, '1', '1385365630', '1385365630', '1');
INSERT INTO `esc_io` VALUES ('6', 'dasdsad', '1', '3', '0', '13-00006', '2013-11-25', '0000-00-00', '1', '1385365659', '1385365671', '1');
INSERT INTO `esc_io` VALUES ('7', 'dsad', '3', '1', '0', '13-00007', '2013-11-25', '0000-00-00', '1', '1385365716', '1385365916', '1');

-- ----------------------------
-- Table structure for `esc_io_detail`
-- ----------------------------
DROP TABLE IF EXISTS `esc_io_detail`;
CREATE TABLE `esc_io_detail` (
  `io_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `io_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_deliver` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`io_detail_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_io_detail
-- ----------------------------
INSERT INTO `esc_io_detail` VALUES ('6', '5', '410', '10', '0');
INSERT INTO `esc_io_detail` VALUES ('7', '6', '410', '2', '2');
INSERT INTO `esc_io_detail` VALUES ('8', '7', '410', '1', '1');

-- ----------------------------
-- Table structure for `esc_marital_status`
-- ----------------------------
DROP TABLE IF EXISTS `esc_marital_status`;
CREATE TABLE `esc_marital_status` (
  `marital_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `marital_status` varchar(10) NOT NULL,
  PRIMARY KEY (`marital_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_marital_status
-- ----------------------------
INSERT INTO `esc_marital_status` VALUES ('1', 'Married');
INSERT INTO `esc_marital_status` VALUES ('2', 'Single');

-- ----------------------------
-- Table structure for `esc_mesin`
-- ----------------------------
DROP TABLE IF EXISTS `esc_mesin`;
CREATE TABLE `esc_mesin` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_mesin
-- ----------------------------
INSERT INTO `esc_mesin` VALUES ('1', 'KG-ULT', 'ULTRASOUND', 'ULTRASOUND', 'upload/Chrysanthemum46.jpg', '1', '1378097420', '1378097420', '1');

-- ----------------------------
-- Table structure for `esc_mesin_detail`
-- ----------------------------
DROP TABLE IF EXISTS `esc_mesin_detail`;
CREATE TABLE `esc_mesin_detail` (
  `mesin_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `mesin_code` varchar(10) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `date` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`mesin_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_mesin_detail
-- ----------------------------
INSERT INTO `esc_mesin_detail` VALUES ('1', 'KG-ULT', '0', 'upload/Chrysanthemum46.jpg', '1', '1378097420', '1378097420', '1');

-- ----------------------------
-- Table structure for `esc_nationality`
-- ----------------------------
DROP TABLE IF EXISTS `esc_nationality`;
CREATE TABLE `esc_nationality` (
  `nationality_id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality` varchar(20) NOT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_nationality
-- ----------------------------
INSERT INTO `esc_nationality` VALUES ('1', 'Indonesia');
INSERT INTO `esc_nationality` VALUES ('2', 'Others');

-- ----------------------------
-- Table structure for `esc_order`
-- ----------------------------
DROP TABLE IF EXISTS `esc_order`;
CREATE TABLE `esc_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(10) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_order
-- ----------------------------

-- ----------------------------
-- Table structure for `esc_procedure`
-- ----------------------------
DROP TABLE IF EXISTS `esc_procedure`;
CREATE TABLE `esc_procedure` (
  `procedure_id` int(11) NOT NULL AUTO_INCREMENT,
  `procedure_number` varchar(20) NOT NULL,
  `procedure_name` varchar(100) NOT NULL,
  PRIMARY KEY (`procedure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_procedure
-- ----------------------------
INSERT INTO `esc_procedure` VALUES ('1', 'procedur01', 'injection ');

-- ----------------------------
-- Table structure for `esc_product`
-- ----------------------------
DROP TABLE IF EXISTS `esc_product`;
CREATE TABLE `esc_product` (
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
) ENGINE=InnoDB AUTO_INCREMENT=612 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_product
-- ----------------------------
INSERT INTO `esc_product` VALUES ('406', 'RET 0007', 'Reticon T2', null, '890000', '890000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('407', 'RET 0009', 'Reticon T5', null, '890000', '890000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('408', 'RET 0010', 'Super Reticon', null, '1500000', '1500000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('409', 'RET 0011', 'FLOXIA', null, '590000', '590000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('410', 'ACT 0026', 'ACT G3 ', null, '3000000', '3000000', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('411', 'CBON 001', 'C\'bon DR Cleansing Oil (DR01)', null, '490000', '490000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('412', 'CBON 002', 'C\'bon DR Mild Foam (DR02)', null, '490000', '490000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('413', 'CBON 003', 'C\'bon DR Mild Lotion (DR03)', null, '490000', '490000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('414', 'CBON 004', 'C\'bon DR Moisturizer (DR04)', null, '690000', '690000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('415', 'CBON 005', 'C\'bon DR Serum HA (DR51)', null, '690000', '690000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('416', 'ESL0002', 'ESL Bio Firming Eye Essense', null, '590000', '590000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('417', 'ESL0003', 'Bio Hydro Gel', null, '590000', '590000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('418', 'ESL0004', 'Bio Exfoliating Acne Complex', null, '390000', '390000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('419', 'ESL0005', 'ESL Bio Rejuvenating Aqua', null, '690000', '690000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('420', 'ESL0006', 'ESL Bio Botullite Collagen Cream', null, '790000', '790000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('421', 'ESL0007', 'ESL Bio Perform Cleanser 2', null, '290000', '290000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('422', 'ESL0008', 'ESL Bio Balance T3 Toner', null, '290000', '290000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('423', 'ESL0009', 'ESL Bio Renewal Mild Peel', null, '590000', '590000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('424', 'ESL0010', 'ESL Bio Perform Cleanser 1', null, '290000', '290000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('425', 'ESL0011', 'ESL Bio Nutrient Night Cream', null, '890000', '890000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('426', 'ESL0012', 'ESL Bio Perform Acne Cleanser', null, '390000', '390000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('427', 'ESL0013', 'ESL Bio Defense UV Foundation (6B) Normal to Dry', null, '590000', '590000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('428', 'ESL0014', 'ESL Bio Balance Toner (Normal)', null, '290000', '290000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('429', 'ESL0015', 'ESL Bio Defense Sunscreen  SPF 60(6W) ', null, '590000', '590000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('430', 'ESL0016', 'Bio Pimple Lotion 2%', null, '290000', '290000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('431', 'ESL0017', 'ESL Bio Defense Sunscreen  SPF 60(6N) Normal to Oi', null, '590000', '590000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('432', 'ESL0018', 'ESL Botol Serum (ESL) / X Lift Serum', null, '790000', '790000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('433', 'ESL0023', 'Anti Acne 1, 15 ml', null, '500000', '500000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('434', 'ESL0024', 'Anti Acne 1, 1.5 ml', null, '500000', '500000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('435', 'ESL0025', 'Anti Acne 2, 15 ml', null, '500000', '500000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('436', 'ESL0026', 'Wrinkle Eraser, 15 ml', null, '700000', '700000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('437', 'ESL0027', 'Clear Flex (AM), 15 ml', null, '900000', '900000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('438', 'ESL0028', 'Clear Flex (PM), 15 ml', null, '900000', '900000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('439', 'ESL0029', 'Anti Acne Oral (Pills)', null, '100000', '100000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('440', 'ESL0030', 'Anti Acne Cream 1', null, '175000', '175000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('441', 'ESL0031', 'Anti Acne Cream 2', null, '175000', '175000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('442', 'MSR0006', 'Pure Hyaluronic Moisturizer (Putih Kecil)', null, '2500000', '2500000', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('443', 'MSR0010', 'Trepeptide-3 Collagen', null, '2500000', '2500000', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('444', 'MSR0011', 'Anti Dark Circle Eye Serum 2050\'S', null, '1500000', '1500000', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('445', 'MSR0012', 'Steam Cell Serum', null, '2500000', '2500000', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('446', 'FCR0010', 'Fresh Caviar Moisturazing Cream (E.746)', null, '2500000', '2500000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('447', 'FCR0011', 'Fresh Caviar Nourishing Cream (E.747)', null, '2500000', '2500000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('448', 'FCR0012', 'Fresh Caviar Lifthing Cream (E.748)', null, '2500000', '2500000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('449', 'DNAV001', 'Cryo Hydration,30 ml (E.573)', null, '3000000', '3000000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('450', 'DNAV002', 'Cryo Lifting, 30 ml (E.574)', null, '3000000', '3000000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('451', 'DNAV005', 'Cryo Nutrition (E572)', null, '3000000', '3000000', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('452', 'OTR0029', 'Amino Collagen (Minuman)', null, '650000', '650000', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('453', 'OTR0031', 'Latise /Bulu mata', null, '2500000', '2500000', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('454', 'ACT 0024', 'ACT G5', null, '10800000', '10800000', '', '12', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('455', 'ACT 0025', 'ACT Whitening', null, '6000000', '6000000', '', '12', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('456', 'INJ 0001', 'Tationil', null, '5000000', '5000000', '', '4', null, null, '10', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('457', 'INJ 0002', 'Lascorbic Vit. C', null, '5000000', '5000000', '', '5', null, null, '10', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('458', 'INJ 0023', 'Genyal Polyvalent', null, '8000000', '8000000', '', '6', null, null, '1', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('459', 'INJ 0024', 'Genyal Volumae', null, '8000000', '8000000', '', '6', null, null, '1', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('460', 'INJ 0025', 'Genyalift (HA)', null, '8000000', '8000000', '', '6', null, null, '1', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('461', 'INJ 0026', 'Melsom Placenta (human)', null, '20000000', '20000000', '', '6', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('462', 'DML0001', 'ZTGS Roller 0,5 mm', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('463', 'DML0005', 'C.20 ', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('464', 'DML0007', 'Eutrosis', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('465', 'DML0009', 'Perasafe', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('466', 'DML0010', 'Collaform', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('467', 'DML0011', 'Mesologica Skin , 5ml', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('468', 'DML0012', 'Mesolift', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('469', 'DML0013', 'ZTGS Roller 1 mm (NEW)', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('470', 'DML0015', 'ZTGS Roller 1.5mm (NEW)', null, '7500000', '7500000', '', '8', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('471', 'MSR0001', 'Anti Darkcircles Treat (Hijau Pastel)', null, '4900000', '4900000', '', '6', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('472', 'MSR0002', 'Phoenix Mask With Vit. C (Ungu)', null, '4900000', '4900000', '', '6', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('473', 'MSR0003', 'Golden Mask Masque D\'or 2050\'s (Putih)', null, '10000000', '10000000', '', '6', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('474', 'MSR0004', 'Caviar Ginseng Treatment (Biru)', null, '10000000', '10000000', '', '6', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('475', 'MSR0005', 'Hydrating & Whitening Mask (Abu-Abu)', null, '4900000', '4900000', '', '6', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('476', 'MSR0007', 'Diamond Mask (Hitam)', null, '15000000', '15000000', '', '6', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('477', 'MSR0008', 'Super Whitening Mask 2050 (Hijau)', null, '4900000', '4900000', '', '6', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('478', 'CSM001', 'Rgenerin Mask/Tratamiento Rgnerin Inhibitor Contra', null, '12000000', '12000000', '', '12', null, null, '4', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('479', 'CSM002', 'Gold Mask/Skin Sensations Treatment (@10ampoule + ', null, '12000000', '12000000', '', '12', null, null, '4', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('480', 'FCR0008', 'Caviar Fresh Cells Treatment (E.520)', null, '10000000', '10000000', '', '12', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('481', 'FCR0009', 'Fresh Caviar Black Mask, 300 gram (E.523)', null, '10000000', '10000000', '', '10', null, null, '6', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('482', 'OTR0037', 'Beyond White Tooth Spa', null, '7500000', '7500000', '', '6', null, null, '5', '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('483', 'ACT 0001', 'Bio Collagen for ACT', null, '0', '0', '', '8', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('484', 'ACT 0002', 'Anti Acne Gel  (AA Gel)', null, '0', '0', '', '7', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('485', 'ACT 0003', 'Face Mesolift (FM) Gel', null, '0', '0', '', '7', '4', '1.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('486', 'ACT 0004', 'Skin Lightening (SL)Gel', null, '0', '0', '', '7', '4', '1.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('487', 'ACT 0005', 'Anti Aging Facia  (FAA) Gel', null, '0', '0', '', '7', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('488', 'ACT 0006', 'Targeted Fat Reduction  (TFR) Gel', null, '0', '0', '', '7', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('489', 'ACT 0007', 'Rejuvanating Facial (FR) Gel', null, '0', '0', '', '7', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('490', 'ACT 0008', 'Hyaluronic Acid (HA)', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('491', 'ACT 0009', 'Ascorbic Acid Solution (AA)=Vit C', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('492', 'ACT 0010', 'Skin Brightening  (SB Gel)', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('493', 'ACT 0011', 'Lipolytic Solution(LS/LL)-Dermaheal', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('494', 'ACT 0012', 'Steam C\'rum SR Powder', null, '0', '0', '', '4', '4', '1.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('495', 'ACT 0013', 'Steam C\'rum SR Solution', null, '0', '0', '', '4', '4', '1.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('496', 'ACT 0014', 'Anti Aging Complex Type 1(AAC1)', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('497', 'ACT 0015', 'Skin Rejuvanating Solution(SR)', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('498', 'ACT 0016', 'Ginko Biloba Solution(GB)', null, '0', '0', '', '4', '4', '1.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('499', 'ACT 0017', 'CG-TGP2 Solution (Vit C Solution)', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('500', 'ACT 0018', 'Vit. C Powder', null, '0', '0', '', '4', '4', '6.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('501', 'ACT 0019', 'D-Biotin Solution(DB)', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('502', 'ACT 0020', 'Glycolic Acid Solution(GAS)', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('503', 'ACT 0021', 'Vitamin A Solution', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('504', 'ACT 0022', 'DC Dark Circle   (DC Gel)', null, '0', '0', '', '7', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('505', 'INJ 0003', 'Bio White or Bio G10', null, '0', '0', '', '4', '4', '2.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('506', 'INJ 0004', 'NaCl (Sodium Chloride), 500 ml', null, '0', '0', '', '7', '4', '500.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('507', 'INJ 0005', 'Bio A', null, '0', '0', '', '4', '4', '2.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('508', 'INJ 0006', 'Lipofit', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('509', 'INJ 0007 E', 'G7-Injex Powder Eye Bag', null, '0', '0', '', '4', '4', '2.60', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('510', 'INJ 0007 S', 'G7-Injex Powder Smiling Line', null, '0', '0', '', '4', '4', '2.30', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('511', 'INJ 0008', 'Bio Growth (BG) 3 ml', null, '0', '0', '', '4', '4', '3.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('512', 'INJ 0009', 'Bio Growth Powder', null, '0', '0', '', '4', '4', '3.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('513', 'INJ 0010', 'Bio Youth', null, '0', '0', '', '4', '4', '7.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('514', 'INJ 0011', 'Flamicort(Injex Acne)=Kenacort-1 Vial 5 ml', null, '0', '0', '', '4', '4', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('515', 'INJ 0013', 'Bio Face Lift (BFL) Powder', null, '0', '0', '', '4', '4', '2.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('516', 'INJ 0015', 'Lidocain HCL, 20 mg', null, '0', '0', '', '5', '4', '2.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('517', 'INJ 0018', 'Otsu D5 (G7 Solution)', null, '0', '0', '', '7', '4', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('518', 'INJ 0020', 'Water for Injection, 10 ml', null, '0', '0', '', '4', '4', '10.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('519', 'INJ 0021', 'Hydrocortisone', null, '0', '0', '', '13', '1', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('520', 'INJ 0027', 'Dexametasone Ampoule  (@ 5 Ampoule/Box )', null, '0', '0', '', '5', '4', '1.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('521', 'INJ 0028', 'Epinephrine Ampoule', null, '0', '0', '', '5', '4', '1.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('522', 'PHIL001', 'Philaroma Foaming Face Gel', null, '0', '0', '', '8', '4', '200.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('523', 'PHIL002', 'Philaroma Oxygenating Mask', null, '0', '0', '', '8', '4', '200.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('524', 'PHIL003', 'Philaroma Complex R-Firming ', null, '0', '0', '', '5', '4', '2.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('525', 'PHIL004', 'Philaroma Complex N-Nourishing ', null, '0', '0', '', '5', '4', '2.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('526', 'PHIL005', 'Philaroma Complex P-Purifying ', null, '0', '0', '', '5', '4', '2.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('527', 'PHIL006', 'Philaroma Doux Gentle Peeling/Soft Peeling', null, '0', '0', '', '8', '4', '250.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('528', 'PHIL008', 'Philaroma Whitening Mask', null, '0', '0', '', '8', '1', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('529', 'PHIL009', 'Philaroma Cranberry Mask(Sensitive Skin)', null, '0', '0', '', '8', '1', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('530', 'PHIL011', 'Philaroma Purifiying Cream', null, '0', '0', '', '8', '4', '250.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('531', 'PHIL012', 'Philaroma Calming Soothing Gel', null, '0', '0', '', '8', '4', '250.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('532', 'PHIL013', 'Philaroma Eye Gel (Gel Yeux)', null, '0', '0', '', '8', '4', '50.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('533', 'PHIL014', 'Philaroma Phase Mask', null, '0', '0', '', '8', '4', '250.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('534', 'PHIL015', 'Philaroma Eye Cream', null, '0', '0', '', '8', '4', '15.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('535', 'PHIL016', 'Philaroma Eye Mask', null, '0', '0', '', '8', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('536', 'PHIL018', 'Philaroma Energizing Mask (Masque Energie)', null, '0', '0', '', '8', '4', '250.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('537', 'PHIL019', 'Philaroma Hydra-Mat Cream', null, '0', '0', '', '8', '4', '250.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('538', 'PHIL020', 'Philaroma Hydra-Vitale Cream', null, '0', '0', '', '8', '4', '250.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('539', 'PHIL022', 'Philaroma Tea Tree Oil Anti Acne Mask', null, '0', '0', '', '8', '1', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('540', 'PHIL023', 'Philaroma Cleansing Milk (New)', null, '0', '0', '', '8', '4', '500.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('541', 'ESL0007', 'ESL Bio Perform Cleanser 2', null, '0', '0', '', '7', '4', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('542', 'ESL0010', 'ESL Bio Perform Cleanser 1', null, '0', '0', '', '7', '4', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('543', 'ESL0013', 'ESL Bio Defense UV Foundation (6B) Normal to Dry', null, '0', '0', '', '7', '4', '35.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('544', 'ESL0015', 'ESL Bio Defense Sunscreen  SPF 60(6W) ', null, '0', '0', '', '7', '4', '35.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('545', 'ESL0017', 'ESL Bio Defense Sunscreen  SPF 60(6N) Normal to Oi', null, '0', '0', '', '7', '4', '35.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('546', 'LING001', 'Sunblock u/ Chemical Peeling/SPF (pcs)', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('547', 'LING002', 'Soothing Balm u/ Chemical Peeling (pcs)', null, '0', '0', '', '8', '4', '59.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('548', 'LING003', 'ESL Peel Forte for Doctor Only', null, '0', '0', '', '7', '4', '59.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('549', 'LING004', 'PCA Peel with Hydroquinone & Recorcinol', null, '0', '0', '', '7', '4', '59.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('550', 'LING005', 'Ultra Peel I', null, '0', '0', '', '7', '4', '472.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('551', 'LING006', 'PCA Skin Smoothing Toner', null, '0', '0', '', '7', '4', '500.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('552', 'STY0003', 'Sothy\'s Toner Oily (Purifying Lotion)', null, '0', '0', '', '7', '4', '500.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('553', 'STY0005', 'Sothy\'s Normalizing Lotion ', null, '0', '0', '', '7', '4', '500.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('554', 'STY0006', 'Sothy\'s Soothing Lotion ', null, '0', '0', '', '7', '1', '200.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('555', 'LTP0001', 'Latulipe Massage', null, '0', '0', '', '8', '1', '200.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('556', 'LTP0002', 'Latulipe Peeling', null, '0', '0', '', '8', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('557', 'LTP0003', 'Eye Make Up Remover', null, '0', '0', '', '8', '4', '2.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('558', 'FX001', 'Firming for RF fractional (2ml)', null, '0', '0', '', '4', '1', '250.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('559', 'FX002', 'Glycerine Gel for RF fractional', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('560', 'FX003', 'Brera Golden Crown Tips /Needle Tip for RF fractio', null, '0', '0', '', '8', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('561', 'OTR0001', 'Syringe with Needle 5 ml 22G x 1 1/2 mm', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('562', 'OTR0002', 'Meso-Relle 32 G Needle 4 mm ', null, '0', '0', '', '6', '2', '50.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('563', 'OTR0003', 'Face Mask (Masker Wajah)', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('564', 'OTR0004', 'Alkhol Pad / Alkohol Swab', null, '0', '0', '', '6', '3', '12.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('565', 'OTR0005', 'Kain Kassa', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('566', 'OTR0006', 'Terumo Syringe wiith Needle 10 ml 21Gx1 1/2 mm', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('567', 'OTR0007', 'Terumo Winged Infusion Set 27Gx1/2 mm', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('568', 'OTR0008', 'Sensi Gloves(M)', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('569', 'OTR0009', 'Sensi Gloves(S)', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('570', 'OTR0010', 'Meso-Relle 32 G Needle 12 mm ', null, '0', '0', '', '6', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('571', 'OTR0012', 'Medi Facial Botox Like', null, '0', '0', '', '8', '4', '30.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('572', 'OTR0014', 'Medi Facial Hyaluronic Acid', null, '0', '0', '', '8', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('573', 'OTR0015', 'Syringe with Needle 1 ml 26G x 1 1/2 mm', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('574', 'OTR0016', 'Syringe with Needle 3 ml 23G x 1 1/4 mm', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('575', 'OTR0019', 'Needle 20G x 1 1/2\" (0.90 x 38 mm)', null, '0', '0', '', '6', '2', '7.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('576', 'OTR0027', 'Panty Line', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('577', 'OTR0028', 'Terumo Needle 25G x 1 mm', null, '0', '0', '', '6', '4', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('578', 'OTR0034', 'Alkohol 1 Lt', null, '0', '0', '', '7', '4', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('579', 'OTR0035', 'Aquades', null, '0', '0', '', '7', '4', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('580', 'OTR0036', 'Bethadine 1 Lt', null, '0', '0', '', '7', '1', '15.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('581', 'OTR0038', 'Bioplacenton 15gr', null, '0', '0', '', '13', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('582', 'OTR0040', 'Dispoface', null, '0', '0', '', '12', '1', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('583', 'OTR0044', 'Emla', null, '0', '0', '', '13', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('584', 'OTR0045', 'Finger Gloves', null, '0', '0', '', '12', '1', '15.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('585', 'OTR0046', 'Garamycin Cream 15 gr', null, '0', '0', '', '13', '1', '5.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('586', 'OTR0047', 'Garamycin Cream 5 gr', null, '0', '0', '', '13', '4', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('587', 'OTR0048', 'Glyserin 1 Lt', null, '0', '0', '', '7', '2', '50.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('588', 'OTR0049', 'Hand Scoon Steril', null, '0', '0', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('589', 'OTR0050', 'Kuas Body', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('590', 'OTR0051', 'Kuas Masker', null, '0', '0', '', '8', '2', '12.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('591', 'OTR0053', 'Micropore 1 inchi', null, '0', '0', '', '6', '2', '24.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('592', 'OTR0054', 'Micropore 1/2 inchi', null, '0', '0', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('593', 'OTR0055', 'Pencetan Jerawat', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('594', 'OTR0056', 'Pinset', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('595', 'OTR0057', 'Pisau Cukur', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('596', 'OTR0058', 'Pisau Cukur Alis', null, '0', '0', '', '8', '4', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('597', 'OTR0059', 'Rose Water', null, '0', '0', '', '7', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('598', 'OTR0060', 'Shower Cap', null, '0', '0', '', '6', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('599', 'OTR0061', 'Sikat Gigi', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('600', 'OTR0062', 'Sisir', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('601', 'OTR0063', 'Spatula', null, '0', '0', '', '8', '1', '400.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('602', 'OTR0064', 'Tabung Micro (Corondum Crystal)', null, '0', '0', '', '9', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('603', 'OTR0065', 'Terumo Needle 21G x 1 1/2\"', null, '0', '0', '', '6', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('604', 'OTR0066', 'Terumo Needle 30G x 1/2\"', null, '0', '0', '', '6', '1', '20.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('605', 'OTR0067', 'Trombopop Gel', null, '0', '0', '', '13', '4', '500.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('606', 'OTR0068', 'Ultrasound (Aquasonic) Gel 5 Lt', null, '0', '0', '', '11', '2', '144.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('607', 'OTR0077', 'Kapas', null, '0', '0', '', '8', '2', '100.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('608', 'OTR0078', 'Cotton Bud', null, '0', '0', '', '12', '4', '150.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('609', 'OTR0079', 'Phytomer Exfoliant Enzymatique', null, '0', '0', '', '13', '1', '20.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('610', 'OTR0081', 'Masker RF Face & Neck (20gr)', null, '0', '0', '', '8', '1', '10.00', null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');
INSERT INTO `esc_product` VALUES ('611', 'OTR0082', 'Masker RF Eye (10gr)', null, '0', '0', '', '8', null, null, null, '0000-00-00', '0000-00-00', null, null, '1', '1', '0', '1');

-- ----------------------------
-- Table structure for `esc_product_detail`
-- ----------------------------
DROP TABLE IF EXISTS `esc_product_detail`;
CREATE TABLE `esc_product_detail` (
  `product_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `productset_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_detail_id`),
  KEY `productset` (`productset_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_product_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `esc_product_stock`
-- ----------------------------
DROP TABLE IF EXISTS `esc_product_stock`;
CREATE TABLE `esc_product_stock` (
  `product__stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  PRIMARY KEY (`product__stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_product_stock
-- ----------------------------
INSERT INTO `esc_product_stock` VALUES ('7', '410', '1', '9', '1385365916');
INSERT INTO `esc_product_stock` VALUES ('8', '410', '3', '1', '1385365671');

-- ----------------------------
-- Table structure for `esc_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `esc_profiles`;
CREATE TABLE `esc_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `address` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `branch_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `esc_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of esc_profiles
-- ----------------------------
INSERT INTO `esc_profiles` VALUES ('1', 'Administrator', '0000-00-00', '', '', '1');
INSERT INTO `esc_profiles` VALUES ('2', 'Accounting ', '0000-00-00', '', '', '1');
INSERT INTO `esc_profiles` VALUES ('3', 'Inventory', '0000-00-00', '', '', '2');
INSERT INTO `esc_profiles` VALUES ('4', 'Service', '0000-00-00', '', '', '0');
INSERT INTO `esc_profiles` VALUES ('5', 'Consultant', '0000-00-00', '', '', '0');
INSERT INTO `esc_profiles` VALUES ('6', 'Cashier', '0000-00-00', '', '', '0');
INSERT INTO `esc_profiles` VALUES ('7', 'Service Manager', '0000-00-00', '', '', '0');
INSERT INTO `esc_profiles` VALUES ('8', 'KG Inventory', '0000-00-00', '', '', '3');
INSERT INTO `esc_profiles` VALUES ('9', '', '0000-00-00', '', '', '1');

-- ----------------------------
-- Table structure for `esc_profiles_fields`
-- ----------------------------
DROP TABLE IF EXISTS `esc_profiles_fields`;
CREATE TABLE `esc_profiles_fields` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of esc_profiles_fields
-- ----------------------------
INSERT INTO `esc_profiles_fields` VALUES ('1', 'name', 'Name', 'VARCHAR', '255', '3', '2', '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', '1', '3');
INSERT INTO `esc_profiles_fields` VALUES ('3', 'dob', 'Birthdate', 'DATE', '0', '0', '3', '', '', '', '', '0000-00-00', '', '', '0', '0');
INSERT INTO `esc_profiles_fields` VALUES ('4', 'address', 'Address', 'VARCHAR', '255', '0', '3', '', '', '', '', '', '', '', '0', '0');
INSERT INTO `esc_profiles_fields` VALUES ('6', 'phone', 'Phone Number', 'VARCHAR', '255', '0', '0', '', '', '', '', '', '', '', '0', '0');
INSERT INTO `esc_profiles_fields` VALUES ('7', 'branch_id', 'Branch', 'INTEGER', '11', '0', '3', '', '', '', '', '', '', '', '0', '3');

-- ----------------------------
-- Table structure for `esc_promo`
-- ----------------------------
DROP TABLE IF EXISTS `esc_promo`;
CREATE TABLE `esc_promo` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_promo
-- ----------------------------
INSERT INTO `esc_promo` VALUES ('7', 'P01', 'Test', 'dfdsfdsf', '10000', null, 'esc', '2013-11-13', '2013-11-30', '10', '100', 'product', '1', '1384344895', '1384344895', '1');

-- ----------------------------
-- Table structure for `esc_promo_product`
-- ----------------------------
DROP TABLE IF EXISTS `esc_promo_product`;
CREATE TABLE `esc_promo_product` (
  `promo_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`promo_product_id`),
  KEY `productset` (`promo_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_promo_product
-- ----------------------------
INSERT INTO `esc_promo_product` VALUES ('1', '5', '5', '1');
INSERT INTO `esc_promo_product` VALUES ('2', '5', '6', '1');
INSERT INTO `esc_promo_product` VALUES ('3', '6', '8', '2');
INSERT INTO `esc_promo_product` VALUES ('4', '7', '410', '10');

-- ----------------------------
-- Table structure for `esc_promo_treatment`
-- ----------------------------
DROP TABLE IF EXISTS `esc_promo_treatment`;
CREATE TABLE `esc_promo_treatment` (
  `promo_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`promo_product_id`),
  KEY `productset` (`promo_id`),
  KEY `product` (`treatment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_promo_treatment
-- ----------------------------
INSERT INTO `esc_promo_treatment` VALUES ('3', '3', '2', '1');
INSERT INTO `esc_promo_treatment` VALUES ('4', '3', '5', '1');
INSERT INTO `esc_promo_treatment` VALUES ('5', '6', '1', '3');

-- ----------------------------
-- Table structure for `esc_room`
-- ----------------------------
DROP TABLE IF EXISTS `esc_room`;
CREATE TABLE `esc_room` (
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
  KEY `branch_id` (`branch_id`),
  CONSTRAINT `branch_id` FOREIGN KEY (`branch_id`) REFERENCES `esc_branch` (`branch_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_room
-- ----------------------------
INSERT INTO `esc_room` VALUES ('1', '1', 'R01', 'Rooom', '', '1', '1375016245', '1375016245', '1');

-- ----------------------------
-- Table structure for `esc_room_treatment`
-- ----------------------------
DROP TABLE IF EXISTS `esc_room_treatment`;
CREATE TABLE `esc_room_treatment` (
  `room_treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  PRIMARY KEY (`room_treatment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_room_treatment
-- ----------------------------
INSERT INTO `esc_room_treatment` VALUES ('1', '1', '1');
INSERT INTO `esc_room_treatment` VALUES ('2', '1', '2');
INSERT INTO `esc_room_treatment` VALUES ('3', '1', '3');
INSERT INTO `esc_room_treatment` VALUES ('4', '1', '4');
INSERT INTO `esc_room_treatment` VALUES ('5', '1', '5');
INSERT INTO `esc_room_treatment` VALUES ('6', '1', '6');
INSERT INTO `esc_room_treatment` VALUES ('7', '1', '7');
INSERT INTO `esc_room_treatment` VALUES ('8', '1', '8');
INSERT INTO `esc_room_treatment` VALUES ('9', '1', '9');

-- ----------------------------
-- Table structure for `esc_schedule_room`
-- ----------------------------
DROP TABLE IF EXISTS `esc_schedule_room`;
CREATE TABLE `esc_schedule_room` (
  `schedule_room_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `changed` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`schedule_room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_schedule_room
-- ----------------------------
INSERT INTO `esc_schedule_room` VALUES ('1', '3', '2', '1', '2014-01-30', '08:00:00', '03:00:00', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `esc_sex`
-- ----------------------------
DROP TABLE IF EXISTS `esc_sex`;
CREATE TABLE `esc_sex` (
  `sex_id` int(11) NOT NULL AUTO_INCREMENT,
  `sex_code` varchar(6) NOT NULL,
  `sex` varchar(10) NOT NULL,
  PRIMARY KEY (`sex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_sex
-- ----------------------------
INSERT INTO `esc_sex` VALUES ('1', 'F', 'Female');
INSERT INTO `esc_sex` VALUES ('2', 'M', 'Male');

-- ----------------------------
-- Table structure for `esc_source_info`
-- ----------------------------
DROP TABLE IF EXISTS `esc_source_info`;
CREATE TABLE `esc_source_info` (
  `source_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `source_info` varchar(50) NOT NULL,
  PRIMARY KEY (`source_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_source_info
-- ----------------------------
INSERT INTO `esc_source_info` VALUES ('1', 'Magazine');
INSERT INTO `esc_source_info` VALUES ('2', 'Newspaper');
INSERT INTO `esc_source_info` VALUES ('3', 'Newspaper');
INSERT INTO `esc_source_info` VALUES ('4', 'From event');
INSERT INTO `esc_source_info` VALUES ('5', 'Just walk in');

-- ----------------------------
-- Table structure for `esc_supplier`
-- ----------------------------
DROP TABLE IF EXISTS `esc_supplier`;
CREATE TABLE `esc_supplier` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_supplier
-- ----------------------------
INSERT INTO `esc_supplier` VALUES ('1', 'S01', 'Supplier', 'Jakarta', '1234', '123', '08:30:00', '', '1', '1374990309', '1374990309', '1');
INSERT INTO `esc_supplier` VALUES ('2', 'S02', 'Supplier2', null, null, null, '00:00:00', null, '0', '0', '0', '1');

-- ----------------------------
-- Table structure for `esc_treatment`
-- ----------------------------
DROP TABLE IF EXISTS `esc_treatment`;
CREATE TABLE `esc_treatment` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_treatment
-- ----------------------------
INSERT INTO `esc_treatment` VALUES ('10', 'RFT', 'RECOVERY FACIAL TREATMENT', 'Perawatan wajah untuk kulit  sensitive dan kulit yang sangat kering mudah iritasi dan kemerahan, yang berfungsi memperbaiki kelembapan pada kulit kering. Memperbaiki serabut kolagen dan dapat mencerahkan kulit serta mampu menenangkan dan mengembalikan kulit pada keadaan normal .', '01:30:00', '1000000', '10', '1', '1385422639', '1385422639', '1');

-- ----------------------------
-- Table structure for `esc_treatmentpackage`
-- ----------------------------
DROP TABLE IF EXISTS `esc_treatmentpackage`;
CREATE TABLE `esc_treatmentpackage` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_treatmentpackage
-- ----------------------------
INSERT INTO `esc_treatmentpackage` VALUES ('1', 'TP01', 'Name', '10000000', '1', '2', '1375069630', '1375069630', '1');

-- ----------------------------
-- Table structure for `esc_treatmentpackage_detail`
-- ----------------------------
DROP TABLE IF EXISTS `esc_treatmentpackage_detail`;
CREATE TABLE `esc_treatmentpackage_detail` (
  `treatmentpackage_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatmentpackage_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`treatmentpackage_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_treatmentpackage_detail
-- ----------------------------
INSERT INTO `esc_treatmentpackage_detail` VALUES ('1', '1', '1', '10');
INSERT INTO `esc_treatmentpackage_detail` VALUES ('2', '1', '2', '10');

-- ----------------------------
-- Table structure for `esc_treatment_detail`
-- ----------------------------
DROP TABLE IF EXISTS `esc_treatment_detail`;
CREATE TABLE `esc_treatment_detail` (
  `treatment_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_id` varchar(10) NOT NULL,
  PRIMARY KEY (`treatment_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_treatment_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `esc_treatment_procedure`
-- ----------------------------
DROP TABLE IF EXISTS `esc_treatment_procedure`;
CREATE TABLE `esc_treatment_procedure` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_treatment_procedure
-- ----------------------------
INSERT INTO `esc_treatment_procedure` VALUES ('10', '0', 'RECOVERY FACIAL TREATMENT', 'Perawatan wajah untuk kulit  sensitive dan kulit yang sangat kering mudah iritasi dan kemerahan, yang berfungsi memperbaiki kelembapan pada kulit kering. Memperbaiki serabut kolagen dan dapat mencerahkan kulit serta mampu menenangkan dan mengembalikan kulit pada keadaan normal .', '0', '1', '1385422639', '1385422639', '1');

-- ----------------------------
-- Table structure for `esc_treatment_product`
-- ----------------------------
DROP TABLE IF EXISTS `esc_treatment_product`;
CREATE TABLE `esc_treatment_product` (
  `treatment_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`treatment_product_id`),
  KEY `productset` (`treatment_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_treatment_product
-- ----------------------------

-- ----------------------------
-- Table structure for `esc_unit`
-- ----------------------------
DROP TABLE IF EXISTS `esc_unit`;
CREATE TABLE `esc_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_code` varchar(10) NOT NULL,
  `unit_name` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_unit
-- ----------------------------
INSERT INTO `esc_unit` VALUES ('1', 'gram', 'gram', 'cabin', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('2', 'pcs', 'pcs', 'cabin', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('3', 'lembar', 'lembar', 'cabin', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('4', 'ml', 'ml', 'cabin', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('5', 'ampul', 'ampul', 'homecare', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('6', 'box', 'box', 'homecare', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('7', 'btl', 'btl', 'homecare', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('8', 'pcs', 'pcs', 'homecare', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('9', 'set', 'set', 'homecare', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('10', 'ball', 'ball', 'homecare', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('11', 'dirigen\r\n', 'dirigen\r\n', 'homecare', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('12', 'pack', 'pack', 'homecare', '1', '1', '0', '1');
INSERT INTO `esc_unit` VALUES ('13', 'tube', 'tube', 'homecare', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `esc_users`
-- ----------------------------
DROP TABLE IF EXISTS `esc_users`;
CREATE TABLE `esc_users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of esc_users
-- ----------------------------
INSERT INTO `esc_users` VALUES ('1', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '535bbe6d8aae83e33dbaa5fbb5b25f37', '1', '1', '2013-02-15 18:12:03', '2014-01-30 05:10:40');
INSERT INTO `esc_users` VALUES ('2', 'accounting', 'fe01ce2a7fbac8fafaed7c982a04e229', 'accounting@esc.com', '0ee28cc79b8599683c6f8f0ba1702a98', '0', '1', '2013-02-18 06:03:10', '2014-01-24 12:52:26');
INSERT INTO `esc_users` VALUES ('3', 'inventory', 'fe01ce2a7fbac8fafaed7c982a04e229', 'inventory@esc.com', '140d0b164358f904d5200314e6b8d535', '0', '1', '2013-04-29 06:21:32', '2014-01-27 10:33:17');
INSERT INTO `esc_users` VALUES ('4', 'service', 'fe01ce2a7fbac8fafaed7c982a04e229', 'service@korrner.co.id', 'b75cbeb4bc50910143d5919ddfa96458', '0', '1', '2013-04-29 07:37:10', '2014-01-24 12:52:48');
INSERT INTO `esc_users` VALUES ('5', 'consultant', 'fe01ce2a7fbac8fafaed7c982a04e229', 'consultant@korrner.co.id', 'ed10df6c66f569df2f595b9353e503ac', '0', '1', '2013-04-29 08:20:21', '2014-01-27 10:34:23');
INSERT INTO `esc_users` VALUES ('6', 'cashier', 'fe01ce2a7fbac8fafaed7c982a04e229', 'cashier@korrner.co.id', '97053ac12963497b5a9b8f1b363affc0', '0', '1', '2013-05-13 07:06:19', '2014-01-24 12:47:43');
INSERT INTO `esc_users` VALUES ('7', 'servicemanager', 'fe01ce2a7fbac8fafaed7c982a04e229', 'servicemanager@korrner.co.id', '013c6bacdcf5c7056fd70e51fd544ae5', '0', '1', '2013-05-20 10:14:09', '2014-01-24 12:48:22');
INSERT INTO `esc_users` VALUES ('8', 'kg_inventory', 'fe01ce2a7fbac8fafaed7c982a04e229', 'kg_inventory@esl.com', '4a3fec52e582fa23e00f5990294e8db7', '0', '1', '2013-11-13 20:20:56', '2014-01-24 12:48:58');
INSERT INTO `esc_users` VALUES ('9', 'frontdesk', 'fe01ce2a7fbac8fafaed7c982a04e229', 'frontdesk@korrner.co.id', 'bfaadd794f61c1db6429feab970db7c0', '0', '1', '2014-01-24 14:25:30', '2014-01-30 06:36:57');

-- ----------------------------
-- Table structure for `order_product`
-- ----------------------------
DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_product
-- ----------------------------

-- ----------------------------
-- Table structure for `rights`
-- ----------------------------
DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rights
-- ----------------------------
INSERT INTO `rights` VALUES ('Accounting', '2', '0');
INSERT INTO `rights` VALUES ('Administrator', '2', '1');
INSERT INTO `rights` VALUES ('Cashier', '2', '2');
INSERT INTO `rights` VALUES ('Consultant', '2', '3');
INSERT INTO `rights` VALUES ('Frontdesk', '2', '6');
INSERT INTO `rights` VALUES ('Inventory', '2', '4');
INSERT INTO `rights` VALUES ('Service and Treatment Manager', '2', '5');

-- ----------------------------
-- Table structure for `tbl_migration`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_migration
-- ----------------------------
INSERT INTO `tbl_migration` VALUES ('m000000_000000_base', '1360926703');
INSERT INTO `tbl_migration` VALUES ('m110805_153437_installYiiUser', '1360926723');
INSERT INTO `tbl_migration` VALUES ('m110810_162301_userTimestampFix', '1360926724');

-- ----------------------------
-- Table structure for `treatment_machine`
-- ----------------------------
DROP TABLE IF EXISTS `treatment_machine`;
CREATE TABLE `treatment_machine` (
  `treatment_machine_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  PRIMARY KEY (`treatment_machine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of treatment_machine
-- ----------------------------
