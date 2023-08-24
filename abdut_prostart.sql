/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - abdut_prostart
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`abdut_prostart` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `abdut_prostart`;

/*Table structure for table `blogmst` */

DROP TABLE IF EXISTS `blogmst`;

CREATE TABLE `blogmst` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `blogmst` */

insert  into `blogmst`(`id`,`title`,`description`,`image`) values 
(1,'Google My Business Logo: How To Add, Remove & Optimize?','Are you interested in learning about Google My Business Logo, or how to optimize your Google My Business Profile? If yes, give it a read.','https://recurpost.com/wp-content/uploads/2021/12/Google-My-Business-Logo-feature.png'),
(2,'Google My Business Logo: How To Add, Remove & Optimize?','Are you interested in learning about Google My Business Logo, or how to optimize your Google My Business Profile? If yes, give it a read.','https://recurpost.com/wp-content/uploads/2021/12/Google-My-Business-Logo-feature.png'),
(3,'A Revenue Recognition Primer for SaaS Providers: Finding Insights in Recognizing Revenues Under ASC 606 | Warren Averett CPAs & Advisors','The software as a service (SaaS) delivery model has been on a tear and shows no signs of slowing down. In a high growth industry, companies are moving fast to stay competitive—introducing new offerings, adjusting their services to improve customer retention, and finding new revenue streams.','https://warrenaverett.com/wp-content/uploads/Revenue-Recognition-SaaS-01.png'),
(4,'13 Instagram Reels Templates to Boost Content Creativity','Learn how to use Instagram Reels templates to create trending, on-brand Instagram content that your followers will love, faster than ever.','https://recurpost.com/wp-content/uploads/2023/07/13-Instagram-Reels-Templates-to-Boost-Content-Creativity.png'),
(5,'13 Instagram Reels Templates to Boost Content Creativity','Learn how to use Instagram Reels templates to create trending, on-brand Instagram content that your followers will love, faster than ever.','https://recurpost.com/wp-content/uploads/2023/07/13-Instagram-Reels-Templates-to-Boost-Content-Creativity.png'),
(6,'Twitter Card Validator: Create Tweets with Stunning Visuals','Looking to implement Twitter cards? Let’s find out what a Twitter card validator is and how to use it to maximize tweet performance.','https://recurpost.com/wp-content/uploads/2023/07/Twitter-Card-Validator-Create-Tweets-with-Stunning-Visuals.png'),
(7,'What is UGC Content and How Brand Marketing Benefits From it','What’s better for brand marketing than happy customers doing the marketing for you? Learn how to achieve that with UGC content in this guide!','https://recurpost.com/wp-content/uploads/2023/07/What-is-UGC-content-and-How-Brand-Marketing-benefits-from-it.png'),
(8,'What is UGC Content and How Brand Marketing Benefits From it','What’s better for brand marketing than happy customers doing the marketing for you? Learn how to achieve that with UGC content in this guide!','https://recurpost.com/wp-content/uploads/2023/07/What-is-UGC-content-and-How-Brand-Marketing-benefits-from-it.png'),
(9,'How To Become a Top Money Making Social Media Consultant','Want to know how you can become a top social media consultant? Read our article to find out all the insider secrets and get on the right path!','https://recurpost.com/wp-content/uploads/2023/07/How-To-Become-a-Top-Money-Making-Social-Media-Consultant-Feature-Image.png'),
(10,'9 Real Estate Social Networks to Connect with Right Clients','Looking for the best real estate social network to obtain genuine leads and connect with your clients? Here’s the ultimate list you need!','https://recurpost.com/wp-content/uploads/2023/06/Real-Estate-Social-Networks-to-Connect-with-Right-Clients-Featured-Image.png'),
(11,'How To Verify Your YouTube Account: Easy To Follow Steps','Learn how to verify your YouTube account step-by-step. Gain credibility, unlock features, & build trust with your audience. Start now!','https://recurpost.com/wp-content/uploads/2023/06/How-To-Verify-Your-YouTube-Account.png');

/*Table structure for table `library_posts` */

DROP TABLE IF EXISTS `library_posts`;

CREATE TABLE `library_posts` (
  `post_id` int(11) NOT NULL,
  `library_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `library_posts` */

insert  into `library_posts`(`post_id`,`library_id`,`message`,`priority`) values 
(1,1,'Test 1',1),
(2,1,'Test 2',3),
(3,1,'Test 3',5),
(4,1,'Test 4',4),
(5,2,'Test 5',1),
(6,2,'Test 6',2),
(7,2,'Test 7',6),
(8,2,'Test 8',4),
(9,3,'Test 9',1),
(10,3,'Test 10',2),
(11,4,'Test 11',1),
(12,4,'Test 12',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
