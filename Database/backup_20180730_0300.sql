-- MySQL dump 10.13  Distrib 5.6.39, for Linux (x86_64)
--
-- Host: localhost    Database: cptadmin_C4UDB
-- ------------------------------------------------------
-- Server version	5.6.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `book_title` varchar(80) COLLATE latin1_general_ci DEFAULT NULL,
  `book_author` varchar(80) COLLATE latin1_general_ci DEFAULT NULL,
  `book_image` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `book_desc` text COLLATE latin1_general_ci,
  `book_price` decimal(6,2) NOT NULL,
  `publisherid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`book_isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('0-13-167267-3','Database Processing: Fundamentals, Design, and Implementation 10th Edition','David Kroenke','database.jpg','Deliver the skills needed to plan, design, develop, deploy, and maintain SQL databases.',40.00,1),('0-7600-4988-2','Planning and Designing Effective Websites 1st Edition','Sue A. Conger; Richard O. Mason','websites.jpg','The World Wide Web is becoming a pervasive force in our daily lives, learn how to design and implement websites with HTML and JavaScript',10.00,3),('978-0-13-601267-2','Introduction to JAVA Programming 7th Edition','Y. Daniel Liang','java.jpg','This book covers fundamentals of programming, object-oreiented programming, GUI programming, data structures, and Web programming',30.00,1),('978-0-7897-4710-5','Upgrading and Repairing PCs 20th Edition','Scott Mueller','upgrade.jpg','With a focus on learning how to maintain, upgrade, and troubleshoot your PC system, this book will help you fully understand the family of computers that has grown from the original IBM PC',20.00,4),('978-0073304274','Programming in Visual Basic .NET 5th Edition','Julia Case Bradley; Anita C Millspaugh','introvb.jpg','The best way to learn to program in VB is to do it, this book will teach you the fundamentals of coding in Visual Basic',40.00,6),('978-0073517223','Advanced Programming Using Visual Basic 4th Edition','Julia Case Bradley; Anita Millspaugh','advancedvb.jpg','Take skills you have learned in the past to master dynamic Windows applications and connect to database environments',40.00,6),('978-1-133-13508-1','A+ Guide to Managing & Maintaining Your PC 8th Edition','Jean Andrews','a+.jpg','Best-selling guide providing a complete, practical, up-to-date introduction to hardware specifications and troubleshooting standards',70.00,3),('978-1-133-52610-0','New Perspectives on Blended HTML and CSS Fundamentals 3rd Edition','Henry Bojack; Sharon Scollard','html.jpg','Learn new perspectives with beginning web programming students with in-depth coverage of CSS and HTML5',65.00,2),('978-1-305-09094-1','Network+ Guide to Networks 7th Edition','Jill West; Tamara Dean; Jean Andrews','network.jpg','Best-selling guide providing a complete, practical, up-to-date introduction to network structure and security',80.00,3),('978-1-305-09391-1','CompTIA Security+ Guide to Network Security Fundamentals 5th Edition','Mark Ciampa','security.jpg','Best-selling guide providing a complete, practical, up-to-date introduction to network and computer security',100.00,3),('978-1-305-63200-4','MIS (with MIS Online) 6th Edition','Hossein Bidgoli','mis.jpg','MIS 6 employs state-of-the-art coverage through numerous practical applications',85.00,2),('978-1-4188-3765-5','Introduction to ASP.NET 2.0 3rd Edition','Kate Kalata','asp.jpg','Learn to build dynamic Web applications using server-side programming technologies in ASP.NET',40.00,2),('978-1-4239-1222-4','Systems Analysis and Design 7th Edition','Gary B. Shelly; Thomas J. Cashman; Harry J. Rosenblatt','systemsdesign.jpg','Systems Analysys and Design, Seventh Edition presents a practical approach to information technology and systems development',20.00,3),('978-1-58713-209-4','Network for Home and Small Businesses, CCNA Discovery Learning Guide 1st Edition','Allan Reid; Jim Lorenz','networking.jpg','This book covers the major topics in the same equence as the online curriculum for the CCNA Discovery Networking for Home and Small Businesses course',30.00,5),('978-1-890774-79-0 ','Murachs PHP and MySQL 2nd Edition','Joel Murach; Ray Harris','php.jpg','2nd Edition web application development with PHP and database architecture using MySQL',30.00,7),('978-1-890774-96-7','Murachs SQL Server 2016 for Developers 1st Edition','Joel Murach; Bryan Syverson','sql2016.jpg','Plan, design, build, implement, and support SQL 2016 databases',50.00,7);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `semester` text COLLATE latin1_general_ci NOT NULL,
  `campus` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `course_code` text COLLATE latin1_general_ci NOT NULL,
  `course_start` date NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ship_name` char(60) COLLATE latin1_general_ci NOT NULL,
  `ship_address` char(80) COLLATE latin1_general_ci NOT NULL,
  `ship_city` char(30) COLLATE latin1_general_ci NOT NULL,
  `ship_zip_code` char(10) COLLATE latin1_general_ci NOT NULL,
  `ship_country` char(20) COLLATE latin1_general_ci NOT NULL,
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `comments` text COLLATE latin1_general_ci NOT NULL,
  `confirmation_number` int(11) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (46,13,2550.00,'Fall 2018','Barton ','CPT 113','2018-08-15',30,'2018-07-24 22:45:48','Mark Johnson','506 S Pleasantburg Dr','Greenville','29607','US','978-1-305-63200-4','',8364657),(47,13,1000.00,'Fall 2018','Barton Campus','IST 266','2018-08-15',10,'2018-07-24 22:57:45','Mark Johnson','506 S Pleasantburg Dr','Greenville','29607','US','978-1-305-09391-1','',7635276),(48,13,960.00,'Fall 2018','Barton Campus','IST 220','2018-08-15',12,'2018-07-24 22:59:58','Mark Johnson','506 S Pleasantburg Dr','Greenville','29607','US','978-1-305-09094-1','',1274589),(49,15,420.00,'Spring 2019','Barton Campus','CPT 267','2019-01-21',21,'2018-07-24 23:02:33','Keith Vollnoggle','506 S Pleasantburg Dr','Greenville','29607','US','978-0-7897-4710-5','',7124123),(50,15,1235.00,'Spring 2019','Barton Campus','IST 226','2019-01-21',19,'2018-07-24 23:04:24','Keith Vollnoggle','506 S Pleasantburg Dr','Greenville','29607','US','978-1-133-52610-0','',6302789),(51,15,660.00,'Spring 2019','Barton Campus','CPT 236','2019-01-21',22,'2018-07-24 23:06:58','Keith Vollnoggle','506 S Pleasantburg Dr','Greenville','29607','US','978-0-13-601267-2','',9538743),(52,15,780.00,'Spring 2019','Barton Campus','CPT 283','2019-01-21',26,'2018-07-24 23:08:23','Keith Vollnoggle','506 S Pleasantburg Dr','Greenville','29607','US','978-1-890774-79-0 ','',1742389),(53,14,1150.00,'Fall 2018','Barton Campus','IST 272','2018-08-15',23,'2018-07-24 23:10:09','Kim Cannon','506 S Pleasantburg Dr','Greenville','29607','US','978-1-890774-96-7','',8346213),(54,14,340.00,'Fall 2018','Northwest Campus','IST 278','2018-08-15',17,'2018-07-24 23:12:23','Kim Cannon','8109 White Horse Rd','Greenville','29617','US','978-1-4239-1222-4','',9345986),(55,14,180.00,'Fall 2018','Northwest Campus','CPT 170','2018-08-15',18,'2018-07-24 23:15:09','Kim Cannon','8109 White Horse Rd','Greenville','29617','US','0-7600-4988-2','',5421890),(56,14,750.00,'Fall 2018','Barton Campus','CPT 280','2018-08-15',25,'2018-07-24 23:19:31','Kim Cannon','506 S Pleasantburg Dr','Greenville','29607','US','978-1-58713-209-4','',9345897),(57,14,920.00,'Fall 2018','Barton Campus','CPT 230','2018-08-15',23,'2018-07-24 23:20:51','Kim Cannon','506 S Pleasantburg Dr','Greenville','29607','US','978-0-07351717-9','',1896432),(58,7,600.00,'Spring 2019','Barton Campus','IST 272','2018-08-15',15,'2018-07-24 23:22:49','Robert Whaite','506 S Pleasantburg Dr','Greenville','29607','US','0-13-167267-3','',9704532),(59,7,910.00,'Fall 2018','Barton Campus','CPT 209','2018-08-15',13,'2018-07-24 23:23:52','Robert Whaite','506 S Pleasantburg Dr','Greenville','29607','US','978-1-133-13508-1','',7651234),(60,7,720.00,'Fall 2018','Barton Campus','CPT 231','2018-08-15',18,'2018-07-24 23:26:56','Robert Whaite','506 S Pleasantburg Dr','Greenville','29607','US','978-1-4188-3765-5','',2378965),(61,7,1160.00,'Fall 2018','Barton Campus','CPT 232','2018-08-15',29,'2018-07-24 23:28:37','Robert Whaite','506 S Pleasantburg Dr','Greenville','29607','US','978-0073304274','',5478965),(62,7,850.00,'Fall 2018','Barton Campus','CPT 113','2018-08-15',10,'2018-07-24 23:30:05','Robert Whaite','506 S Pleasantburg Dr','Greenville','29607','US','978-1-305-63200-4','',6745321),(63,7,585.00,'Fall 2018','Barton Campus','IST 226','2018-08-15',9,'2018-07-24 23:31:39','Robert Whaite','506 S Pleasantburg Dr','Greenville','29607','US','978-1-133-52610-0','Order was placed late. May come in a day later. Inform instructor.',5432158),(75,14,450.00,'Spring 2019','Brashier Campus','CPT 236','2019-02-10',15,'2018-07-26 21:38:24','Kim Cannon','500 South Pleasantburg','Greenville','29615','US','978-0-13-601267-2','Please leave order at door if no one is present',4084084),(76,5,300.00,'Spring 2020','Brashier Campus','CPT 236','2019-02-10',10,'2018-07-26 22:02:07','Kim Cannon','500 South Pleasantburg','Greenville','29615','US','978-0-13-601267-2','',6555227),(77,13,700.00,'Fall 2018','Barton Campus','CPT 235','2018-09-04',10,'2018-07-26 22:16:29','Mark Johnson','500 South Pleasantburg','Greenville','29615','US','978-1-133-13508-1','Please write a funny joke on the inside of each book',6110775),(78,13,300.00,'Summer 2019','Northwest Campus','CPT 244','2019-05-28',10,'2018-07-26 22:30:13','Mark Johnson','200 Downtown Avenue','Greenville','29607','US','978-1-58713-209-4','Please include 10 book wrappers as well',3693354),(79,9,450.00,'Summer 2020','Northwest Campus','CPT 244','2019-05-28',15,'2018-07-26 22:41:15','Mark Johnson','200 Downtown Avenue','Greenville','29607','US','978-1-58713-209-4','',9395324),(80,14,20.00,'Fall 2020','Greer','IST 279','2018-08-25',2,'2018-07-27 00:14:15','Jonathan Sarasty','26 SPRING FELLOW LN','Greenville','29607','United States','0-7600-4988-2','Order was placed late. May come in a day later. Inform instructor.',1707931),(82,5,10.00,'Fall 2020','Greer','IST 279','2018-08-25',1,'2018-07-27 00:54:14','Jonathan Sarasty','26 SPRING FELLOW LN','Greenville','29607','United States','0-7600-4988-2','',8166243),(83,5,100.00,'Fall 2029','Greer','IST 279','2018-08-25',10,'2018-07-27 00:56:03','Jonathan Sarasty','26 SPRING FELLOW LN','Greenville','29607','United States','0-7600-4988-2','',5257068),(84,5,1000.00,'Fall 2029','Greer','IST 279','2018-08-25',100,'2018-07-27 00:58:43','Jonathan Sarasty','26 SPRING FELLOW LN','Greenville','29607','United States','0-7600-4988-2','',3489650),(85,5,90.00,'Fall 2000','Greer','IST 279','2018-08-25',9,'2018-07-27 03:21:44','Jonathan Sarasty','26 SPRING FELLOW LN','Greenville','29607','United States','0-7600-4988-2','',7880980),(86,15,300.00,'Summer 2021','Northwest Campus','CPT 246','2021-05-28',15,'2018-07-27 03:55:30','Keith Vollnoggle','100 Northwest Drive','Greenville','29607','US','978-0-7897-4710-5','This is a test comment for the databasee',5296483),(87,6,300.00,'Summer 2021','Northwest Campus','CPt 257','2020-05-28',15,'2018-07-27 03:59:09','Keith Vollnoggle','100 Northwest Drive','Greenville','29607','US','978-0-7897-4710-5','',7232046),(88,6,200.00,'Summer 2021','Northwest Campus','CPt 257','2020-05-28',10,'2018-07-27 05:13:57','Keith Vollnoggle','100 Northwest Drive','Greenville','29607','US','978-0-7897-4710-5','',2719347),(89,5,90.00,'Fall 2000','Greer','IST 279','2018-08-25',9,'2018-07-27 05:20:27','Jonathan Sarasty','26 SPRING FELLOW LN','Greenville','29607','United States','0-7600-4988-2','',1357949),(90,15,300.00,'Summer 2021','Northwest Campus','CPT 246','2021-05-28',15,'2018-07-27 05:22:02','Keith Vollnoggle','100 Northwest Drive','Greenville','29607','US','978-0-7897-4710-5','',4472347),(91,7,195.00,'Fall 2018','Barton Campus','IST 226','2018-08-15',3,'2018-07-27 05:24:36','Robert Whaite','506 S Pleasantburg Dr','Greenville','29607','US','978-1-133-52610-0','',4512175),(95,14,120.00,'Spring 2019','Greer','CPT 270','2018-01-14',3,'2018-07-27 16:07:40','John Smith','1234 Mockingbird Ln','Greenville','12345','US','0-13-167267-3','Test',9009162);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher` (
  `publisherid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`publisherid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publisher`
--

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (1,'Prentice Hall'),(2,'Cengage Learning'),(3,'Course Technology'),(4,'Que Publishing'),(5,'Cisco Press'),(6,'Career Education'),(7,'Mike Murach & Associates'),(21,'Cengage Learning');
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `phone_number` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `access_level` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jonathan','Sarasty','sarastyj','Sarasty!','sarastyj@my.gvltec.edu','8641234567','director'),(2,'Rebecca','Bowser','bowserr','Bowser!','bowserra@my.gvltec.edu','8641234568','student'),(3,'Evan','Leindecker','leindeckere','Leindecker!','leindeckered@my.gvltec.edu','8641234568','student'),(4,'Ignacio','Gonzalez','gonzalezi','Gonzalez!','gonzalezig@my.gvltec.edu','8641234569','student'),(5,'Captain','Admin','admin@cpt275.beausanders.org','teamProjeck275','admin@cpt275.beausanders.org','8641234561','admin'),(6,'Beau','Sanders','sandersb','Sanders!','sandersb@c4ubooks.com','8641234562','director'),(7,'Robert','Whaite','whaiter','Whaite!','whaiter@c4ubooks.com','8641234563','instructor'),(9,'Phillip','Cluley','cluleyp','Cluley!','cluleyp@c4ubooks.com','8642504444','depthead'),(11,'Jane','Johnson','johnsonj','Johnson!','johnsonj@c4ubooks.com','8642345679','instructor'),(13,'Mark','Jonhson','johnsonm','Johnson!','johnsonm@c4ubooks.com','8642501111','instructor'),(14,'Kim','Cannon','cannonk','Cannon!','cannonk@c4ubooks.com','8642502222','instructor'),(15,'Keith','Vollnoggle','vollnogglek','Vollnoggle!','vollnogglek@c4ubooks.com','8642503333','instructor'),(20,'John','Smith','john123','password','johnsmith@gmail.com','8645551234','instructor');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-30  3:00:01
