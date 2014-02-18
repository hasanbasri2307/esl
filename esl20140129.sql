/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : esl

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-01-29 17:29:21
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
  `marital_status_id` int(11) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `id_card_id` int(11) NOT NULL,
  `id_card_number` varchar(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of esc_client
-- ----------------------------
INSERT INTO `esc_client` VALUES ('1', 'Nama', '1', '1', '1', '1', '1', 'Jakarta', '1980-01-13', 'Jakarta', 'Jakarta', '12270', '124536987', '1', '1', '1', '1', '0', '1');

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
INSERT INTO `esc_users` VALUES ('1', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '535bbe6d8aae83e33dbaa5fbb5b25f37', '1', '1', '2013-02-15 18:12:03', '2014-01-29 15:09:41');
INSERT INTO `esc_users` VALUES ('2', 'accounting', 'fe01ce2a7fbac8fafaed7c982a04e229', 'accounting@esc.com', '0ee28cc79b8599683c6f8f0ba1702a98', '0', '1', '2013-02-18 06:03:10', '2014-01-24 12:52:26');
INSERT INTO `esc_users` VALUES ('3', 'inventory', 'fe01ce2a7fbac8fafaed7c982a04e229', 'inventory@esc.com', '140d0b164358f904d5200314e6b8d535', '0', '1', '2013-04-29 06:21:32', '2014-01-27 10:33:17');
INSERT INTO `esc_users` VALUES ('4', 'service', 'fe01ce2a7fbac8fafaed7c982a04e229', 'service@korrner.co.id', 'b75cbeb4bc50910143d5919ddfa96458', '0', '1', '2013-04-29 07:37:10', '2014-01-24 12:52:48');
INSERT INTO `esc_users` VALUES ('5', 'consultant', 'fe01ce2a7fbac8fafaed7c982a04e229', 'consultant@korrner.co.id', 'ed10df6c66f569df2f595b9353e503ac', '0', '1', '2013-04-29 08:20:21', '2014-01-27 10:34:23');
INSERT INTO `esc_users` VALUES ('6', 'cashier', 'fe01ce2a7fbac8fafaed7c982a04e229', 'cashier@korrner.co.id', '97053ac12963497b5a9b8f1b363affc0', '0', '1', '2013-05-13 07:06:19', '2014-01-24 12:47:43');
INSERT INTO `esc_users` VALUES ('7', 'servicemanager', 'fe01ce2a7fbac8fafaed7c982a04e229', 'servicemanager@korrner.co.id', '013c6bacdcf5c7056fd70e51fd544ae5', '0', '1', '2013-05-20 10:14:09', '2014-01-24 12:48:22');
INSERT INTO `esc_users` VALUES ('8', 'kg_inventory', 'fe01ce2a7fbac8fafaed7c982a04e229', 'kg_inventory@esl.com', '4a3fec52e582fa23e00f5990294e8db7', '0', '1', '2013-11-13 20:20:56', '2014-01-24 12:48:58');
INSERT INTO `esc_users` VALUES ('9', 'frontdesk', 'fe01ce2a7fbac8fafaed7c982a04e229', 'frontdesk@korrner.co.id', 'bfaadd794f61c1db6429feab970db7c0', '0', '1', '2014-01-24 14:25:30', '2014-01-29 12:48:52');

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

-- ----------------------------
-- Table structure for `_esc_m_product`
-- ----------------------------
DROP TABLE IF EXISTS `_esc_m_product`;
CREATE TABLE `_esc_m_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_number` varchar(30) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `price_sell` double NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of _esc_m_product
-- ----------------------------
INSERT INTO `_esc_m_product` VALUES ('1', 'MPH1530Z', 'EvenCare®, control solutions, high/low', 'EvenCare®, control solutions, high/low', '160000', '160000', '', '1', '1', '1361863217', '1', '1361863217');
INSERT INTO `_esc_m_product` VALUES ('2', 'MIS70550Z', 'Precision Optium™, control solutions, high/low', 'Precision Optium™, control solutions, high/low', '160000', '160000', '', '1', '1', '1361863242', '1', '1361863242');
INSERT INTO `_esc_m_product` VALUES ('3', 'MPH1505515', 'Lancet, 23 g needle w/protective cap', 'Lancet, 23 g needle w/protective cap', '100000', '100000', '', '1', '1', '1361863274', '1', '1361863274');
INSERT INTO `_esc_m_product` VALUES ('4', 'SRGSLN2401', 'Lancet, 2.4 mm, SurgiLance™ Safety Lancet', 'Lancet, 2.4 mm, SurgiLance™ Safety Lancet', '200000', '200000', '', '1', '1', '1361863304', '1', '1361863304');
INSERT INTO `_esc_m_product` VALUES ('5', 'ITCTF50H', 'Lancet, Tenderfoot®, neonatal', 'Lancet, Tenderfoot®, neonatal', '140000', '140000', '', '1', '1', '1361863330', '1', '1361863330');

-- ----------------------------
-- Table structure for `_esc_position`
-- ----------------------------
DROP TABLE IF EXISTS `_esc_position`;
CREATE TABLE `_esc_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of _esc_position
-- ----------------------------
INSERT INTO `_esc_position` VALUES ('1', 'Beautician', '1', '1', '1', '1');
INSERT INTO `_esc_position` VALUES ('2', 'Doctor', '1', '1', '1', '1');
INSERT INTO `_esc_position` VALUES ('3', 'Front Desk', '1', '1', '1', '1');
INSERT INTO `_esc_position` VALUES ('4', 'Accouting', '1', '1', '1', '1');
INSERT INTO `_esc_position` VALUES ('5', 'Test', '1', '1', '1', '1');
