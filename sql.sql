/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - cargo_truck
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cargo_truck` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cargo_truck`;

/*Table structure for table `auctions` */

DROP TABLE IF EXISTS `auctions`;

CREATE TABLE `auctions` (
  `auction_id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_id` int(11) DEFAULT NULL,
  `starting_time` varchar(100) DEFAULT NULL,
  `starting_date` varchar(100) DEFAULT NULL,
  `starting_amount` int(11) DEFAULT NULL,
  `bid_increment` varchar(100) DEFAULT NULL,
  `auction_status` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `auctions` */

insert  into `auctions`(`auction_id`,`cargo_id`,`starting_time`,`starting_date`,`starting_amount`,`bid_increment`,`auction_status`,`duration`) values 
(2,1,'13:58','2022-09-18',1000,'500','pending','1 month'),
(3,1,'14:42','2022-10-06',1000,'1000','pending','1 month'),
(4,1,'14:46','2022-10-07',1500,'10000','pending','1 month'),
(5,1,'12:53','2022-10-03',1500,'500','pending','1 month'),
(6,5,'12:01','2022-10-22',500,'500','pending','1 month'),
(8,5,'12:01','2022-10-22',500,'500','stop','1 month'),
(9,1,'12:01','2022-10-04',1500,'1000','pending','1 month'),
(10,1,'12:01','2022-10-04',1500,'1000','pending','1 month'),
(11,1,'12:01','2022-10-04',1500,'1000','pending','1 month'),
(12,1,'12:01','2022-10-04',1500,'1000','pending','1 month'),
(13,6,'15:42','2022-09-26',1500,'500','start','1 month');

/*Table structure for table `bids` */

DROP TABLE IF EXISTS `bids`;

CREATE TABLE `bids` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` varchar(30) DEFAULT NULL,
  `bid_amount` decimal(18,0) DEFAULT NULL,
  `bid_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `bids` */

insert  into `bids`(`bid_id`,`auction_id`,`user_id`,`date_time`,`bid_amount`,`bid_status`) values 
(1,1,0,'2022-08-08 17:14:22',1000,'pending'),
(2,1,1,'2022-08-08 17:16:59',2000,'winner'),
(3,2,0,'2022-09-17 10:58:41',1000,'pending'),
(4,2,3,'2022-09-17 11:02:05',2000,'pending'),
(5,2,3,'2022-09-17 11:05:07',3000,'winner'),
(6,3,0,'2022-10-06 12:43:09',1000,'pending'),
(7,4,0,'2022-10-06 12:47:01',1500,'pending'),
(8,5,0,'2022-10-06 12:51:24',1500,'pending'),
(9,6,0,'2022-10-06 12:56:23',500,'pending'),
(10,8,0,'2022-10-06 12:57:29',500,'pending'),
(11,9,0,'2022-10-06 12:58:07',1500,'pending'),
(12,10,0,'2022-10-06 12:58:13',1500,'pending'),
(13,11,0,'2022-10-06 12:58:19',1500,'pending'),
(14,12,0,'2022-10-06 12:59:06',1500,'pending'),
(15,8,1,'2022-10-06 13:00:41',600,'pending'),
(16,8,3,'2022-10-06 13:01:31',1000,'pending'),
(17,8,3,'2022-10-06 13:01:53',2000,'winner'),
(18,13,0,'2022-10-06 15:40:14',1500,'pending');

/*Table structure for table `cargo` */

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `cargo_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cargo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `cargo` */

insert  into `cargo`(`cargo_id`,`category_id`,`owner_id`,`name`,`image`,`description`,`status`) values 
(6,1,1,'qwertyuio','image/image_633ea94c5a217.jfif','descriptions..........','pending'),
(5,1,4,'Qwertyuio','image/image_633e7fa0d9e45.jfif','Aescriptions..........1','start');

/*Table structure for table `cargo_category` */

DROP TABLE IF EXISTS `cargo_category`;

CREATE TABLE `cargo_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `category_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cargo_category` */

insert  into `cargo_category`(`category_id`,`category_name`,`category_description`) values 
(1,'Cargo','Descriptions');

/*Table structure for table `complaints` */

DROP TABLE IF EXISTS `complaints`;

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `complaint` varchar(30) DEFAULT NULL,
  `reply` varchar(30) DEFAULT NULL,
  `date_time` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `complaints` */

insert  into `complaints`(`complaint_id`,`user_id`,`complaint`,`reply`,`date_time`) values 
(1,1,'good','ok','2022-08-08'),
(2,3,'bad','hai','2022-09-17');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`user_type`) values 
(1,'admin','admin','admin'),
(2,'user','user','user'),
(3,'user1','user1','user'),
(4,'owner','owner','owner'),
(5,'owner1','owner1','block'),
(6,'hai','hai','user'),
(8,'hello','hello','owner');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `sender_type` varchar(100) DEFAULT NULL,
  `receiver_type` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `message` */

insert  into `message`(`message_id`,`sender_id`,`receiver_id`,`sender_type`,`receiver_type`,`message`,`date_time`) values 
(1,2,4,'user','owner','hai','2022-08-09'),
(2,4,2,'owner','user','yes','2022-08-09'),
(3,7,2,'owner','user','hai','2022-09-17'),
(4,6,4,'user','owner','yes','2022-09-17'),
(5,6,4,'user','owner','hai','2022-09-17'),
(6,6,4,'user','owner','hai','2022-09-17'),
(7,6,4,'user','owner','hello','2022-09-17'),
(8,2,8,'user','owner','hai','2022-10-06');

/*Table structure for table `owners` */

DROP TABLE IF EXISTS `owners`;

CREATE TABLE `owners` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `owners` */

insert  into `owners`(`owner_id`,`login_id`,`name`,`place`,`street`,`landmark`,`phone`,`email`,`status`) values 
(1,4,'owner','ernakulam','street','road','1234567890','owner@gmail.com','accept'),
(2,5,'owner1','kerala','street','road','1234567890','owner@gmail.com','owner'),
(4,8,'hello','ernakulam','street','road','9999999999','owner@gmail.com','owner');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date_time` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `payments` */

insert  into `payments`(`payment_id`,`bid_id`,`amount`,`date_time`) values 
(1,2,2000,'2022-08-08'),
(2,5,3000,'2022-09-17'),
(3,17,2000,'2022-10-06'),
(4,2,2000,'2022-10-06');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `house_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`login_id`,`first_name`,`last_name`,`house_name`,`place`,`pincode`,`gender`,`dob`,`phone`,`email`) values 
(1,2,'user','user','jskhksaf','karanakodam','682032','female','2022-08-25','1234567890','user@gmail.com'),
(2,3,'user1','userrr','fdsgdsgfsds','ernakulam','682999','male','2022-08-19','1234567890','user1@gamil.com'),
(3,6,'hai','hai','djhgdkudgdg','kerala','683353','male','2022-09-15','1234561111','hai@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
